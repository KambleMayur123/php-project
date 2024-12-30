<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\NominationController;
use App\Http\Controllers\NewChecklistController;
use App\Http\Controllers\ChecklistmasterController;
use App\Http\Controllers\TransferController;
use App\Http\Controllers\RolesPermission;
use App\Http\Controllers\AffidavitController;
use App\Http\Controllers\AuditController;

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\BackupController;

use App\Http\Controllers\RolesController;
use App\Http\Controllers\ReceiptController;

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\OrganizationLoginController;
use App\Http\Controllers\file\DraftController;
use App\Http\Controllers\file\ElectronicsController;
use App\Http\Controllers\file\PhysicalController;

use App\Http\Controllers\file\CompleteController;

use App\Http\Controllers\file\ParkedController;
use App\Http\Controllers\file\ClosedController;
use App\Http\Controllers\file\SentController;
use App\Http\Controllers\StaffSelectionController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|/file-attended-24hours

organization-login/staff-selection/index
rganization-login/assign-permission
*/
// Route::get('/permission-index', function () {
//     return view('organization-login/assign-permission/Permission-index');
// });
// Route::get('/assign-permission', function () {
//     return view('organization-login/assign-permission/index');
// });
// Route::get('/role', function () {
//     return view('organization-login/add-role/index');
// });
// Route::get('/staff-add', function () {
//     return view('organization-login/staff-selection/add');
// });
Route::get('/pension', function () {
    return view('pension/index');
});
Route::get('/pension-add', function () {
    return view('pension/add');
});
Route::get('/audit', function () {
    return view('audit/index');
});
Route::get('/add-audit', function () {
    return view('audit/add');
});
Route::get('/edit-audit', function () {
    return view('audit/edit');
});

// backup files routes
Route::get('/backup', [BackupController::class, 'index'])->name('backup.index');
Route::post('/backup', [BackupController::class, 'store'])->name('backup.store');

// print section route
Route::get('/affidavit-print', function () {
    return view('affidavit.affidavit-print');
});
Route::get('/user-details-print', function () {
    return view('user-profile.user-details-print');
});
Route::get('/api/receipts/{userId}', [NewChecklistController::class, 'getReceiptsByUserId']);

Route::resource('receipts', ReceiptController::class)->except(['show']);
Route::get('/receipts-history', [ReceiptController::class, 'showdata'])->name('receipts.history');
Route::get('/receipts/pending', [ReceiptController::class, 'pendingIndex'])->name('receipts.pending');

Route::resource('staff-add', StaffSelectionController::class);
// Single role deletion
Route::delete('/staff-delete/{id}', [StaffSelectionController::class, 'destroy'])->name('staff-delete.destroy');
Route::get('/staff-history', [StaffSelectionController::class, 'showdata'])->name('staff.history');
// Bulk role deletion
Route::delete('/staff-delete-all', [StaffSelectionController::class, 'destroyMultiple'])->name('staff-delete-all.destroyMultiple');

Route::resource('roles', RolesController::class);
Route::get('/role-history', [RolesController::class, 'showdata'])->name('roles-history');

Route::resource('rolespermission', RolesPermission::class);
Route::delete('/rolespermission-data/{id}', [RolesPermission::class, 'destroy'])->name('rolespermission.destroy');
Route::get('/roles/get', [RolesPermission::class, 'getRoles'])->name('roles-dataget');
Route::get('/rolespermission-history', [RolesPermission::class, 'showHistory'])->name('rolespermission.history');


// Single role deletion
Route::delete('/roles-data/{id}', [RolesController::class, 'destroy'])->name('roles-data.destroy');

// Bulk role deletion
Route::delete('/roles-data', [RolesController::class, 'destroyMultiple'])->name('roles-data.destroyMultiple');


// Route::post('add-newrole', [RolesController::class, 'store'])->name('add-newrole');
// Route::get('/add-role', [RolesController::class, 'create'])->name('add-role');
// Route::get('/add-role', function () {
//     return view('organization-login/add-role/add-role');
// });

Route::get('/staff-selection', function () {
    return view('organization-login/staff-selection/index');
});

