<?php


// BANGLE NEWSPAPER 
use App\Http\Controllers\HomeController;
use App\Http\Controllers\post_controller;
//  ADMIN panel 
use App\Http\Controllers\admin_HomeController;
use App\Http\Controllers\admin_post_controller;
use App\Http\Controllers\adsController;
use App\Http\Controllers\seo_controller;
use App\Http\Controllers\site_setting_controller;
use App\Http\Controllers\panel_setting_controller;
use App\Http\Controllers\login_controller;
use App\Http\Controllers\CustomArtisanController;
use App\Http\Controllers\user_manage_controller;
use App\Http\Controllers\user_controller;
use App\Http\Controllers\profile_manage_controller;
use App\Http\Controllers\e_papper_controller;
use App\Http\Controllers\user_profile_manage_controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\welcomeMail;
use App\Mail\OTP_sender;


// FOR BANGLA NEWSPAPER ROUTES 

Route::get('/', [HomeController::class, 'homeIndex']);
Route::get('/single/{post_id}/{post_title}', [post_controller::class, 'singlePost']);
Route::get('/category/{keyword}', [post_controller::class, 'postList']);
Route::get('/tag/{keyword}', [post_controller::class, 'postList']);
Route::get('/search/{keyword}', [post_controller::class, 'postList']);
Route::get('/filter/{keyword}', [post_controller::class, 'spFilter']);




Route::get('/archive', function () {
    return view('archive');
});
Route::get('/error', function () {
    return view('error_404');
});
Route::get('/en', function () {
    return view('comming-soon');
});

//  for user 
Route::middleware(['user_reverse_login_check'])->group(function () { 
    Route::prefix('user')->group(function () { //news Routs
        Route::get('/login', function () {
            return view('user/login');
        });
        Route::get('/auth', function () {
            return view('user/login2');
        });
        Route::get('/auth/forgot', function () {
            return view('user/forgot2');
        });
        Route::get('/create', function () {
            return view('user/registration');
        });
        Route::get('/forgot', function () {
            return view('user/forgot');
        });
        Route::post('/login/sendData',[user_controller::class, 'sendLoginData']);
        Route::post('/create/sendData', [user_controller::class, 'sendRegData']);
        Route::post('/forgot/sendEmail', [user_controller::class, 'sendEmail']);
        Route::post('/forgot/sendOTP', [user_controller::class, 'sendOTP']);
        Route::post('/forgot/setPassword', [user_controller::class, 'setPassword']);
    });

    
});

Route::middleware(['user_login_check'])->group(function () { 
    Route::prefix('user')->group(function () { 
        Route::get('/profile', function () {
            return view('user/profile');
        });
        Route::get('/home', function () {
            return view('user/home');
        });
        Route::get('/pricing', function () {
            return view('user/pricing');
        });

        Route::get('/logout', [user_controller::class, 'logout']);
    });
    Route::prefix('user/profile')->group(function () { // Admin Profile Route groupd
        Route::get('/view', [user_profile_manage_controller::class, 'profileView']);
        Route::post('/update_user_data', [user_profile_manage_controller::class, 'updateUserData']);
        Route::post('/update_photo',[user_profile_manage_controller::class, 'updatePhoto']);
        Route::post('/change_user_password',[user_profile_manage_controller::class, 'changeUserPassword']);

    });
});



// ePaper

Route::get('/ePaper/subscribe', function () {
    return view('ePapper/about');
});
Route::get('/ePaper/guest-view', [e_papper_controller::class,'homeIndex']);
Route::post('/ePaper/getDataByDate', [e_papper_controller::class,'getDataByDate']);

Route::middleware(['user_login_check'])->group(function () { 
    Route::prefix('ePaper')->group(function () { //news Routs
        Route::get('/home', [e_papper_controller::class,'homeIndex']);

    });
});


// FOR ADMIN PANEL ROUTES 
Route::get('/admin', [admin_HomeController::class, 'homeIndex'])->middleware(['loginCheck']); // Dashboard page 

Route::middleware(['loginCheck','role_permission:News'])->group(function () { // manage news module
    Route::prefix('admin/news')->group(function () { //news Routs
        Route::get('/posts',[admin_post_controller::class,'allPostIndex']);
        Route::get('/create-post', [admin_post_controller::class,'createPost']);
        Route::post('/cat_name_By_Lang', [admin_post_controller::class,'catNameByLang']);
        Route::post('/insert-post', [admin_post_controller::class,'insertPost']); //axios post insert 
        Route::get('/post-categories', [admin_post_controller::class,'postCategories']);
        Route::get('/post-categories/edit/{cat_id}', [admin_post_controller::class,'editPostCategories']); // edit post category page 
        Route::get('/post-categories/delete/{cat_id}', [admin_post_controller::class,'deletePostCategories']);// delete post category 
        Route::post('/insert-category', [admin_post_controller::class,'insertCategory']); //axios insert category 
        Route::post('/update-category', [admin_post_controller::class,'updateCategory']); //axios insert category 
    
        Route::get('/post-tags', [admin_post_controller::class,'postTags']); 
        Route::post('/insert-tag', [admin_post_controller::class,'insertTags']); //axios insert tags 
    
    
        
    });
});


