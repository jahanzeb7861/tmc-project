<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Chairmans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChairmanController extends Controller
{
    public function index()
    {
        try {
            $chairmans = Chairmans::get();
            return view('admin.chairman.list', compact('chairmans'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function viewForm($id = null)
    {
        try {
            $data = null;
            if (!empty($id)) {
                $data = Chairmans::findOrFail($id);
            }
            return view('admin.chairman.form', compact('data'));
        } catch (\Throwable $th) {
        }
    }
    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'uc' => 'required',
                'uc_name' => 'required',
                'chairman_name' => 'required',
                'contact' => 'required',
            ]);
            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }

            $create = Chairmans::create([
                'UC' => $request->uc,
                'UC_name' => $request->uc_name,
                'chairman_name' => $request->chairman_name,
                'contact' => $request->contact,
            ]);
            return response()->json(['status' => 'success', 'message' => 'Chairman successfully stored', 'data' => $create]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Validation
            $validator = Validator::make($request->all(), [
                'uc' => 'required',
                'uc_name' => 'required',
                'chairman_name' => 'required',
                'contact' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $validator->errors()->first()]);
            }
            // Check if the problem exists
            $problem = Chairmans::findOrFail($id);
            // Update problem 
            $problem->update([
                'UC' => $request->uc,
                'UC_name' => $request->uc_name,
                'chairman_name' => $request->chairman_name,
                'contact' => $request->contact,
            ]);
            return response()->json(['status' => 'success', 'message' => 'Chairman successfully updated']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something went wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
    public function destroy($id)
    {
        try {
            $team = Chairmans::findOrFail($id);
            Chairmans::destroy($id);
            return response()->json(['status' => 'success', 'message' => 'Chairman Successfully Deleted']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
}
