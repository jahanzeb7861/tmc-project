<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\HeaderCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HeaderController extends Controller
{
    public function viewForm()
    {
        try {
            $parent = HeaderCategory::where('parent', 0)->get();
            return view('admin.header-categories.form', compact('parent'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function viewUpdateForm($id)
    {
        try {
            $parent = HeaderCategory::where('parent', 0)->get();
            $data = HeaderCategory::where('id', $id)->firstOrFail();
            return view('admin.header-categories.form', compact('data', 'parent'));
        } catch (\Exception $e) {
            // Log the error for debugging


            // Return a response or redirect the user
            return redirect()->route('admin.dashboard')->with('error', 'Unable to retrieve data for update.');
        }
    }
    public function viewList($id = 0)
    {
        try {
            $cat_lists = HeaderCategory::with(['user_details', 'parent_cate'])->where('parent', $id)->get();
            $cat_list = [];

            foreach ($cat_lists as $cat) {
                $count_subCount = HeaderCategory::where('parent', $cat->id)->count();
                array_push($cat_list, [
                    'id' => $cat->id,
                    'title' => $cat->title,
                    'slug' => $cat->slug,
                    'sub_count' => $count_subCount,
                    'description' => $cat->description,
                    'is_publish' => $cat->is_publish,
                    'created_at' => $cat->created_at,
                    'keywords' => $cat->keywords,
                    'image' => $cat->image,
                    'parent_cate' => $cat->parent_cate ? $cat->parent_cate->title : 'Root',
                    'user' => [
                        'id' => $cat->user_details->id,
                        'name' => $cat->user_details->name,
                        'email' => $cat->user_details->email,
                    ],
                ]);
            }

            return view('admin.header-categories.list', compact('cat_list'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
 
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required|unique:header_category|max:255',
                'description' => 'nullable',
                'keywords' => 'nullable',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
            ]);

            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }

            $slug = Str::slug($request->input('title'), '-');
            $imageName = '';
            if ($request->hasFile('image')) {
                // Generate a unique image name based on the title and current timestamp
                $imageName = $slug . '-' . now()->format('YmdHis') . '.' . $request->file('image')->getClientOriginalExtension();

                // Store the image in the uploads/content directory
                $request->file('image')->move(public_path('uploads/content/'), $imageName);
            }
            $keywordsString = '';
            if ($request->input('keywords')) {
                $keywordsArray = $request->input('keywords');
                $keywordsString = implode(',', $keywordsArray);
            }
            // Create a new header category record
            $headerCategory = HeaderCategory::create([
                'title' => $request->input('title'),
                'parent' => $request->input('parent'),
                'slug' => $slug,
                'description' => $request->input('description'),
                'keywords' => $keywordsString,
                'image' => $imageName,
                'is_publish' => $request->input('is_publish') == 'on' ? 'publish' : 'archive',
                'user_id' => auth()->id(), // Assuming you have user authentication
            ]);

            return response()->json(['status' => 'success', 'message' => 'Category successfully stored', 'data' => $headerCategory]);
        } catch (\Throwable $th) {

            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {


            $validator = Validator::make($request->all(), [
                'title' => 'required|max:255',
                'description' => 'nullable',
                'keywords' => 'nullable',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }

            $headerCategory = HeaderCategory::where('id', $id)->firstOrFail();

            $oldImageName = $headerCategory->image;
            $keywordsArray = $request->input('keywords');
            $keywordsString = implode(',', $keywordsArray);
            // Update fields
            $headerCategory->title = $request->input('title');
            $headerCategory->parent = $request->input('parent');
            $headerCategory->slug = Str::slug($request->input('title'), '-');
            $headerCategory->description = $request->input('description');
            $headerCategory->keywords = $keywordsString;
            $headerCategory->is_publish = $request->input('is_publish') == 'on' ? 'publish' : 'archive';

            // Check if a new image is provided
            if ($request->hasFile('image')) {
                // Generate a unique image name based on the title and current timestamp
                $imageName = $headerCategory->slug . '-' . now()->format('YmdHis') . '.' . $request->file('image')->getClientOriginalExtension();

                // Store the new image in the uploads/content directory
                $request->file('image')->move(public_path('uploads/content/'), $imageName);

                // Update the image field
                $headerCategory->image = $imageName;

                // Remove the old image
                if ($oldImageName) {
                    $oldImagePath = public_path('uploads/content/') . $oldImageName;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }

            // Save the changes
            $headerCategory->save();

            return response()->json(['status' => 'success', 'message' => 'Category successfully updated', 'data' => $headerCategory]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            HeaderCategory::destroy($id);
            return response()->json(['status' => 'success', 'message' => 'Category Successfully Deleted']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
}
