<?php
use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Skill::create([
          'name' => 'Akuntansi',
          'description' => 'Dasar, jurnal, neraca dan laporan keuangan.',
          'company_id' => '1',
      ]);
      Skill::create([
          'name' => 'PHP',
          'description' => 'Dasar dan framework CI/Laravel.',
          'company_id' => '1',
      ]);
      Skill::create([
          'name' => 'JavaScript',
          'description' => 'Dasar dan jQuery.',
          'company_id' => '1',
      ]);
    }
}
