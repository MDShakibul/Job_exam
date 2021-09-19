<?php

use App\Http\Controllers\AdminCommentController;
use App\Http\Controllers\AdminloginController;
use App\Http\Controllers\AdminSignOutController;
use App\Http\Controllers\AdminUpdateController;
use App\Http\Controllers\AllUsertController;
use App\Http\Controllers\ApplicationTypeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FormAcceptController;
use App\Http\Controllers\ShowCommentController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UpdateProfileController;
use App\Http\Controllers\UserCommentController;
use App\Http\Controllers\UserDetailsController;
use App\Http\Controllers\WorkFlowController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
    return view('user_login');
});  */

Route::get('/', [SigninController::class, 'page']);

Auth::routes();

//Route::post('/login-register', [RegisterController::class, 'register'])->name('custom_register');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Register controller
Route::get('/verify', [RegisterController::class, 'verifyUser'])->name('verify.user');

//SignInController
Route::post('/Application/Form', [SigninController::class, 'login']); //7user login

//SignupController
Route::get('/user_logout', [SignupController::class, 'user_logout']);

//UpdateController
Route::get('/update_profile', [UpdateProfileController::class, 'updateprofile']);
Route::post('/update_password', [UpdateProfileController::class, 'update_password']);

//userDetailsController
Route::get('/form', [UserDetailsController::class, 'form']); //method changed here
Route::post('/user_details', [UserDetailsController::class, 'user_details']);
Route::get('/view_profile/{user_id}', [UserDetailsController::class, 'view_profile']);
Route::get('/application_price', [UserDetailsController::class, 'findPrice']);
Route::post('/update_user_details/{id}', [UserDetailsController::class, 'update_user_details']);
Route::get('/edit_user_details/{id}', [UserCommentController::class, 'edit_user_details']);



//admin login
Route::get('/admin', [AdminloginController::class, 'login']);
Route::post('/dashboard', [AdminloginController::class, 'dashboard']);
Route::get('/admin_home', [AdminloginController::class, 'admin_home']);
Route::get('/dashboard_home', [AdminloginController::class, 'dashboard_home']);

//addmin logout
Route::get('/admin_logout', [AdminSignOutController::class, 'admin_logout']);

//admin update
Route::get('/update_setting', [AdminUpdateController::class, 'update_setting']);
Route::post('/admin_update_password/{admin_id}', [AdminUpdateController::class, 'admin_update_password']);

//application
Route::get('/application_type', [ApplicationTypeController::class, 'application_type']);
Route::post('/application_add', [ApplicationTypeController::class, 'application_add']);
Route::get('/application_all', [ApplicationTypeController::class, 'application_all']);
Route::get('/application_edit/{id}', [ApplicationTypeController::class, 'application_edit']);
Route::post('/update_app/{id}', [ApplicationTypeController::class, 'update_app']);
Route::get('/delete_app/{id}', [ApplicationTypeController::class, 'delete_app']);

//admin comment
Route::get('/comment/{id}', [AdminCommentController::class, 'comment_page']);
Route::post('/admin_comment', [AdminCommentController::class, 'comment']);
Route::post('/comments', [AdminCommentController::class, 'comments']);


//accept or reject
Route::get('/all_users', [AllUsertController::class, 'all_users']);
Route::get('/block/{id}', [AllUsertController::class, 'block']);
Route::get('/ok/{id}', [AllUsertController::class, 'ok']);

//user comment

Route::get('/user_comment/{id}', [UserCommentController::class, 'user_comment']);
Route::post('/view_comment', [UserCommentController::class, 'view_comment']);
//Route::get('/all_comment/{id}', [UserCommentController::class, 'all_comment']);

//show comment
Route::get('/show_comment/{id}', [ShowCommentController::class, 'show_comment']);

//form accept controller
Route::get('/pending/{id}', [FormAcceptController::class, 'pending']);
Route::get('/success/{id}', [FormAcceptController::class, 'success']);
Route::get('/reject/{id}', [FormAcceptController::class, 'reject']);

//payment getway
/* Route::get('checkout','CheckoutController@checkout');
Route::get('checkout','CheckoutController@checkout');
Route::post('checkout','CheckoutController@afterpayment')->name('checkout.credit-card'); */
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::post('/checkout', [CheckoutController::class, 'afterpayment'])->name('checkout.credit-card');

//workflow
Route::get('/workflow_page', [WorkFlowController::class, 'workflow_page']);
