<?php

use Illuminate\Database\Seeder;
use App\Models\GolonganDarah;

class GolDarahTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        GolonganDarah::create([
          'name' => 'A',
      	]);

      	GolonganDarah::create([
          'name' => 'B',
      	]);

      	GolonganDarah::create([
         'name' => 'O',
      	]);

      	GolonganDarah::create([
         'name' => 'AB',
      	]);

      	GolonganDarah::create([
          'name' => 'AB-',
      	]);

      	GolonganDarah::create([
          'name' => 'AB+',
      	]);
    }
}
