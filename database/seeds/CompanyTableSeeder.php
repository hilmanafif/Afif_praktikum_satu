<?php

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    public function run()
    {
      Company::create([
          'name' => 'PT Bintang Kelabu',
          'tax' => '02.130.0367009',
          'reg' => '180/7009/SIUP-K/341.23/2015',
          'phone' => '022650982001',
          'fax' => '022650982001',
          'address1' => 'Jl. Siliwangi 24',
          'address2' => '',
          'city' => 'Bandung',
          'province' => 'Jawa Barat',
          'zip' => '40102',
          'country' => 'Indonesia',
          'logo' => '',
          'timezone' => 'GMT+7',
          'currency' => 'Rp.',
      ]);
    }
}
