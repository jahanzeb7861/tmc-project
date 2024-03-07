<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Auction;
use App\Models\Budget;
use App\Models\HeaderCategory;
use App\Models\HeaderPage;
use App\Models\PagesMedia;
use App\Models\Post;
use App\Models\Staff;
use App\Models\Tender;
use App\Models\UnionCouncil;
use App\Models\WebsiteSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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

    // HEADER PAGES START
    public function viewPage($id)
    {
        try {
            // about page
            $data = HeaderPage::with('pageMedia')->where('id', $id)->first();
            $category = HeaderCategory::where('parent', '!=', 0)->get();
            $type = $data->menu_type;
            return view('admin.header-pages.page-edit', compact('category', 'data', 'type'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    // viewIwantToPage
    public function viewIwantToPage()
    {
        try {
            // dd(1);
            // about page
            $posts = Post::where('category',15)->get();

            // dd($posts);
            return view('fronts.iwantto',compact('posts'));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function updateAboutPage(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'description' => 'required',
            ]);

            if ($validator->fails()) {
                $errorString = implode('<br>', $validator->errors()->all());
                return response()->json(['status' => 'danger', 'message' => 'Validation Error', 'error' => $errorString]);
            }

            $page = HeaderPage::findOrFail($id);

            // Update Post record
            $page->update([
                'description' => base64_encode($request->input('description')),
                'user_id' => auth()->id(),
            ]);

            // $slug = Str::slug($request->input('title'), '-');
            $slug = $page->slug;


            if (!empty($request->input('removeMedia'))) {
                // Remove Media

                foreach ($request->input('removeMedia') as $id) {
                     try {
                    $removedFile = PagesMedia::findOrFail($id);
                    $oldImagePath = public_path('uploads/content/'. $removedFile->file_name) ;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                    $removedFile->delete();
                     } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                        // Handle the case where the record is not found (log, return response, etc.)
                        return response()->json(['status' => 'danger', 'message' => 'Media record not found', 'error' => $e->getMessage()]);
                }
                }
            }


            if (!empty($request->file('file'))) {
                // Save Image
                $files = $request->file('file');
                foreach ($files as $key => $file) {
                    $imageName = $slug . '-' . now()->format('YmdHis') . $key . '.webp';
                    $file->move(public_path('uploads/content/'), $imageName);
                    PagesMedia::create([
                        'file_name' => $imageName,
                        'path' => 'uploads/content/',
                        'type' => $page->menu_type,
                        'header_page_id' => $page->id,
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Post successfully updated');
            // return response()->json(['status' => 'success', 'message' => 'Post successfully Updated']);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'danger', 'message' => 'Something went wrong in the DB', 'error' => $th->getMessage()]);
        }
    }

    public function view_page($slug)
    {

        if ($slug == "organogram") {

            $unionCouncils = UnionCouncil::get();

            return view('fronts.union_councils_list',compact('unionCouncils'));
        } else if ($slug == "management") {
            $staffs = Staff::get();

            return view('fronts.staffs_list',compact('staffs'));
        } else if ($slug == "tenders") {
            $tenders = Tender::get();

            return view('fronts.tenders_list',compact('tenders'));
        }

        else if ($slug == "auctions") {
            $auctions = Auction::get();

            return view('fronts.auctions_list',compact('auctions'));
        }

        else if ($slug == "budget") {
            $budgets = Budget::get();

            return view('fronts.budgets_list',compact('budgets'));
        }


        $data = HeaderPage::where('slug', $slug)->first();

        $type = $data->menu_type;

        return view('fronts.header-pages', compact('data', 'type'));
    }

}
