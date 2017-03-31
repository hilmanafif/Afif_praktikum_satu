<?php

use Illuminate\Database\Seeder;
use App\Models\StatusKerja;

class StatKerjaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        StatusKerja::create([
          'kode' => '1',
          'name' => 'Aktif',
      	]);

      	StatusKerja::create([
          'kode' => '2',
          'name' => 'Mengundurkan Diri',
      	]);

      	StatusKerja::create([
          'kode' => '3',
          'name' => 'Diberhentikan',
      	]);

      	StatusKerja::create([
          'kode' => '4',
          'name' => 'Cuti Diluar Tanggungan',
      	]);
      	 StatusKerja::create([
          'kode' => '5',
          'name' => 'Diperbantukan',
      	]);

      	StatusKerja::create([
          'kode' => '6',
          'name' => 'Meninggal',
      	]);

      	StatusKerja::create([
          'kode' => '7',
          'name' => 'Pensiun Dini',
      	]);

      	StatusKerja::create([
          'kode' => '8',
          'name' => 'Pensiun',
      	]);
      	StatusKerja::create([
          'kode' => '9',
          'name' => 'Tugas Belajar',
      	]);

      	StatusKerja::create([
          'kode' => '10',
          'name' => 'Tidak Diperpanjang Kontrak',
      	]);
    }
}
