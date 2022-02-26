<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\userController;
use App\Http\Controllers\user\CategoriesController;
use App\Http\Controllers\front\frontEndController;
use App\Http\Controllers\user\InteractiveOnlineClassController;
use App\Http\Controllers\user\rolesAndPermissionsController;
use App\Http\Controllers\user\webController;
use App\Http\Controllers\user\mediaController;
use App\Http\Controllers\user\subscriptionController;
use App\Http\Controllers\razorpay\RazorpayPaymentController;
use App\Http\Controllers\menuController;
use App\Models\menu;
use App\Http\Controllers\GoogleSocialiteController;
use App\Http\Controllers\AppNotificationsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);
Route::get('callback/google', [GoogleSocialiteController::class, 'handleCallback']);




Route::get('login', [userController::class, 'login'])->name('login');
Route::get('forgot-password', [userController::class, 'forgot_password']);
Route::post('send-otp', [userController::class, 'send_otp']);
Route::get('reset-password/{str}', [userController::class, 'reset_password']);
Route::get('/', [frontEndController::class, 'index']);
Route::get('/register-user', [frontEndController::class, 'register']);
Route::post('register', [userController::class, 'register']);
Route::get('/', [frontEndController::class, 'index']);
Route::get('verify/{str}', [userController::class, 'verify']);
Route::post('verified/{str}', [userController::class, 'verified']);
Route::post('auth', [userController::class, 'uerLogin']);
Route::post('reset-password-submit', [userController::class, 'reset_password_submit']);
Route::get('/package-info', [frontEndController::class, 'package_info']);
Route::get('/all-course-category', [frontEndController::class, 'all_course_category']);
Route::get('404', function(){
return view('404');
});
Route::get('505', function(){
    return view('505');
    });






// Auth::routes();









Route::group(['middleware' => ['permission:dashboard']], function () {
    Route::get('dashboard', [userController::class, 'dashboard']);
});


Route::group(['middleware' => ['permission:categories']], function () {
    Route::get('categories', [CategoriesController::class, 'categories']);
});


Route::group(['middleware' => ['permission:menu']], function () {
    Route::get('menu', [menuController::class, 'menu']);
});







Route::group(['middleware' => ['permission:edit_categories']], function () {
    Route::get('manage-category', [CategoriesController::class, 'manage_category']);
    Route::get('manage-category/{id}', [CategoriesController::class, 'manage_category']);
    Route::post('manage-category/process', [CategoriesController::class, 'manage_category_process']);
});


Route::group(['middleware' => ['permission:edit_menu']], function () {
    Route::get('manage-menu', [menuController::class, 'manage_menu']);
    Route::get('manage-menu/{id}', [menuController::class, 'manage_menu']);
    Route::post('manage-menu/process', [menuController::class, 'manage_menu_process']);
});

Route::group(['middleware' => ['permission:delete_menu']], function () {
    Route::post('/menu/delete', [menuController::class, 'menu_delete']);
});





Route::group(['middleware' => ['permission:categories_update_status']], function () {
    Route::get('categories/status/{id}/{changed_status}', [CategoriesController::class, 'categories_status']);
});

Route::group(['middleware' => ['permission:delete_categories']], function () {
    Route::get('manage-category/delete/{id}', [CategoriesController::class, 'manage_category_delete']);
    Route::post('categories/delete', [CategoriesController::class, 'categories_delete']);
});





Route::group(['middleware' => ['permission:users|delete_user|create_users']], function () {
    Route::get('create-user', [userController::class, 'users']);
});
Route::group(['middleware' => ['permission:create_users|update_user']], function () {
    Route::get('manage-user', [userController::class, 'manage_user']);
    Route::get('manage-user/{id}', [userController::class, 'manage_user']);
    Route::get('manage-user/status/{id}/{changed_status}', [userController::class, 'user_status']);
    Route::get('manage-user/status-image/{id}/{changed_status}/{uid}', [userController::class, 'user_status_profile_pic']);
});

Route::group(['middleware' => ['permission:delete_user']], function () {
    Route::post('create-user/delete', [userController::class, 'user_delete']);
});



Route::group(['middleware' => ['permission:online_classes_edit']], function () {
    Route::get('create-class', [InteractiveOnlineClassController::class, 'create_class']);
    Route::get('manage-class', [InteractiveOnlineClassController::class, 'manage_class']);
    Route::post('manage-class/process', [InteractiveOnlineClassController::class, 'manage_class_process']);
    Route::get('manage-class/{id}', [InteractiveOnlineClassController::class, 'manage_class']);
});


Route::group(['middleware' => ['permission:online_class_status_update']], function () {
 Route::get('manage-class/status/{id}/{changed_status}', [InteractiveOnlineClassController::class, 'manage_class_status']);
});


Route::group(['middleware' => ['permission:online_classes_delete']], function () {
    Route::post('create-class/delete', [InteractiveOnlineClassController::class, 'class_delete']);
});



