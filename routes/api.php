<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\LeaveApiController;
use App\Http\Controllers\Api\LoginApiController;
use App\Http\Controllers\Api\DocumentApiController;
use App\Http\Controllers\Api\NominationApiController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\AffidavitController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('verify-otp-digital', [LoginApiController::class, 'verifyOtpDigital']);
Route::post('send-otp-digital', [LoginApiController::class, 'sendOtpDigital']);
Route::post('verify-otp-other-digital', [ReceiptController::class, 'verifyOtp']);
Route::post('/update-mobile', [LoginApiController::class, 'updateMobileNo']);

Route::post('send-otp-other-digital', [ReceiptController::class, 'sendOtp']);
Route::get('/states', [UserController::class, 'getStates']);
Route::get('/districts/{stateId}', [LocationController::class, 'getDistricts']);
Route::post('/test-verify-signature', [LoginApiController::class, 'testVerifyDigitalSignature']);


Route::post('/login-via-mobile', [LoginApiController::class, 'loginViaOtp']); 
Route::post('/verify-otp', [LoginApiController::class, 'verifyOtp']);
Route::post('/store-fcm-token', [LoginApiController::class, 'FcmToken']);

Route::post('/veification-witness-otp', [LoginApiController::class, 'sendWitnessOtp']);

Route::post('/add-leaves',[LeaveApiController::class, 'leaveStore']);
Route::post('/get-leave-count',[LeaveApiController::class, 'getLeaveAccordingStatus']);
Route::post('/get-user-leaves',[LeaveApiController::class, 'getUserLeaveList']);
Route::post('/forward-user-leaves',[LeaveApiController::class, 'ForwarLeaveNote']);

Route::post('view-user-documents', [DocumentApiController::class, 'viewDocument']);
Route::post('getOldBook', [DocumentApiController::class, 'getUserOldBook']);
Route::post('/document-list',[DocumentApiController::class, 'documentList']);
Route::post('/get-checklist',[DocumentApiController::class, 'getCheckList']);
Route::post('/get-book-checklist',[DocumentApiController::class, 'getBookCheckList']);
Route::post('/get-nomination-type',[DocumentApiController::class, 'getNominationCategory']);
Route::post('/get-receipt-no',[DocumentApiController::class, 'getReceiptNo']);
Route::post('/view-user-document',[DocumentApiController::class, 'viewUserDocumentList']);


Route::post('/affidavit-store',[DocumentApiController::class, 'storeAffidavit']);
Route::post('/achivement-store',[DocumentApiController::class, 'storeAchivement']);

Route::post('/get-user-affidavit',[DocumentApiController::class, 'getAffidavits']);
Route::post('/get-user-achivement',[DocumentApiController::class, 'getAchivements']);

Route::post('/get-category-affidavit',[DocumentApiController::class, 'getAffidavitCategory']);
Route::post('/get-category-achivement',[DocumentApiController::class, 'getAchivementsCategory']);

Route::post('/store-audit',[DocumentApiController::class, 'storeAudit']);
Route::post('/get-user-audit',[DocumentApiController::class, 'getUserAudit']);


Route::post('/get-leave-category',[LeaveApiController::class, 'getLeaveCategory']);

Route::post('/add-user-document',[DocumentApiController::class, 'documentStore']);
Route::post('/getreceiptbystatus',[DocumentApiController::class, 'receiptAllStatus']);

Route::post('/store-checklist',[DocumentApiController::class, 'storeChecklist']);

Route::post('/store-receipt',[DocumentApiController::class, 'receiptStore']);
Route::post('/get-receipt',[DocumentApiController::class, 'receiptGet']);
Route::post('/get-checklist-status',[DocumentApiController::class, 'checklistStatusGet']);

Route::post('/store-promotion',[DocumentApiController::class, 'storePromotion']);

Route::post('/add-nomination',[NominationApiController::class, 'storeNomination']);
Route::post('/forward-user-nomination',[NominationApiController::class, 'ForwarNomination']);

Route::get('/nominations/{id}', [NominationApiController::class, 'getNomination']);

Route::post('/forward-user-transfer',[TransferController::class, 'ForwarTrasfer']);

Route::post('/forward-user-affidavit',[AffidavitController::class, 'ForwarTrasfer']);
Route::post('/forward-user-achievement',[AchievementController::class, 'ForwarTrasfer']);
Route::post('/forward-user-audit',[AuditController::class, 'ForwarTrasfer']);

Route::post('/forward-user-detailuser',[UserController::class, 'ForwarTrasfer']);
Route::post('/forward-user-otherrecipt',[ReceiptController::class, 'ForwarTrasfer']);

Route::post('/verify-witness-otp', [LoginApiController::class, 'verifyApplicationWitness']);
Route::post('/confirm-witness-otp', [LoginApiController::class, 'confirmWitnessOtp']);
