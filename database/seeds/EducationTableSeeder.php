<?php
use App\Models\Education;
use Illuminate\Database\Seeder;

class EducationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Education::create([
          'name' => 'Sarjana (S1/D4)',
          'company_id' => '1',
      ]);
      Education::create([
          'name' => 'Diploma (D3)',
          'company_id' => '1',
      ]);
      Education::create([
          'name' => 'Sekolah Menengah Atas (SMA/SMK)',
          'company_id' => '1',
      ]);
    }
}
