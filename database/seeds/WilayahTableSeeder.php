<?php

use Illuminate\Database\Seeder;
use App\Models\Wilayah;

class WilayahTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Wilayah::create([
          'kode' => '0A',
          'name' => 'Pusat',
          'address' => '-',
      	]);

      	Wilayah::create([
          'kode' => '1A',
          'name' => 'Wilayah Cabang I KP.Soreang',
          'address' => '-',
      	]);

      	Wilayah::create([
          'kode' => '1B',
          'name' => 'Cabang I Unit Banjaran',
          'address' => '-',
      	]);

      	Wilayah::create([
          'kode' => '1C',
          'name' => 'Cabang I   KP. Ciwidey',
          'address' => '-',
      	]);
      	 Wilayah::create([
          'kode' => '1D',
          'name' => 'Cabang I   Unit Pangalengan',
          'address' => '-',
      	]);

      	Wilayah::create([
          'kode' => '2A',
          'name' => 'Cabang II  KP. Ciparay',
          'address' => '-',
      	]);

      	Wilayah::create([
          'kode' => '2B',
          'name' => 'Cabang II  Unit Bojong Soang',
          'address' => '-',
      	]);

      	Wilayah::create([
          'kode' => '2C',
          'name' => 'Cabang II  Unit Baleendah',
          'address' => '-',
      	]);
      	Wilayah::create([
          'kode' => '2D',
          'name' => 'Cabang II  KP. Pacet',
          'address' => '-',
      	]);

      	Wilayah::create([
          'kode' => '3A',
          'name' => 'Cabang III  KP. Majalaya',
          'address' => '-',
      	]);
      	Wilayah::create([
          'kode' => '3B',
          'name' => 'Cabang III KP. Cicalengka',
          'address' => '-',
      	]);

      	Wilayah::create([
          'kode' => '3C',
          'name' => 'Cabang III KP. Cileunyi',
          'address' => '-',
      	]);

      	Wilayah::create([
          'kode' => '3D',
          'name' => 'Cabang III Unit Rancaekek',
          'address' => '-',
      	]);

      	Wilayah::create([
          'kode' => '3E',
          'name' => 'Cabang III  KP. Paseh',
          'address' => '-',
      	]);
      	 Wilayah::create([
          'kode' => '4A',
          'name' => 'Cabang IV   KP. Padalarang',
          'address' => '-',
      	]);

      	Wilayah::create([
          'kode' => '4B',
          'name' => 'Cabang IV   Unit Cisarua',
          'address' => '-',
      	]);

      	Wilayah::create([
          'kode' => '4C',
          'name' => 'Cabang IV   Unit Lembang',
          'address' => '-',
      	]);

      	Wilayah::create([
          'kode' => '4D',
          'name' => 'Cabang IV Unit Cililin',
          'address' => '-',
      	]);
      	Wilayah::create([
          'kode' => '4E',
          'name' => 'Cabang IV KP. Cikalong Wetan',
          'address' => '-',
      	]);

      	Wilayah::create([
          'kode' => '5A',
          'name' => 'Cabang V KP. Cimahi',
          'address' => '-',
      	]);
    }
}
