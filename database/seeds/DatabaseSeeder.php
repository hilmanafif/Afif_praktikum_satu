<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(AnggotaKeluargaTableSeeder::class);
        // $this->call(RolesTableSeeder::class);
        // $this->call(UserTableSeeder::class);
        // $this->call(CompanyTableSeeder::class);
        // $this->call(DepartmentTableSeeder::class);
        // $this->call(LocationTableSeeder::class);
        //
        // $this->call(AgamaTableSeeder::class);
        // $this->call(StatKawinTableSeeder::class);
        // $this->call(GolDarahTableSeeder::class);
        // $this->call(BankAccountTableSeeder::class);
        // $this->call(StatPegawaiTableSeeder::class);
        // $this->call(StatKerjaTableSeeder::class);
        // $this->call(WilayahTableSeeder::class);
        // $this->call(JabatanTableSeeder::class);
        // $this->call(GajiPokokTableSeeder::class);
        // $this->call(PangkatTableSeeder::class);
        // $this->call(BagianTableSeeder::class);
        // $this->call(SubjabatanTableSeeder::class);
        //
        //
        // $this->call(TimezoneTableSeeder::class);
        // $this->call(EducationTableSeeder::class);
        // $this->call(LanguageTableSeeder::class);
        // $this->call(SkillTableSeeder::class);
        // $this->call(EmploymentstatusTableSeeder::class);
        // $this->call(JobtitleTableSeeder::class);
        // $this->call(SalarycomponentTableSeeder::class);
        // $this->call(LeavetypeTableSeeder::class);
        // $this->call(DocumenttypeTableSeeder::class);
        //
        // $this->call(CategoryTableSeeder::class);
        // $this->call(ContentTableSeeder::class);

        Model::reguard();
    }
}
