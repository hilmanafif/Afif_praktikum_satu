<?php
use App\Models\Documenttype;
use Illuminate\Database\Seeder;

class DocumenttypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Documenttype::create([
          'name' => 'KTP',
          'company_id' => '1',
      ]);
      Documenttype::create([
          'name' => 'SIM',
          'company_id' => '1',
      ]);
      Documenttype::create([
          'name' => 'NPWP',
          'company_id' => '1',
      ]);
      Documenttype::create([
          'name' => 'Ijazah',
          'company_id' => '1',
      ]);
      Documenttype::create([
          'name' => 'Paspor',
          'company_id' => '1',
      ]);
    }
}
