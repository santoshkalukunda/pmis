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
                'fiscal_year' => '2078/79',
            ],
            [
                'fiscal_year' => '2077/78',
            ],
            [
                'fiscal_year' => '2076/77',
            ],
            [
                'fiscal_year' => '2075/76',
            ],
            [
                'fiscal_year' => '2074/75',
            ],
            [
                'fiscal_year' => '2073/74',
            ],
            [
                'fiscal_year' => '2072/73',
            ],
            [
                'fiscal_year' => '2071/72',
            ],
            [
                'fiscal_year' => '2070/71',
            ],
            [
                'fiscal_year' => '2069/70',
            ],
            [
                'fiscal_year' => '2068/69',
            ],
            [
                'fiscal_year' => '2067/68',
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
