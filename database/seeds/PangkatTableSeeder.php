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
          'kode_pangkat' => 'A/1',
          'name' => 'Pegawai Dasar Muda',
      	]);
      	Pangkat::create([
          'kode_pangkat' => 'A/2',
          'name' => 'Pegawai Dasar Muda Tingkat 1',
      	]);
      	Pangkat::create([
          'kode_pangkat' => 'A/3',
          'name' => 'Pegawai Dasar',
      	]);
      	Pangkat::create([
          'kode_pangkat' => 'A/4',
          'name' => 'Pegawai Dasar Tingkat 1',
      	]);
      	Pangkat::create([
          'kode_pangkat' => 'B/1',
          'name' => 'Pelaksana Muda',
      	]);
      	Pangkat::create([
          'kode_pangkat' => 'B/2',
          'name' => 'Pelaksana Muda Tingkat 1',
      	]);
      	Pangkat::create([
          'kode_pangkat' => 'B/3',
          'name' => 'Pelaksana',
      	]);
      	Pangkat::create([
          'kode_pangkat' => 'B/4',
          'name' => 'Pelaksana Tingkat 1',
      	]);
      	Pangkat::create([
          'kode_pangkat' => 'C/1',
          'name' => 'Staf Muda',
      	]);
      	Pangkat::create([
          'kode_pangkat' => 'C/2',
          'name' => 'Staf Muda Tingkat 1',
      	]);
      	Pangkat::create([
          'kode_pangkat' => 'C/3',
          'name' => 'Staf',
      	]);
      	Pangkat::create([
          'kode_pangkat' => 'C/4',
          'name' => 'Staf Tingkat 1',
      	]);
      	Pangkat::create([
          'kode_pangkat' => 'D/1',
          'name' => 'Staf Madya',
      	]);
      	Pangkat::create([
          'kode_pangkat' => 'D/2',
          'name' => 'Staf Madya Muda',
      	]);
      	Pangkat::create([
          'kode_pangkat' => 'D/3',
          'name' => 'Staf Madya Muda Tingkat 1',
      	]);
      	
    }
}
