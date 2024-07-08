<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DokumenApplicantController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\OutletCotroller;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PrivilegeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReasonController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', [GeneralController::class, 'dashboard'])->name('user.dashboard');


    // User
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::post('/users/delete/{token}', [UserController::class, 'destroy'])->name('user.delete');
    Route::post('/users/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/users/edit/{token}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/users/update', [UserController::class, 'update'])->name('user.update');

    Route::middleware('dewa')->group(function () {
        Route::get('/deleted', [UserController::class, 'deleted'])->name('deleted');
        Route::post('/activate/{token}', [UserController::class, 'activate'])->name('activate');
        //User Logs
        Route::get('/logs', [UserController::class, 'logs'])->name('logs');
    });

    // User Profile
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');

    // Privilege
    Route::get('/privileges', [PrivilegeController::class, 'index'])->name('privilege.index');
    Route::post('/privileges/store', [PrivilegeController::class, 'store'])->name('privilege.store');
    Route::get('/privileges/delete/{id}', [PrivilegeController::class, 'destroy'])->name('privilege.delete');
    Route::get('/privileges/edit/{id}', [PrivilegeController::class, 'edit'])->name('privilege.edit');
    Route::post('/privileges/update', [PrivilegeController::class, 'update'])->name('privilege.update');

    // Bank
    Route::get('/banks', [BankController::class, 'index'])->name('bank.index');
    Route::post('/banks/store', [BankController::class, 'store'])->name('bank.store');
    Route::get('/banks/edit/{id}', [BankController::class, 'edit'])->name('bank.edit');
    Route::post('/banks/update', [BankController::class, 'update'])->name('bank.update');
    Route::get('/banks/delete/{id}', [BankController::class, 'destroy'])->name('bank.delete');

    // Region
    Route::get('/regions', [RegionController::class, 'index'])->name('region.index');
    Route::post('/regions/store', [RegionController::class, 'store'])->name('region.store');
    Route::get('/regions/delete/{id}', [RegionController::class, 'destroy'])->name('region.delete');
    Route::get('/regions/edit/{id}', [RegionController::class, 'edit'])->name('region.edit');
    Route::post('/regions/update', [RegionController::class, 'update'])->name('region.update');

    // Merchant Categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/categories/update', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

    // Merchant Categories
    Route::get('/outlets', [OutletController::class, 'index'])->name('outlet.index');
    Route::post('/outlets/store', [OutletController::class, 'store'])->name('outlet.store');
    Route::get('/outlets/edit/{id}', [OutletController::class, 'edit'])->name('outlet.edit');
    Route::post('/outlets/update', [OutletController::class, 'update'])->name('outlet.update');
    Route::get('/outlets/delete/{id}', [OutletController::class, 'destroy'])->name('outlet.delete');

    // Payment Features
    Route::get('/payments', [PaymentController::class, 'index'])->name('payment.index');
    Route::post('/payments/store', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/payments/edit/{id}', [PaymentController::class, 'edit'])->name('payment.edit');
    Route::post('/payments/update', [PaymentController::class, 'update'])->name('payment.update');
    Route::get('/payments/delete/{id}', [PaymentController::class, 'destroy'])->name('payment.delete');

    // Banners
    Route::get('/banners', [BannerController::class, 'index'])->name('banner.index');
    Route::post('/banners/store', [BannerController::class, 'store'])->name('banner.store');
    Route::get('/banners/edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
    Route::post('/banners/update', [BannerController::class, 'update'])->name('banner.update');
    Route::get('/banners/delete/{id}', [BannerController::class, 'destroy'])->name('banner.delete');

    // Reasons
    Route::get('/reasons', [ReasonController::class, 'index'])->name('reason.index');
    Route::post('/reasons/store', [ReasonController::class, 'store'])->name('reason.store');
    Route::get('/reasons/edit/{id}', [ReasonController::class, 'edit'])->name('reason.edit');
    Route::post('/reasons/update', [ReasonController::class, 'update'])->name('reason.update');
    Route::get('/reasons/delete/{id}', [ReasonController::class, 'destroy'])->name('reason.delete');

    // Document Applicant
    Route::get('/documents', [DokumenApplicantController::class, 'index'])->name('document.index');
    Route::post('/documents/store', [DokumenApplicantController::class, 'store'])->name('document.store');
    Route::get('/documents/edit/{id}', [DokumenApplicantController::class, 'edit'])->name('document.edit');
    Route::post('/documents/update', [DokumenApplicantController::class, 'update'])->name('document.update');
    Route::get('/documents/delete/{id}', [DokumenApplicantController::class, 'destroy'])->name('document.delete');

    Route::get('/download/{id}', [GeneralController::class, 'download'])->name('document.download');


    // Merchants
    Route::get('/merchants', [MerchantController::class, 'index'])->name('merchant.index');

    // Applicants
    Route::get('/applicants', [ApplicantController::class, 'index'])->name('applicant.index');
    Route::get('/applicants/show/{token}', [ApplicantController::class, 'show'])->name('applicant.show');
    Route::post('/applicants/detail/update', [ApplicantController::class, 'detailUpdate'])->name('applicant.detailUpdate');
    Route::post('/applicants/document/update', [ApplicantController::class, 'documentUpdate'])->name('applicant.documentUpdate');
    Route::post('/applicants/merchant/update', [ApplicantController::class, 'merchantUpdate'])->name('applicant.merchantUpdate');
    Route::get('/{status}/applicants', [ApplicantController::class, 'status'])->name('applicant.status');

    Route::get('/applicants/payments/{token}', [ApplicantController::class, 'payment'])->name('applicant.payment');
    Route::get('/applicants/payments/show/{id}/{token}', [ApplicantController::class, 'paymentShow'])->name('applicant.paymentShow');
    Route::post('/applicants/payments/update', [ApplicantController::class, 'paymentUpdate'])->name('applicant.paymentUpdate');
    Route::get('/{status}/payments/{token}', [ApplicantController::class, 'paymentStatus'])->name('applicant.paymentStatus');
    Route::post('/applicants/payments/update/bulk', [ApplicantController::class, 'updateBulk'])->name('applicant.paymentBulkUpdate');

    Route::get('/applicants/branches/{token}', [ApplicantController::class, 'branch'])->name('applicant.branch');
    Route::get('/applicants/branches/show/{id}/{token}', [ApplicantController::class, 'branchShow'])->name('applicant.branchShow');
    Route::post('/applicants/branches/update', [ApplicantController::class, 'branchUpdate'])->name('applicant.branchUpdate');

    Route::post('/assign/layer', [GeneralController::class, 'assignLayer']);

    Route::get('/applicants/export/{status}', [ApplicantController::class, 'export'])->name('applicant.export');
});

