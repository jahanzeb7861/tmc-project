<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    public function update_view()
    {
        $data = auth()->user();

        return view('admin.profile.update', compact('data'));
    }

    public function update(Request $request)
    {
        try {
            $id = auth()->user()->id;
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|max:220',
                'last_name' => 'required',
                'email' => 'required|email',
            ]);

            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }

            if (!empty($request->password)) {
                User::where('id', $id)->update([
                    'password' => Hash::make($request->password),
                ]);
            }

            User::where('id', $id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
            ]);
            return response()->json(['status' => 'success', 'message' => 'Profile successfully updated']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something went wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
}
