<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\UnionCouncil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UnionCouncilController extends Controller
{
    public function index()
    {
        $unionCouncils = UnionCouncil::orderBy('id', 'DESC')->get();
        return view('admin.union_council.list', compact('unionCouncils'));
    }

    public function viewForm($id = null)
    {
        try {
            $data = null;
            if (!empty($id)) {
                $data = UnionCouncil::findOrFail($id);
            }
            return view('admin.union_council.form', compact('data'));
        } catch (\Throwable $th) {
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'uc' => 'required',
                'uc_name' => 'required',
                'chairman_vc' => 'required',
                'contact_no' => 'required',
            ]);

            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }

            $unionCouncil = UnionCouncil::create([
                'uc' => $request->uc,
                'uc_name' => $request->uc_name,
                'chairman_vc' => $request->chairman_vc,
                'contact_no' => $request->contact_no,
            ]);

            return response()->json(['status' => 'success', 'message' => 'Union Council successfully stored', 'data' => $unionCouncil]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'uc' => 'required',
                'uc_name' => 'required',
                'chairman_vc' => 'required',
                'contact_no' => 'required',
            ]);

            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }

            $unionCouncil = UnionCouncil::findOrFail($id);

            $unionCouncil = UnionCouncil::where('id', $id)->update([
                'uc' => $request->uc,
                'uc_name' => $request->uc_name,
                'chairman_vc' => $request->chairman_vc,
                'contact_no' => $request->contact_no,
            ]);

            return response()->json(['status' => 'success', 'message' => 'Union Council Successfully Updated', 'data' => $unionCouncil]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            UnionCouncil::destroy($id);
            return response()->json(['status' => 'success', 'message' => 'Union Council Successfully Deleted']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
}
