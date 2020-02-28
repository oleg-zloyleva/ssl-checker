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
            'fillyogafee.com',
            'fillingyoga.com',
            'foodstfee.com',
            'findyourfoodstyle.com',
            'nspirecfee.com',
            'inspireforcooking.com',
            'mrthxfee.com',
            'marathonexpert.com',
            'pwrliftfee.com',
            'powerliftguru.com',
            'ydworkofee.com',
            'yourdailyworkouts.com',
            'yfitnessch.com',
            'yourfitnesstrainer365.com',
            'yperffoodch.com',
            'yourperfectfood.com',
            'prnslchief.com',
            'yourpersonalchief.com',
            'ysmchef.com',
            'yoursmartchef.com',
            'nmarketfee.com',
            'newmarketingskills.com',
            'smmknwlfee.com',
            'smmknowledge.com',
            'wwseofee.com',
            'workwithseo.com',
            'mrktspheref.com',
            'yourmarketingsphere.com',
            'advertipsfee.com',
            'getadvertisingtips.com',
            'yrnbbaby.com',
            'yournewbornbabycare.com',
            'crstodler.com',
            'curioustodler.com',
            'mchlhood.com',
            'mischievouschildhood.com',
            'tipschild.com',
            'tipsforyourschoolchild.com',
            'tngfeatur.com',
            'teenagefeatures.com',
            'bemyfitmotivator.com',
            'comeonmarketing.com',
            'takeandlove.com',
            'yogamoodon.com',
            'yourperfectshoot.com',
            'sunnystudio.com.ua',
            'mmsafecheckout.com',
            'astixlimited.com',
            'columbatech.com',
            'simpleood.com',
            'topdevs.org',
            'fyogaserv.com',
            'flnyog.com',
            'flnyoga.com',
            'mrthexserv.com',
            'mrtnexp.com',
            'martnxp.com',
            'pwrliftserv.com',
            'plgur.com',
            'powerlfg.com',
            'dailywoserv.com',
            'yourdwk.com',
            'dailywkt.com',
            'fitnstrserv.com',
            'fttr365.com',
            'yfitrain.com',
            'mrktskillsserv.com',
            'smmknwserv.com',
            'wwseoserv.com',
            'mrtksphere.com',
            'gadvtserv.com',
            'ffstyleserv.com',
            'infcooksrv.com',
            'perfectfoodserv.com',
            'prsnchiefserv.com',
            'ysmchedserv.com',
            'bmfitmot.com',
            'cmonmark.com',
            'tkndlove.com',
            'ygmoodn.com',
            'yprfshoot.com',
            'dirtyfans.com'
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
