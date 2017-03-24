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
                'bagian_id' => '0',
                'wilayah_id' => '0',
                'pangkat_id' => '0',
                'jabatan_id' => '0',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
            ]);
        }

        $service->create($user, 'admin', 'admin', false);

        /* create($user, $password, $role = 'member', $sendEmail = true) */

        if (!User::where('name', 'member')->first()) {
            $user = User::create([
                'name' => 'Member',
                'bagian_id' => '0',
                'wilayah_id' => '0',
                'pangkat_id' => '0',
                'jabatan_id' => '0',
                'email' => 'member@member.com',
                'password' => bcrypt('member'),
            ]);
        }

        $service->create($user, 'member', 'member', false);
    }
}
