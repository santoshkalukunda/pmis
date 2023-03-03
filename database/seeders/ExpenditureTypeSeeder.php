<?php

namespace Database\Seeders;

use App\Models\ExpenditureType;
use Illuminate\Database\Seeder;

class ExpenditureTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expenditureTypes = [
            [
                'name' => 'पुँजीगत खर्च',
            ],
            [
                'name' => 'चालु खर्च',
            ],
        ];
        foreach ($expenditureTypes as $expenditureType) {
           ExpenditureType::firstOrCreate($expenditureType);
        }
    }
}
