<?php

use App\Models\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Content::create([
          'name' => 'APLIKASI HUMAN RESOURCE YANG SEDERHANA & MUDAH DIGUNAKAN',
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
    }
}
