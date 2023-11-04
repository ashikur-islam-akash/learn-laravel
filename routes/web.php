<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\VoucherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoeFormDesign;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UiDesignController;
use App\Http\Controllers\Admin\DonorController;
use App\Http\Controllers\Admin\SectorController;
use App\Http\Controllers\Admin\SourceController;
use App\Http\Controllers\Admin\BackendController;
use App\Http\Controllers\Admin\QuarterController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ComponentController;
use App\Http\Controllers\Admin\DaActivityController;
use App\Http\Controllers\Admin\DaStatementController;
use App\Http\Controllers\Admin\CashForecastController;
use App\Http\Controllers\Admin\SummarySheetController;
use App\Http\Controllers\Admin\BudgetForecastController;
use App\Http\Controllers\Admin\RoleManagementController;
use App\Http\Controllers\Admin\SourcesAndUsesController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\DatabaseDownloadController;
use App\Http\Controllers\Admin\VarianceAnalysisController;
use App\Http\Controllers\Admin\ExpenditureStatementController;
use App\Http\Controllers\Admin\WithdrawalApplicationController;

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

Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    return redirect()->back()->with('success', 'Cache cleared successfully.');
})->name('clear-cache');

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['register' => false]);

Route::group(['prefix'=>'admin', 'middleware'=>['auth'], 'as'=>'admin.'], function (){

    Route::get('/clear-cache', function () {
        Artisan::call('optimize:clear');
        return redirect()->back()->with('success', 'Cache cleared successfully.');
    })->name('clear-cache');


    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ BackEndController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [BackEndController::class, 'updateProfile'])->name('profile.update');
    Route::post('/update/password', [BackEndController::class, 'updatePassword'])->name('update.password');

    // role management routes start here
    Route::resource('roles', RoleManagementController::class);
    Route::post('/roles-edit', [RoleManagementController::class, 'roleEdit'])->name('roles-edit');
    Route::get('/assign-permissions/{id}', [RoleManagementController::class, 'assignPermission'])->name('assign-permission');
    Route::post('/assign-permissions/{id}', [RoleManagementController::class, 'assignPermissionUpdate'])->name('assign-permission-update');

    // user management routes start here
    Route::resource('users', UserManagementController::class);
    Route::resource('permissions', PermissionController::class);
});

