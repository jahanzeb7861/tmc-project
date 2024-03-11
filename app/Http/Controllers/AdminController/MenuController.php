<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Faqs;
use App\Models\Menu;
use App\Models\Post;
use App\Models\PostsMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class MenuController extends Controller
{

    public function viewList()
    {
        try {
            $menuList = Menu::orderBy('id','asc')->get();
            return view('admin.menu.list', compact('menuList'));
        } catch (\Throwable $th) {
        }
    }

    public function toggleStatus(Request $request, $id)
    {
        try {
            $menu = Menu::findOrFail($id);
            $newStatus = $menu->is_active === 'active' ? 'inactive' : 'active';
            DB::table('menus')->where('id', $id)->update(['is_active' => $newStatus]);
            return redirect()->back()->with('success', 'Menu status updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update menu status.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Validation
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:220',
                // 'description' => 'required',
                'keywords' => 'required',
                'short_description' => 'required|max:220',
                'category' => 'required',
                'publish_date' => 'required',
            ]);

            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }

            $post = Post::findOrFail($id);

            if ($request->category == 15) {
                // Create Slug name
                $slug = $post->slug;
            } else {
                $slug = Str::slug($request->input('title'), '-');
            }



            // Process Keywords
            $keywordsString = implode(',', $request->input('keywords', []));

            // Update Post record
            $post->update([
                'image' => 'none',
                'language' => $request->input('language'),
                'category' => $request->input('category'),
                'slug' => $slug,
                'title' => ($request->input('title')),
                'short_description' => base64_encode($request->input('short_description')),
                'description' => base64_encode($request->input('description')),
                'keywords' => $keywordsString,
                'publish_date' => $request->input('publish_date'),
                'is_publish' => $request->boolean('is_publish') ? 'publish' : 'archive',
                'is_faq' => $request->boolean('is_faq') ? 'on' : 'off',
                'user_id' => auth()->id(),
            ]);

            if ($request->boolean('is_faq')) {

                $validator = Validator::make($request->all(), [
                    'question.*' => 'required|string|max:255', // Use * for array validation
                    'answer.*' => 'required|string', // Adjust maximum length as needed
                ]);

                if ($validator->fails()) {
                    $errorString = implode('<br>', $validator->errors()->all());
                    return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
                }

                Faqs::where('post_id', $post->id)->delete();

                foreach ($request->question as $key => $question) {
                    $answer = $request->answer[$key];
                    $store = Faqs::create([
                        'question' => $question,
                        'answer' => $answer,
                        'user_id' => auth()->id(),
                        'post_id' => $post->id
                    ]);
                }
            }

            if (!empty($request->input('removeMedia'))) {
                // Remove Media

                foreach ($request->input('removeMedia') as $id) {
                     try {
                    $removedFile = PostsMedia::findOrFail($id);
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
                    PostsMedia::create([
                        'file_name' => $imageName,
                        'path' => 'uploads/content/',
                        'type' => $post->menu_type,
                        'post_id' => $post->id,
                    ]);
                }
            }

            return response()->json(['status' => 'success', 'message' => 'Post successfully Updated']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something went wrong in the DB', 'error' => $th->getMessage()]);
        }
    }

    public function destory($id)
    {
        try {
            $post = Post::findOrFail($id);

            $postsMedia = PostsMedia::where('post_id', $post->id)->get();
            foreach ($postsMedia as $postMedia) {

                $oldImagePath = public_path('uploads/content/') . $postMedia->file_name;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $postMedia->delete();
            }

            Post::destroy($post->id);
            return response()->json(['status' => 'success', 'message' => 'Post Successfully Deleted']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
}
