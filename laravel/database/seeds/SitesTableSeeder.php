<?php


use Illuminate\Database\Seeder;

class SitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $descriptors = [
            'fillyogafee.com' => 'fillingyoga.com',
            'foodstfee.com' => 'findyourfoodstyle.com',
            'inspirecfee.com' => 'inspireforcooking.com',
            'mrthxfee.com' => 'marathonexpert.com',
            'pwrliftfee.com' => 'powerliftguru.com',
            'ydworkofee.com' => 'yourdailyworkouts.com',
            'yfitnessch.com' => 'yourfitnesstrainer365.com',
            'yperffoodch.com' => 'yourperfectfood.com',
            'prnslchief.com' => 'yourpersonalchief.com',
            'ysmchef.com' => 'yoursmartchef.com',
            'nmarketfee.com' => 'newmarketingskills.com',
            'smmknwlfee.com' => 'smmknowledge.com',
            'wwseofee.com' => 'workwithseo.com',
            'mrktspheref.com' => 'yourmarketingsphere.com',
            'advertipsfee.com' => 'getadvertisingtips.com',
            'yrnbbaby.com' => 'yournewbornbabycare.com',
            'crstodler.com' => 'curioustodler.com',
            'mchlhood.com' => 'mischievouschildhood.com',
            'tipschild.com' => 'tipsforyourschoolchild.com',
            'tngfeatur.com' => 'teenagefeatures.com',
            'y' => 'bemyfitmotivator.com',
            'u' => 'comeonmarketing.com',
            'i' => 'takeandlove.com',
            'o' => 'yogamoodon.com',
            'p' => 'yourperfectshoot.com',
            'a' => 'sunnystudio.com.ua',
            'b' => 'topdevs.org',
        ];

        foreach ($descriptors as $url => $product_site_url) {

            $data = [
                'name' => strtok($product_site_url, '.'),
                'url' => $product_site_url,
            ];
            factory(\App\Models\Site::class)->create($data);
        }
    }
}
