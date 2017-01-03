<?php
use App\Models\Jobtitle;
use Illuminate\Database\Seeder;

class JobtitleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Jobtitle::create([
          'name' => 'Direktur Utama',
          'company_id' => '1',
      ]);
      Jobtitle::create([
          'name' => 'Direktur Bidang',
          'company_id' => '1',
      ]);
      Jobtitle::create([
          'name' => 'Manajer',
          'company_id' => '1',
      ]);
      Jobtitle::create([
          'name' => 'Staf',
          'company_id' => '1',
      ]);
    }
}
