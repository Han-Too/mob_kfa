<?php

use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\GeneralController;
use App\Http\Controllers\Api\MerchantController;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('portal/login', [AuthenticationController::class, 'portalLogin']);

Route::post('web/reset-password', [GeneralController::class, 'resetPassword']);

Route::get('addressall', [AddressController::class, 'getAll']);

Route::middleware(['api_key'])->group(function(){
    // Location
    Route::get('province', [GeneralController::class, 'province']);
    Route::get('city/{id}', [GeneralController::class, 'city']);
    Route::get('district/{province_id}/{city_id}', [GeneralController::class, 'district']);
    Route::get('village/{city_id}/{district_id}', [GeneralController::class, 'village']);

    // Location V2
    Route::get('v2/province', [AddressController::class, 'province']);
    Route::get('v2/city/{province}', [AddressController::class, 'city']);
    Route::get('v2/district/{city}', [AddressController::class, 'district']);
    Route::get('v2/village/{district}', [AddressController::class, 'village']);

    // General
    Route::get('banks', [GeneralController::class, 'banks']);
    Route::get('categories', [GeneralController::class, 'categories']);
    Route::get('outlets', [GeneralController::class, 'outlets']);
    Route::get('banners', [GeneralController::class, 'banners']);
    Route::get('payments', [GeneralController::class, 'payments']);

    Route::post('login', [AuthenticationController::class, 'login']);
    Route::post('register', [AuthenticationController::class, 'register']);
    Route::post('reset-password', [AuthenticationController::class, 'resetPassword']);
    
    Route::get('getDoc/{id}', [MerchantController::class, 'getDoc']);

    Route::middleware('auth:sanctum')->group(function () {    
        Route::post('logout', [AuthenticationController::class, 'logout']);

        // user
        Route::get('user', [AuthenticationController::class, 'user']);
        Route::post('user/update', [AuthenticationController::class, 'update']);
        Route::post('user/change-password', [AuthenticationController::class, 'changePassword']);

        // merchant
        Route::get('merchant/list', [MerchantController::class, 'list']);
        Route::post('merchant/store', [MerchantController::class, 'store']);
        Route::get('merchant/show/{token}', [MerchantController::class, 'show']);
        Route::post('merchant/update', [MerchantController::class, 'update']);

        Route::get('merchant/checksignature/{id}', [MerchantController::class, 'checkSignature']);

        // branch
        Route::get('merchant/branch/{token}', [MerchantController::class, 'branchList']);
        Route::post('merchant/branch', [MerchantController::class, 'branchStore']);
        // dokumen
        Route::post('merchant/documents', [MerchantController::class, 'documents']);
        Route::post('merchant/documents/upload', [MerchantController::class, 'uploadDocument']);

        Route::post('merchant/signature', [MerchantController::class, 'uploadSignature']);
        Route::post('merchant/payment/upload', [MerchantController::class, 'proofOfPayment']);
        Route::get('merchant/payment/{token}', [MerchantController::class, 'getPayment']);


        Route::post('merchant/ceki', [MerchantController::class, 'checkBo']);
    });
});
