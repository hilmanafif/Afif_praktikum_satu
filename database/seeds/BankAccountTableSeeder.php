<?php

use Illuminate\Database\Seeder;
use App\Models\BankAccount;

class BankAccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        BankAccount::create([
          'name' => 'BJB KCP Soreang',
          'address' => 'Jl. Raya Soreang',
          'logo' => 'Logo1.jpg',
      	]);

      	BankAccount::create([
          'name' => 'BJB KCP Cimahi',
          'address' => 'Jl. Raya Cibabat Cimahi',
          'logo' => 'Logo2.jpg',
      	]);

      	BankAccount::create([
          'name' => 'CIMB NIAGA',
          'address' => 'Jl. Raya Cibabat Cimahi',
          'logo' => 'Logo3.jpg',
      	]);

      	BankAccount::create([
          'name' => 'Bank Syariah Mandiri Cimahi',
          'address' => 'Jl. Raya Cibabat Cimahi',
          'logo' => 'Logo4.jpg',
      	]);

      	BankAccount::create([
          'name' => 'Bank BCA KCP Cimahi',
          'address' => 'Jl. Raya Cibabat Cimahi',
          'logo' => 'Logo5.jpg',
      	]);
    }
}
