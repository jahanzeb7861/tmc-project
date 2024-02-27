<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\ListPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ListPdfController extends Controller
{
    public function index()
    {
        try {
            $pdf = ListPDF::orderBy('id', 'DESC')->get();
            return view('admin.listview.list', compact('pdf'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function viewForm($id = null)
    {
        try {
            $data = null;
            if (!empty($id)) {
                $data = ListPDF::findOrFail($id);
            }
            return view('admin.listview.form', compact('data'));
        } catch (\Throwable $th) {
        }
    }
    public function store(Request $request)
    {
        try {
            $user  = auth()->user();
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'file' => 'required',
            ]);

            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }

            $slug = Str::slug($request->input('title'), '-');
            $imageName = '';
            if ($request->hasFile('file')) {
                // Generate a unique image name based on the title and current timestamp
                $imageName = $slug . '-' . now()->format('YmdHis') . '.' . $request->file('file')->getClientOriginalExtension();

                // Store the image in the uploads/content directory
                $request->file('file')->move(public_path('uploads/pdf/'), $imageName);
            }

            $team = ListPDF::create([
                'title' => $request->title,
                'file' => $imageName,
                'user_id' => $user->id
            ]);

            return response()->json(['status' => 'success', 'message' => 'Team successfully stored', 'data' => $team]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
    public function update(Request $request, $id)
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

            $ListPDF = ListPDF::findOrFail($id);

            $slug = Str::slug($request->input('title'), '-');
            $imageName = '';

            if ($request->hasFile('file')) {
                // Generate a unique image name based on the title and current timestamp
                $imageName = $slug . '-' . now()->format('YmdHis') . '.' . $request->file('file')->getClientOriginalExtension();

                // Store the image in the uploads/content directory
                $request->file('file')->move(public_path('uploads/pdf/'), $imageName);

                // Remove the old image
                if ($ListPDF->image) {
                    $oldImagePath = public_path('uploads/pdf/') . $ListPDF->image;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }

            $ListPDF = ListPDF::where('id', $id)->update([
                'title' => $request->title,
                'file' => $imageName, 
            ]);

            return response()->json(['status' => 'success', 'message' => 'List View Successfully Updated', 'data' => $ListPDF]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }


    public function destroy($id)
    {
        try {
            $team = ListPDF::findOrFail($id);
            // Remove the image
            if ($team->image) {
                $oldImagePath = public_path('uploads/teams/') . $team->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            ListPDF::destroy($id);
            return response()->json(['status' => 'success', 'message' => 'Staff Successfully Deleted']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
}