Route::get('/ds-certificate', function () {
    return view('digital-signature.ds-certificate');
})->name('ds-certificate');
Route::get('/dsc-enrollment', function () {
    return view('digital-signature.dsc-enrollment');
});
Route::get('/revenue', function () {
    return view('report.revenue');
});
Route::get('/revenue-report', function () {
    return view('report.revenue-report');
});
Route::get('/file-attended-24hours', function () {
    return view('report.file-attended-24hours');
});

Route::get('/receipts-forwarded-by-time', function () {
    return view('report.receipts-forwarded-by-time');
});
Route::get('/receipts-forwarded-by-time-report', function () {
    return view('report.receipts-forwarded-by-time-report');
});
Route::get('/file-forwarded-by-time-report', function () {
    return view('report.file-forwarded-by-time-report');
});
Route::get('/file-forwarded-by-time', function () {
    return view('report.file-forwarded-by-time');
});
Route::get('/closed-file', function () {
    return view('report.closed-file');
});
Route::get('/closed-file-report', function () {
    return view('report.closed-file-report');
});
Route::get('/parked-file', function () {
    return view('report.parked-file');
});
Route::get('/received-receipts', function () {
    return view('report.received-receipts');
});
Route::get('/received-receipts-report', function () {
    return view('report.received-receipts-report');
});
Route::get('/received-file-report', function () {
    return view('report.received-file-report');
});
Route::get('/received-file', function () {
    return view('report.received-file');
});
Route::get('/receipts-movement', function () {
    return view('report.receipts-movement');
});
Route::get('/receipts-movement-report', function () {
    return view('report.receipts-movement-report');
});
Route::get('/file-movement-report', function () {
    return view('report.file-movement-report');
});
Route::get('/file-movement', function () {
    return view('report.file-movement');
});
Route::get('/diary-register-report', function () {
    return view('report.diary-register-report');
});
Route::get('/diary-register', function () {
    return view('report.diary-register');
});
Route::get('/file-register', function () {
    return view('report.file-register');
});

Route::get('/file-register-report', function () {
    return view('report.file-register-report');
});
Route::get('/migrate', function () {
    return view('migrate-file.create-new');
});
Route::get('/finalize', function () {
    return view('migrate-file.finalize');
});
Route::get('/reference', function () {
    return view('migrate-file.reference');
});
Route::get('/correspondance', function () {
    return view('migrate-file.correspondance');
});
Route::get('/edit', function () {
    return view('migrate-file.edit');
});

Route::get('/nothing', function () {
    return view('migrate-file.nothing');
});
Route::get('/migrate-table', function () {
    return view('migrate-file.migrate-table');
});
Route::get('/migrate-draft', function () {
    return view('migrate-file.migrate-draft');
});
Route::get('/non-sfs', function () {
    return view('file.physical-file.non-sfs');
})->name('non-sfs');




Route::get('/sfs-physical', function () {
    return view('file.physical-file.sfs');
})->name('sfs-physical');

Route::get('/continue-working', function () {
    return view('file.physical-file.continue-working');
})->name('continue-working');











Route::get('non-sfs-electronic/{id}', [ElectronicsController::class, 'show'])->name('non-sfs-electronic');

Route::get('/view-electronic-file', function () {
    return view('file.electronic.view-electronic-file');
});


Route::get('/electronic-sent', function () {
    return view('file.electronic.electronic-sent');
});


Route::get('/sfs-continueworking', function () {
    return view('file.electronic.sfs-continueworking');
})->name('sfs-continueworking');



Route::get('/continueworking-electronic', function () {
    return view('file.electronic.continueworking');
})->name('continueworking-electronic');




Route::get('/create-electronic-file', function () {
    return view('file.electronic.create-file');
})->name('sfs-physical');

Route::get('/createpartindex', function () {
    return view('file.createpart.createpart');
})->name('createpartindex');



Route::get('/listofcorrespondence', function () {
    return view('file.electronic.list_of_correspondence');
})->name('listofcorrespondence');

Route::get('/create-draft/{id?}', function () {
    return view('file.electronic.create-draft');
})->name('create-draft');


