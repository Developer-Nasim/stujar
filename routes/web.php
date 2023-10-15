<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ChooseController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\SiteoptionController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PagesettingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ChangepasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\EventController;






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

Route::get('ccc', function(){
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('view:cache');
    return "Config-Cache is cleared";
});

Route::get('/', [HomeController::class,'landing'])->name('landing');
Route::get('/four-zero-four', [WelcomeController::class,'four_zero_four'])->name('four-zero-four');
Route::get('/facebook-login', [WelcomeController::class,'fb_login'])->name('fb.login');
Route::post('/findshop/{query}', [ContactController::class,'findshop'])->name('findshop');
Route::post('/contact-store', [ContactController::class,'contact_store'])->name('contact.store');
Route::post('/members', [HomeController::class,'landing'])->name('landing');
Route::post('/member-message', [ContactController::class,'member_message'])->name('member.message');
Route::post('/comment-store', [ContactController::class,'comment_store'])->name('comment.store');
Route::post('/subscribe-store', [WelcomeController::class,'subscribe_store'])->name('subscribe.store');
Route::get('change-password', [ChangePasswordController::class,'index'])->name('change_password');
Route::post('change-password', [ChangePasswordController::class,'store'])->name('change.password');
// facebook login
Route::get('facebook_login', [AuthenticationController::class, 'facebookLogin'])->name('facebook_login');
Route::get('facebook_callback', [AuthenticationController::class, 'facebookCallback'])->name('facebook_callback');
//Route::get('user-dashboard', [AuthenticationController::class, 'user_dashboard'])->name('user_dashboard');


Route::middleware(['permission'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::resource('school', SchoolController::class);
        Route::get('changeStatus', [SchoolController::class,'changeStatus']);
        Route::resource('welcome', WelcomeController::class);
        Route::resource('about', AboutController::class);
        Route::resource('teacher', TeacherController::class);
        Route::resource('message', MessageController::class);
        Route::resource('notice', NoticeController::class);
        Route::resource('event', EventController::class);
        Route::resource('gallery', GalleryController::class);
    });
});

Route::middleware(['auth','user-permission'])->group(function () {
    Route::get('home', [WelcomeController::class,'home'])->name('home');
    Route::prefix('admin')->group(function () { 
        Route::get('profile/edit', [UserController::class,'edit_admin_profile'])->name('edit_admin_profile');
        Route::post('profile/update/{id}', [UserController::class,'update_admin_profile'])->name('update_admin_profile');
        Route::get('subscribers', [WelcomeController::class,'subscribers'])->name('subscribers');
        Route::resource('slider', SliderController::class);
        Route::resource('choose', ChooseController::class);
        Route::resource('blog', BlogController::class);
        Route::resource('product', ProductController::class);
        Route::resource('service', ServiceController::class);

        Route::resource('user', UserController::class);
        Route::post('user/search', [UserController::class,'search']);
        Route::resource('video', VideoController::class);
        Route::resource('page', PageController::class);
        Route::resource('tag', TagController::class);
        Route::get('contact/view', [ContactController::class,'contact_view'])->name('contact.view');
        Route::resource('landing', LandingController::class);
        Route::resource('siteoption', SiteoptionController::class);
        Route::resource('pagesetting', PagesettingController::class);
        Route::resource('upload', UploadController::class);
        Route::post('upload/search', [UploadController::class,'search']);
        // specified route for create and manage landing pages generation
        Route::post('a/{slug}', [LandingController::class,'checkExistsPagelink']);
        Route::post('pagelinkediting/{slug}', [LandingController::class,'getEditPagelinkId']);
        Route::post('savewhychooseus', [ChooseController::class,'savewhychooseus']);
        // tag search
        Route::post('searchTag/{slug}', [TagController::class,'findByTitle']);
        Route::post('changestatus/{table}/{id}/{newstatus}', [CommentController::class,'changestatus']);
    });
});

Route::get('/{name}', [SchoolController::class,'school_create'])->name('school_create');

/*
 *  All landing page for public website
 */
Route::post('checkslug/{slug}', [LandingController::class,'checkExistsPagelink']);
Route::get('sitemap.xml', [SitemapController::class, 'index'])->name('sitemap.xml');
Route::get('image-sitemap.xml', [SitemapController::class, 'imagesitemap'])->name('image-sitemap.xml');
Route::get('robots.txt', [SitemapController::class, 'robots'])->name('robots.txt');
Route::get('/{pagelink}', [HomeController::class,'landing']);
