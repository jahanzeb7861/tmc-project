<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\ImageGallery;
use App\Models\ImageGalleryMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ImageGalleryController extends Controller
{
    public function viewForm()
    {
        try {
            return view('admin.i_gallery.form');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function viewList()
    {
        try {
            $data = ImageGallery::orderBy('id', 'DESC')->get();
            return view('admin.i_gallery.list', compact('data'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function viewUpdateForm($id)
    {
        try {
            $data = ImageGallery::with('imageGalleryMedia')->where('id', $id)->first();
            return view('admin.i_gallery.form', compact('data'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'file' => 'required',
            ]);
            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }
            // Create Slug name
            $slug = Str::slug($request->input('title'), '-');

            $igallery = ImageGallery::create([
                'title' => $request->input('title'),
            ]);

               // Save Image
               $files = $request->file('file');

               foreach ($files as $key  => $files) {
                   $imageName = $slug . '-' . now()->format('YmdHis') . $key . '.webp';
                   $files->move(public_path('uploads/content/'), $imageName);
                   ImageGalleryMedia::create([
                       'file_name' => $imageName,
                       'path' => 'uploads/content/',
                       'type' => 'menu',
                       'image_gallery_id' => $igallery->id,
                   ]);
               }

            return response()->json(['status' => 'success', 'message' => 'Image Gallery successfully stored', 'data' => $igallery]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something went wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
            ]);

            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }
            // Create Slug name
            $slug = Str::slug($request->input('title'), '-');

            $igallery = ImageGallery::where('id', $id)->update([
                'title' => $request->input('title'),
            ]);


            $igallery = ImageGallery::where('id', $id)->first();


            if (!empty($request->input('removeMedia'))) {
                // Remove Media

                foreach ($request->input('removeMedia') as $id) {
                     try {
                    $removedFile = ImageGalleryMedia::findOrFail($id);
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
                    ImageGalleryMedia::create([
                        'file_name' => $imageName,
                        'path' => 'uploads/content/',
                        'type' => 'menu',
                        'image_gallery_id' => $igallery->id,
                    ]);
                }
            }

            return response()->json(['status' => 'success', 'message' => 'Image Gallery successfully updated', 'data' => $igallery]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something went wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
    public function destory($id)
    {
        try {

            $igallery = ImageGallery::findOrFail($id);

            $imageGalleryMedia = ImageGalleryMedia::where('image_gallery_id', $igallery->id)->get();
            foreach ($imageGalleryMedia as $galleryMedia) {

                $oldImagePath = public_path('uploads/content/') . $galleryMedia->file_name;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $galleryMedia->delete();
            }

            ImageGallery::destroy($id);
            return response()->json(['status' => 'success', 'message' => 'Image Gallery Successfully Deleted']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
}
