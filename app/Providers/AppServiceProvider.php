<?php

namespace App\Providers;

use App\Models\Announcement;
use App\Models\Aside;
use App\Models\AsideCategory;
use App\Models\Event;
use App\Models\HeaderCategory;
use App\Models\Menu;
use App\Models\Post;
use Illuminate\Support\ServiceProvider;
use App\Models\WebsiteSettings;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        View::composer('layouts.admin', function ($view) {
            $websiteSettings = WebsiteSettings::find(1); // Assuming the website settings are stored in the database with ID 1
            $view->with('websiteSettings', $websiteSettings);
        });

        View::composer(['layouts.app', 'fronts.contact'], function ($view) {
            $websiteSettings = WebsiteSettings::with(['relatedLinks','usefulLinks'])->find(1);
            $main_menus = HeaderCategory::where('parent', 0)->get();
            $headerNavigation = [];
            foreach ($main_menus as $key => $menu) {
                $sub_menu_arr = [];
                $sub_menus = HeaderCategory::where('parent', $menu->id)->get();
                foreach ($sub_menus as $sub_menu) {

                    $post_arr = [];
                    $posts = Post::where('menu_type', 'menu')->where('category', $sub_menu->id)->get();
                    foreach ($posts as $post) {
                        array_push(
                            $post_arr,
                            [
                                'id' => $post->id,
                                'title' => ($post->title),
                                'slug' => $post->slug
                            ]
                        );
                    }
                    array_push($sub_menu_arr, [
                        'id' => $sub_menu->id,
                        'title' => $sub_menu->title,
                        'slug' => $sub_menu->slug,
                        'post' => $post_arr
                    ]);
                }

                array_push($headerNavigation, [
                    'id' => $menu->id,
                    'title' => $menu->title,
                    'slug' => $menu->slug,
                    'submenu' => $sub_menu_arr
                ]);
            }





             // Fetching services posts from the Post model
            $servicesPosts = Post::where('category','!=',15)->get();

            // Processing services posts to create subItems array
            $servicesSubItems = [];
            foreach ($servicesPosts as $post) {
                $servicesSubItems[] = [
                    'label' => $post->title,
                    'url' => '/details/' . $post->slug,
                ];
            }


            $activeMenuItems = Menu::where('is_active', 'active')->get();


            $menuItems = [
                [
                    'label' => 'About Mominabad',
                    'url' => '/about',
                    'subItems' => [
                        ['label' => 'About Us', 'url' => '/about'],
                        ['label' => 'Chairman Message', 'url' => '/page/message'],
                        ['label' => 'Vision and Mission Statement', 'url' => '/page/vision'],
                        ['label' => 'Union Councils List', 'url' => '/page/organogram'],
                        ['label' => 'Staff', 'url' => '/page/management'],
                        ['label' => 'Functions', 'url' => '/functions'],
                    ]
                ],
                [
                    'label' => 'Services',
                    'url' => '/page/services',
                    'subItems' => $servicesSubItems
                    // 'subItems' => [
                    //     ['label' => 'Schools', 'url' => '/page/schools'],
                    //     ['label' => 'Dispensaries / Maternity Homes', 'url' => '/page/details/dispensaries-maternity-homes'],
                    //     ['label' => 'Community Centers', 'url' => '/page/details/list-of-community-center-in-tmc-mominabad'],
                    //     ['label' => 'Libraries', 'url' => '/page/details/library'],
                    //     ['label' => 'Apply for Trade License', 'url' => '/page/trade'],
                    // ]
                ],
                [
                    'label' => 'News & Media',
                    'url' => '/',
                    'subItems' => [
                        ['label' => 'Press Release', 'url' => '/page/press'],
                        ['label' => 'Events', 'url' => '/page/events'],
                        ['label' => 'Image Gallery', 'url' => '/page/gallery'],
                        ['label' => 'Video Gallery', 'url' => '/page/vgallery'],
                    ]
                ],
                [
                    'label' => 'Procurement',
                    'url' => '/',
                    'id' => 'procurement',
                    'subItems' => [
                        ['label' => 'Tenders', 'url' => '/page/tenders'],
                        ['label' => 'Auctions', 'url' => '/page/auctions'],
                        ['label' => 'Budget', 'url' => '/page/budget'],
                    ]
                ],
                [
                    'label' => 'Contact Us',
                    'url' => '/contact',
                    'subItems' => [
                        ['label' => 'Complaint # 1339', 'url' => 'https://1339.gos.pk/'],
                    ]
                ],
            ];

            // $menuItems = [];
            // foreach ($activeMenuItems as $menuItem) {
            //     $subItems = [];
            //     foreach ($menuItem->subItems as $subItem) {
            //         $subItems[] = [
            //             'is_active' => $subItem->is_active, // Add the is_active attribute dynamically
            //         ];
            //     }

            //     $menuItems[] = [
            //         'label' => $menuItem->label,
            //         'url' => $menuItem->url,
            //         'subItems' => $subItems,
            //     ];
            // }

            // Iterate through each menu item
            foreach ($menuItems as &$menuItem) {
                // Check if the current menu item has subItems
                if (isset($menuItem['subItems'])) {
                    // Iterate through each subItem of the current menu item
                    foreach ($menuItem['subItems'] as &$subItem) {
                        // Fetch the corresponding record from your database based on the title of the subItem
                        $menu = Menu::where('title', $subItem['label'])->first();

                        // Check if a corresponding record was found
                        if ($menu) {
                            // Assign the value of 'is_active' from the database to the subItem
                            $subItem['is_active'] = $menu->is_active;
                        } else {
                            // If no corresponding record was found, set 'is_active' to a default value
                            $subItem['is_active'] = 'inactive'; // Or any default value you prefer
                        }
                    }
                }
            }

            // Iterate through each menu item
            foreach ($menuItems as &$menuItem) {
                // Check if the current menu item has subItems
                if (isset($menuItem['subItems'])) {
                    // Filter subItems based on 'is_active' value
                    $menuItem['subItems'] = array_filter($menuItem['subItems'], function ($subItem) {
                        return isset($subItem['is_active']) && $subItem['is_active'] === 'active';
                    });
                }
            }

            // dd($menuItems);

            $view->with(['websiteSettings' => $websiteSettings, 'menus' => $headerNavigation,'activeMenuItems' => $menuItems]);
        });

        View::composer('components.aside', function ($view) {

            $main_menus = Aside::get();
            $view->with(['menus' => $main_menus]);
        });

        View::composer('components.events', function ($view) {
            $events = Event::where('is_publish', 'publish')->orderBy('id', 'desc')->get();
            $view->with(['events' => $events]);
        });

        View::composer('components.quick-category', function ($view) {
            // $mainCat = HeaderCategory::where('id', 15)->get();
            // $posts = [];
            // foreach ($mainCat as $key => $value) {

            //     $postsget = Post::where('menu_type', 'menu')->where('category', $value->id)->orderBy('slug', 'ASC')->limit(7)->get();

            //     foreach ($postsget as $key => $post) {
            //         # code...
            //         array_push($posts, $post);
            //     }
            // }

            $posts = Post::where('category',15)->limit(8)->get();

            $view->with(['posts' => $posts]);
        });

        View::composer('components.announcement', function ($view) {
            $announcements = Announcement::where('is_publish', 'publish')->get();

            $view->with(['announcements' => $announcements]);
        });
    }
}
