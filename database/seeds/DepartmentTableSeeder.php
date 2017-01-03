<?php
use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Department::create([
          'name' => 'Divisi Teknis',
          'description' => 'Bagian teknis dan produksi.',
          'company_id' => 1,
      ]);
      Department::create([
          'name' => 'Divisi Administrasi',
          'description' => 'Bagian administrasi, keuangan dan operasional.',
          'company_id' => 1,
      ]);
      Department::create([
          'name' => 'Divisi Marketing',
          'description' => 'Bagian marketing dan sales.',
          'company_id' => 1,
      ]);
    }
}
