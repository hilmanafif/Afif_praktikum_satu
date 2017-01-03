<?php
use App\Models\Employmentstatus;
use Illuminate\Database\Seeder;

class EmploymentstatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Employmentstatus::create([
          'name' => 'Tetap',
          'company_id' => '1',
      ]);
      Employmentstatus::create([
          'name' => 'Kontrak',
          'company_id' => '1',
      ]);
      Employmentstatus::create([
          'name' => 'Tetap (On Suspend)',
          'company_id' => '1',
      ]);
      Employmentstatus::create([
          'name' => 'Kontrak (On Suspend)',
          'company_id' => '1',
      ]);
      Employmentstatus::create([
          'name' => 'Keluar',
          'company_id' => '1',
      ]); 
    }
}
