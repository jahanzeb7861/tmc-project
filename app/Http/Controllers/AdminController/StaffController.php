<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::orderBy('id', 'DESC')->get();
        return view('admin.staff.list', compact('staffs'));
    }

    public function viewForm($id = null)
    {
        try {
            $data = null;
            if (!empty($id)) {
                $data = Staff::findOrFail($id);
            }
            return view('admin.staff.form', compact('data'));
        } catch (\Throwable $th) {
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'department' => 'required',
                'hod_name' => 'required',
                'contact_no' => 'required',
            ]);

            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }

            $staff = Staff::create([
                'department' => $request->department,
                'hod_name' => $request->hod_name,
                'contact_no' => $request->contact_no,
            ]);

            return response()->json(['status' => 'success', 'message' => 'Staff successfully stored', 'data' => $staff]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'department' => 'required',
                'hod_name' => 'required',
                'contact_no' => 'required',
            ]);

            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }

            $Staff = Staff::findOrFail($id);

            $Staff = Staff::where('id', $id)->update([
                'department' => $request->department,
                'hod_name' => $request->hod_name,
                'contact_no' => $request->contact_no,
            ]);

            return response()->json(['status' => 'success', 'message' => 'Staff Successfully Updated', 'data' => $Staff]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            Staff::destroy($id);
            return response()->json(['status' => 'success', 'message' => 'Staff Successfully Deleted']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
}
