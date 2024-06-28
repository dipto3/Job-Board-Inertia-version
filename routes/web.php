<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SubscribersController;
use App\Http\Controllers\Admin\UserManageController;
use App\Http\Controllers\Company\CompanyAuthController;
use App\Http\Controllers\Company\CompanyLoginController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\JobController as FrontendJobController;
use App\Http\Controllers\Frontend\SubscriberController;
use App\Http\Controllers\SslCommerzPaymentController;



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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

//Frontend Routes...
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact');
Route::get('/search', [HomeController::class, 'search'])->name('search.job');
Route::post('/subscriber', [SubscriberController::class, 'store'])->name('subscriber.store');
//Admin auth
Route::get('/backend-login', [AdminAuthController::class, 'loginPage'])->name('login.page');
Route::post('/admin/login-check', [AdminAuthController::class, 'login'])->name('admin.login.check');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('logout');
Route::get('/company/register-page', [CompanyAuthController::class, 'registerPage'])->name('company.register.page');
Route::post('/company/register', [CompanyAuthController::class, 'register'])->name('company.register');
// Route::get('/company/login-page', [CompanyLoginController::class, 'loginpage'])->name('company.login.page');
Route::get('/not-approve', [CompanyLoginController::class, 'notApprove'])->name('company.pending');
Route::post('/company/login', [CompanyLoginController::class, 'loginpost'])->name('company.login');
//Reset-password
Route::get('/send-email', [AdminAuthController::class, 'mailSubmitPage'])->name('send.mail');
Route::post('send-reset-password-code-to-email',  [AdminAuthController::class, 'sendEmail'])->name('send.otp');
Route::get('/submit-otp', [AdminAuthController::class, 'submitOtpPage'])->name('submit.otp');
Route::post('reset-password-code-check',  [AdminAuthController::class, 'checkVerificationCode'])->name('check.otp');
Route::get('/new-password', [AdminAuthController::class, 'newPasswordForm'])->name('new.password');
Route::post('/reset-password',  [AdminAuthController::class, 'resetPassword'])->name('update.password');

// Route::middleware('auth')->group(function () {
//     Route::get('/jobs/{uuid}', [FrontendJobController::class, 'jobDetails'])->name('job.description');
//     Route::get('/job-click/{id}', [FrontendJobController::class, 'clcik'])->name('click');
// });
//Company auth
Route::middleware('admin')->group(function () {
    //Admin routes...
    Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    //Admin manage users
    Route::get('/admin/show-user/company', [UserManageController::class, 'index'])->name('show.user.company');
    Route::get('/company-details/{id}', [UserManageController::class, 'companyDetails'])->name('company.details');
    Route::post('/company/accept_account/{encryptedUserId}', [UserManageController::class, 'accept_account'])->name('update.active.account');

    Route::get('/candidate-list', [UserManageController::class, 'candidateList'])->name('candidate.list');
    Route::get('/candidate-details/{id}', [UserManageController::class, 'candidateDetails'])->name('candidate.details');
    Route::delete('/candidate-list/{id}', [UserManageController::class, 'candidateRemove'])->name('candidate.destroy');
    Route::get('/subscribers-list', [SubscribersController::class, 'index'])->name('subscriber.list');

    Route::get('/package', [PackageController::class, 'package'])->name('package');

    Route::post('/package-cart', [CartController::class, 'store'])->name('package.cart');
    //Jobs
    Route::get('/job-create', [JobController::class, 'create'])->name('job.create')->middleware('can:create-job');
    Route::post('/job-store', [JobController::class, 'store'])->name('job.store');
    Route::get('/job-index', [JobController::class, 'index'])->name('job.index');
    Route::get('/job-details/{id}', [JobController::class, 'details'])->name('job.details');
    Route::get('/job-edit/{id}', [JobController::class, 'edit'])->name('job.edit');
    Route::put('/job-update/{id}', [JobController::class, 'update'])->name('job.update');
    Route::delete('/job-destroy/{id}', [JobController::class, 'destroy'])->name('job.destroy');
    Route::post('/job-status', [JobController::class, 'status'])->name('job.status');
    //Role
    Route::get('/role-index', [RoleController::class, 'index'])->name('role.index');
    Route::get('/role-create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/role-store', [RoleController::class, 'store'])->name('role.store');
    Route::get('/role-details/{id}', [RoleController::class, 'details'])->name('role.details');
    Route::get('/role-edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
    Route::put('/role-update/{id}', [RoleController::class, 'update'])->name('role.update');
    Route::delete('/role-destroy/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
    //package
    Route::get('/package-index', [PackageController::class, 'index'])->name('package.index');
    Route::get('/package-create', [PackageController::class, 'create'])->name('package.create');
    Route::post('/package-store', [PackageController::class, 'store'])->name('package.store');
    Route::get('/package-edit/{id}', [PackageController::class, 'edit'])->name('package.edit');
    Route::put('/package-update/{id}', [PackageController::class, 'update'])->name('package.update');
    Route::delete('/package-delete/{id}', [PackageController::class, 'destroy'])->name('package.destroy');
    Route::post('/package-status', [PackageController::class, 'status'])->name('package.status');
    // SSLCOMMERZ Start
    Route::get('/checkout', [SslCommerzPaymentController::class, 'exampleEasyCheckout'])->name('checkout');
    // Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

});

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::get('/payment-done', [SslCommerzPaymentController::class, 'done'])->name('done');;
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);

require __DIR__.'/auth.php';
