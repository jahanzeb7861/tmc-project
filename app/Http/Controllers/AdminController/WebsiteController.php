<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WebsiteController extends Controller
{
    public function view_settings()
    {
        try {

            $data = WebsiteSettings::where('id', 1)->first();
            return view('admin.site-settings.form', compact('data'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function update_settings(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:50',
                'email' => 'required|email', 
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,ico|max:2048',
                'author' => 'required',
                'title' => 'required',
                'description' => 'required',
                'website_address' => 'required',
                'keywords' => 'required|array',
            ]);

            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }

            $keywordsString = implode(',', $request->input('keywords', []));

            $updateData = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'author' => $request->author,
                'title' => $request->title,
                'description' => base64_encode($request->description),
                'website_address' => $request->website_address,
                'keywords' => $keywordsString,
                'linkedin_link' => $request->linkedin,
                'facebook_link' => $request->facebook,
                'twitter_link' => $request->twitter,
                'instagram_link' => $request->instagram,
                'youtube_link' => $request->youtube,
            ];

            // Update logo if provided
            if ($request->hasFile('logo')) {
                $logoName = 'logo.png';
                $request->file('logo')->move(public_path('uploads/website/'), $logoName);
                $updateData['logo'] = $logoName;
            }

            // Update favicon if provided
            if ($request->hasFile('favicon')) {
                $faviconName = 'favicon.ico';
                $request->file('favicon')->move(public_path('uploads/website/'), $faviconName);
                $updateData['favicon'] = $faviconName;
            }

            WebsiteSettings::where('id', 1)->update($updateData);

            return response()->json(['status' => 'success', 'message' => 'Website successfully updated']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something wrong in the DB', 'error' => $th->getMessage()]);
        }
    }
}
