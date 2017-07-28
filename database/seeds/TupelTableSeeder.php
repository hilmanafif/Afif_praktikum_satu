<?php

use Illuminate\Database\Seeder;
use App\Models\Tupel;

class TupelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tupel::create([
          'tupel' => 0,
          'tukebar' => 0,
          'tujkinerja' => 0,
          'jabatan' => 'Direktur Utama',
          'jabatan_id' => 0
        ]);
        Tupel::create([
          'tupel' => 0,
          'tukebar' => 0,
          'tujkinerja' => 0,
          'jabatan' => 'Direktur Bidang',
          'jabatan_id' => 0
        ]);
        Tupel::create([
          'tupel' => 0,
          'tukebar' => 0,
          'tujkinerja' => 0,
          'jabatan' => 'Kepala Cabang',
          'jabatan_id' => 0
        ]);
        Tupel::create([
          'tupel' => 0,
          'tukebar' => 0,
          'tujkinerja' => 0,
          'jabatan' => 'Kepala Bidang',
          'jabatan_id' => 0
        ]);
        Tupel::create([
          'tupel' => 0,
          'tukebar' => 0,
          'tujkinerja' => 0,
          'jabatan' => 'Kepala Bagian',
          'jabatan_id' => 0
        ]);
        Tupel::create([
          'tupel' => 0,
          'tukebar' => 0,
          'tujkinerja' => 0,
          'jabatan' => 'Kepala Unit',
          'jabatan_id' => 0
        ]);
        Tupel::create([
          'tupel' => 0,
          'tukebar' => 0,
          'tujkinerja' => 0,
          'jabatan' => 'Ka. Seksi',
          'jabatan_id' => 0
        ]);
        Tupel::create([
          'tupel' => 0,
          'tukebar' => 0,
          'tujkinerja' => 0,
          'jabatan' => 'Ka.Sub.Bid',
          'jabatan_id' => 0
        ]);
        Tupel::create([
          'tupel' => 0,
          'tukebar' => 0,
          'tujkinerja' => 0,
          'jabatan' => 'Ka.Sub.Bag',
          'jabatan_id' => 0
        ]);
        Tupel::create([
          'tupel' => 0,
          'tukebar' => 0,
          'tujkinerja' => 0,
          'jabatan' => 'Ka.Sub.Sie',
          'jabatan_id' => 0
        ]);
        Tupel::create([
          'tupel' => 0,
          'tukebar' => 0,
          'tujkinerja' => 0,
          'jabatan' => 'Kontrak',
          'jabatan_id' => 0
        ]);
        Tupel::create([
          'tupel' => 100000,
          'tukebar' => 78000,
          'tujkinerja' => 725000,
          'jabatan' => 'Pelaksana 1',
          'jabatan_id' => 0
        ]);
        Tupel::create([
          'tupel' => 200000,
          'tukebar' => 83000,
          'tujkinerja' => 725000,
          'jabatan' => 'Pelaksana 2',
          'jabatan_id' => 0
        ]);
        Tupel::create([
          'tupel' => 300000,
          'tukebar' => 88000,
          'tujkinerja' => 725000,
          'jabatan' => 'Pelaksana 3',
          'jabatan_id' => 0
        ]);
        Tupel::create([
          'tupel' => 400000,
          'tukebar' => 93000,
          'tujkinerja' => 725000,
          'jabatan' => 'Pelaksana 4',
          'jabatan_id' => 0
        ]);

    }
}
