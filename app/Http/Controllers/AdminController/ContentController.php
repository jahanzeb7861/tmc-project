<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\PostsMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContentController extends Controller
{
    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'content_id' => 'required',
                'content_text' => 'required',
            ]);
            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }
            $update = Content::where('id', $request->content_id)->update([
                'content' => base64_encode($request->content_text)
            ]);
            return response()->json(['status' => 'success', 'message' => 'Content successfully updated', 'data' => $update]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['status' => 'danger', 'message' => 'Something went wrong in the DB', 'error' => $th->getMessage()]);
        }
    }

    public function ImageUpdate(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'media_id' => 'required',
                'image' => 'required',
            ]);
            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }


            // dd($request->all());

            $removedFile = PostsMedia::findOrFail($request->media_id);
            $imageName = $removedFile->file_name;
            $request->image->move(public_path('uploads/content/'), $imageName);
            $update =  PostsMedia::where('id', $request->media_id)->update([
                'file_name' => $imageName,
            ]);

            return response()->json(['status' => 'success', 'message' => 'Content successfully updated', 'data' => $update]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['status' => 'danger', 'message' => 'Something went wrong in the DB', 'error' => $th->getMessage()]);
        }
    }

        // public function ImageUpdate(Request $request)
        // {
        //     try {
        //         $validator = Validator::make($request->all(), [
        //             'media_id' => 'required',
        //             'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules for multiple images
        //         ]);

        //         if ($validator->fails()) {
        //             $errorString = implode('<br>', $validator->errors()->all());
        //             return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
        //         }

        //         $mediaId = $request->media_id;

        //         // Loop through each uploaded image
        //         foreach ($request->file('images') as $image) {
        //             // Generate a unique filename for each image
        //             $imageName = time() . '_' . $image->getClientOriginalName();

        //             // Move the image to the uploads directory
        //             $image->move(public_path('uploads/content/'), $imageName);

        //             // Create or update the database record for each image
        //             $update = PostsMedia::updateOrCreate(
        //                 ['id' => $mediaId],
        //                 ['file_name' => $imageName]
        //             );
        //         }

        //         return response()->json(['status' => 'success', 'message' => 'Content successfully updated']);
        //     } catch (\Throwable $th) {
        //         return response()->json(['status' => 'danger', 'message' => 'Something went wrong in the DB', 'error' => $th->getMessage()]);
        //     }
        // }
}
