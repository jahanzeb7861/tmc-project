<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        try {
            $contacts = Contact::orderBy('id', 'desc')->get();
            return view('admin.contacts.list', compact('contacts'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function destroy($id)
    {
        try {
            $team = Contact::findOrFail($id);
            Contact::destroy($id);
            return response()->json(['status' => 'success', 'message' => 'Contact Successfully Deleted']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
}
