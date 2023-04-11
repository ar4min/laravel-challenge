<?php

namespace Database\Seeders;

use App\Models\Webservice;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Webservice::factory()->count(10)->hasTransactions(100)->create();
    }
}
