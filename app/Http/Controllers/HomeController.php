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

        return view('fronts.home', compact('posts', 'BannerPost'));
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
