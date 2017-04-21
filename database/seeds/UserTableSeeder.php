<?php

use App\Models\User;
use App\Services\UserService;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = app(UserService::class);

        if (!User::where('name', 'admin')->first()) {
            $user = User::create([
                'name' => 'Admin',
                'employee_number' => '10000',
                'bagian_id' => '1',
                'wilayah_id' => '1',
                'pangkat_id' => '1',
                'jabatan_id' => '1',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'startworking_date' => '2000-01-01',
            ]);
        }

        $service->create($user, 'admin', 'admin', false);

        /* create($user, $password, $role = 'member', $sendEmail = true) */

        if (!User::where('name', 'member')->first()) {
            $user = User::create([
                'name' => 'Member',
                'employee_number' => '20009',
                'bagian_id' => '3',
                'wilayah_id' => '3',
                'pangkat_id' => '3',
                'jabatan_id' => '3',
                'email' => 'member@member.com',
                'password' => bcrypt('member'),
                'startworking_date' => '2015-01-01',
            ]);
        }

        $service->create($user, 'member', 'member', false);
    }
}