Route::get('/view-draft', function () {
    return view('file.electronic.view-draft');
})->name('view-draft');





Route::get('/createpartt', function () {
    return view('file.createpart.index');
})->name('createpartt');



Route::get('/createvolumeindex', function () {
    return view('file.createvolume.index');
})->name('createvolumeindex');







Route::get('/user-leaves', function () {
    return view('user-leaves.index');
});



Route::get('/user-details-add', function () {
    return view('user-profile.view_details_add');
});

Route::get('/add-leaves', function () {
    return view('user-leaves.add');
});
Route::get('/profile-details', function () {
    return view('user-profile.profile-details');
});

Route::get('/tehshil' , [ChecklistController::class , 'tehshilIndex'])->name('tehshil.tehshilIndex');
Route::get('/tehshil-history' , [ChecklistController::class , 'showTehsilHistory'])->name('tehsil.history');
Route::post('/store-tehshil', [ChecklistController::class, 'storeTehshil'])->name('store-tehshil');
Route::delete('/tehshil/{id}', [ChecklistController::class, 'destroyTehshil']);

Route::get('/pending-checklist-request' , [NewChecklistController::class , 'pendingChecklistRequest'])->name('pending.checklist');

Route::post('/get-cities', [UserController::class, 'getCities'])->name('getCities');

Route::get('/user-leaves-pending' , [LeaveController::class , 'requestIndex'])->name('user-leaves-pending');
Route::get('/leavegreennote/{id}' , [LeaveController::class , 'greennote'])->name('leavegreennote');
Route::put('/leavegreennote/{id}' , [LeaveController::class , 'updategreennote'])->name('updategreennote');


Route::post('/get-citiess', [LeaveController::class, 'getCities'])->name('getCitiess');
Route::get('/states' , [LeaveController::class , 'getstates'])->name('states');


Route::get('leaves-history', [LeaveController::class, 'showdata'])->name('leaves-history');
    Route::get('leaves_type', [LeaveController::class, 'leavetype'])->name('leaves_type'); 
        Route::get('leaves_type-history', [LeaveController::class, 'showLeaveTypeHistory'])->name('leaves_type.history');
    Route::post('leaves_type', [LeaveController::class, 'leavetypestore'])->name('leaves_type.store'); 
    Route::get('leaves_type/edit/{id}', [LeaveController::class, 'leavetypeedit'])->name('leaves_type.edit'); 
    Route::put('leaves_type/update/{id}', [LeaveController::class, 'leavetypeupdate'])->name('leaves_type.update'); 
    Route::delete('leaves_type/{id}', [LeaveController::class, 'leavetypedestroy'])->name('leaves_type.destroy'); 

Route::put('/user/update-password', [UserController::class, 'updatePassword'])->name('user.updatePassword');

Route::resource('users', UserController::class);
Route::resource('audits', AuditController::class);
Route::get('pending-request', [AuditController::class, 'pendingRequestindex'])->name('pending-request');

Route::resource('complete', CompleteController::class);
Route::get('/volume' , [CompleteController::class , 'volume'])->name('volume');
Route::get('/nomination-add' , [NominationController::class , 'create'])->name('nomination-add');
Route::post('/nominationstore', [NominationController::class, 'store'])->name('nominationstore');
Route::get('/nomination-index' , [NominationController::class , 'index'])->name('nomination-index');
Route::get('/nomination-history' , [NominationController::class , 'showdata'])->name('nomination-history');
Route::get('/nomination-show/{id}' , [NominationController::class , 'show'])->name('nomination-show');
Route::delete('/nominationdelete/{id}', [NominationController::class, 'destroy'])->name('nomination-delete');
Route::get('nominations/{id}/edit', [NominationController::class, 'edit'])->name('nomination.edit');
Route::put('nominations/{id}', [NominationController::class, 'update'])->name('nomination.update');
Route::get('viewnomination/{id}/', [NominationController::class, 'viewall'])->name('viewnomination');

