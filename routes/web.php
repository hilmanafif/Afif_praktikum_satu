<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a given Closure or controller and enjoy the fresh air.
|
*/

/*
|--------------------------------------------------------------------------
| Welcome Page
|--------------------------------------------------------------------------
*/

Route::get('/', 'WelcomeController@index');

/*
|--------------------------------------------------------------------------
| Login/ Logout/ Password
|--------------------------------------------------------------------------
*/
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

/*
|--------------------------------------------------------------------------
| Registration
|--------------------------------------------------------------------------
*/
Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::post('register', 'Auth\RegisterController@register');

Route::get('activate', 'Auth\ActivateController@showActivate');
Route::get('activate/send-token', 'Auth\ActivateController@sendToken');
Route::get('activate/token/{token}', 'Auth\ActivateController@activate');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth', 'active']], function () {

    Route::get('/users/switch-back', 'Admin\UserController@switchUserBack');

    /*
    |--------------------------------------------------------------------------
    | User
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'user', 'namespace' => 'User'], function () {
        Route::get('settings', 'SettingsController@settings');
        Route::post('settings', 'SettingsController@update');
        Route::post('editmeta/{id}', 'SettingsController@updatemeta');
        Route::get('password', 'PasswordController@password');
        Route::post('password', 'PasswordController@update');
    });

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', 'PagesController@dashboard');

    /*
    |--------------------------------------------------------------------------
    | Team Routes
    |--------------------------------------------------------------------------
    */

    Route::get('team/{name}', 'TeamController@showByName');
    Route::resource('teams', 'TeamController', ['except' => ['show']]);
    Route::post('teams/search', 'TeamController@search');
    Route::post('teams/{id}/invite', 'TeamController@inviteMember');
    Route::get('teams/{id}/remove/{userId}', 'TeamController@removeMember');

    /*
    |--------------------------------------------------------------------------
    | Department Routes
    |--------------------------------------------------------------------------
    */

    Route::resource('departments', 'DepartmentsController');
    Route::post('departments/search', [
        'as' => 'departments.search',
        'uses' => 'DepartmentsController@search'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Company Routes
    |--------------------------------------------------------------------------
    */

    Route::resource('companies', 'CompaniesController');
    Route::post('companies/search', [
        'as' => 'companies.search',
        'uses' => 'CompaniesController@search'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Location Routes
    |--------------------------------------------------------------------------
    */

    Route::resource('locations', 'LocationsController');
    Route::post('locations/search', [
        'as' => 'locations.search',
        'uses' => 'LocationsController@search'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Timezone Routes
    |--------------------------------------------------------------------------
    */

    Route::resource('timezones', 'TimezonesController');
    Route::post('timezones/search', [
        'as' => 'timezones.search',
        'uses' => 'TimezonesController@search'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Education Routes
    |--------------------------------------------------------------------------
    */

    Route::resource('educations', 'EducationsController');
    Route::post('educations/search', [
        'as' => 'educations.search',
        'uses' => 'EducationsController@search'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Language Routes
    |--------------------------------------------------------------------------
    */

    Route::resource('languages', 'LanguagesController');
    Route::post('languages/search', [
        'as' => 'languages.search',
        'uses' => 'LanguagesController@search'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Skill Routes
    |--------------------------------------------------------------------------
    */

    Route::resource('skills', 'SkillsController');
    Route::post('skills/search', [
        'as' => 'skills.search',
        'uses' => 'SkillsController@search'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Employmentstatus Routes
    |--------------------------------------------------------------------------
    */

    Route::resource('employmentstatuses', 'EmploymentstatusesController');
    Route::post('employmentstatuses/search', [
        'as' => 'employmentstatuses.search',
        'uses' => 'EmploymentstatusesController@search'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Jobtitle Routes
    |--------------------------------------------------------------------------
    */

    Route::resource('jobtitles', 'JobtitlesController');
    Route::post('jobtitles/search', [
        'as' => 'jobtitles.search',
        'uses' => 'JobtitlesController@search'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Salarycomponent Routes
    |--------------------------------------------------------------------------
    */

    Route::resource('salarycomponents', 'SalarycomponentsController');
    Route::post('salarycomponents/search', [
        'as' => 'salarycomponents.search',
        'uses' => 'SalarycomponentsController@search'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Leavetype Routes
    |--------------------------------------------------------------------------
    */

    Route::resource('leavetypes', 'LeavetypesController');
    Route::post('leavetypes/search', [
        'as' => 'leavetypes.search',
        'uses' => 'LeavetypesController@search'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Documenttype Routes
    |--------------------------------------------------------------------------
    */

    Route::resource('documenttypes', 'DocumenttypesController');
    Route::post('documenttypes/search', [
        'as' => 'documenttypes.search',
        'uses' => 'DocumenttypesController@search'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Admin
    |--------------------------------------------------------------------------
    */

    Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {

        /*
        |--------------------------------------------------------------------------
        | Users
        |--------------------------------------------------------------------------
        */
        Route::resource('users', 'UserController', ['except' => ['create', 'show']]);
        Route::post('users/search', 'UserController@search');
        Route::get('users/search', 'UserController@index');
        Route::get('users/invite', 'UserController@getInvite');
        Route::get('users/switch/{id}', 'UserController@switchToUser');
        Route::post('users/invite', 'UserController@postInvite');

        /*
        |--------------------------------------------------------------------------
        | Roles
        |--------------------------------------------------------------------------
        */
        Route::resource('roles', 'RoleController', ['except' => ['show']]);
        Route::post('roles/search', 'RoleController@search');
        Route::get('roles/search', 'RoleController@index');

        /*
        |--------------------------------------------------------------------------
        | Logsystem Routes
        |--------------------------------------------------------------------------
        */

        Route::resource('logsystems', 'LogsystemsController');
        Route::post('logsystems/search', [
            'as' => 'logsystems.search',
            'uses' => 'LogsystemsController@search'
        ]);
    });
});