// Configuration
Route::get('/migrate', function () {
    // Artisan::call('migrate');
    dd('migrated!');
});

Route::get('/migrate-s', function () {
    // Artisan::call('migrate --path=database\migrations/2024_02_22_021139_create_merchant_proofs_table.php');
    dd('migrated!');
});

Route::get('reboot', function () {
    // Artisan::call('view:clear');
    // Artisan::call('route:clear');
    // Artisan::call('config:clear');
    // Artisan::call('cache:clear');
    // Artisan::call('key:generate');
    dd("rebooted!");
});

Route::get('/vendor', function () {
    $test = Artisan::call('vendor:publish', [
        '--provider' => "Barryvdh\DomPDF\ServiceProvider",
    ]);
    dd($test);
    dd('published!');
});

// Utils
// Route::get('/add-merchant', [GeneralController::class, 'addMerchant']);
// Route::get('/migrate/bank', [GeneralController::class, 'migrateBank']);
// Route::get('/migrate/categories', [GeneralController::class, 'migrateCategories']);
// Route::get('/add/categories', [GeneralController::class, 'addCategories']);
// Route::get('/migrate/categories/group', [GeneralController::class, 'migrateCategoriesGroup']);

Route::get('/form-merchant/{token}', [GeneralController::class, 'formMerchant']);
Route::get('/form-edc/{token}', [GeneralController::class, 'formEDC']);

Route::get('/verified/{token}', [EmailController::class, 'index']);
Route::get('/verification', [EmailController::class, 'status']);

require __DIR__ . '/auth.php';

Route::get('/mt', function(){
    return view('maintenance');
});