Route::group(['middleware' => ['permission:roles_and_permissions|edit_roles|delete_roles|create_roles']], function () {
    Route::get('create-roles', [rolesAndPermissionsController::class, 'create_roles']);
    Route::get('manage-roles', [rolesAndPermissionsController::class, 'manage_roles']);
    Route::get('manage-roles/{id}', [rolesAndPermissionsController::class, 'manage_roles']);
    Route::post('manage-role/process', [rolesAndPermissionsController::class, 'manage_role_process']);
    Route::get('create-roles/status/{id}/{changed_status}', [rolesAndPermissionsController::class, 'categories_status']);
    Route::post('create-roles/delete', [rolesAndPermissionsController::class, 'role_delete']);
});

Route::group(['middleware' => ['permission:permissions|edit_permissions|delete_permissions|update_permissions']], function () {
    Route::get('role-permissions', [rolesAndPermissionsController::class, 'role_permissions']);
    Route::get('role-permissions/{id}', [rolesAndPermissionsController::class, 'role_permissions']);
    Route::post('permissions-role/process', [rolesAndPermissionsController::class, 'permissions_role_process']);
    Route::post('role-permissions/delete', [rolesAndPermissionsController::class, 'role_permissions_delete']);
});




Route::group(['middleware' => ['permission:manage_files']], function () {
    Route::get('upload-media', [mediaController::class, 'upload_media']);
    Route::get('upload-media/{id}', [mediaController::class, 'upload_media']);
    Route::post('upload-files', [mediaController::class, 'upload_files']);
});





Route::group(['middleware' => ['permission:packages']], function () {
    Route::get('create-plan', [subscriptionController::class, 'create_plan']);
    Route::get('manage-plan', [subscriptionController::class, 'manage_plan']);
    Route::get('manage-plan/{id}', [subscriptionController::class, 'manage_plan']);
    Route::post('manage-plan/process', [subscriptionController::class, 'manage_plan_process']);
    Route::post('create-plan/delete', [subscriptionController::class, 'create_plan_delete']);
});

Route::group(['middleware' => ['permission:create_plan_features']], function () {
    Route::get('create-plan-features', [subscriptionController::class, 'create_plan_features']);
    Route::get('manage-plan-features', [subscriptionController::class, 'manage_plan_features']);
    Route::get('manage-plan-features/{id}', [subscriptionController::class, 'manage_plan_features']);
    Route::post('manage-plan-features/process', [subscriptionController::class, 'manage_plan_features_process']);
    Route::post('create-plan-features/delete', [subscriptionController::class, 'create_plan_features_delete']);
});



Route::group(['middleware' => ['permission:videos']], function () {
    Route::get('videos', [mediaController::class, 'videos']);
});

Route::group(['middleware' => ['permission:video_category']], function () {
    Route::get('video-category', [mediaController::class, 'video_category']);
    Route::get('videos/{category}/{videoId}', [mediaController::class, 'videos_play_by_id']);
    Route::get('videos/{slug}', [mediaController::class, 'video_category_page']);
   Route::get('categories/{slug}', [mediaController::class, 'videos_by_category']);
   Route::get('videos-live/online-meeting', [mediaController::class, 'online_meeting_categories']);
   Route::get('categories/live/{slug}', [mediaController::class, 'live_meeting']);
   Route::get('history-page', [mediaController::class, 'history_page']);


});
Route::group(['middleware' => ['permission:edit_video']], function () {
Route::post('my-account/video/delete', [mediaController::class, 'video_delete']);



});



Route::group(['middleware' => ['permission:manage_video_category']], function () {
Route::get('manage-video-category', [mediaController::class, 'manage_video_category']);
Route::get('manage-video-category/{id}', [mediaController::class, 'manage_video_category']);
Route::post('manage-video-category/process', [mediaController::class, 'manage_video_category_process']);
Route::get('video-categories/status/{id}/{changed_status}', [mediaController::class, 'video_categories_status']);
Route::post('video-categories/delete', [mediaController::class, 'video_categories_delete']);
Route::get('manage-video-category/status-image/{id}/{changed_status}/{cat_id}', [mediaController::class, 'vod_cat_pic_active']);
});


Route::group(['middleware' => ['permission:config_video_premium']], function () {
Route::get('config-video-premium/{id}', [mediaController::class, 'config_video_premium']);
Route::post('config-video-category-premium/process', [mediaController::class, 'config_video_category_premium']);

});


Route::group(['middleware' => ['permission:notifications']], function () {
Route::get('notifications', [AppNotificationsController::class, 'notifications']);






    });















Route::group(['middleware' => 'auth'], function () {
Route::get('settings', [userController::class, 'settings']);
Route::get('my-account', [userController::class, 'my_account']);
Route::get('/buy-plan/{slug}', [subscriptionController::class, 'plan_subscription']);
Route::post('razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');
Route::get('payment-invoice/{id}', [subscriptionController::class, 'payment_invoice']);
Route::get('active-service/{order_id}/{token}', [subscriptionController::class, 'active_service']);
Route::get('invoice-history', [subscriptionController::class, 'invoice_history']);
Route::get('plan-details/{order_id}', [subscriptionController::class, 'plan_details']);





Route::get('logout', [userController::class, 'logout']);
});
