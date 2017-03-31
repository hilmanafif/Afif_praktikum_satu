<?php

use Illuminate\Database\Seeder;
use App\Models\StatusPegawai;

class StatPegawaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         StatusPegawai::create([
          'kode' => '1',
          'name' => 'Calon Pegawai',
      	]);

      	StatusPegawai::create([
          'kode' => '2',
          'name' => 'Pegawai Tetap',
      	]);

      	StatusPegawai::create([
          'kode' => '3',
          'name' => 'Pegawai Kontrak',
      	]);

      	StatusPegawai::create([
          'kode' => '4',
          'name' => 'Berhenti',
      	]);
      	 StatusPegawai::create([
          'kode' => '5',
          'name' => 'Meninggal',
      	]);

      	StatusPegawai::create([
          'kode' => '6',
          'name' => 'Masa Percobaan',
      	]);

      	StatusPegawai::create([
          'kode' => '7',
          'name' => 'Diperbantukan',
      	]);

      	StatusPegawai::create([
          'kode' => '8',
          'name' => 'Perbantuan',
      	]);
    }
}
