<?php

namespace App\Providers;

use App\Models\Announcement;
use App\Models\Aside;
use App\Models\AsideCategory;
use App\Models\Event;
use App\Models\HeaderCategory;
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
            $websiteSettings = WebsiteSettings::find(1);
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
            $view->with(['websiteSettings' => $websiteSettings, 'menus' => $headerNavigation]);
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
            $mainCat = HeaderCategory::where('parent', '2')->get();
            $posts = [];
            foreach ($mainCat as $key => $value) {

                $postsget = Post::where('menu_type', 'menu')->where('category', $value->id)->orderBy('slug', 'ASC')->limit(7)->get();

                foreach ($postsget as $key => $post) {
                    # code...
                    array_push($posts, $post);
                }
            }

            $view->with(['posts' => $posts]);
        });
        View::composer('components.announcement', function ($view) {
            $announcement = Announcement::where('is_publish', 'publish')->where('id', 1)->first();

            $view->with(['announcement' => $announcement]);
        });
    }
}
