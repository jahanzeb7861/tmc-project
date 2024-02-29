<?php

use App\Http\Controllers\AdminController\AnnouncementsController;
use App\Http\Controllers\adminController\AsideCategoryController;
use App\Http\Controllers\AdminController\BannerController;
use App\Http\Controllers\AdminController\ChairmanController;
use App\Http\Controllers\AdminController\ContactController;
use App\Http\Controllers\AdminController\ContactProblemController;
use App\Http\Controllers\AdminController\ContentController;
use App\Http\Controllers\adminController\DashboardController;
use App\Http\Controllers\AdminController\EventsController;
use App\Http\Controllers\AdminController\HeaderController;
use App\Http\Controllers\AdminController\ListPdfController;
use App\Http\Controllers\AdminController\PostController;
use App\Http\Controllers\AdminController\ProfileController;
use App\Http\Controllers\AdminController\TeamController;
use App\Http\Controllers\AdminController\UsersController;
use App\Http\Controllers\AdminController\WebsiteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController as FrontContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/optimize", function () {
    Artisan::call('optimize', ['--quiet' => true]);
    return "Optimize Successfully!";
});



Route::group(['middleware' => 'web'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('fronts.home');

    Route::get('/details/{slug}', [HomeController::class, 'view_detail'])->name('fronts.detail-view');
});
Route::get('login', [LoginController::class, 'showLoginForm'])->name('auth.login-view');

Route::post('/authlogin', [LoginController::class, 'login'])->name('auth.login');

