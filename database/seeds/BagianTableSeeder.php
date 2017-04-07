<?php

use Illuminate\Database\Seeder;
use App\Models\Bagian;

class BagianTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Bagian::create([ 'kode' => '	1000000000	', 'name' => '	PDAM Tirta Raharja Kabupaten Bandung	', 'id_parent' => '	Direktur Utama	', ]);
Bagian::create([ 'kode' => '	1001000000	', 'name' => '	Bidang Teknik	', 'id_parent' => '	Direktur Teknik	', ]);
Bagian::create([ 'kode' => '	1001010000	', 'name' => '	Bagian Perencanaan Teknik	', 'id_parent' => '	Kepala Bagian Perencanaan Teknik	', ]);
Bagian::create([ 'kode' => '	1001010100	', 'name' => '	Sub Bagian Perencanaan Teknik	', 'id_parent' => '	Kepala Sub Bagian Perencanaan Teknik	', ]);
Bagian::create([ 'kode' => '	1001010200	', 'name' => '	Sub Bagian Dokumentasi	', 'id_parent' => '	Kepala Sub Bagian Dokumentasi	', ]);
Bagian::create([ 'kode' => '	1001010300	', 'name' => '	Sub Bagian Monitoring & Evaluasi	', 'id_parent' => '	Kepala Sub Bagian Monitoring & Evaluasi	', ]);
Bagian::create([ 'kode' => '	1001020000	', 'name' => '	Bagian Produksi Distribusi	', 'id_parent' => '	Kepala Bagian Produksi Distribusi	', ]);
Bagian::create([ 'kode' => '	1001020100	', 'name' => '	Sub Bagian Produksi dan Distribusi Wilayah I	', 'id_parent' => '	Kepala Sub Bagian Produksi dan Distribusi Wilayah I	', ]);
Bagian::create([ 'kode' => '	1001020200	', 'name' => '	Sub Bagian Produksi dan Distribusi Wilayah II	', 'id_parent' => '	Kepala Sub Bagian Produksi dan Distribusi Wilayah II	', ]);
Bagian::create([ 'kode' => '	1001020300	', 'name' => '	Sub Bagian Laboratorium dan Meter Air	', 'id_parent' => '	Kepala Sub Bagian Laboratorium dan Meter Air	', ]);
Bagian::create([ 'kode' => '	1001030000	', 'name' => '	Bagian Teknologi Informasi dan Pengolahan Data	', 'id_parent' => '	Kepala Bagian Teknologi Informasi dan Pengolahan Data	', ]);
Bagian::create([ 'kode' => '	1001030100	', 'name' => '	Sub Bagian Pengembangan dan Pemeliharaan	', 'id_parent' => '	Kepala Sub Bagian Pengembangan dan Pemeliharaan	', ]);
Bagian::create([ 'kode' => '	1001030200	', 'name' => '	Sub Bagian Pengolahan Data	', 'id_parent' => '	Kepala Sub Bagian Pengolahan Data	', ]);
Bagian::create([ 'kode' => '	1002000000	', 'name' => '	Bidang Umum	', 'id_parent' => '	Direktur Umum	', ]);
Bagian::create([ 'kode' => '	1002010000	', 'name' => '	Bagian Umum	', 'id_parent' => '	Kepala Bagian Umum	', ]);
Bagian::create([ 'kode' => '	1002010100	', 'name' => '	Sub Bagian Logistik	', 'id_parent' => '	Kepala Sub Bagian Logistik	', ]);
Bagian::create([ 'kode' => '	1002010200	', 'name' => '	Sub Bagian Rumah Tangga dan Kesekretariatan	', 'id_parent' => '	Kepala Sub Bagian Rumah Tangga dan Kesekretariatan	', ]);
Bagian::create([ 'kode' => '	1002010300	', 'name' => '	Sub Bagian Perlengkapan	', 'id_parent' => '	Kepala Sub Bagian Perlengkapan	', ]);
Bagian::create([ 'kode' => '	1002020000	', 'name' => '	Bagian SDM	', 'id_parent' => '	Kepala Bagian SDM	', ]);
Bagian::create([ 'kode' => '	1002020100	', 'name' => '	Sub Bagian Administrasi SDM	', 'id_parent' => '	Kepala Sub Bagian Administrasi SDM	', ]);
Bagian::create([ 'kode' => '	1002020200	', 'name' => '	Sub Bagian Pembinaan dan Pengembangan SDM	', 'id_parent' => '	Kepala Sub Bagian Pembinaan dan Pengembangan SDM	', ]);
Bagian::create([ 'kode' => '	1002030000	', 'name' => '	Bagian Hubungan Masyarakat & Hukum	', 'id_parent' => '	Kepala Bagian Hubungan Masyarakat & Hukum	', ]);
Bagian::create([ 'kode' => '	1002030100	', 'name' => '	Sub Bagian Hukum	', 'id_parent' => '	Kepala Sub Bagian Hukum	', ]);
Bagian::create([ 'kode' => '	1002030200	', 'name' => '	Sub Bagian Informasi dan Publikasi	', 'id_parent' => '	Kepala Sub Bagian Informasi dan Publikasi	', ]);
Bagian::create([ 'kode' => '	1002030300	', 'name' => '	Sub Bagian Pemasaran	', 'id_parent' => '	Kepala Sub Bagian Pemasaran	', ]);
Bagian::create([ 'kode' => '	1002040000	', 'name' => '	Bagian Keuangan	', 'id_parent' => '	Kepala Bagian Keuangan	', ]);
Bagian::create([ 'kode' => '	1002040100	', 'name' => '	Sub Bagian Anggaran	', 'id_parent' => '	Kepala Sub Bagian Anggaran	', ]);
Bagian::create([ 'kode' => '	1002040200	', 'name' => '	Sub Bagian Kas	', 'id_parent' => '	Kepala Sub Bagian Kas	', ]);
Bagian::create([ 'kode' => '	1002040300	', 'name' => '	Sub Bagian Akuntansi	', 'id_parent' => '	Kepala Sub Bagian Akuntansi	', ]);
Bagian::create([ 'kode' => '	1003000000	', 'name' => '	Satuan Pengawasan Intern	', 'id_parent' => '	Kepala Satuan Pengawasan Intern	', ]);
Bagian::create([ 'kode' => '	1003010000	', 'name' => '	Sub Bidang Pengawasan Umum	', 'id_parent' => '	Kepala Sub Bidang Pengawasan Umum	', ]);
Bagian::create([ 'kode' => '	1003020000	', 'name' => '	Sub Bidang Pengawasan Teknik	', 'id_parent' => '	Kepala Sub Bidang Pengawasan Teknik	', ]);
Bagian::create([ 'kode' => '	1004000000	', 'name' => '	Penelitian dan Pengembangan	', 'id_parent' => '	Kepala Penelitian dan Pengembangan	', ]);
Bagian::create([ 'kode' => '	1004010000	', 'name' => '	Sub Bidang Litbang Teknik	', 'id_parent' => '	Kepala Sub Bidang Litbang Teknik	', ]);
Bagian::create([ 'kode' => '	1004020000	', 'name' => '	Sub Bidang Litbang Umum	', 'id_parent' => '	Kepala Sub Bidang Litbang Umum	', ]);
Bagian::create([ 'kode' => '	1005000000	', 'name' => '	Cabang I	', 'id_parent' => '	Kepala Cabang I	', ]);
Bagian::create([ 'kode' => '	1005010000	', 'name' => '	Wakil Cabang I	', 'id_parent' => '	Wakil Kepala Cabang I	', ]);
Bagian::create([ 'kode' => '	1005020000	', 'name' => '	Seksi Teknik	', 'id_parent' => '	Kepala Seksi Teknik	', ]);
Bagian::create([ 'kode' => '	1005020100	', 'name' => '	Sub Seksi Produksi	', 'id_parent' => '	Kepala Sub Seksi Produksi	', ]);
Bagian::create([ 'kode' => '	1005020200	', 'name' => '	Sub Seksi Distribusi	', 'id_parent' => '	Kepala Sub Seksi Distribusi	', ]);
Bagian::create([ 'kode' => '	1005030000	', 'name' => '	Seksi Pelayanan dan Umum	', 'id_parent' => '	Kepala Seksi Pelayanan dan Umum	', ]);
Bagian::create([ 'kode' => '	1005030100	', 'name' => '	Sub Seksi Pelayanan dan Penagihan	', 'id_parent' => '	Kepala Sub Seksi Pelayanan dan Penagihan	', ]);
Bagian::create([ 'kode' => '	1005030200	', 'name' => '	Sub Seksi Kas dan Umum	', 'id_parent' => '	Kepala Sub Seksi Kas dan Umum	', ]);
Bagian::create([ 'kode' => '	1005040000	', 'name' => '	KP Soreang	', 'id_parent' => '	Kepala KP Soreang	', ]);
Bagian::create([ 'kode' => '	1005050000	', 'name' => '	Unit Banjaran	', 'id_parent' => '	Kepala Unit Banjaran	', ]);
Bagian::create([ 'kode' => '	1005050100	', 'name' => '	Urusan Teknik	', 'id_parent' => '	Kepala Urusan Teknik	', ]);
Bagian::create([ 'kode' => '	1005050200	', 'name' => '	Urusan Pelayanan dan Umum	', 'id_parent' => '	Kepala Urusan Pelayanan dan Umum	', ]);
Bagian::create([ 'kode' => '	1005060000	', 'name' => '	KP Ciwidey	', 'id_parent' => '	Kepala KP Ciwidey	', ]);
Bagian::create([ 'kode' => '	1005070000	', 'name' => '	Unit Pangalengan	', 'id_parent' => '	Kepala Unit Pangalengan	', ]);
Bagian::create([ 'kode' => '	1005070100	', 'name' => '	Urusan Teknik	', 'id_parent' => '	Kepala Urusan Teknik	', ]);
Bagian::create([ 'kode' => '	1005070200	', 'name' => '	Urusan Pelayanan dan Umum	', 'id_parent' => '	Kepala Urusan Pelayanan dan Umum	', ]);
Bagian::create([ 'kode' => '	1006000000	', 'name' => '	Cabang II	', 'id_parent' => '	Kepala Cabang II	', ]);
Bagian::create([ 'kode' => '	1006010000	', 'name' => '	Wakil Cabang II	', 'id_parent' => '	Wakil Kepala Cabang II	', ]);
Bagian::create([ 'kode' => '	1006020000	', 'name' => '	Seksi Teknik	', 'id_parent' => '	Kepala Seksi Teknik	', ]);
Bagian::create([ 'kode' => '	1006020100	', 'name' => '	Sub Seksi Produksi	', 'id_parent' => '	Kepala Sub Seksi Produksi	', ]);
Bagian::create([ 'kode' => '	1006020200	', 'name' => '	Sub Seksi Distribusi	', 'id_parent' => '	Kepala Sub Seksi Distribusi	', ]);
Bagian::create([ 'kode' => '	1006030000	', 'name' => '	Seksi Pelayanan dan Umum	', 'id_parent' => '	Kepala Seksi Pelayanan dan Umum	', ]);
Bagian::create([ 'kode' => '	1006030100	', 'name' => '	Sub Seksi Pelayanan dan Penagihan	', 'id_parent' => '	Kepala Sub Seksi Pelayanan dan Penagihan	', ]);
Bagian::create([ 'kode' => '	1006030200	', 'name' => '	Sub Seksi Kas dan Umum	', 'id_parent' => '	Kepala Sub Seksi Kas dan Umum	', ]);
Bagian::create([ 'kode' => '	1006040000	', 'name' => '	KP Ciparay	', 'id_parent' => '	Kepala KP Ciparay	', ]);
Bagian::create([ 'kode' => '	1006050000	', 'name' => '	Unit Bojong Soang	', 'id_parent' => '	Kepala Unit Bojong Soang	', ]);
Bagian::create([ 'kode' => '	1006050100	', 'name' => '	Urusan Teknik	', 'id_parent' => '	Kepala Urusan Teknik	', ]);
Bagian::create([ 'kode' => '	1006050200	', 'name' => '	Urusan Pelayanan dan Umum	', 'id_parent' => '	Kepala Urusan Pelayanan dan Umum	', ]);
Bagian::create([ 'kode' => '	1006060000	', 'name' => '	Unit Baleendah/Bojongsoang	', 'id_parent' => '	Kepala Unit Baleendah/Bojongsoang	', ]);
Bagian::create([ 'kode' => '	1006060100	', 'name' => '	Urusan Teknik	', 'id_parent' => '	Kepala Urusan Teknik	', ]);
Bagian::create([ 'kode' => '	1006060200	', 'name' => '	Urusan Pelayanan dan Umum	', 'id_parent' => '	Kepala Urusan Pelayanan dan Umum	', ]);
Bagian::create([ 'kode' => '	1006070000	', 'name' => '	KP Pacet	', 'id_parent' => '	Kepala KP Pacet	', ]);
Bagian::create([ 'kode' => '	1007000000	', 'name' => '	Cabang III	', 'id_parent' => '	Kepala Cabang III	', ]);
Bagian::create([ 'kode' => '	1007010000	', 'name' => '	Wakil Cabang III	', 'id_parent' => '	Wakil Kepala Cabang III	', ]);
Bagian::create([ 'kode' => '	1007020000	', 'name' => '	Seksi Teknik	', 'id_parent' => '	Kepala Seksi Teknik	', ]);
Bagian::create([ 'kode' => '	1007020100	', 'name' => '	Sub Seksi Produksi	', 'id_parent' => '	Kepala Sub Seksi Produksi	', ]);
Bagian::create([ 'kode' => '	1007020200	', 'name' => '	Sub Seksi Distribusi	', 'id_parent' => '	Kepala Sub Seksi Distribusi	', ]);
Bagian::create([ 'kode' => '	1007030000	', 'name' => '	Seksi Pelayanan dan Umum	', 'id_parent' => '	Kepala Seksi Pelayanan dan Umum	', ]);
Bagian::create([ 'kode' => '	1007030100	', 'name' => '	Sub Seksi Pelayanan dan Penagihan	', 'id_parent' => '	Kepala Sub Seksi Pelayanan dan Penagihan	', ]);
Bagian::create([ 'kode' => '	1007030200	', 'name' => '	Sub Seksi Kas dan Umum	', 'id_parent' => '	Kepala Sub Seksi Kas dan Umum	', ]);
Bagian::create([ 'kode' => '	1007040000	', 'name' => '	KP Majalaya	', 'id_parent' => '	Kepala KP Majalaya	', ]);
Bagian::create([ 'kode' => '	1007050000	', 'name' => '	KP Cicalengka	', 'id_parent' => '	Kepala KP Cicalengka	', ]);
Bagian::create([ 'kode' => '	1007060000	', 'name' => '	KP Cileunyi	', 'id_parent' => '	Kepala KP Cileunyi	', ]);
Bagian::create([ 'kode' => '	1007070000	', 'name' => '	Unit Rancaekek	', 'id_parent' => '	Kepala Unit Rancaekek	', ]);
Bagian::create([ 'kode' => '	1007070100	', 'name' => '	Urusan Teknik	', 'id_parent' => '	Kepala Urusan Teknik	', ]);
Bagian::create([ 'kode' => '	1007070200	', 'name' => '	Urusan Pelayanan dan Umum	', 'id_parent' => '	Kepala Urusan Pelayanan dan Umum	', ]);
Bagian::create([ 'kode' => '	1007080000	', 'name' => '	KP Paseh	', 'id_parent' => '	Kepala KP Paseh	', ]);
Bagian::create([ 'kode' => '	1008000000	', 'name' => '	Cabang IV	', 'id_parent' => '	Kepala Cabang IV	', ]);
Bagian::create([ 'kode' => '	1008010000	', 'name' => '	Wakil Cabang IV	', 'id_parent' => '	Wakil Kepala Cabang IV	', ]);
Bagian::create([ 'kode' => '	1008020000	', 'name' => '	Seksi Teknik	', 'id_parent' => '	Kepala Seksi Teknik	', ]);
Bagian::create([ 'kode' => '	1008020100	', 'name' => '	Sub Seksi Produksi	', 'id_parent' => '	Kepala Sub Seksi Produksi	', ]);
Bagian::create([ 'kode' => '	1008020200	', 'name' => '	Sub Seksi Distribusi	', 'id_parent' => '	Kepala Sub Seksi Distribusi	', ]);
Bagian::create([ 'kode' => '	1008030000	', 'name' => '	Seksi Pelayanan dan Umum	', 'id_parent' => '	Kepala Seksi Pelayanan dan Umum	', ]);
Bagian::create([ 'kode' => '	1008030100	', 'name' => '	Sub Seksi Pelayanan dan Penagihan	', 'id_parent' => '	Kepala Sub Seksi Pelayanan dan Penagihan	', ]);
Bagian::create([ 'kode' => '	1008030200	', 'name' => '	Sub Seksi Kas dan Umum	', 'id_parent' => '	Kepala Sub Seksi Kas dan Umum	', ]);
Bagian::create([ 'kode' => '	1008040000	', 'name' => '	Unit Lembang	', 'id_parent' => '	Kepala KP Lembang	', ]);
Bagian::create([ 'kode' => '	1008050000	', 'name' => '	Unit Cisarua	', 'id_parent' => '	Kepala Unit Cisarua	', ]);
Bagian::create([ 'kode' => '	1008050100	', 'name' => '	Urusan Teknik	', 'id_parent' => '	Kepala Urusan Teknik	', ]);
Bagian::create([ 'kode' => '	1008050200	', 'name' => '	Urusan Pelayanan dan Umum	', 'id_parent' => '	Kepala Urusan Pelayanan dan Umum	', ]);
Bagian::create([ 'kode' => '	1009000000	', 'name' => '	Cabang V	', 'id_parent' => '	Kepala Cabang V	', ]);
Bagian::create([ 'kode' => '	1009010000	', 'name' => '	Wakil Cabang V	', 'id_parent' => '	Wakil Kepala Cabang V	', ]);
Bagian::create([ 'kode' => '	1009020000	', 'name' => '	Seksi Teknik	', 'id_parent' => '	Kepala Seksi Teknik	', ]);
Bagian::create([ 'kode' => '	1009020100	', 'name' => '	Sub Seksi Produksi	', 'id_parent' => '	Kepala Sub Seksi Produksi	', ]);
Bagian::create([ 'kode' => '	1009020200	', 'name' => '	Sub Seksi Distribusi	', 'id_parent' => '	Kepala Sub Seksi Distribusi	', ]);
Bagian::create([ 'kode' => '	1009030000	', 'name' => '	Seksi Pelayanan dan Umum	', 'id_parent' => '	Kepala Seksi Pelayanan dan Umum	', ]);
Bagian::create([ 'kode' => '	1009030100	', 'name' => '	Sub Seksi Pelayanan dan Penagihan	', 'id_parent' => '	Kepala Sub Seksi Pelayanan dan Penagihan	', ]);
Bagian::create([ 'kode' => '	1009030200	', 'name' => '	Sub Seksi Kas dan Umum	', 'id_parent' => '	Kepala Sub Seksi Kas dan Umum	', ]);
Bagian::create([ 'kode' => '	1009040000	', 'name' => '	KP Padalarang	', 'id_parent' => '	Kepala KP Padalarang	', ]);
Bagian::create([ 'kode' => '	1009050000	', 'name' => '	KP Batujajar	', 'id_parent' => '	Kepala KP Batujajar	', ]);
Bagian::create([ 'kode' => '	1009060000	', 'name' => '	Unit Cililin	', 'id_parent' => '	Kepala KP Cililin	', ]);
Bagian::create([ 'kode' => '	1009070000	', 'name' => '	KP Cikalong Wetan	', 'id_parent' => '	Kepala KP Cikalong Wetan	', ]);
Bagian::create([ 'kode' => '	1010000000	', 'name' => '	Cabang VI	', 'id_parent' => '	Kepala Cabang VI	', ]);
Bagian::create([ 'kode' => '	1010010000	', 'name' => '	Wakil Cabang VI	', 'id_parent' => '	Wakil Kepala Cabang VI	', ]);
Bagian::create([ 'kode' => '	1010020000	', 'name' => '	Seksi Teknik	', 'id_parent' => '	Kepala Seksi Teknik	', ]);
Bagian::create([ 'kode' => '	1010020100	', 'name' => '	Sub Seksi Produksi	', 'id_parent' => '	Kepala Sub Seksi Produksi	', ]);
Bagian::create([ 'kode' => '	1010020200	', 'name' => '	Sub Seksi Distribusi	', 'id_parent' => '	Kepala Sub Seksi Distribusi	', ]);
Bagian::create([ 'kode' => '	1010030000	', 'name' => '	Seksi Pelayanan dan Umum	', 'id_parent' => '	Kepala Seksi Pelayanan dan Umum	', ]);
Bagian::create([ 'kode' => '	1010030100	', 'name' => '	Sub Seksi Pelayanan dan Penagihan	', 'id_parent' => '	Kepala Sub Seksi Pelayanan dan Penagihan	', ]);
Bagian::create([ 'kode' => '	1010030200	', 'name' => '	Sub Seksi Kas dan Umum	', 'id_parent' => '	Kepala Sub Seksi Kas dan Umum	', ]);
Bagian::create([ 'kode' => '	1010040000	', 'name' => '	KP Cimahi	', 'id_parent' => '	Kepala KP Cimahi	', ]);

    }
}
