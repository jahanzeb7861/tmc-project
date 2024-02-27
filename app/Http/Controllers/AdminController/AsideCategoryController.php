<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use App\Models\Aside;
use App\Models\AsideCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AsideCategoryController extends Controller
{
    public function index($cate_id = 0)
    {
        $parent = Aside::get();
        return view('admin.aside-categories.form', compact('parent'));
    }

    public function viewUpdateForm($id)
    {
        try {

            $data = Aside::where('id', $id)->firstOrFail();
            return view('admin.aside-categories.form', compact('data'));
        } catch (\Exception $e) {
            // Return a response or redirect the user
            return redirect()->route('admin.dashboard')->with('error', 'Unable to retrieve data for update.');
        }
    }

    public function listIndex($id = 0)
    {
        try {
            $cat_lists = Aside::with(['user_details'])->get();
            return view('admin.aside-categories.list', compact('cat_lists'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function store(Request $request)
    {
        try {
            $user = auth()->user();
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:255',
                'url' => 'required',
            ]);

            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }


            // Create a new header category record
            $asideCategory = Aside::create([
                'title' => $request->input('title'),
                'url' => $request->input('url'),
                'user_id' => $user->id, // Assuming you have user authentication
            ]);

            return response()->json(['status' => 'success', 'message' => 'Aside successfully stored', 'data' => $asideCategory]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {


            $validator = Validator::make($request->all(), [
                'title' => 'required|max:255',
                'url' => 'required',
            ]);

            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }

            $asideCategory = Aside::where('id', $id)->firstOrFail();


            // Update fields
            $asideCategory->title = $request->input('title');
            $asideCategory->url = $request->input('url');

            // Save the changes
            $asideCategory->save();

            return response()->json(['status' => 'success', 'message' => 'Category successfully updated', 'data' => $asideCategory]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }

    public function delete($id)
    {
        try {
            Aside::destroy($id);
            return response()->json(['status' => 'success', 'message' => 'Category Successfully Deleted']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
}
