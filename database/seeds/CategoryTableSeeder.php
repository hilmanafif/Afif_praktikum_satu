<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Category::create([
          'name' => 'Copywriting Bebas',
          'description' => 'Dua opening untuk halaman depan.',
          'body' => ' '
      ]);
      Category::create([
          'name' => 'Teknologi',
          'description' => 'Empat highlights teknologi yang digunakan.',
          'body' => ' '
      ]);
      Category::create([
          'name' => 'Fitur',
          'description' => 'Enam fitur utama.',
          'body' => ' '
      ]);
    }
}
