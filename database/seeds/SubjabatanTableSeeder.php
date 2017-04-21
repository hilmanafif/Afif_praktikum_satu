<?php

use Illuminate\Database\Seeder;
use App\Models\Subjabatan;

class SubjabatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		Subjabatan::create(['jabatan_id' => '1', 		'kode_subjabatan' => 'A-P00',		'kode' => 'P00',		'name' => 'Direktur Utama', ]);
		Subjabatan::create(['jabatan_id' => '2',		'kode_subjabatan' => 'B-P00',		'kode' => 'P00',		'name' => 'Direktur', ]);
		Subjabatan::create(['jabatan_id' => '3',		'kode_subjabatan' => 'C-P01',		'kode' => 'P01',		'name' => 'Kepala', ]);
		Subjabatan::create(['jabatan_id' => '4',		'kode_subjabatan' => 'D-C01',		'kode' => 'C01',		'name' => 'Kepala Cabang', ]);
		Subjabatan::create(['jabatan_id' => '5',		'kode_subjabatan' => 'E-C01',		'kode' => 'C01',		'name' => 'Kepala Cabang', ]);
		Subjabatan::create(['jabatan_id' => '37',		'kode_subjabatan' => 'E-C02',		'kode' => 'C02',		'name' => 'Wakil Kepala Cabang', ]);
		Subjabatan::create(['jabatan_id' => '6',		'kode_subjabatan' => 'F-P01',		'kode' => 'P01',		'name' => 'Kepala Bagian', ]);
		Subjabatan::create(['jabatan_id' => '7',		'kode_subjabatan' => 'G-P02',		'kode' => 'P02',		'name' => 'Kepala Sub Bagian', ]);
		Subjabatan::create(['jabatan_id' => '38',		'kode_subjabatan' => 'H-C01',		'kode' => 'C01',		'name' => 'Kepala Unit', ]);
		Subjabatan::create(['jabatan_id' => '8',		'kode_subjabatan' => 'H-C02',		'kode' => 'C02',		'name' => 'Kepala Seksi', ]);
		Subjabatan::create(['jabatan_id' => '49',		'kode_subjabatan' => 'J-C01',		'kode' => 'C01',		'name' => 'Kepala Urusan', ]);
		Subjabatan::create(['jabatan_id' => '10',		'kode_subjabatan' => 'J-C02',		'kode' => 'C02',		'name' => 'Kepala Sub Seksi', ]);
		Subjabatan::create(['jabatan_id' => '43',		'kode_subjabatan' => 'K-P09',		'kode' => 'P09',		'name' => 'Pelaksana (Tugas Belajar)', ]);
		Subjabatan::create(['jabatan_id' => '22',		'kode_subjabatan' => 'K-P10',		'kode' => 'P10',		'name' => 'Pelaksana SPI', ]);
		Subjabatan::create(['jabatan_id' => '23',		'kode_subjabatan' => 'K-P11',		'kode' => 'P11',		'name' => 'Pelaksana Litbang', ]);
		Subjabatan::create(['jabatan_id' => '24',		'kode_subjabatan' => 'K-P12',		'kode' => 'P12',		'name' => 'Pelaksana Produksi', ]);
		Subjabatan::create(['jabatan_id' => '25',		'kode_subjabatan' => 'K-P13',		'kode' => 'P13',		'name' => 'Pelaksana Tekn. Inf', ]);
		Subjabatan::create(['jabatan_id' => '26',		'kode_subjabatan' => 'K-P14',		'kode' => 'P14',		'name' => 'Pelaksana Perencanaan', ]);
		Subjabatan::create(['jabatan_id' => '27',		'kode_subjabatan' => 'K-P15',		'kode' => 'P15',		'name' => 'Pelaksana Keuangan', ]);
		Subjabatan::create(['jabatan_id' => '28',		'kode_subjabatan' => 'K-P16',		'kode' => 'P16',		'name' => 'Pelaksana Humas & Hukum', ]);
		Subjabatan::create(['jabatan_id' => '29',		'kode_subjabatan' => 'K-P17',		'kode' => 'P17',		'name' => 'Pelaksana Personalia', ]);
		Subjabatan::create(['jabatan_id' => '30',		'kode_subjabatan' => 'K-P18',		'kode' => 'P18',		'name' => 'Pelaksana Umum', ]);
		Subjabatan::create(['jabatan_id' => '31',		'kode_subjabatan' => 'K-P19',		'kode' => 'P19',		'name' => 'Pelaksana Pengemudi', ]);
		Subjabatan::create(['jabatan_id' => '32',		'kode_subjabatan' => 'K-P20',		'kode' => 'P20',		'name' => 'Pelaksana Satpam Pusat', ]);
		Subjabatan::create(['jabatan_id' => '34',		'kode_subjabatan' => 'K-P21',		'kode' => 'P21',		'name' => 'Pelaksana Pembantu Umum', ]);
		Subjabatan::create(['jabatan_id' => '45',		'kode_subjabatan' => 'K-P22',		'kode' => 'P22',		'name' => 'Pelaksana (Tugas Belajar)', ]);
		Subjabatan::create(['jabatan_id' => '12',		'kode_subjabatan' => 'L-C03',		'kode' => 'C03',		'name' => 'Pelaksana Produksi', ]);
		Subjabatan::create(['jabatan_id' => '13',		'kode_subjabatan' => 'M-C03',		'kode' => 'C03',		'name' => 'Pelaksana Distribusi', ]);
		Subjabatan::create(['jabatan_id' => '14',		'kode_subjabatan' => 'N-C03',		'kode' => 'C03',		'name' => 'Pel. Produksi & Distribusi', ]);
		Subjabatan::create(['jabatan_id' => '15',		'kode_subjabatan' => 'O-C03',		'kode' => 'C03',		'name' => 'Pel. Umum', ]);
		Subjabatan::create(['jabatan_id' => '16',		'kode_subjabatan' => 'P-C03',		'kode' => 'C03',		'name' => 'Pel. Kas', ]);
		Subjabatan::create(['jabatan_id' => '17',		'kode_subjabatan' => 'Q-C03',		'kode' => 'C03',		'name' => 'Pel. Pelayanan Langganan', ]);
		Subjabatan::create(['jabatan_id' => '47',		'kode_subjabatan' => 'R-C02',		'kode' => 'C02',		'name' => 'Pel. Pembaca Meter', ]);
		Subjabatan::create(['jabatan_id' => '18',		'kode_subjabatan' => 'R-C03',		'kode' => 'C03',		'name' => 'Pel. Pembaca Meter', ]);
		Subjabatan::create(['jabatan_id' => '21',		'kode_subjabatan' => 'S-C03',		'kode' => 'C03',		'name' => 'Satpam Cabang', ]);
		Subjabatan::create(['jabatan_id' => '19',		'kode_subjabatan' => 'T-C03',		'kode' => 'C03',		'name' => 'Pel. Pembantu Umum', ]);
		Subjabatan::create(['jabatan_id' => '20',		'kode_subjabatan' => 'U-C03',		'kode' => 'C03',		'name' => 'Pelaksana IPAL Cisirung', ]);

    }
}
