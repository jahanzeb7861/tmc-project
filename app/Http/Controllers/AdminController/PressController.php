<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Press;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class PressController extends Controller
{
    public function index()
    {
        $press = Press::orderBy('id', 'DESC')->get();
        return view('admin.press.list', compact('press'));
    }

    public function viewForm($id = null)
    {
        try {
            $data = null;
            if (!empty($id)) {
                $data = Press::findOrFail($id);
            }
            return view('admin.press.form', compact('data'));
        } catch (\Throwable $th) {
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'description' => 'required',
                'date' => 'required',
                'pdf_file' => 'nullable|mimes:pdf|max:2048', // Adjust the max file size as needed
            ]);

            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }

            $slug = Str::slug('press', '-');

            $fileName = '';

            if ($request->hasFile('pdf_file')) {
                // Generate a unique image name based on the title and current timestamp
                $fileName = $slug . '-' . now()->format('YmdHis') . '.' . $request->file('pdf_file')->getClientOriginalExtension();

                // Store the image in the uploads/content directory
                $request->file('pdf_file')->move(public_path('uploads/pdf/'), $fileName);
            }

            $press = Press::create([
                'description' => $request->description,
                'date' => $request->date,
                'pdf_file' => $fileName,
            ]);

            return response()->json(['status' => 'success', 'message' => 'Press successfully stored', 'data' => $press]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'description' => 'required',
                'date' => 'required',
                'pdf_file' => 'nullable|mimes:pdf|max:2048', // Adjust the max file size as needed
            ]);

            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }

            $slug = Str::slug('press', '-');

            $press = Press::findOrFail($id);

            if ($request->hasFile('pdf_file')) {
                // Generate a unique image name based on the title and current timestamp
                $fileName = $slug . '-' . now()->format('YmdHis') . '.' . $request->file('pdf_file')->getClientOriginalExtension();

                // Store the image in the uploads/content directory
                $request->file('pdf_file')->move(public_path('uploads/pdf/'), $fileName);

                // Remove the old image
                if ($press->pdf_file) {
                    $oldImagePath = public_path('uploads/pdf/') . $press->pdf_file;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }

            $press->update([
                'description' => $request->description,
                'date' => $request->date,
                'pdf_file' => $fileName,
            ]);

            return response()->json(['status' => 'success', 'message' => 'Press Successfully Updated', 'data' => $press]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            Press::destroy($id);
            return response()->json(['status' => 'success', 'message' => 'Press Successfully Deleted']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
}
