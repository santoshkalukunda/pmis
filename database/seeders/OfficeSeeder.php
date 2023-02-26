<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offices = [
            [
                'name' => 'भौतिक पूर्वाधार विकास मन्त्रालय',
                'english-name' => 'Ministry of Physical Infrastructure Development',
            ],
            [
                'name' => 'यातायात पूर्वाधार निर्देशनालय',
                'parent_id' => 1,
                'english-name' => 'Directorate of Transport Infrastructure',
            ],
            [
                'name' => 'सहरी विकास तथा भवन निर्माण कार्यालय',
                'parent_id' => 1,
                'english-name' => 'Urban Development and Building Construction',
            ],

            [
                'name' => 'जलश्रोत तथा सिंचाइ विकास डिभिनज कार्यालय',
                'parent_id' => 1,
                'english-name' => 'Office of Water Resources and Irrigation Development Division',
            ],

            [
                'name' => 'खानेपानी तथा सरसफाइ डिभिजन कार्यालय',
                'parent_id' => 1,
                'english-name' => 'Water and Sanitation Division Office',
            ],

            [
                'name' => 'पूर्वाधार विकास कार्यालय',
                'parent_id' => 1,
                'english-name' => 'Infrastructure Development Office',
            ],

            [
                'name' => 'पथरैया मोहना सिचाइ ब्यवस्थापन कार्यालय, कैलाली',
                'parent_id' => 1,
                'english-name' => 'Patharaiya Mohana Irrigation Management Office, Kailali',
            ],
            [
                'name' => 'भूमिगत जलश्रोत तथा सिचाइ विकास डिभिजन',
                'parent_id' => 1,
                'english-name' => 'Ground Water Resources and Irrigation Development Division',
            ],

            [
                'name' => 'यातायात ब्यवस्था कार्यालय, कैलाली',
                'parent_id' => 2,
                'english-name' => 'Transport Management Office, Kailali ',
            ],
            [
                'name' => 'यातायात ब्यवस्था कार्यालय, कञ्चनपुर',
                'parent_id' => 2,
                'english-name' => 'Transport Management Office, Kanachanpur',
            ],
            [
                'name' => 'यातायात ब्यवस्था कार्यालय, डोटी',
                'parent_id' => 2,
                'english-name' => 'Transport Management Office, Doti',
            ],
            [
                'name' => 'यातायात ब्यवस्था कार्यालय, डडेल्धुरा',
                'parent_id' => 2,
                'english-name' => 'Transport Management Office, Dadeldura',
            ],

            [
                'name' => 'सहरी विकास तथा भवन कार्यालय, कैलाली',
                'parent_id' => 3,
                'english-name' => 'Urban Development and Building Office, Kailali',
            ],
            [
                'name' => 'सहरी विकास तथा भवन कार्यालय, डोटी',
                'parent_id' => 3,
                'english-name' => 'Urban Development and Building Office, Doti ',
            ],
            [
                'name' => 'सहरी विकास तथा भवन कार्यालय, बैतडी',
                'parent_id' => 3,
                'english-name' => 'Urban Development and Building Office, Baitadi',
            ],
            [
                'name' => 'जलश्रोत तथा सिचाइ विकास डिभिजन कार्यालय, डोटी',
                'parent_id' => 4,
                'english-name' => 'Water Resources and Irrigation Development Division Office, Doti',
            ],
            [
                'name' => 'जलश्रोत तथा सिचाइ विकास डिभिजन कार्यालय, कैलाली',
                'parent_id' => 4,
                'english-name' => 'Water Resources and Irrigation Development Division Office, Kailali',
            ],
            [
                'name' => 'जलश्रोत तथा सिचाइ विकास डिभिजन कार्यालय, बझाङ्ग',
                'parent_id' => 4,
                'english-name' => 'Water Resources and Irrigation Development Division Office, Bajhang',
            ],
            [
                'name' => 'जलश्रोत तथा सिचाइ विकास डिभिजन कार्यालय, दार्चुला',
                'parent_id' => 4,
                'english-name' => 'Water Resources and Irrigation Development Division Office, Darchula',
            ],
            [
                'name' => 'जलश्रोत तथा सिचाइ विकास डिभिजन कार्यालय, वैतडी',
                'parent_id' => 4,
                'english-name' => 'Water Resources and Irrigation Development Division Office, Baitadi',
            ],
            [
                'name' => 'जलश्रोत तथा सिचाइ विकास डिभिजन कार्यालय, डडेल्धुरा',
                'parent_id' => 4,
                'english-name' => 'Water Resources and Irrigation Development Division Office, Dadeldhura',
            ],
            [
                'name' => 'जलश्रोत तथा सिचाइ विकास डिभिजन कार्यालय, कञ्चनपुर',
                'parent_id' => 4,
                'english-name' => 'Water Resources and Irrigation Development Division Office, kanchanpur',
            ],
            [
                'name' => 'जलश्रोत तथा सिचाइ विकास डिभिजन कार्यालय, अछाम',
                'parent_id' => 4,
                'english-name' => 'Water Resources and Irrigation Development Division Office, Achham',
            ],
            [
                'name' => 'जलश्रोत तथा सिचाइ विकास सब–डिभिजन कार्यालय, बाजुरा',
                'parent_id' => 4,
                'english-name' => 'Water Resources and Irrigation Development Division Office, Bajura',
            ],

            [
                'name' => 'खानेपानी तथा सरसफाइ डिभिजन कार्यालय, कैलाली',
                'parent_id' => 5,
                'english-name' => 'Water and Sanitation Division Office, Kailali',
            ],
            [
                'name' => 'खानेपानी तथा सरसफाइ डिभिजन कार्यालय,  डोटी',
                'parent_id' => 5,
                'english-name' => 'Water and Sanitation Division Office, Doti',
            ],
            [
                'name' => 'खानेपानी तथा सरसफाइ डिभिजन कार्यालय, बैतडी',
                'parent_id' => 5,
                'english-name' => 'Water and Sanitation Division Office, Baitadi',
            ],
            [
                'name' => 'खानेपानी तथा सरसफाइ डिभिजन कार्यालय, डडेल्धुरा',
                'parent_id' => 5,
                'english-name' => 'Water and Sanitation Division Office, Dadeldhura',
            ],
            [
                'name' => 'पूर्वाधार विकास कार्यालय, कैलाली',
                'parent_id' => 6,
                'english-name' => 'Infrastructure Development Office, Kailali',
            ],
            [
                'name' => 'पूर्वाधार विकास कार्यालय, बैतडी',
                'parent_id' => 6,
                'english-name' => 'Infrastructure Development Office, Baitadi',
            ],
            [
                'name' => 'पूर्वाधार विकास कार्यालय, अछाम',
                'parent_id' => 6,
                'english-name' => 'Infrastructure Development Office, Achham',
            ],
            [
                'name' => 'पूर्वाधार विकास कार्यालय, डडेल्धुरा',
                'parent_id' => 6,
                'english-name' => 'Infrastructure Development Office, Dadeldhura',
            ],
            [
                'name' => 'पूर्वाधार विकास कार्यालय, बझाङ्ग',
                'parent_id' => 6,
                'english-name' => 'Infrastructure Development Office, Bajhang',
            ],
            [
                'name' => 'पूर्वाधार विकास कार्यालय, कञ्चनपुर',
                'parent_id' => 6,
                'english-name' => 'Infrastructure Development Office, Kanchanpur',
            ],
        ];
        foreach ($offices as $office) {
            Office::firstOrCreate($office);
        }
    }
}
