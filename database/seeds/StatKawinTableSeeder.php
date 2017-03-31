<?php

use Illuminate\Database\Seeder;
use App\Models\StatusPerkawinan;

class StatKawinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        StatusPerkawinan::create([
          'kode' => 'KWN1',
          'name' => 'Belum Menikah',
      	]);

      	StatusPerkawinan::create([
          'kode' => 'KWN2',
          'name' => 'Menikah',
      	]);

      	StatusPerkawinan::create([
          'kode' => 'KWN3',
          'name' => 'Janda',
      	]);

      	StatusPerkawinan::create([
          'kode' => 'KWN4',
          'name' => 'Duda',
      	]);
    }
}
