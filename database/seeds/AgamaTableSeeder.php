<?php

use Illuminate\Database\Seeder;
use App\Models\Agama;

class AgamaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agama::create([
          'kode' => 'AGM1',
          'name' => 'Islam',
      	]);

      	Agama::create([
          'kode' => 'AGM2',
          'name' => 'Kristen Protestan',
      	]);

      	Agama::create([
          'kode' => 'AGM3',
          'name' => 'Katolik',
      	]);

      	Agama::create([
          'kode' => 'AGM4',
          'name' => 'Hindu',
      	]);

      	Agama::create([
          'kode' => 'AGM5',
          'name' => 'Budha',
      	]);

      	Agama::create([
          'kode' => 'AGM6',
          'name' => 'Konghucu',
      	]);
    }
}

