<?php
use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Language::create([
          'name' => 'Bahasa Indonesia',
          'company_id' => '1',
      ]);
      Language::create([
          'name' => 'Bahasa Inggris',
          'company_id' => '1',
      ]);
      Language::create([
          'name' => 'Bahasa Jepang',
          'company_id' => '1',
      ]);
    }
}
