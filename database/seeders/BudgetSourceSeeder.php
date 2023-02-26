<?php

namespace Database\Seeders;

use App\Models\BudgetSource;
use Illuminate\Database\Seeder;

class BudgetSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sources = [
            'संघीय (नेपाल) सरकार - समानिकरण अनुदान',
            'संघीय (नेपाल) सरकार - शसर्त अनुदान चालु',
            'बैदेशिक श्राेत (एस.एस.डि.पि.) - अन्तराष्ट्रिय अन्तर-सरकारी संस्था चालु अनुदान',
            'बैदेशिक श्राेत (एस.एस.डि.पि.) - बैदेशिक ऋण',
            'संघीय (नेपाल) सरकार - समपुरक अनुदान पुँजीगत',
            'संघीय (नेपाल) सरकार-अन्य अनुदान पुँजीगत',
            'प्रदेश सरकार - समानिकरण अनुदान',
            'राजश्व बाँडफाड (प्रदेश सरकार)',
            'राजश्व बाँडफाड (संघीय सरकार)',
            'आन्तरिक श्रोत',
            'आन्तरिक श्रोत (नगर विकास काेष)',
        ];

        foreach ($sources as $source) {
            BudgetSource::firstOrCreate([
                'name' => $source
            ]);
        }
    }
}