// Auth::routes();
Route::group(['prefix' => "admin", 'middleware' => 'auth'], function () {

    Route::get('/', [DashboardController::class, 'viewDashboard'])->name('admin.dashboard.admin');

    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    Route::group(['prefix' => "aside", 'middleware' => 'admin'], function () {
        // Create Routes
        Route::get('category/create/{cate_id?}', [AsideCategoryController::class, 'index'])->name('admin.aside-categories.form');
        Route::post('category/store', [AsideCategoryController::class, 'store'])->name('admin.aside-categories.store');

        // Updates Routes
        Route::get('category/update/{id}', [AsideCategoryController::class, 'viewUpdateForm'])->name('admin.aside-categories.update-form');
        Route::put('category/updates/{id}', [AsideCategoryController::class, 'update'])->name('admin.aside-categories.update');

        // List Routes
        Route::get('category/list', [AsideCategoryController::class, 'listIndex'])->name('admin.aside-categories.list');
        Route::get('category/sub-list/{id}', [AsideCategoryController::class, 'listIndex'])->name('admin.aside-sub-categories.list');

        //Delete Routes
        Route::delete('category/delete/{id}', [AsideCategoryController::class, 'delete'])->name('admin.aside-categories.delete');
    });



    Route::group(['prefix' => "banner", 'middleware' => 'admin'], function () {
        Route::get('/', [BannerController::class, 'viewBanner'])->name('admin.banner.update-form');
        Route::put('/update', [BannerController::class, 'updateBanner'])->name('admin.banner.update');
    });

    Route::group(['prefix' => "anouncement", 'middleware' => 'admin'], function () {
        Route::get('/', [AnnouncementsController::class, 'index'])->name('admin.anouncement.update-form');
        Route::put('/update', [AnnouncementsController::class, 'update'])->name('admin.anouncement.update');
    });

    Route::group(['prefix' => "header"], function () {
        // Create Routes
        Route::get('category/create', [HeaderController::class, 'viewForm'])->name('admin.header-categories.form');
        Route::post('category/store', [HeaderController::class, 'store'])->name('admin.header-categories.store');

        // Updates Routes
        Route::get('category/update/{id}', [HeaderController::class, 'viewUpdateForm'])->name('admin.header-categories.update-form');
        Route::put('category/updates/{id}', [HeaderController::class, 'update'])->name('admin.header-categories.update');

        // List Routes
        Route::get('category/list', [HeaderController::class, 'viewList'])->name('admin.header-categories.list');
        Route::get('category/sub-list/{id}', [HeaderController::class, 'viewList'])->name('admin.header-sub-categories.list');

        //Delete Routes

        Route::middleware(['admin'])->group(function () {
            Route::delete('category/delete/{id}', [HeaderController::class, 'delete'])->name('admin.header-categories.delete');
        });
    });
    Route::group(['prefix' => "post"], function () {
        Route::get('{type}/create', [PostController::class, 'viewForm'])->name('admin.post.show-form');;
        Route::post('{type}/store', [PostController::class, 'store'])->name('admin.post.store');
        Route::get('/update/{id}', [PostController::class, 'viewUpdateForm'])->name('admin.post.show-update-form');
        Route::put('update/{id}', [PostController::class, 'update'])->name('admin.post.update');
        Route::get('/list/{type?}', [PostController::class, 'viewList'])->name('admin.post.show-list');


        Route::middleware(['admin'])->group(function () {
            Route::delete('destory/{id}', [PostController::class, 'destory'])->name('admin.post.delete');
        });
    });

    // HEADER PAGES SECTION
    Route::get('/page-edit/{id}', [WebsiteController::class, 'viewPage'])->name('admin.header-pages.page-edit');
    // Route::get('/about-edit/{id}', [WebsiteController::class, 'viewAboutPage'])->name('admin.header-pages.about-edit');
    Route::post('update-about-page/{id}', [WebsiteController::class, 'updateAboutPage'])->name('admin.header-pages.about-update');


    Route::group(['prefix' => "settings", 'middleware' => 'admin'], function () {
        Route::get('/site', [WebsiteController::class, 'view_settings'])->name('admin.web-settings.site-form');
        Route::put('/update/site', [WebsiteController::class, 'update_settings'])->name('admin.web-settings.site-update');

        Route::get('/profile', [ProfileController::class, 'update_view'])->name('admin.profile.update');
        Route::put('/update/profile/{id}', [ProfileController::class, 'update'])->name('admin.profile-update');
    });

    Route::group(['prefix' => "events", 'middleware' => 'admin'], function () {
        Route::get('/create', [EventsController::class, 'viewForm'])->name('admin.events.create-form');
        Route::post('/create', [EventsController::class, 'store'])->name('admin.events.create');

        Route::get('/list', [EventsController::class, 'viewList'])->name('admin.events.list');

        Route::get('/update/{id}', [EventsController::class, 'viewUpdateForm'])->name('admin.events.update-form');
        Route::put('/update/{id}', [EventsController::class, 'update'])->name('admin.events.update');

        Route::delete('destory/{id}', [EventsController::class, 'destory'])->name('admin.events.delete');
    });

    Route::group(['prefix' => "team", 'middleware' => 'admin'], function () {
        Route::get('/create', [TeamController::class, 'viewForm'])->name('admin.team.create-form');
        Route::post('/create', [TeamController::class, 'store'])->name('admin.team.create');

        Route::get('/list', [TeamController::class, 'index'])->name('admin.team.list');

        Route::get('/update/{id}', [TeamController::class, 'viewForm'])->name('admin.team.update-form');
        Route::put('/update/{id}', [TeamController::class, 'update'])->name('admin.team.update');

        Route::delete('destroy/{id}', [TeamController::class, 'destroy'])->name('admin.team.delete');
    });

    Route::group(['prefix' => "users", 'middleware' => 'admin'], function () {
        Route::get('/create', [UsersController::class, 'viewForm'])->name('admin.user.create-form');
        Route::post('/create', [UsersController::class, 'store'])->name('admin.user.create');

        Route::get('/list', [UsersController::class, 'index'])->name('admin.user.list');

        Route::get('/update/{id}', [UsersController::class, 'viewForm'])->name('admin.user.update-form');
        Route::put('/update/{id}', [UsersController::class, 'update'])->name('admin.user.update');

        Route::delete('destroy/{id}', [UsersController::class, 'destroy'])->name('admin.user.delete');
    });

    Route::group(['prefix' => "listview", 'middleware' => 'admin'], function () {
        Route::get('/create', [ListPdfController::class, 'viewForm'])->name('admin.listview.create-form');
        Route::post('/create', [ListPdfController::class, 'store'])->name('admin.listview.create');

        Route::get('/list', [ListPdfController::class, 'index'])->name('admin.listview.list');

        Route::get('/update/{id}', [ListPdfController::class, 'viewForm'])->name('admin.listview.update-form');
        Route::put('/update/{id}', [ListPdfController::class, 'update'])->name('admin.listview.update');

        Route::delete('destroy/{id}', [ListPdfController::class, 'destroy'])->name('admin.listview.delete');
    });

    Route::group(['prefix' => "content", 'middleware' => 'admin'], function () {

        Route::post('/update', [ContentController::class, 'update'])->name('front.content.update');
        Route::post('/update-image', [ContentController::class, 'ImageUpdate'])->name('front.content.update-image');
    });

    Route::group(['prefix' => "contact-problem", 'middleware' => 'admin'], function () {
        Route::get('/create', [ContactProblemController::class, 'viewForm'])->name('admin.contact-problem.create-form');
        Route::post('/create', [ContactProblemController::class, 'store'])->name('admin.contact-problem.create');

        Route::get('/list', [ContactProblemController::class, 'index'])->name('admin.contact-problem.list');

        Route::get('/update/{id}', [ContactProblemController::class, 'viewForm'])->name('admin.contact-problem.update-form');
        Route::put('/update/{id}', [ContactProblemController::class, 'update'])->name('admin.contact-problem.update');

        Route::delete('destroy/{id}', [ContactProblemController::class, 'destroy'])->name('admin.contact-problem.delete');
    });

    Route::group(['prefix' => "contacts", 'middleware' => 'admin'], function () {
        Route::get('/list', [ContactController::class, 'index'])->name('admin.contact.list');
        Route::delete('destroy/{id}', [ContactController::class, 'destroy'])->name('admin.contact.delete');
    });

    Route::group(['prefix' => "chairman", 'middleware' => 'admin'], function () {
        Route::get('/create', [ChairmanController::class, 'viewForm'])->name('admin.chairman.create-form');
        Route::post('/create', [ChairmanController::class, 'store'])->name('admin.chairman.create');

        Route::get('/list', [ChairmanController::class, 'index'])->name('admin.chairman.list');

        Route::get('/update/{id}', [ChairmanController::class, 'viewForm'])->name('admin.chairman.update-form');
        Route::put('/update/{id}', [ChairmanController::class, 'update'])->name('admin.chairman.update');

        Route::delete('destroy/{id}', [ChairmanController::class, 'destroy'])->name('admin.chairman.delete');
    });
});


