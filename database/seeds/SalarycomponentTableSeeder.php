<?php
use App\Models\Salarycomponent;
use Illuminate\Database\Seeder;

class SalarycomponentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Salarycomponent::create([
          'name' => 'Basic Salary',
          'default' => '',
          'description' => 'Earning',
          'company_id' => '1',
      ]);
      Salarycomponent::create([
          'name' => 'Dana Pensiun',
          'default' => '',
          'description' => 'Deduction',
          'company_id' => '1',
      ]);
      Salarycomponent::create([
          'name' => 'Asuransi Kesehatan',
          'default' => '',
          'description' => 'Deduction',
          'company_id' => '1',
      ]);
      Salarycomponent::create([
          'name' => 'Tunjangan Telekomunikasi',
          'default' => '',
          'description' => 'Earning',
          'company_id' => '1',
      ]);
    }
}
