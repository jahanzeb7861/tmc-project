<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\VideoGallery;
use App\Models\VideoGalleryMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class VideoGalleryController extends Controller
{
    public function viewForm()
    {
        try {
            return view('admin.v_gallery.form');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function viewList()
    {
        try {
            $data = VideoGallery::orderBy('id', 'DESC')->get();
            return view('admin.v_gallery.list', compact('data'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function viewUpdateForm($id)
    {
        try {
            $data = VideoGallery::with('videoGalleryMedia')->where('id', $id)->first();
            return view('admin.v_gallery.form', compact('data'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'file' => 'nullable',
                'address' => 'required',
            ]);
            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }
            // Create Slug name
            $slug = Str::slug($request->input('title'), '-');

            $vgallery = VideoGallery::create([
                'title' => $request->input('title'),
                'address' => $request->input('address'),
            ]);

               // Save Image
            //    $files = $request->file('file');

            //    foreach ($files as $key  => $files) {
            //        $imageName = $slug . '-' . now()->format('YmdHis') . $key . '.webp';
            //        $files->move(public_path('uploads/content/'), $imageName);
            //        VideoGalleryMedia::create([
            //            'file_name' => $imageName,
            //            'path' => 'uploads/content/',
            //            'type' => 'menu',
            //            'video_gallery_id' => $vgallery->id,
            //        ]);
            //    }

            return response()->json(['status' => 'success', 'message' => 'Video Gallery successfully stored', 'data' => $vgallery]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something went wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'address' => 'required',
            ]);

            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }
            // Create Slug name
            $slug = Str::slug($request->input('title'), '-');

            $vgallery = VideoGallery::where('id', $id)->update([
                'title' => $request->input('title'),
                'address' => $request->input('address'),
            ]);


            $vgallery = VideoGallery::where('id', $id)->first();


            // if (!empty($request->input('removeMedia'))) {
            //     // Remove Media

            //     foreach ($request->input('removeMedia') as $id) {
            //          try {
            //         $removedFile = VideoGalleryMedia::findOrFail($id);
            //         $oldImagePath = public_path('uploads/content/'. $removedFile->file_name) ;
            //         if (file_exists($oldImagePath)) {
            //             unlink($oldImagePath);
            //         }
            //         $removedFile->delete();
            //          } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            //             // Handle the case where the record is not found (log, return response, etc.)
            //             return response()->json(['status' => 'danger', 'message' => 'Media record not found', 'error' => $e->getMessage()]);
            //     }
            //     }
            // }


            // if (!empty($request->file('file'))) {
            //     // Save Image
            //     $files = $request->file('file');
            //     foreach ($files as $key => $file) {
            //         $imageName = $slug . '-' . now()->format('YmdHis') . $key . '.webp';
            //         $file->move(public_path('uploads/content/'), $imageName);
            //         VideoGalleryMedia::create([
            //             'file_name' => $imageName,
            //             'path' => 'uploads/content/',
            //             'type' => 'menu',
            //             'video_gallery_id' => $vgallery->id,
            //         ]);
            //     }
            // }

            return response()->json(['status' => 'success', 'message' => 'Video Gallery successfully updated', 'data' => $vgallery]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something went wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
    public function destory($id)
    {
        try {

            // $igallery = VideoGallery::findOrFail($id);

            // $videoGalleryMedia = VideoGalleryMedia::where('video_gallery_id', $igallery->id)->get();
            // foreach ($videoGalleryMedia as $galleryMedia) {

            //     $oldImagePath = public_path('uploads/content/') . $galleryMedia->file_name;
            //     if (file_exists($oldImagePath)) {
            //         unlink($oldImagePath);
            //     }
            //     $galleryMedia->delete();
            // }

            VideoGallery::destroy($id);
            return response()->json(['status' => 'success', 'message' => 'Video Gallery Successfully Deleted']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
}
