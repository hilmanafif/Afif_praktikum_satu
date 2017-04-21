<?php

use Illuminate\Support\Facades\Route;

// Non protected/public routes
Route::get('/', 'WelcomeController@index');
// Login Logout
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
// Regisration
Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Auth\RegisterController@register');
Route::get('activate', 'Auth\ActivateController@showActivate');
Route::get('activate/send-token', 'Auth\ActivateController@sendToken');
Route::get('activate/token/{token}', 'Auth\ActivateController@activate');

// HARUS login / Authenticated Routes
Route::group(['middleware' => ['auth', 'active']], function () {
    // User stuff
    Route::get('/users/switch-back', 'Admin\UserController@switchUserBack');
    Route::group(['prefix' => 'user', 'namespace' => 'User'], function () {
        Route::get('settings', 'SettingsController@settings');
        Route::post('settings', 'SettingsController@update');
        Route::post('editmeta/{id}', 'SettingsController@updatemeta');
        Route::get('password', 'PasswordController@password');
        Route::post('password', 'PasswordController@update');
    });
    // Dashboard
    Route::get('/dashboard', 'PagesController@dashboard');
    // Messaging
    Route::resource('messages', 'MessagesController');
    Route::post('messages/search', [
        'as' => 'messages.search',
        'uses' => 'MessagesController@search'
    ]);
    // Team
    Route::get('team/{name}', 'TeamController@showByName');
    Route::resource('teams', 'TeamController', ['except' => ['show']]);
    Route::post('teams/search', 'TeamController@search');
    Route::post('teams/{id}/invite', 'TeamController@inviteMember');
    Route::get('teams/{id}/remove/{userId}', 'TeamController@removeMember');


    // HARUS login, HARUS admin atau member
    Route::group(['middleware' => 'roles:admin|member'], function () {
        Route::resource('contents', 'ContentsController');
        Route::post('contents/search', [
            'as' => 'contents.search',
            'uses' => 'ContentsController@search'
        ]);
    });

    // HARUS login, HARUS admin
    Route::group(['middleware' => 'roles:admin'], function () {
      // Organization & References
      Route::resource('departments', 'DepartmentsController');
      Route::post('departments/search', [
          'as' => 'departments.search',
          'uses' => 'DepartmentsController@search'
      ]);
      Route::resource('companies', 'CompaniesController');
      Route::post('companies/search', [
          'as' => 'companies.search',
          'uses' => 'CompaniesController@search'
      ]);
      Route::resource('locations', 'LocationsController');
      Route::post('locations/search', [
          'as' => 'locations.search',
          'uses' => 'LocationsController@search'
      ]);
      Route::resource('timezones', 'TimezonesController');
      Route::post('timezones/search', [
          'as' => 'timezones.search',
          'uses' => 'TimezonesController@search'
      ]);
      Route::resource('educations', 'EducationsController');
      Route::post('educations/search', [
          'as' => 'educations.search',
          'uses' => 'EducationsController@search'
      ]);
      Route::resource('languages', 'LanguagesController');
      Route::post('languages/search', [
          'as' => 'languages.search',
          'uses' => 'LanguagesController@search'
      ]);
      Route::resource('skills', 'SkillsController');
      Route::post('skills/search', [
          'as' => 'skills.search',
          'uses' => 'SkillsController@search'
      ]);
      Route::resource('employmentstatuses', 'EmploymentstatusesController');
      Route::post('employmentstatuses/search', [
          'as' => 'employmentstatuses.search',
          'uses' => 'EmploymentstatusesController@search'
      ]);
      Route::resource('jobtitles', 'JobtitlesController');
      Route::post('jobtitles/search', [
          'as' => 'jobtitles.search',
          'uses' => 'JobtitlesController@search'
      ]);
      Route::resource('salarycomponents', 'SalarycomponentsController');
      Route::post('salarycomponents/search', [
          'as' => 'salarycomponents.search',
          'uses' => 'SalarycomponentsController@search'
      ]);
      Route::resource('leavetypes', 'LeavetypesController');
      Route::post('leavetypes/search', [
          'as' => 'leavetypes.search',
          'uses' => 'LeavetypesController@search'
      ]);
      Route::resource('documenttypes', 'DocumenttypesController');
      Route::post('documenttypes/search', [
          'as' => 'documenttypes.search',
          'uses' => 'DocumenttypesController@search'
      ]);
      // CMS
      Route::resource('topics', 'TopicsController');
      Route::post('topics/search', [
          'as' => 'topics.search',
          'uses' => 'TopicsController@search'
      ]);
      Route::resource('categories', 'CategoriesController');
      Route::post('categories/search', [
          'as' => 'categories.search',
          'uses' => 'CategoriesController@search'
      ]);
      Route::resource('offlinewriters', 'OfflineWritersController');
      Route::post('offlinewriters/search', [
          'as' => 'offlinewriters.search',
          'uses' => 'OfflineWritersController@search'
      ]);
      Route::resource('comments', 'CommentsController');
      Route::post('comments/search', [
          'as' => 'comments.search',
          'uses' => 'CommentsController@search'
      ]);
      // Log System
      Route::resource('logsystems', 'LogsystemsController');
      Route::post('logsystems/search', [
          'as' => 'logsystems.search',
          'uses' => 'LogsystemsController@search'
      ]);
      // Agama
      Route::resource('agamas', 'AgamasController');
      Route::post('agamas/search', [
          'as' => 'agamas.search',
          'uses' => 'AgamasController@search'
      ]);
      // StatusPerkawinan
      Route::resource('statusperkawinans', 'StatusPerkawinansController');
      Route::post('statusperkawinans/search', [
          'as' => 'statusperkawinans.search',
          'uses' => 'StatusPerkawinansController@search'
      ]);
      // GolonganDarah
      Route::resource('golongandarahs', 'GolonganDarahsController');
      Route::post('golongandarahs/search', [
          'as' => 'golongandarahs.search',
          'uses' => 'GolonganDarahsController@search'
      ]);
      // BankAccount
      Route::resource('bankaccounts', 'BankAccountsController');
      Route::post('bankaccounts/search', [
          'as' => 'bankaccounts.search',
          'uses' => 'BankAccountsController@search'
      ]);
      // StatusPegawai
      Route::resource('statuspegawais', 'StatusPegawaisController');
      Route::post('statuspegawais/search', [
          'as' => 'statuspegawais.search',
          'uses' => 'StatusPegawaisController@search'
      ]);
      // StatusKerja
      Route::resource('statuskerjas', 'StatusKerjasController');
      Route::post('statuskerjas/search', [
          'as' => 'statuskerjas.search',
          'uses' => 'StatusKerjasController@search'
      ]);
      // Wilayah
      Route::resource('wilayahs', 'WilayahsController');
      Route::post('wilayahs/search', [
          'as' => 'wilayahs.search',
          'uses' => 'WilayahsController@search'
      ]);
      // Jabatan
      Route::resource('jabatans', 'JabatansController');
      Route::post('jabatans/search', [
          'as' => 'jabatans.search',
          'uses' => 'JabatansController@search'
      ]);
      // GajiPokok
      Route::resource('gajipokoks', 'GajiPokoksController');
      Route::post('gajipokoks/search', [
          'as' => 'gajipokoks.search',
          'uses' => 'GajiPokoksController@search'
      ]);
      // Pangkat
      Route::resource('pangkats', 'PangkatsController');
      Route::post('pangkats/search', [
          'as' => 'pangkats.search',
          'uses' => 'PangkatsController@search'
      ]);
      // Bagian
      Route::resource('bagians', 'BagiansController');
      Route::post('bagians/search', [
          'as' => 'bagians.search',
          'uses' => 'BagiansController@search'
      ]);
      // Payroll
      Route::resource('payrolls', 'PayrollsController');
      Route::post('payrolls/search', [
          'as' => 'payrolls.search',
          'uses' => 'PayrollsController@search'
      ]);
      // Payrolltype
      Route::resource('payrolltypes', 'PayrolltypesController');
      Route::post('payrolltypes/search', [
          'as' => 'payrolltypes.search',
          'uses' => 'PayrolltypesController@search'
      ]);
      Route::post('generatePayroll', 'PayrollsController@generatePayroll');

    });

    // HARUS login, HARUS admin dan controllernya HARUS di /admin
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {
        // User
        Route::resource('users', 'UserController', ['except' => ['create', 'show']]);
        Route::post('users/search', 'UserController@search');
        Route::get('users/search', 'UserController@index');
        Route::get('users/invite', 'UserController@getInvite');
        Route::get('users/switch/{id}', 'UserController@switchToUser');
        Route::post('users/invite', 'UserController@postInvite');
        // Roles
        Route::resource('roles', 'RoleController', ['except' => ['show']]);
        Route::post('roles/search', 'RoleController@search');
        Route::get('roles/search', 'RoleController@index');
    });
});
