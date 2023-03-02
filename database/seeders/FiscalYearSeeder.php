<?php

namespace Database\Seeders;

use App\Models\ActiveFiscalYear;
use App\Models\FiscalYear;
use Illuminate\Database\Seeder;

class FiscalYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fiscalYears = [
            [
                'fiscal_year' => '2079/80',
            ],
            [
                'fiscal_year' => '2079/78',
            ],
            [
                'fiscal_year' => '2078/77',
            ],
            [
                'fiscal_year' => '2077/76',
            ],
            [
                'fiscal_year' => '2076/75',
            ],
        ];
        foreach ($fiscalYears as $fiscalYear) {
            FiscalYear::firstOrCreate($fiscalYear);
        }
        ActiveFiscalYear::firstOrCreate([
            'fiscal_year_id' => 1,
        ]);
    }
}
