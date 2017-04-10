<?php

use Illuminate\Database\Seeder;
use App\Models\Jabatan;

class JabatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Jabatan::create([
          'kode' => 'A',
          'name' => 'Direktur Utama',
      	]);

      	Jabatan::create([
          'kode' => 'B',
          'name' => 'Direktur',
      	]);

      	Jabatan::create([
          'kode' => 'C',
          'name' => 'Kepala',
      	]);

      	Jabatan::create([
          'kode' => 'D',
          'name' => 'Kepala Cabang',
      	]);
      	 Jabatan::create([
          'kode' => 'E',
          'name' => 'Kepala Cabang',
      	]);

      	Jabatan::create([
          'kode' => 'F',
          'name' => 'Kepala Bagian',
      	]);

      	Jabatan::create([
          'kode' => 'G',
          'name' => 'Kepala Sub Bagian',
      	]);

      	Jabatan::create([
          'kode' => 'H',
          'name' => 'Kepala Seksi',
      	]);
      	
        Jabatan::create([
          'kode' => 'J',
          'name' => 'Kepala Sub Seksi',
      	]);
      	Jabatan::create([
          'kode' => 'K',
          'name' => 'Pelaksana Pusat',
      	]);

      	Jabatan::create([
          'kode' => 'L',
          'name' => 'Pelaksana Produksi',
      	]);

      	Jabatan::create([
          'kode' => 'M',
          'name' => 'Pelaksana Distribusi',
      	]);

      	Jabatan::create([
          'kode' => 'N',
          'name' => 'Pel. Produksi & Distribusi',
      	]);
      	 Jabatan::create([
          'kode' => 'O',
          'name' => 'Pelaksana Umum',
      	]);

      	Jabatan::create([
          'kode' => 'P',
          'name' => 'Pelaksana Kas',
      	]);

      	Jabatan::create([
          'kode' => 'Q',
          'name' => 'Pel. Pelayanan Langganan',
      	]);

      	Jabatan::create([
          'kode' => 'R',
          'name' => 'Pel. Pembaca Meter',
      	]);
      	Jabatan::create([
          'kode' => 'S',
          'name' => 'Satpam',
      	]);

      	Jabatan::create([
          'kode' => 'T',
          'name' => 'Pel. Pembantu Umum',
      	]);
      	Jabatan::create([
          'kode' => 'U',
          'name' => 'Pelaksana IPAL Cisirung',
      	]);

      	
    }
}
