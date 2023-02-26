<?php

namespace Database\Seeders;

use App\Models\ProjectType;
use Illuminate\Database\Seeder;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projectTypes = [
            [
                'name' => 'खानेपानी आपूर्ति कार्यक्रम',
            ],
            [
                'name' => 'सडक/बाटो मर्मत/ढलान तथा स्तरोन्नती',
            ],
            [
                'name' => 'सडक/बाटो विस्तार तथा नयाँ ट्रयाक',
            ],
            [
                'name' => 'सडक ग्रावेल तथा कालोपत्रे',
            ],
            [
                'name' => 'सडक ढल निर्माण तथा व्यवस्थापन',
            ],
            [
                'name' => 'हेमपाइप जडान तथा मर्मत',
            ],
        ];
        foreach ($projectTypes as $projectType) {
           ProjectType::firstOrCreate($projectType);
        }
    }
}
