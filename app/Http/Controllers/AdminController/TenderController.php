<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Tender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TenderController extends Controller
{
    public function index()
    {
        $tenders = Tender::orderBy('id', 'DESC')->get();
        return view('admin.tender.list', compact('tenders'));
    }

    public function viewForm($id = null)
    {
        try {
            $data = null;
            if (!empty($id)) {
                $data = Tender::findOrFail($id);
            }
            return view('admin.tender.form', compact('data'));
        } catch (\Throwable $th) {
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'description' => 'required',
                'department' => 'required',
                'diary_no' => 'required',
                'tender_date' => 'required',
                'opening_date' => 'required',
            ]);

            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }

            $tender = Tender::create([
                'description' => $request->description,
                'department' => $request->department,
                'diary_no' => $request->diary_no,
                'tender_date' => $request->tender_date,
                'opening_date' => $request->opening_date,
            ]);

            return response()->json(['status' => 'success', 'message' => 'Tender successfully stored', 'data' => $tender]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'description' => 'required',
                'department' => 'required',
                'diary_no' => 'required',
                'tender_date' => 'required',
                'opening_date' => 'required',
            ]);

            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }

            $tender = Tender::findOrFail($id);

            $tender = Tender::where('id', $id)->update([
                'description' => $request->description,
                'department' => $request->department,
                'diary_no' => $request->diary_no,
                'tender_date' => $request->tender_date,
                'opening_date' => $request->opening_date,
            ]);

            return response()->json(['status' => 'success', 'message' => 'Tender Successfully Updated', 'data' => $tender]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            Tender::destroy($id);
            return response()->json(['status' => 'success', 'message' => 'Tender Successfully Deleted']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
}
