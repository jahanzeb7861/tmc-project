<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Models\Chairmans;
use App\Models\ListPDF;
use App\Models\Post;
use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with('postMedia')->where('is_publish', 'publish')->orderBy('id', 'desc')->limit(8)->get();
        $banner = banner::where('id', 1)->first(); // Note: I corrected 'banner' to 'Banner'
        $BannerPost = Post::with('postMedia')->where('id', $banner->post)->first();

        $menuItems = [
            [
                'label' => 'About Mominabad',
                'url' => '/page/about',
                'subItems' => [
                    ['label' => 'About Us', 'url' => '/page/about'],
                    ['label' => 'Chairman Message', 'url' => '/page/message'],
                    ['label' => 'Vision and Mission Statement', 'url' => '/page/vision'],
                    ['label' => 'Union Councils List', 'url' => '/page/organogram'],
                    ['label' => 'Staff', 'url' => '/'],
                    ['label' => 'Functions', 'url' => '/'],
                ]
            ],
            [
                'label' => 'Services',
                'url' => '/page/services',
                'subItems' => [
                    ['label' => 'Schools', 'url' => '/page/schools'],
                    ['label' => 'Dispensaries / Maternity Homes', 'url' => '/page/details/dispensaries-maternity-homes'],
                    ['label' => 'Community Centers', 'url' => '/page/details/list-of-community-center-in-tmc-mominabad'],
                    ['label' => 'Libraries', 'url' => '/page/details/library'],
                    ['label' => 'Apply for Trade License', 'url' => '/page/trade'],
                ]
            ],
            [
                'label' => 'News & Media',
                'url' => '/',
                'subItems' => [
                    ['label' => 'Press Release', 'url' => '/page/publication'],
                    ['label' => 'Events', 'url' => '/page/events'],
                    ['label' => 'Video Gallery', 'url' => '/page/vgallery'],
                    ['label' => 'Procurement', 'url' => '/'],
                ]
            ],
            [
                'label' => 'Contact Us',
                'url' => '/page/contact',
                'subItems' => [
                    ['label' => 'Complaint # 1339', 'url' => 'https://1339.gos.pk/'],
                ]
            ],
        ];

        return view('fronts.home', compact('posts', 'BannerPost','menuItems'));
    }
    public function view_detail($slug)
    {

        $data = Post::with(['postMedia', 'faq_details'])->where('slug', $slug)->first();

        $type = $data->menu_type;

        return view('fronts.detail-page', compact('data', 'type'));
    }

    public function view_staff()
    {
        $staff = Team::orderBy('id', 'desc')->get();
        return view('fronts.staff', compact('staff'));
    }
    public function list_view()
    {
        $lists = ListPDF::orderBy('id', 'desc')->get();
        return view('fronts.listview', compact('lists'));
    }
    public function view_chairmans()
    {
        try {
            $chairmans = Chairmans::get();
            return view('fronts.chairman', compact('chairmans'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
