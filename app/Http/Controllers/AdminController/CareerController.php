<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::orderBy('id', 'DESC')->get();
        return view('admin.career.list', compact('careers'));
    }

    public function viewForm($id = null)
    {
        try {
            $data = null;
            if (!empty($id)) {
                $data = Career::findOrFail($id);
            }
            return view('admin.career.form', compact('data'));
        } catch (\Throwable $th) {
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'position' => 'required',
                'details' => 'required',
                'ad_date' => 'required',
                'closing_date' => 'required',
            ]);

            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }
            $career = Career::create([
                'position' => $request->position,
                'details' => $request->details,
                'ad_date' => $request->ad_date,
                'closing_date' => $request->closing_date,
            ]);

            return response()->json(['status' => 'success', 'message' => 'Career successfully stored', 'data' => $career]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'position' => 'required',
                'details' => 'required',
                'ad_date' => 'required',
                'closing_date' => 'required',
            ]);

            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }

            $career = Career::findOrFail($id);

            $career->update([
                'position' => $request->position,
                'details' => $request->details,
                'ad_date' => $request->ad_date,
                'closing_date' => $request->closing_date,
            ]);

            return response()->json(['status' => 'success', 'message' => 'Career Successfully Updated', 'data' => $career]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            Career::destroy($id);
            return response()->json(['status' => 'success', 'message' => 'Career Successfully Deleted']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
}
