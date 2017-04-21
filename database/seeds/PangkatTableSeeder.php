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
          'kode' => 'A1',
          'name' => 'Pegawai Dasar Muda',
          'kodepangkat_lama' => 'A/1',
        ]);
      	Pangkat::create([
          'kode' => 'A2',
          'name' => 'Pegawai Dasar Muda Tingkat 1',
          'kodepangkat_lama' => 'A/2',
          
      	]);
      	Pangkat::create([
          'kode' => 'A3',
          'name' => 'Pegawai Dasar',
          'kodepangkat_lama' => 'A/3',
          
      	]);
      	Pangkat::create([
          'kode' => 'A4',
          'name' => 'Pegawai Dasar Tingkat 1',
          'kodepangkat_lama' => 'A/4',
          
      	]);
      	Pangkat::create([
          'kode' => 'B1',
          'name' => 'Pelaksana Muda',
          'kodepangkat_lama' => 'B/1',
          
      	]);
      	Pangkat::create([
          'kode' => 'B2',
          'name' => 'Pelaksana Muda Tingkat 1',
          'kodepangkat_lama' => 'B/2',
          
      	]);
      	Pangkat::create([
          'kode' => 'B3',
          'name' => 'Pelaksana',
          'kodepangkat_lama' => 'B/3',
          
      	]);
      	Pangkat::create([
          'kode' => 'B4',
          'name' => 'Pelaksana Tingkat 1',
          'kodepangkat_lama' => 'B/4',
          
      	]);
      	Pangkat::create([
          'kode' => 'C1',
          'name' => 'Staf Muda',
          'kodepangkat_lama' => 'C/1',
          
      	]);
      	Pangkat::create([
          'kode' => 'C2',
          'name' => 'Staf Muda Tingkat 1',
          'kodepangkat_lama' => 'C/2',
          
      	]);
      	Pangkat::create([
          'kode' => 'C3',
          'name' => 'Staf',
          'kodepangkat_lama' => 'C/3',
          
      	]);
      	Pangkat::create([
          'kode' => 'C4',
          'name' => 'Staf Tingkat 1',
          'kodepangkat_lama' => 'C/4',
          
      	]);
      	Pangkat::create([
          'kode' => 'D1',
          'name' => 'Staf Madya',
          'kodepangkat_lama' => 'D/1',
          
      	]);
      	Pangkat::create([
          'kode' => 'D2',
          'name' => 'Staf Madya Muda',
          'kodepangkat_lama' => 'D/2',
          
      	]);
      	Pangkat::create([
          'kode' => 'D3',
          'name' => 'Staf Madya Muda Tingkat 1',
          'kodepangkat_lama' => 'D/3',
          
      	]);
      	
    }
}
