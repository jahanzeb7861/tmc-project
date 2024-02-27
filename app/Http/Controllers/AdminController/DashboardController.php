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
            return view('admin.dashboard.admin', compact('data'));
        } else {
            return view('fronts.home');
        }
    }
}