Route::get('nomination_type', [NominationController::class, 'nominationtype'])->name('nomination_type');
Route::get('nomination_type-history', [NominationController::class, 'nominationTypeHistory'])->name('nomination_type.history');
Route::post('nomination_type', [NominationController::class, 'nominationstore'])->name('nomination_type.store'); 
Route::get('nomination_type/edit/{id}', [NominationController::class, 'nominationedit'])->name('nomination_type.edit'); 
Route::put('nomination_type/update/{id}', [NominationController::class, 'nominationupdate'])->name('nomination_type.update'); 
Route::delete('nomination_type/{id}', [NominationController::class, 'nominationdestroy'])->name('nomination_type.destroy'); 
Route::get('nomination-pending', [NominationController::class, 'pendingIndex'])->name('nomination_pending');


Route::get('/get-nomination-type/{id}', [NominationController::class, 'getNominationType']);






Route::resource('sfs-electronics', ElectronicsController::class);

Route::resource('sfs-physical', PhysicalController::class);


Route::get('/get-user-suggestions', [ElectronicsController::class, 'getUserSuggestions'])->name('get-user-suggestions');

Route::get('/createfile/{id?}', [ElectronicsController::class, 'createfile'])->name('createfile');
Route::get('/green_note_file/{id}', [ElectronicsController::class, 'greennote'])->name('green_note_file');
Route::put('files/update/{id}', [ElectronicsController::class, 'greennoteupdate'])->name('greennoteupdate');


Route::post('/storefile', [ElectronicsController::class, 'storefile'])->name('storefile');



Route::get('/states-districts', [UserController::class, 'create'])->name('states-districts');

Route::get('/Userprofilepage', [UserController::class, 'Userprofilepage'])->name('Userprofilepage');

Route::get('/states-districts', [LeaveController::class, 'create'])->name('states-districts');
Route::patch('/user-details/{id}/status', [UserController::class, 'updateStatus'])->name('user-details-status');
Route::get('/user-details-add', [UserController::class, 'detailsView'])->name('user-details-add');
Route::get('/user-details-pending', [UserController::class, 'detailsViewPending'])->name('user-details-pending');
Route::get('/user-details-view', [UserController::class, 'detailsViewtable'])->name('user-details-view');
Route::get('/user-details-view-history', [UserController::class, 'detailsViewHistory'])->name('user-details-view-history');
Route::get('/fetch-profiles', [UserController::class, 'fetchProfiles'])->name('fetch.profiles');
Route::get('/fetch-roles', [RolesPermission::class, 'fetchroles'])->name('fetchroles');

Route::get('/fetch-salary', [UserController::class, 'fetchSalary'])->name('fetch.salary');

Route::get('/get-tehsils', [UserController::class, 'getTehsils'])->name('tehsils.get');
Route::get('/get-user-details/{id}', [UserController::class, 'getUserDetails']);
Route::post('/updateuserdetails', [UserController::class, 'updateuserdetails'])->name('updateuserdetails');

Route::get('/usersdetailsedit/{id}', [UserController::class, 'usersdetailsedit'])->name('usersdetails.edit');
Route::get('/usersdetailshow/{id}', [UserController::class, 'usersdetailshow'])->name('usersdetailshow');

Route::get('/users-history', [UserController::class, 'showUserHistory'])->name('usersdetail-history');

Route::resource('leaves', LeaveController::class);
Route::resource('draft', App\Http\Controllers\file\DraftController::class);
Route::resource('parked', ParkedController::class);
Route::resource('closed', ClosedController::class);
Route::resource('sent', SentController::class);
Route::resource('affidavits', AffidavitController::class);
Route::resource('achievements', AchievementController::class);
Route::get('affidavits-pending', [AffidavitController::class, 'pendingIndex'])->name('affidavits-pending');
Route::get('affidavits-add', [AffidavitController::class, 'create'])->name('affidavits-add');
Route::post('affidavits-store', [AffidavitController::class, 'storeaffidative'])->name('affidavits-store');
Route::post('storeachievement', [AchievementController::class, 'storeachievement'])->name('storeachievement');
Route::get('affidavits/type/history', [AffidavitController::class, 'showAffidavitTypeHistory'])->name('affidavits-type-history');