Route::middleware(['loginCheck','role_permission:Advertisement'])->group(function () { // Advertisement module
    Route::prefix('admin/ads')->group(function () { //ads routs group
        Route::get('/all-ads', [adsController::class,'allAdsIndex']);
        Route::get('/create-ads', [adsController::class,'CreateAdsIndex']);
        Route::post('/positionByPage', [adsController::class,'positionByPage']);
        Route::post('/insertNew', [adsController::class,'insertNew']);
    });
});




Route::middleware(['loginCheck','role_permission:SEO'])->group(function () { // SEO module
    Route::prefix('admin/seo')->group(function () { //SEO routs gorup 
        Route::get('/meta_setting', [seo_controller::class,'MetaSetting']);
        Route::post('/update_meta_setting', [seo_controller::class,'UpdateMetaSetting']);
        Route::get('/social_page', [seo_controller::class,'socialPage']);
        Route::post('/update_social_page', [seo_controller::class,'updateSocialPage']);
        Route::get('/social_links', [seo_controller::class,'socialLinks']);
        Route::post('/update_social_links', [seo_controller::class,'updateSocialLinks']);
    });
});

Route::middleware(['loginCheck','role_permission:Settings'])->group(function () { // settings module
    Route::prefix('admin/settings')->group(function () { // Settings route group 
        Route::get('/site_setting', [site_setting_controller::class,'siteSettingView']);
        Route::post('/update_Site_setting', [site_setting_controller::class,'updateSiteSetting']);
        Route::get('/panel_face', [panel_setting_controller::class,'panelFaceView']);
        Route::post('/update_panel_face', [panel_setting_controller::class,'updatePanelFace']);
        Route::get('/manage_news', function () {
            return view('admin/manageNews');
        });
    });
});


Route::middleware(['loginCheck','role_permission:User-Management'])->group(function () { // user management module
    Route::prefix('admin/user')->group(function () { // Settings route group 
        Route::post('/send_role_data', [user_manage_controller::class, 'sendRoleData']);
        Route::post('/update_role_data',[user_manage_controller::class, 'udateRoleData']);
        Route::post('/show_role_data',[user_manage_controller::class, 'showRoleData']);
        Route::post('/insert_user_data',[user_manage_controller::class, 'insertUserData']);
        Route::post('/update_user_data',[user_manage_controller::class, 'updateUserData']);
        Route::post('/update_user_password',[user_manage_controller::class, 'updateUserPassword']);
        Route::get('/roles_permission', [user_manage_controller::class,'role_permission']);
        Route::get('/roles_permission/edit/{role_id}', [user_manage_controller::class,'editRoles']); // edit  
        Route::get('/roles_permission/delete/{role_id}', [user_manage_controller::class,'deleteRoles']);// delete 
        Route::get('/create_user', [user_manage_controller::class,'createUser']);


        Route::get('/list_user', [user_manage_controller::class,'listUser']);
        Route::get('/list/edit/{u_id}', [user_manage_controller::class,'editUser']);// delete 
        Route::get('/list/delete/{u_id}', [user_manage_controller::class,'deleteUser']);// delete 

 
    
    });
});

Route::middleware(['loginCheck','role_permission:ePaper'])->group(function () { // E-paper module
    Route::prefix('admin/ePaper')->group(function () { // Settings route group 
        Route::get('/create', [e_papper_controller::class, 'createEpaper']);
        Route::get('/list', [e_papper_controller::class, 'lsitEpaper']);
        Route::post('/sendEpaperData',[e_papper_controller::class, 'sendEpaperData']);

 
    
    });
});

Route::middleware(['loginCheck','role_permission:ePaper'])->group(function () {
    Route::prefix('admin/profile')->group(function () { // Admin Profile Route groupd
        Route::get('/view', [profile_manage_controller::class, 'profileView']);
        Route::post('/update_user_data', [profile_manage_controller::class, 'updateUserData']);
        Route::post('/update_photo',[profile_manage_controller::class, 'updatePhoto']);
        Route::post('/change_user_password',[profile_manage_controller::class, 'changeUserPassword']);

    });
});





// Admin login session control route 
Route::get('admin/login',[login_controller::class,'adminLogin'])->middleware('loginCheckForLoginPage');
Route::post('admin/onAdminLogin',[login_controller::class,'onAdminLogin'])->middleware('loginCheckForLoginPage');
Route::get('admin/logout',[login_controller::class,'onAdminLogOut']);



// Artisan Commend  
Route::get('/artisan-commend/{commend}', [CustomArtisanController::class, 'dynamicArtisanCommend']);