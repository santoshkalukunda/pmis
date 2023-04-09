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
                'fiscal_year' => '२०७९/८०',
            ],
            [
                'fiscal_year' => '२०७८/७९',
            ],
            [
                'fiscal_year' => '२०७७/७८',
            ],
            [
                'fiscal_year' => '२०७६/७७',
            ],
            [
                'fiscal_year' => '२०७५/७६',
            ],
            [
                'fiscal_year' => '२०७४/७५',
            ],
            [
                'fiscal_year' => '२०७३/७४',
            ],
            [
                'fiscal_year' => '२०७२/७३',
            ],
            [
                'fiscal_year' => '२०७१/७२',
            ],
            [
                'fiscal_year' => '२०७०/७१',
            ],
            [
                'fiscal_year' => '२०६९/७०',
            ],
            [
                'fiscal_year' => '२०६८/६९',
            ],
            [
                'fiscal_year' => '२०६७/६८',
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
