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
          'kode_umum' => 'A',
          'kode' => 'A-P00',
          'name' => 'Direktur Utama',
          'name_umum' => 'Direktur',
          'Tunjab' => '0',
          'Tunpres' => '',
          'Tupel' => '570313',
          'Turam' => '1200000',
      	]);

      	Jabatan::create([
          'kode_umum' => 'B',
          'kode' => 'B-P00',
          'name' => 'Direktur',
          'name_umum' => 'Direktur',
          'Tunjab' => '0',
          'Tunpres' => '0',
          'Tupel' => '513282',
          'Turam' => '1080000',
        ]);

      	Jabatan::create([
          'kode_umum' => 'C',
          'kode' => 'C-P01',
          'name' => 'Kepala',
          'name_umum' => 'Kepala',
          'Tunjab' => '1500000',
          'Tunpres' => '3062500',
          'Tupel' => '212500',
          'Turam' => '200000',
        ]);

      	Jabatan::create([
          'kode_umum' => 'D',
          'kode' => 'D-C01',
          'name' => 'Kepala Cabang',
          'name_umum' => 'Kepala',
          'Tunjab' => '1500000',
          'Tunpres' => '3062500',
          'Tupel' => '228,125',
          'Turam' => '200000',
        ]);

      	 Jabatan::create([
          'kode_umum' => 'E',
          'kode' => 'E-C01',
          'name' => 'Kepala Cabang',
          'name_umum' => 'Kepala',
          'Tunjab' => '1500000',
          'Tunpres' => '3062500',
          'Tupel' => '228,125',
          'Turam' => '200000',
        ]);

      	Jabatan::create([
          'kode_umum' => 'E',
          'kode' => 'E-C02',
          'name' => 'Wakil Kepala Cabang',
          'name_umum' => 'kepala',
          'Tunjab' => '1425000',
          'Tunpres' => '3062500',
          'Tupel' => '212500',
          'Turam' => '200000',
        ]);

      	Jabatan::create([
          'kode_umum' => 'F',
          'kode' => 'F-P01',
          'name' => 'Kepala Bagian',
          'name_umum' => 'Kepala',
          'Tunjab' => '1500000',
          'Tunpres' => '1500000',
          'Tupel' => '212500',
          'Turam' => '200000',
        ]);

      	Jabatan::create([
          'kode_umum' => 'G',
          'kode' => 'G-P02',
          'name' => 'Kepala Sub Bagian',
          'name_umum' => 'Kepala',
          'Tunjab' => '800000',
          'Tunpres' => '1451250',
          'Tupel' => '139700',
          'Turam' => '150000',
        ]);
      	
        Jabatan::create([
          'kode_umum' => 'H',
          'kode' => 'H-C01',
          'name' => 'Kepala Unit',
          'name_umum' => 'Kepala',
          'Tunjab' => '900,000',
          'Tunpres' => '1,788,750',
          'Tupel' => '164,375',
          'Turam' => '150,000',
        ]);

      	Jabatan::create([
          'kode_umum' => 'H',
          'kode' => 'H-C02',
          'name' => 'Kepala Seksi',
          'name_umum' => 'Kepala',
          'Tunjab' => '800,000',
          'Tunpres' => '1,451,250',
          'Tupel' => '139,700',
          'Turam' => '150,000',
        ]);

      	Jabatan::create([
          'kode_umum' => 'J',
          'kode' => 'J-C01',
          'name' => 'Kepala Urusan',
          'name_umum' => 'Kepala',
          'Tunjab' => '475000',
          'Tunpres' => '1225000',
          'Tupel' => '122200',
          'Turam' => '125000',
        ]);

      	Jabatan::create([
          'kode_umum' => 'J',
          'kode' => 'J-C02',
          'name' => 'Kepala Sub Seksi',
          'name_umum' => 'Kepala',
          'Tunjab' => '475000',
          'Tunpres' => '1225000',
          'Tupel' => '122200',
          'Turam' => '125000',
        ]);

      	Jabatan::create([
          'kode_umum' => 'K',
          'kode' => 'K-P09',
          'name' => 'Pelaksana (Tugas Belajar)',
          'name_umum' => 'Pelaksana',
          'Tunjab' => '0',
          'Tunpres' => '725000',
          'Tupel' => '0',
          'Turam' => '100000',
        ]);

      	Jabatan::create([
          'kode_umum' => 'K',
          'kode' => 'K-P10',
          'name' => 'Pelaksana SPI',
          'name_umum' => 'Pelaksana',
          'Tunjab' => '0',
          'Tunpres' => '725000',
          'Tupel' => '0',
          'Turam' => '100000',
        ]);

      	Jabatan::create([
          'kode_umum' => 'K',
          'kode' => 'K-P11',
          'name' => 'Pelaksana Litbang',
          'name_umum' => 'Pelaksana',
          'Tunjab' => '0',
          'Tunpres' => '725000',
          'Tupel' => '0',
          'Turam' => '100000',
        ]);

      	Jabatan::create([
          'kode_umum' => 'K',
          'kode' => 'K-P12',
          'name' => 'Pelaksana Produksi',
          'name_umum' => 'Pelaksana',
          'Tunjab' => '0',
          'Tunpres' => '725000',
          'Tupel' => '0',
          'Turam' => '100000',
        ]);

      	Jabatan::create([
          'kode_umum' => 'K',
          'kode' => 'K-P13',
          'name' => 'Pelaksana Tekn. Inf',
          'name_umum' => 'Pelaksana',
          'Tunjab' => '0',
          'Tunpres' => '725000',
          'Tupel' => '0',
          'Turam' => '100000',
        ]);

      	Jabatan::create([
          'kode_umum' => 'K',
          'kode' => 'K-P14',
          'name' => 'Pelaksana Perencanaan',
          'name_umum' => 'Pelaksana',
          'Tunjab' => '0',
          'Tunpres' => '725000',
          'Tupel' => '0',
          'Turam' => '100000',
        ]);

      	Jabatan::create([
          'kode_umum' => 'K',
          'kode' => 'K-P15',
          'name' => 'Pelaksana Keuangan',
          'name_umum' => 'Pelaksana',
          'Tunjab' => '0',
          'Tunpres' => '725000',
          'Tupel' => '0',
          'Turam' => '100000',
        ]);

      	Jabatan::create([
          'kode_umum' => 'K',
          'kode' => 'K-P16',
          'name' => 'Pelaksana Humas & Hukum',
          'name_umum' => 'Pelaksana',
          'Tunjab' => '0',
          'Tunpres' => '725000',
          'Tupel' => '0',
          'Turam' => '100000',
        ]);

        Jabatan::create([
          'kode_umum' => 'K',
          'kode' => 'K-P17',
          'name' => 'Pelaksana Personalia',
          'name_umum' => 'Pelaksana',
          'Tunjab' => '0',
          'Tunpres' => '725000',
          'Tupel' => '0',
          'Turam' => '100000',
        ]);

        Jabatan::create([
          'kode_umum' => 'K',
          'kode' => 'K-P18',
          'name' => 'Pelaksana Umum',
          'name_umum' => 'Pelaksana',
          'Tunjab' => '0',
          'Tunpres' => '725000',
          'Tupel' => '0',
          'Turam' => '100000',
        ]);

        Jabatan::create([
          'kode_umum' => 'K',
          'kode' => 'K-P19',
          'name' => 'Pelaksana Pengemudi',
          'name_umum' => 'Pelaksana',
          'Tunjab' => '0',
          'Tunpres' => '725000',
          'Tupel' => '0',
          'Turam' => '100000',
        ]);

        Jabatan::create([
          'kode_umum' => 'K',
          'kode' => 'K-P20',
          'name' => 'Pelaksana Satpam Pusat',
          'name_umum' => 'Pelaksana',
          'Tunjab' => '0',
          'Tunpres' => '725000',
          'Tupel' => '0',
          'Turam' => '100000',
        ]);

        Jabatan::create([
          'kode_umum' => 'K',
          'kode' => 'K-P21',
          'name' => 'Pelaksana Pembantu Umum',
          'name_umum' => 'Pelaksana',
          'Tunjab' => '0',
          'Tunpres' => '725000',
          'Tupel' => '0',
          'Turam' => '100000',
        ]);

        Jabatan::create([
          'kode_umum' => 'K',
          'kode' => 'K-P22',
          'name' => 'Pelaksana (Tugas Belajar)',
          'name_umum' => 'Pelaksana',
          'Tunjab' => '0',
          'Tunpres' => '0',
          'Tupel' => '0',
          'Turam' => '100000',
        ]);

        Jabatan::create([
          'kode_umum' => 'L',
          'kode' => 'L-C03',
          'name' => 'Pelaksana Produksi',
          'name_umum' => 'Pelaksana',
          'Tunjab' => '0',
          'Tunpres' => '725000',
          'Tupel' => '0',
          'Turam' => '100000',
        ]);

        Jabatan::create([
          'kode_umum' => 'M',
          'kode' => 'M-C03',
          'name' => 'Pelaksana Distribusi',
          'name_umum' => 'Pelaksana',
          'Tunjab' => '0',
          'Tunpres' => '725000',
          'Tupel' => '0',
          'Turam' => '100000',
        ]);

        Jabatan::create([
          'kode_umum' => 'N',
          'kode' => 'N-C03',
          'name' => 'Pel. Produksi & Distribusi',
          'name_umum' => 'Pelaksana',
          'Tunjab' => '0',
          'Tunpres' => '725000',
          'Tupel' => '0',
          'Turam' => '100000',
        ]);

        Jabatan::create([
          'kode_umum' => 'O',
          'kode' => 'O-C03',
          'name' => 'Pel. Umum',
          'name_umum' => 'Pelaksana',
          'Tunjab' => '0',
          'Tunpres' => '725000',
          'Tupel' => '0',
          'Turam' => '100000',
        ]);

        Jabatan::create([
          'kode_umum' => 'P',
          'kode' => 'P-C03',
          'name' => 'Pel. Kas',
          'name_umum' => 'Pelaksana',
          'Tunjab' => '0',
          'Tunpres' => '725000',
          'Tupel' => '0',
          'Turam' => '100000',
        ]);

        Jabatan::create([
          'kode_umum' => 'Q',
          'kode' => 'Q-C03',
          'name' => 'Pel. Pelayanan Langganan',
          'name_umum' => 'Pelaksana',
          'Tunjab' => '0',
          'Tunpres' => '725000',
          'Tupel' => '0',
          'Turam' => '100000',
        ]);

        Jabatan::create([
          'kode_umum' => 'R',
          'kode' => 'R-C02',
          'name' => 'Pel. Pembaca Meter',
          'name_umum' => 'Pelaksana',
          'Tunjab' => '0',
          'Tunpres' => '725000',
          'Tupel' => '0',
          'Turam' => '100000',
        ]);

        Jabatan::create([
          'kode_umum' => 'R',
          'kode' => 'R-C03',
          'name' => 'Pel. Pembaca Meter',
          'name_umum' => 'Pelaksana',
          'Tunjab' => '0',
          'Tunpres' => '725000',
          'Tupel' => '0',
          'Turam' => '100000',
        ]);

        Jabatan::create([
          'kode_umum' => 'S',
          'kode' => 'S-C03',
          'name' => 'Satpam Cabang',
          'name_umum' => 'Pelaksana',
          'Tunjab' => '0',
          'Tunpres' => '725000',
          'Tupel' => '0',
          'Turam' => '100000',
        ]);

        Jabatan::create([
          'kode_umum' => 'T',
          'kode' => 'T-C03',
          'name' => 'Pel. Pembantu Umum',
          'name_umum' => 'Pelaksana',
          'Tunjab' => '0',
          'Tunpres' => '725000',
          'Tupel' => '0',
          'Turam' => '100000',
        ]);

        Jabatan::create([
          'kode_umum' => 'U',
          'kode' => 'U-C03',
          'name' => 'Pelaksana IPAL Cisirung',
          'name_umum' => 'Pelaksana',
          'Tunjab' => '0',
          'Tunpres' => '725000',
          'Tupel' => '0',
          'Turam' => '100000',
        ]);

      	
    }
}