Route::get('/get-affidavit-memo/{id}', [AffidavitController::class, 'getAffidavitMemo']);
Route::get('/getaffidavit', [AffidavitController::class, 'getaffidavit'])->name('getaffidavit');
Route::get('/getaffidavit-history', [AffidavitController::class, 'showAffidavitHistory'])->name('getaffidavit.history');
Route::get('/getahievement', [AchievementController::class, 'getahievement'])->name('getahievement');
Route::get('/getahievement-history', [AchievementController::class, 'showAchiveHistory'])->name('getahievement.history');
Route::delete('/affidavitdestroy/{id}', [AffidavitController::class, 'affidavitdestroy'])->name('affidavitdestroy');
Route::delete('/achievmentdestroy/{id}', [AchievementController::class, 'achievmentdestroy'])->name('achievmentdestroy');
Route::get('editachievement/{id}', [AchievementController::class, 'editachivement'])->name('editachievement');
Route::get('showachivement/{id}', [AchievementController::class, 'showachivement'])->name('showachivement');
Route::get('achievement/history', [AchievementController::class, 'showAchiveTypeHistory'])->name('achievementtype.history');
Route::get('achievement-pending', [AchievementController::class, 'pendingIndex'])->name('achievement-pending');
Route::get('editaffidavit/{id}', [AffidavitController::class, 'editaffidavit'])->name('editaffidavit');
Route::get('showaffidavit/{id}', [AffidavitController::class, 'showaffidavit'])->name('showaffidavit');

Route::put('affidavit/update/{id}', [AchievementController::class, 'updateachivement'])->name('updateachievement');
Route::put('updateaffidavit/update/{id}', [AffidavitController::class, 'updateaffidavit'])->name('updateaffidavit');

Route::get('/get-achievement-memo/{id}', [AchievementController::class, 'getAchievementMemo']);

Route::get('achievements-add', [AchievementController::class, 'create'])->name('achievements-add');

Route::resource('documents', DocumentController::class);
Route::get('pending-document-request', [DocumentController::class, 'pendingRequestIndex'])->name('pending.document');
Route::resource('checklist-new', NewChecklistController::class);

Route::patch('/checklist-new/{id}/status', [NewChecklistController::class, 'updateStatus'])->name('checklistupdatestatus');

Route::get('checklist-new-history', [NewChecklistController::class, 'showdata'])->name('checklist-new.history');
Route::resource('checklist-master', ChecklistmasterController::class);
Route::get('checklist-master-history', [ChecklistmasterController::class, 'showdata'])->name('checklist-master.showdata');
Route::get('/viewalldocument/{id}', [DocumentController::class, 'viewall'])->name('viewalldocument');

Route::get('documents-profile-history', [DocumentController::class, 'documentsProfileHistory'])->name('documents-profile-history');
Route::patch('/documents-profile/{id}/status', [DocumentController::class, 'updateStatus'])->name('documents-profile-status');
Route::get('/createpart', [SentController::class, 'createpart'])->name('createpart');


Route::resource('checklists', ChecklistController::class);
Route::get('checklists-history', [ChecklistController::class, 'showdata'])->name('checklists.showdata');

Route::resource('designations', DesignationController::class);
Route::get('designations-history', [DesignationController::class, 'showdata'])->name('designations.showdata');

Route::resource('departments', DepartmentController::class);
Route::get('department-history', [DepartmentController::class, 'showdata'])->name('departments.showdata');
Route::get('/get-organisations', [DepartmentController::class, 'getOrganisations'])->name('organisations.get');
Route::get('/get-departments', [DesignationController::class, 'getdepartment'])->name('departments.get');
Route::get('/get-designation', [DesignationController::class, 'getDesignation'])->name('designations.get');
Route::get('/designationss', [DesignationController::class, 'getDesignationsByTaluka'])->name('designations.getByTaluka');

Route::patch('/leaves/{id}/status', [LeaveController::class, 'updateStatus'])->name('leaves.updateStatus');
Route::patch('/achievemnt/{id}/status', [AchievementController::class, 'updateStatus'])->name('achievemnt');
Route::patch('/affidavit/{id}/status', [AffidavitController::class, 'updateStatus'])->name('affidavit.updateStatus');
Route::patch('/audit/{id}/status', [AuditController::class, 'updateStatus'])->name('auditstatus');

