<?php

use Illuminate\Database\Seeder;
use App\Models\Pangkat;

class PangkatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Pangkat::create([
          'kodepangkat' => 'A/1',
          'name' => 'Pegawai Dasar Muda',
      	]);
      	Pangkat::create([
          'kodepangkat' => 'A/2',
          'name' => 'Pegawai Dasar Muda Tingkat 1',
      	]);
      	Pangkat::create([
          'kodepangkat' => 'A/3',
          'name' => 'Pegawai Dasar',
      	]);
      	Pangkat::create([
          'kodepangkat' => 'A/4',
          'name' => 'Pegawai Dasar Tingkat 1',
      	]);
      	Pangkat::create([
          'kodepangkat' => 'B/1',
          'name' => 'Pelaksana Muda',
      	]);
      	Pangkat::create([
          'kodepangkat' => 'B/2',
          'name' => 'Pelaksana Muda Tingkat 1',
      	]);
      	Pangkat::create([
          'kodepangkat' => 'B/3',
          'name' => 'Pelaksana',
      	]);
      	Pangkat::create([
          'kodepangkat' => 'B/4',
          'name' => 'Pelaksana Tingkat 1',
      	]);
      	Pangkat::create([
          'kodepangkat' => 'C/1',
          'name' => 'Staf Muda',
      	]);
      	Pangkat::create([
          'kodepangkat' => 'C/2',
          'name' => 'Staf Muda Tingkat 1',
      	]);
      	Pangkat::create([
          'kodepangkat' => 'C/3',
          'name' => 'Staf',
      	]);
      	Pangkat::create([
          'kodepangkat' => 'C/4',
          'name' => 'Staf Tingkat 1',
      	]);
      	Pangkat::create([
          'kodepangkat' => 'D/1',
          'name' => 'Staf Madya',
      	]);
      	Pangkat::create([
          'kodepangkat' => 'D/2',
          'name' => 'Staf Madya Muda',
      	]);
      	Pangkat::create([
          'kodepangkat' => 'D/3',
          'name' => 'Staf Madya Muda Tingkat 1',
      	]);
      	Pangkat::create([
          'kodepangkat' => 'D/4',
          'name' => 'Staf Madya Utama',
      	]);
      	Pangkat::create([
          'kodepangkat' => 'D/5',
          'name' => 'Staf Utama',
      	]);
    }
}
