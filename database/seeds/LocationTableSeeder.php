<?php
use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{

    public function run()
    {
      Location::create([
          'name' => 'Kantor Pusat',
          'address' => 'Jl. MH. Thamrin Kav 24 Lantai 24',
          'city' => 'Jakarta',
          'company_id' => 1,
          'timezone_id' => 1,
          'lat' => '-6.1884239',
          'long' => '106.8222151',
      ]);
      Location::create([
          'name' => 'Kantor Cabang Bandung',
          'address' => 'Jl. Citarum No. 24',
          'city' => 'Bandung',
          'company_id' => 1,
          'timezone_id' => 1,
          'lat' => '-6.9032843',
          'long' => '107.6230417',
      ]);
    }
}
