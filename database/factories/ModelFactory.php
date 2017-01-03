<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/*
|--------------------------------------------------------------------------
| UserMeta Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\UserMeta::class, function (Faker\Generator $faker) {
    return [
        'user_id' => 1,
        'phone' => $faker->phoneNumber,
        'marketing' => 1,
        'terms_and_cond' => 1,
    ];
});

$factory->define(App\Models\Role::class, function (Faker\Generator $faker) {
    return [
        'name' => 'member',
        'label' => 'Member',
    ];
});

/*
|--------------------------------------------------------------------------
| Team Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Team::class, function (Faker\Generator $faker) {
    return [
        'user_id' => 1,
        'name' => $faker->name
    ];
});
/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		' name' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		' title' => 'laravel',
		' description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		' title' => 'laravel',
		' description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Position Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Position::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Position Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Position::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Position Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Position::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Position Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Position::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Departmentd Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Departmentd::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Departmentd Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Departmentd::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'title' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Department Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Department::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Company Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Company::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'name' => 'laravel',
		'tax' => 'laravel',
		'reg' => 'laravel',
		'phone' => 'laravel',
		'fax' => 'laravel',
		'address1' => 'laravel',
		'address2' => 'laravel',
		'city' => 'laravel',
		'province' => 'laravel',
		'zip' => 'laravel',
		'country' => 'laravel',
		'logo' => 'laravel',
		'timezone' => 'laravel',
		'currency' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Logsystem Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Logsystem::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'name' => 'laravel',
		'ipaddress' => 'laravel',
		'user_id' => '1',


    ];
});

/*
|--------------------------------------------------------------------------
| Location Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Location::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'name' => 'laravel',
		'address' => 'laravel',
		'city' => 'laravel',
		'lat' => '1.1',
		'long' => '1.1',
		'company_id' => '1',
		'timezone_id' => '1',


    ];
});

/*
|--------------------------------------------------------------------------
| Timezone Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Timezone::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',


    ];
});

/*
|--------------------------------------------------------------------------
| Education Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Education::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',


    ];
});

/*
|--------------------------------------------------------------------------
| Language Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Language::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',


    ];
});

/*
|--------------------------------------------------------------------------
| Skill Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Skill::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',
		'company_id' => '1',


    ];
});

/*
|--------------------------------------------------------------------------
| Employmentstatus Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Employmentstatus::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',


    ];
});

/*
|--------------------------------------------------------------------------
| Jobtitle Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Jobtitle::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',


    ];
});

/*
|--------------------------------------------------------------------------
| Salarycomponent Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Salarycomponent::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'name' => 'laravel',
		'default' => 'laravel',
		'description' => 'laravel',
		'company_id' => '1',


    ];
});

/*
|--------------------------------------------------------------------------
| Leavetype Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Leavetype::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',


    ];
});

/*
|--------------------------------------------------------------------------
| Documenttype Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Documenttype::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'name' => 'laravel',
		'company_id' => '1',


    ];
});
