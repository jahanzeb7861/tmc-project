<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::orderBy('id', 'DESC')->get();
        return view('admin.team.list', compact('teams'));
    }

    public function viewForm($id = null)
    {
        try {
            $data = null;
            if (!empty($id)) {
                $data = Team::findOrFail($id);
            }
            return view('admin.team.form', compact('data'));
        } catch (\Throwable $th) {
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'designation' => 'required',
                'image' => 'required',
            ]);

            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }

            $slug = Str::slug($request->input('name'), '-');
            $imageName = '';
            if ($request->hasFile('image')) {
                // Generate a unique image name based on the title and current timestamp
                $imageName = $slug . '-' . now()->format('YmdHis') . '.' . $request->file('image')->getClientOriginalExtension();

                // Store the image in the uploads/content directory
                $request->file('image')->move(public_path('uploads/teams/'), $imageName);
            }

            $team = Team::create([
                'name' => $request->name,
                'designation' => $request->designation,
                'image' => $imageName,
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
                'name' => 'required',
                'designation' => 'required',
                'image' => 'required',
            ]);

            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }

            $team = Team::findOrFail($id);

            $slug = Str::slug($request->input('name'), '-');
            $imageName = '';

            if ($request->hasFile('image')) {
                // Generate a unique image name based on the title and current timestamp
                $imageName = $slug . '-' . now()->format('YmdHis') . '.' . $request->file('image')->getClientOriginalExtension();

                // Store the image in the uploads/content directory
                $request->file('image')->move(public_path('uploads/teams/'), $imageName);

                // Remove the old image
                if ($team->image) {
                    $oldImagePath = public_path('uploads/teams/') . $team->image;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            }

            $team = Team::where('id', $id)->update([
                'name' => $request->name,
                'designation' => $request->designation,
                'image' => $imageName,
            ]);

            return response()->json(['status' => 'success', 'message' => 'Team Successfully Updated', 'data' => $team]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $team = Team::findOrFail($id);
            // Remove the image
            if ($team->image) {
                $oldImagePath = public_path('uploads/teams/') . $team->image;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            Team::destroy($id);
            return response()->json(['status' => 'success', 'message' => 'Staff Successfully Deleted']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
}
