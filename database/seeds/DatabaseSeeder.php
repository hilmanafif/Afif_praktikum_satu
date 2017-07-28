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
        // Core: Accounts
        $this->call(RolesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        // Core: References
        $this->call(TimezoneTableSeeder::class);
        $this->call(LanguageTableSeeder::class);
        // Core: Company / SaaS
        $this->call(CompanyTableSeeder::class);
        // HRM
        $this->call(AgamaTableSeeder::class);
        $this->call(StatKawinTableSeeder::class);
        $this->call(GolDarahTableSeeder::class);
        $this->call(BankAccountTableSeeder::class);
        $this->call(StatPegawaiTableSeeder::class);
        $this->call(StatKerjaTableSeeder::class);
        $this->call(WilayahTableSeeder::class);
        $this->call(JabatanTableSeeder::class);
        $this->call(GajiPokokTableSeeder::class);
        $this->call(PangkatTableSeeder::class);
        $this->call(BagianTableSeeder::class);
        $this->call(SubjabatanTableSeeder::class);
        $this->call(TupelTableSeeder::class);
        // CMS
        $this->call(OfflinewriterTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ContentTableSeeder::class);
        $this->call(TopicTableSeeder::class);
        //$this->call(RedaksiTableSeeder::class);

        Model::reguard();
    }
}
