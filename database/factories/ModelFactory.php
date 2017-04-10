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

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
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

/*
|--------------------------------------------------------------------------
| Topic Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Topic::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',
		'body' => 'I am Batman',
		'user_id' => '1',
		'status' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Topic Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Topic::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',
		'body' => 'I am Batman',
		'user_id' => '1',
		'status' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Topic Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Topic::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',
		'body' => 'I am Batman',
		'user_id' => '1',
		'status' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Topic Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Topic::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',
		'body' => 'I am Batman',
		'user_id' => '1',
		'status' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Category Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',
		'body' => 'I am Batman',


    ];
});

/*
|--------------------------------------------------------------------------
| OfflineWriter Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\OfflineWriter::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',
		'twitter' => 'laravel',
		'email' => 'laravel',
		'phone' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Comment Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Comment::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'content_id' => 'laravel',
		'name' => 'laravel',
		'email' => 'laravel',
		'body' => 'I am Batman',
		'status' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Content Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Content::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'name' => 'laravel',
		'description' => 'laravel',
		'quote' => 'laravel',
		'body' => 'I am Batman',
		'user_id' => '1',
		'offline_writer_id' => '1',
		'offline_writer' => 'laravel',
		'category_id' => '1',
		'topic_id' => '1',
		'status' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Message Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Message::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'name' => 'laravel',
		'message' => 'I am Batman',
		'sender_id' => '1',
		'receiver_id' => '1',
		'status' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Agama Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Agama::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| StatusPerkawinan Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\StatusPerkawinan::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| GolonganDarah Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\GolonganDarah::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'name' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| BankAccount Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\BankAccount::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'name' => 'laravel',
		'address' => 'laravel',
		'logo' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| StatusPegawai Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\StatusPegawai::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| StatusKerja Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\StatusKerja::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Wilayah Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Wilayah::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',
		'address' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Jabatan Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Jabatan::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| GajiPokok Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\GajiPokok::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'id_pangkat' => 'laravel',
		'masa_kerja' => 'laravel',
		'gaji_pokok' => 'laravel',
		'gaji_tunjangan_pokok' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Pangkat Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Pangkat::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'kodepangkat' => 'laravel',
		'name' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Unit Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Unit::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'name' => 'laravel',
		'id_parent' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Unit Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Unit::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',
		'id_parent' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Unit Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Unit::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',
		'id_parent' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Unit Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Unit::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',
		'id_parent' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Unit Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Unit::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',
		'id_parent' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Bagian Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Bagian::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'kode' => 'laravel',
		'name' => 'laravel',
		'id_parent' => 'laravel',


    ];
});

/*
|--------------------------------------------------------------------------
| Subjabatan Factory
|--------------------------------------------------------------------------
*/

$factory->define(App\Models\Subjabatan::class, function (Faker\Generator $faker) {
    return [

        'id' => '1',
		'jabatan_id' => 'laravel',
		'kode_subjabatan' => 'laravel',
		'kode' => 'laravel',
		'name' => 'laravel',


    ];
});
