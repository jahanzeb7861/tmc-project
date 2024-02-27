<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\ContactProblems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactProblemController extends Controller
{
    public function index()
    {
        try {
            $problems = ContactProblems::get();
            return view('admin.contact-problem.list', compact('problems'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function viewForm($id = null)
    {
        try {
            $data = null;
            if (!empty($id)) {
                $data = ContactProblems::findOrFail($id);
            }
            return view('admin.contact-problem.form', compact('data'));
        } catch (\Throwable $th) {
        }
    }
    public function store(Request $request)
    {
        try {
            $user = auth()->user();
            $validator = Validator::make($request->all(), [
                'problem' => 'required',
            ]);
            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }

            $create = ContactProblems::create([
                'problem' => $request->problem,
                'user_id' => $user->id,
            ]);
            return response()->json(['status' => 'success', 'message' => 'Problem successfully stored', 'data' => $create]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Validation
            $validator = Validator::make($request->all(), [
                'problem' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $validator->errors()->first()]);
            }
            // Check if the problem exists
            $problem = ContactProblems::findOrFail($id);
            // Update problem 
            $problem->update([
                'problem' => $request->problem,
            ]);
            return response()->json(['status' => 'success', 'message' => 'Problem successfully updated']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something went wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
    public function destroy($id)
    {
        try {
            $team = ContactProblems::findOrFail($id);
            ContactProblems::destroy($id);
            return response()->json(['status' => 'success', 'message' => 'Problem Successfully Deleted']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
}
