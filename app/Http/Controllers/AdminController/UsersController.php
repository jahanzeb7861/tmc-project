<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index()
    {
        try {
            $users = User::where('role', 'user')->get();
            return view('admin.users.list', compact('users'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function viewForm($id = null)
    {
        try {
            $data = null;
            if (!empty($id)) {
                $data = User::findOrFail($id);
            }
            return view('admin.users.form', compact('data'));
        } catch (\Throwable $th) {
        }
    }
    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'status' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
            ]);
            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }

            $create = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'status' => $request->status,
                'email' => $request->email,
                'role' => 'user',
                'password' => Hash::make($request->password),
            ]);
            return response()->json(['status' => 'success', 'message' => 'User successfully stored', 'data' => $create]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Validation
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'status' => 'required',
                'email' => 'required|email',
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $validator->errors()->first()]);
            }

            // Check if the user exists
            $user = User::where('role', 'user')->find($id);
            if (!$user) {
                return response()->json(['status' => 'warning', 'message' => 'User not found']);
            }

            // Check for duplicate email
            $duplicateUser = User::where('email', $request->email)->where('id', '!=', $id)->first();
            if ($duplicateUser) {
                return response()->json(['status' => 'warning', 'message' => 'Duplicate email. User not updated.']);
            }

            // Update password if provided
            if (!empty($request->password)) {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
            }

            // Update user details
            $user->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'status' => $request->status,
            ]);

            return response()->json(['status' => 'success', 'message' => 'User successfully updated']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something went wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
    public function destroy($id)
    {
        try {
            $team = User::findOrFail($id);
            User::destroy($id);
            return response()->json(['status' => 'success', 'message' => 'User Successfully Deleted']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
}
