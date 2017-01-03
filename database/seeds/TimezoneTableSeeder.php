<?php
use App\Models\Timezone;
use Illuminate\Database\Seeder;

class TimezoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Timezone::create([
          'name' => 'GMT+7',
          'company_id' => '1',
      ]);
    }
}
