<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnnouncementsController extends Controller
{
    public function index()
    {
        try {
            // $data = Announcement::where('id', 1)->first();
            $data = Announcement::where('is_publish', 'publish')->get();

            if (!$data) {
                throw new \Exception("Announcement with ID 1 not found.");
            }

            return view('admin.anouncements.list', compact('data'));
        } catch (\Throwable $th) {
            // Print the error message
            dd($th->getMessage());
        }
    }
     public function viewForm($id = null)
    {
        try {
            $data = null;
            if (!empty($id)) {
                $data = Announcement::findOrFail($id);
            }
            return view('admin.anouncements.form', compact('data'));
        } catch (\Throwable $th) {
        }
    }
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'description' => 'required'
            ]);
            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }

            $create = Announcement::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'is_publish' => $request->boolean('is_publish') ? 'publish' : 'archive',

            ]);
            return response()->json(['status' => 'success', 'message' => 'Announcement successfully stored', 'data' => $create]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'description' => 'required',
            ]);

            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }

            $event = Announcement::where('id', 1)->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'is_publish' => $request->boolean('is_publish') ? 'publish' : 'archive',

            ]);
            return response()->json(['status' => 'success', 'message' => 'Announcement successfully updated', 'data' => $event]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something went wrong in the DB', 'error' => $th->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $team = Announcement::findOrFail($id);
            Announcement::destroy($id);
            return response()->json(['status' => 'success', 'message' => 'Announcement Successfully Deleted']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
}
