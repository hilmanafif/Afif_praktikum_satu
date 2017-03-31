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
          'name' => 'Direktur Teknik',
      	]);

      	Jabatan::create([
          'kode' => 'C',
          'name' => 'Direktur Umum',
      	]);

      	Jabatan::create([
          'kode' => 'D',
          'name' => 'Kepala',
      	]);
      	 Jabatan::create([
          'kode' => 'E',
          'name' => 'Kepala Cabang',
      	]);

      	Jabatan::create([
          'kode' => 'F',
          'name' => 'Wakil Kepala Cabang',
      	]);

      	Jabatan::create([
          'kode' => 'G',
          'name' => 'Kepala Bagian',
      	]);

      	Jabatan::create([
          'kode' => 'H',
          'name' => 'Kepala Unit',
      	]);
      	Jabatan::create([
          'kode' => 'I',
          'name' => 'Kepala Seksi',
      	]);

      	Jabatan::create([
          'kode' => 'J',
          'name' => 'Kepala Sub Bagian',
      	]);
      	Jabatan::create([
          'kode' => 'K',
          'name' => 'Kepala Urusan',
      	]);

      	Jabatan::create([
          'kode' => 'L',
          'name' => 'Kepala Sub Seksi',
      	]);

      	Jabatan::create([
          'kode' => 'M',
          'name' => 'Pelaksana SDM',
      	]);

      	Jabatan::create([
          'kode' => 'N',
          'name' => 'Pelaksana Keuangan',
      	]);
      	 Jabatan::create([
          'kode' => 'O',
          'name' => 'Pelaksana Penelitian & Pengmbangan',
      	]);

      	Jabatan::create([
          'kode' => 'P',
          'name' => 'Pelaksana SPI',
      	]);

      	Jabatan::create([
          'kode' => 'Q',
          'name' => 'Pelaksana Teknologi Informasi',
      	]);

      	Jabatan::create([
          'kode' => 'R',
          'name' => 'Pelaksana Humas & Hukum',
      	]);
      	Jabatan::create([
          'kode' => 'S',
          'name' => 'Pelaksana Perencanaan Teknik',
      	]);

      	Jabatan::create([
          'kode' => 'T',
          'name' => 'Pelaksana Produksi  Distribusi',
      	]);
      	Jabatan::create([
          'kode' => 'U',
          'name' => 'Pelaksana Umum',
      	]);

      	Jabatan::create([
          'kode' => 'V',
          'name' => 'Pelaksana Kas',
      	]);

      	Jabatan::create([
          'kode' => 'W',
          'name' => 'Pelaksana Pelayanan Langganan',
      	]);

      	Jabatan::create([
          'kode' => 'X',
          'name' => 'Pelaksana Umum',
      	]);
      	 Jabatan::create([
          'kode' => 'Y',
          'name' => 'Pelaksana Produksi',
      	]);

      	Jabatan::create([
          'kode' => 'Z',
          'name' => 'Pelaksana Distribusi',
      	]);

      	
    }
}
