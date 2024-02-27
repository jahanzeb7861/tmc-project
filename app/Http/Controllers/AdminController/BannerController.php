<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\banner;
use App\Models\Post;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function viewBanner()
    {
        try {
            $findBanner =  banner::where('id', 1)->first();
            $banner = Post::with('postMedia')->where('id', $findBanner->post)->first();

            return view('admin.banner.form', compact('banner'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function updateBanner(Request $request)
    {
        try {
            $post_id = $request->post_id;
            banner::where('id', 1)->update([
                'post' => $post_id,
            ]);
            return response()->json(['status' => 'success', 'message' => 'Banner Successfully Update']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something went wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
    public function fetchPost(Request $request)
    {
        try {
            $searchTerm = ($request->input('search'));
            $posts = Post::with('postMedia')->whereRaw('lcase((title)) LIKE ? OR lcase((title)) LIKE ?', ['%' . strtolower($searchTerm) . '%', '%' . $searchTerm . '%'])->get();

            if (!$posts->isEmpty()) {
                return response()->json(['status' => 'success', 'message' => 'Data Successfully found', 'data' => $posts]);
            } else {
                return response()->json(['status' => 'warning', 'message' => 'Data not found', 'data' => $searchTerm]);
            }
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something went wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
}