Route::get('/page/{slug}', [WebsiteController::class, 'view_page'])->name('fronts.header-pages');


Route::get('/about', function () {
    return view("fronts.about");
});

Route::get('/contact',  [FrontContactController::class, 'index'])->name('fronts.contact.view');
Route::post('/contact',  [FrontContactController::class, 'store'])->name('fronts.contact.store');

Route::get('/listview',  [HomeController::class, 'list_view'])->name('fronts.list-view');
Route::get('/head-of-department',  [HomeController::class, 'view_staff'])->name('fronts.staff-view');

Route::get('/organogram',  [HomeController::class, 'view_chairmans'])->name('fronts.chairman');

Route::post('/search-post', [BannerController::class, 'fetchPost'])->name('admin.banner.search');
// Route::get('/update-titles', [PostController::class, 'decode_post_title']);
Route::get('/events', function () {
    return view("fronts.events");
});
Route::get('/gallery', function () {
    return view("fronts.gallery");
});
Route::get('/vgallery', function () {
    return view("fronts.vgallery");
});
Route::get('/press', function () {
    return view("fronts.press");
});
Route::get('/publication', function () {
    return view("fronts.publication");
});
Route::get('/vision', function () {
    return view("fronts.vision");
});

Route::get('/faqs', function () {
    return view("fronts.faqs");
});
Route::get('/tenders', function () {
    return view("fronts.tenders");
});
Route::get('/auctions', function () {
    return view("fronts.auctions");
});
Route::get('/budget', function () {
    return view("fronts.budget");
});
Route::get('/iwantto', function () {
    return view("fronts.iwantto");
});
Route::get('/pay', function () {
    return view("fronts.pay");
});
Route::get('/applay', function () {
    return view("fronts.applay");
});
Route::get('/book', function () {
    return view("fronts.book");
});
Route::get('/citykarachi', function () {
    return view("fronts.citykarachi");
});
Route::get('/job', function () {
    return view("fronts.job");
});
Route::get('/libary', function () {
    return view("fronts.libary");
});
Route::get('/hostpital', function () {
    return view("fronts.hostpital");
});
Route::get('/sports', function () {
    return view("fronts.sports");
});
Route::get('/issue', function () {
    return view("fronts.issue");
});
Route::get('/fine', function () {
    return view("fronts.fine");
});
Route::get('/shelter', function () {
    return view("fronts.shelter");
});
Route::get('/elder', function () {
    return view("fronts.elder");
});
Route::get('/message', function () {
    return view("fronts.message");
});
Route::get('/functions', function () {
    return view("fronts.functions");
});
Route::get('/trade', function () {
    return view("fronts.trade");
});
Route::get('/career', function () {
    return view("fronts.career");
});
Route::get('/management', function () {
    return view("fronts.management");
});

