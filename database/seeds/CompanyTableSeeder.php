<?php

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    public function run()
    {
      /* Default
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
          'officer_position' => '',
          'officer_name' => ''
      ]);
      */
      // Deployment untuk PDAM
      Company::create([
          'name' => 'PDAM Tirtaraharja',
          'tax' => '02.130.0367009',
          'reg' => '180/7009/SIUP-K/341.23/2015',
          'phone' => '+6222-6654184',
          'fax' => '+6222-6654298',
          'address1' => 'Jl. Kol. Masturi Km.3 Cipageran',
          'address2' => '',
          'city' => 'Cimahi',
          'province' => 'Jawa Barat',
          'zip' => '40102',
          'country' => 'Indonesia',
          'logo_file_name' => 'tirta-raharja.jpg',
          'timezone' => 'GMT+7',
          'currency' => 'Rp.',
          'officer_position' => 'Kepala Bagian SDM',
          'officer_name' => 'Heri Rahendra, SmHk. SSos'
      ]);
    }
}
