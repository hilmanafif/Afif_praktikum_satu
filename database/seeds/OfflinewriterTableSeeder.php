<?php

use Illuminate\Database\Seeder;
use App\Models\Offlinewriter;

class OfflinewriterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Offlinewriter::create([
          'name' => 'Empty'
      ]);
    }
}
