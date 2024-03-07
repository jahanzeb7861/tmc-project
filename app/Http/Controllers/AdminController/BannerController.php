<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\banner;
use App\Models\BannerMedia;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class BannerController extends Controller
{
    public function viewBanner()
    {
        try {
            // $findBanner =  banner::where('id', 1)->first();
            // $banner = Post::with('postMedia')->where('id', 1)->first();

            $data = Banner::with('bannerMedia')->where('banner_title', 'banner1')->first();

            // $data = Post::with(['postMedia', 'faq_details'])->where('slug', 'schools')->first();


            return view('admin.banner.form', compact('data'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function updateBanner(Request $request)
    {
        try {
            // dd($request->all());
            // $post_id = $request->post_id;
            // banner::where('id', 1)->update([
            //     'post' => $post_id,
            // ]);

            // Create Slug name
            $slug = Str::slug('banner', '-');


            if (!empty($request->input('removeMedia'))) {
                // Remove Media

                foreach ($request->input('removeMedia') as $id) {
                     try {
                    $removedFile = BannerMedia::findOrFail($id);
                    $oldImagePath = public_path('uploads/content/'. $removedFile->file_name) ;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                    $removedFile->delete();
                     } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                        // Handle the case where the record is not found (log, return response, etc.)
                        return response()->json(['status' => 'danger', 'message' => 'Media record not found', 'error' => $e->getMessage()]);
                }
                }
            }

            if (!empty($request->file('file'))) {
                // Save Image
                $files = $request->file('file');
                foreach ($files as $key => $file) {
                    $imageName = $slug . '-' . now()->format('YmdHis') . $key . '.webp';
                    $file->move(public_path('uploads/content/'), $imageName);
                    BannerMedia::create([
                        'file_name' => $imageName,
                        'path' => 'uploads/content/',
                        'type' => 'menu',
                        'banner_id' => 1,
                    ]);
                }
            }

            return redirect()->back();

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
