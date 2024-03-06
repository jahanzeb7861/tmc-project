<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use App\Models\Aside;
use App\Models\AsideCategory;
use App\Models\HeaderCategory;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function viewDashboard()
    {
        if (auth()) {

            $HeaderCategory = HeaderCategory::count();
            $AsideCategory = Aside::count();
            $post = Post::count();
            $data = [
                'asideCategory' => $AsideCategory,
                'headerCategory' => $HeaderCategory,
                'totalCategory' => $HeaderCategory + $AsideCategory,
                'post' => $post
            ];

           // Fetching services posts from the Post model
            $servicesPosts = Post::get();

            // Processing services posts to create subItems array
            $servicesSubItems = [];
            foreach ($servicesPosts as $post) {
                $servicesSubItems[] = [
                    'label' => $post->title,
                    'url' => '/admin/post/update/' . $post->id,
                ];
            }

            $menuItems = [
                [
                    'label' => 'About Mominabad',
                    'url' => '/admin/about',
                    'id' => 'about',
                    'subItems' => [
                        // ['label' => 'About Us', 'url' => '/admin/page-edit/1'],
                        ['label' => 'Chairman Message', 'url' => '/admin/page-edit/2'],
                        ['label' => 'Vision and Mission Statement', 'url' => '/admin/page-edit/3'],
                        ['label' => 'Union Councils List', 'url' => '/admin/union_council/list'],
                        ['label' => 'Staff', 'url' => '/admin/staff/list'],
                        ['label' => 'Functions', 'url' => '/admin/page-edit/6'],
                    ]
                ],
                [
                    'label' => 'Services',
                    'url' => '/admin/services',
                    'id' => 'services',
                    'subItems' => $servicesSubItems

                    // 'subItems' => [
                    //     ['label' => 'Schools', 'url' => '/admin/schools-edit'],
                    //     ['label' => 'Dispensaries / Maternity Homes', 'url' => '/admin/details/dispensaries-maternity-homes-edit'],
                    //     ['label' => 'Community Centers', 'url' => '/admin/details/list-of-community-center-in-tmc-mominabad-edit'],
                    //     ['label' => 'Libraries', 'url' => '/admin/details/library-edit'],
                    //     ['label' => 'Apply for Trade License', 'url' => '/admin/trade-edit'],
                    // ]
                ],
                [
                    'label' => 'News & Media',
                    'url' => '/news',
                    'id' => 'news',
                    'subItems' => [
                        ['label' => 'Press Release', 'url' => '/admin/page-edit/7'],
                        ['label' => 'Events', 'url' => '/admin/page-edit/8'],
                        ['label' => 'Image Gallery', 'url' => '/admin/page-edit/9'],
                        ['label' => 'Video Gallery', 'url' => '/admin/page-edit/10'],
                    ]
                ],
                [
                    'label' => 'Procurement',
                    'url' => '/',
                    'id' => 'procurement',
                    'subItems' => [
                        ['label' => 'Tenders', 'url' => '/admin/tenders/list'],
                        ['label' => 'Auctions', 'url' => '/admin/auctions/list'],
                        ['label' => 'Budget', 'url' => '/admin/budget/list'],
                    ]
                ],
                [
                    'label' => 'Contact Us',
                    'url' => '/admin/contact-edit',
                    'id' => 'contact',
                    'subItems' => [
                        ['label' => 'Complaint # 1339', 'url' => 'https://1339.gos.pk/'],
                    ]
                ],
            ];


            return view('admin.dashboard.admin', compact(['data','menuItems','servicesSubItems']));
        } else {
            return view('fronts.home');
        }
    }
}
