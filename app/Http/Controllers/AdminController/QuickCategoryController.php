<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\HeaderCategory;
use App\Models\Post;
use Illuminate\Http\Request;

class QuickCategoryController extends Controller
{
    public function componentView()
    {
        try {
            $results = HeaderCategory::where('slug', 'like', '%i-want-to%')->first();
            $posts = Post::where('menu_type', 'menu')->where('category', $results->id)->orderBy('slug', 'ASC')->limit(16)->get();

            return view('components.quick-category')->with('posts', $posts);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
