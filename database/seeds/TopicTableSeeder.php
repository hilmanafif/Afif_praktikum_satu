<?php

use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Topic::create([
          'name' => 'Copywriting Aplikasi Payroll PDAM Tirta Raharja',
          'description' => 'Copywriting Aplikasi Payroll PDAM Tirta Raharja',
          'body' => '',
          'user_id' => 1,
          'status' => 'PUBLISHED',
          'sticky' => 'YES',
          'slug' => 'copywriting-aplikasi-payroll',
          'foto_file_name' => 'sample.jpg'
      ]);
    }
}
