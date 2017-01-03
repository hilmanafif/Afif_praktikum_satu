<?php
use App\Models\Leavetype;
use Illuminate\Database\Seeder;

class LeavetypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Leavetype::create([
          'name' => 'Cuti Biasa',
          'company_id' => '1',
      ]);
      Leavetype::create([
          'name' => 'Cuti Sakit',
          'company_id' => '1',
      ]);
    }
}
