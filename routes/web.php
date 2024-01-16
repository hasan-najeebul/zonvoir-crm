<?php

use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EmployeeTypeController;
use App\Http\Controllers\Admin\GenderController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\ResignationStatusController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanyTypeController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\CustomerContactController;
use App\Http\Controllers\Admin\SourceController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Contact\ContactLoginController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/contact-login', function () {
    return redirect()->route('contact-login');
});
Route::get('/contact-login', [ContactLoginController::class, 'shoLoginForm'])->name('contact-login');
Route::post('/contact-store', [ContactLoginController::class, 'login'])->name('contact-store');
Route::middleware(['contact'])->group(function () {
    Route::get('/contact/dashboard', [ContactLoginController::class, 'dashboard'])->name('contact-dashboard');
    Route::get('/contact/logout', [ContactLoginController::class, 'logout'])->name('contact-logout');
});

Auth::routes();

/******************
** ADMIN ROUTES  **
******************/

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    //Dashboard route
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //User route
    Route::resource('users', UserController::class);

    //Roles route
    Route::resource('roles', RoleController::class);

    //Gender route
    Route::resource('genders', GenderController::class);
    //Employee Type route
    Route::resource('employee-types', EmployeeTypeController::class);
    //Skill route
    Route::resource('skills', SkillController::class);
    //Company Type routes
    Route::resource('company-types', CompanyTypeController::class);
    //Currency routes
    Route::resource('currencies', CurrencyController::class);
    //Category routes
    Route::resource('categories', CategoryController::class);
    //Source routes
    Route::resource('sources', SourceController::class);
    //Language route
    Route::resource('languages', LanguageController::class);
    //Country route
    Route::resource('countries', CountryController::class);
    //Role route
    Route::resource('departments', DepartmentController::class);
    //Resignation Status route
    Route::resource('resignation-statuses', ResignationStatusController::class);
    //Customers routes
    Route::resource('customers', CustomerController::class);
    Route::get('customer/{id}/contact', [CustomerController::class, 'customerContact'])->name('customerContact');
    Route::post('customer/contact/store', [CustomerController::class, 'customerContactStore'])->name('customerContactStore');
    //Settings
    //general setting
    Route::get('settings/general', [SettingController::class, 'index'])->name('settings.general');
    Route::post('settings/general/store', [SettingController::class, 'saveOrUpdate'])->name('settings.general.saveOrUpdate');
    //companyInfo setting
    Route::get('settings/companyInfo', [SettingController::class, 'companyInfoindex'])->name('settings.companyInfo');
    Route::post('settings/companyInfo/store', [SettingController::class, 'saveOrUpdate'])->name('settings.companyInfo.saveOrUpdate');
    //Localization setting
    Route::get('settings/localization', [SettingController::class, 'localizationindex'])->name('settings.localization');
    Route::post('settings/localization/store', [SettingController::class, 'saveOrUpdate'])->name('settings.localization.saveOrUpdate');
    //Email setting
    Route::get('settings/emailSetting', [SettingController::class, 'emailSettingindex'])->name('settings.emailSetting');
    Route::post('settings/emailSetting/store', [SettingController::class, 'saveOrUpdate'])->name('settings.emailSetting.saveOrUpdate');
    //currency setting
    Route::get('settings/currencySetting', [SettingController::class, 'currencySettingindex'])->name('settings.currencySetting');
    Route::post('settings/currencySetting/store', [SettingController::class, 'saveOrUpdate'])->name('settings.currencySetting.saveOrUpdate');
    //Customers contact routes
    Route::resource('customer-contacts', CustomerContactController::class);
    Route::get('customer-contacts/create', [CustomerContactController::class, 'createCustomerContact'])->name('createCustomerContact');
    Route::get('customers/customer/{id}/contacts', [CustomerContactController::class, 'customerContactList'])->name('customerContactList');
    //leads routes
    Route::resource('leads', LeadController::class);
    //projects routes
    Route::resource('projects', ProjectController::class);

});