Route::resource('transfer', TransferController::class);
Route::delete('/transfer/{id}', [TransferController::class, 'destroy'])->name('transfer.destroy');
Route::get('/add-joining', [TransferController::class, 'createJoining'])->name('joining.create');
Route::get('transfer-history', [TransferController::class, 'showdata'])->name('transfer.history');
Route::get('pending-transfer', [TransferController::class, 'pendingRequestindex'])->name('transfer.pending');

Auth::routes();
//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

Route::get('/document' , [ChecklistController::class , 'documentIndex'])->name('document.documentIndex');
Route::post('/store-document', [ChecklistController::class, 'storeDocument'])->name('store-document');
Route::delete('/document/{id}', [ChecklistController::class, 'destroyDocument']);
Route::get('/history-document', [ChecklistController::class, 'showDocumentHistory'])->name('document.history');

Route::get('/organization' , [ChecklistController::class , 'organizationIndex'])->name('organization.organizationIndex');

// Route to fetch organization details (for populating the modal)
Route::get('/organization/{id}/edit', [ChecklistController::class, 'edit'])->name('organizationedit');

// Route to update organization details (when the modal form is submitted)
Route::put('/organizationss/{id}', [ChecklistController::class, 'updateOrganisation'])->name('organizationupdate');

Route::get('/organization-history' , [ChecklistController::class , 'showOrgHistory'])->name('organization.history');
Route::post('/store-organization', [ChecklistController::class, 'storeOrganization'])->name('store-organization');
Route::delete('/organization/{id}', [ChecklistController::class, 'destroyOrganization']);
Route::patch('/nominations/{id}', [NominationController::class, 'updateStatus'])->name('nomination.updateStatus');
Route::get('/organization-login/create', [OrganizationLoginController::class, 'create'])->name('organization.create');
Route::get('/organization-login/{id}/show', [OrganizationLoginController::class, 'show'])->name('organization.show');

Route::post('/user/store', [OrganizationLoginController::class, 'store'])->name('organization.store');
Route::get('/organization-login-view' , [OrganizationLoginController::class , 'index'])->name('organization.index');
Route::get('/organization-login/{id}/edit', [OrganizationLoginController::class, 'edit'])->name('organization.edit');
Route::put('/organization-login/{id}', [OrganizationLoginController::class, 'update'])->name('organization.update');
Route::delete('/organization-login/{id}', [OrganizationLoginController::class, 'destroy'])->name('organization.destroy');


//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('/salary' , [SalaryController::class , 'index'])->name('salary.index');
Route::patch('/salary-update/{id}/status', [SalaryController::class, 'updateStatus'])->name('salary-update-status');
Route::get('/salary-history' , [SalaryController::class , 'showdata'])->name('salary-history');
Route::get('/show/{id}' , [SalaryController::class , 'show'])->name('show');

Route::get('/salary-request' , [SalaryController::class , 'pendingIndex'])->name('salary.pending');
Route::get('/salary-details-page', [SalaryController::class, 'showSalaryDetailsPage'])->name('salary.details.page');

Route::get('/salary-details' , [SalaryController::class , 'indexDetails'])->name('salary.details');
Route::get('/salary-create' , [SalaryController::class , 'create'])->name('salary.create');
Route::post('/store-salary', [SalaryController::class, 'store'])->name('salary.store');
Route::delete('/salary/{id}', [SalaryController::class, 'destroy']);
Route::post('/promotion/store', [SalaryController::class, 'storePromotion'])->name('promotion.store');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::patch('/transfer/{id}/status', [TransferController::class, 'updateStatus'])->name('transferstatus');
Route::patch('/transferuser/{id}/status', [TransferController::class, 'updateStatusUser'])->name('transferstatususer');
Route::patch('/user-details/{id}/status', [UserController::class, 'updateStatus'])->name('userdetailStatus');
Route::patch('/otherdetails/{id}/status', [ReceiptController::class, 'updateStatus'])->name('otherdetails.updateStatus');
