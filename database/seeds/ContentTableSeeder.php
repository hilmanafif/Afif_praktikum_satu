<?php

use App\Models\Content;
use Illuminate\Database\Seeder;

class ContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      /* Default Generic
      Content::create([
          'name' => 'Aplikasi Human Resource yang Sederhana & Mudah Digunakan',
          'description' => ' ',
          'quote' => ' ',
          'offline_writer_id' => 0,
          'offline_writer' => ' ',
          'topic_id' => 0,
          'status' => 'PUBLISHED',
          'body' => 'Dibangun pada awalnya untuk perusahaan start-up dan wirausaha kecil, JerbeeHRM fokus kepada kemudahan penggunaan terutama di organisasi kecil/slim yang ingin segera bergerak cepat tanpa harus terlalu tergantung kepada departemen dan sistem sumber daya manusia yang kompleks.',
          'user_id' => 1,
          'category_id' => 1,
      ]);
      Content::create([
          'name' => 'Siap mengelola SDM anda!',
          'description' => ' ',
          'quote' => ' ',
          'offline_writer_id' => 0,
          'offline_writer' => ' ',
          'topic_id' => 0,
          'status' => 'PUBLISHED',
          'body' => 'Sistem HR konvensional yang kompleks umumnya membutuhkan resource dan waktu implementasi panjang. JerbeeHRM mencoba mengatasi hal tersebut dengan menjadi sistem HR yang sederhana dan mudah digunakan, siap digunakan di era menjamurnya kewirausahaan yang membutuhkan setup organisasi yang cepat.',
          'user_id' => 1,
          'category_id' => 1,
      ]);
      Content::create([
          'name' => 'Easy to Deploy',
          'description' => ' ',
          'quote' => ' ',
          'offline_writer_id' => 0,
          'offline_writer' => ' ',
          'topic_id' => 0,
          'status' => 'PUBLISHED',
          'body' => 'Cloud, webhosting, local server, you name it.',
          'user_id' => 1,
          'category_id' => 2,
      ]);
      Content::create([
          'name' => 'Solid Stack',
          'description' => ' ',
          'quote' => ' ',
          'offline_writer_id' => 0,
          'offline_writer' => ' ',
          'topic_id' => 0,
          'status' => 'PUBLISHED',
          'body' => 'Using latest web frameworks & technologies.',
          'user_id' => 1,
          'category_id' => 2,
      ]);
      Content::create([
          'name' => 'Easy to Use',
          'description' => ' ',
          'quote' => ' ',
          'offline_writer_id' => 0,
          'offline_writer' => ' ',
          'topic_id' => 0,
          'status' => 'PUBLISHED',
          'body' => 'Simple, slim with casual UI/UX.',
          'user_id' => 1,
          'category_id' => 2,
      ]);
      Content::create([
          'name' => 'Mobile',
          'description' => ' ',
          'quote' => ' ',
          'offline_writer_id' => 0,
          'offline_writer' => ' ',
          'topic_id' => 0,
          'status' => 'PUBLISHED',
          'body' => 'Responsive. Mobile app version is coming soon!',
          'user_id' => 1,
          'category_id' => 2,
      ]);
      Content::create([
          'name' => 'Database Kepegawaian',
          'description' => ' ',
          'quote' => ' ',
          'offline_writer_id' => 0,
          'offline_writer' => ' ',
          'topic_id' => 0,
          'status' => 'PUBLISHED',
          'body' => 'Bio, Dokumen Legal, Struktur Organisasi',
          'user_id' => 1,
          'category_id' => 3,
      ]);
      Content::create([
          'name' => 'CV Generator',
          'description' => ' ',
          'quote' => ' ',
          'offline_writer_id' => 0,
          'offline_writer' => ' ',
          'topic_id' => 0,
          'status' => 'PUBLISHED',
          'body' => 'Karir &amp; Curriculum Vitae',
          'user_id' => 1,
          'category_id' => 3,
      ]);
      Content::create([
          'name' => 'Kehadiran',
          'description' => ' ',
          'quote' => ' ',
          'offline_writer_id' => 0,
          'offline_writer' => ' ',
          'topic_id' => 0,
          'status' => 'PUBLISHED',
          'body' => 'Absen, Liburan &amp; Cuti',
          'user_id' => 1,
          'category_id' => 3,
      ]);
      Content::create([
          'name' => 'Payroll',
          'description' => ' ',
          'quote' => ' ',
          'offline_writer_id' => 0,
          'offline_writer' => ' ',
          'topic_id' => 0,
          'status' => 'PUBLISHED',
          'body' => 'Payroll',
          'user_id' => 1,
          'category_id' => 3,
      ]);
      Content::create([
          'name' => 'Task Control',
          'description' => ' ',
          'quote' => ' ',
          'offline_writer_id' => 0,
          'offline_writer' => ' ',
          'topic_id' => 0,
          'status' => 'PUBLISHED',
          'body' => 'Todo List, Surat Tugas, Jobe Desc, KPI ',
          'user_id' => 1,
          'category_id' => 3,
      ]);
      Content::create([
          'name' => 'Sistem Asset',
          'description' => ' ',
          'quote' => ' ',
          'offline_writer_id' => 0,
          'offline_writer' => ' ',
          'topic_id' => 0,
          'status' => 'PUBLISHED',
          'body' => 'Pengadaan &amp; Inventaris',
          'user_id' => 1,
          'category_id' => 3,
      ]);
      */

      // PDAM Deployment
      Content::create([
          'name' => 'Aplikasi Payroll/Penggajian PDAM Tirta Raharja',
          'description' => ' ',
          'quote' => ' ',
          'offline_writer_id' => 0,
          'offline_writer' => ' ',
          'topic_id' => 1,
          'status' => 'PUBLISHED',
          'body' => 'Merupakan proses pengembangan dan integrasi dari aplikasi-aplikasi sistem kepegawaian yang ada, menuju sistem data induk karyawan yang online dan terintegrasi.',
          'user_id' => 1,
          'category_id' => 1,
      ]);
      Content::create([
          'name' => 'Dibangun khusus untuk PDAM Tirta Raharja',
          'description' => ' ',
          'quote' => ' ',
          'offline_writer_id' => 0,
          'offline_writer' => ' ',
          'topic_id' => 1,
          'status' => 'PUBLISHED',
          'body' => 'Aplikasi payroll ini dibangun di atas produk aplikasi Human Resource generik produksi PT Jerbee Indonesia yang dimodifikasi secara khusus untuk mengadopsi sistem penggajian eksisting yang dipakai di Bgaian Kepegawaian PDAM Tirta Raharja. Dengan proses adopsi bertahap diharapkan aplikasi ini bisa memenuhi kebutuhan PDAM Tirta Raharja tanpa harus melakukan perubahan bisnis proses sehingga lebih memudahkan dibanding implementasi sistem HRM lainnya.',
          'user_id' => 1,
          'category_id' => 1,
      ]);
      Content::create([
          'name' => 'Solid Stack',
          'description' => ' ',
          'quote' => ' ',
          'offline_writer_id' => 0,
          'offline_writer' => ' ',
          'topic_id' => 1,
          'status' => 'PUBLISHED',
          'body' => 'Menggunakan web frameworks & teknologi yang update.',
          'user_id' => 1,
          'category_id' => 2,
      ]);
      Content::create([
          'name' => 'Partnership Terpercaya',
          'description' => ' ',
          'quote' => ' ',
          'offline_writer_id' => 0,
          'offline_writer' => ' ',
          'topic_id' => 1,
          'status' => 'PUBLISHED',
          'body' => 'Instalasi, pendampingan dan pengembangan.',
          'user_id' => 1,
          'category_id' => 2,
      ]);
      Content::create([
          'name' => 'Mudah Digunakan',
          'description' => ' ',
          'quote' => ' ',
          'offline_writer_id' => 0,
          'offline_writer' => ' ',
          'topic_id' => 1,
          'status' => 'PUBLISHED',
          'body' => 'Sederhana, dengan UI/UX yang slim dan bersih.',
          'user_id' => 1,
          'category_id' => 2,
      ]);
      Content::create([
          'name' => 'Mobile',
          'description' => ' ',
          'quote' => ' ',
          'offline_writer_id' => 0,
          'offline_writer' => ' ',
          'topic_id' => 1,
          'status' => 'PUBLISHED',
          'body' => 'Disertai aplikasi Android pelengkap.',
          'user_id' => 1,
          'category_id' => 2,
      ]);
      Content::create([
          'name' => 'Database Kepegawaian',
          'description' => ' ',
          'quote' => ' ',
          'offline_writer_id' => 0,
          'offline_writer' => ' ',
          'topic_id' => 1,
          'status' => 'PUBLISHED',
          'body' => 'Biodata, Dokumen, Struktur Organisasi',
          'user_id' => 1,
          'category_id' => 3,
      ]);
      Content::create([
          'name' => 'CV Generator (Coming Soon)',
          'description' => ' ',
          'quote' => ' ',
          'offline_writer_id' => 0,
          'offline_writer' => ' ',
          'topic_id' => 1,
          'status' => 'PUBLISHED',
          'body' => 'Rekam Karir &amp; Curriculum Vitae',
          'user_id' => 1,
          'category_id' => 3,
      ]);
      Content::create([
          'name' => 'Absensi (Coming Soon)',
          'description' => ' ',
          'quote' => ' ',
          'offline_writer_id' => 0,
          'offline_writer' => ' ',
          'topic_id' => 1,
          'status' => 'PUBLISHED',
          'body' => 'Kehadiran, Liburan &amp; Cuti',
          'user_id' => 1,
          'category_id' => 3,
      ]);
      Content::create([
          'name' => 'Payroll Generator',
          'description' => ' ',
          'quote' => ' ',
          'offline_writer_id' => 0,
          'offline_writer' => ' ',
          'topic_id' => 1,
          'status' => 'PUBLISHED',
          'body' => 'Slip Gaji #1 dan #2',
          'user_id' => 1,
          'category_id' => 3,
      ]);
      Content::create([
          'name' => 'Tunjangan (Coming Soon)',
          'description' => ' ',
          'quote' => ' ',
          'offline_writer_id' => 0,
          'offline_writer' => ' ',
          'topic_id' => 1,
          'status' => 'PUBLISHED',
          'body' => 'Kalkulasi &amp; Manajemen Tunjangan',
          'user_id' => 1,
          'category_id' => 3,
      ]);
      Content::create([
          'name' => 'Potongan (Coming Soon)',
          'description' => ' ',
          'quote' => ' ',
          'offline_writer_id' => 0,
          'offline_writer' => ' ',
          'topic_id' => 1,
          'status' => 'PUBLISHED',
          'body' => 'Kalkulasi &amp; Manajemen Potongan',
          'user_id' => 1,
          'category_id' => 3,
      ]);
    }
}
