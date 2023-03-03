<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call(OfficeSeeder::class);
        $this->call(MunicipalitySeeder::class);
        $this->call(ProjectTypeSeeder::class);
        $this->call(BudgetSourceSeeder::class);
        $this->call(FiscalYearSeeder::class);
        $this->call(ExpenditureTypeSeeder::class);  
    }
}
