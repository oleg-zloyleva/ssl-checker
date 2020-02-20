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
            'bemyfitmotivator' => 'bemyfitmotivator.com',
            'comeonmarketing' => 'comeonmarketing.com',
            'takeandlove' => 'takeandlove.com',
            'yogamoodon' => 'yogamoodon.com',
            'yourperfectshoot' => 'yourperfectshoot.com',
            'sunnystudio' => 'sunnystudio.com.ua',
            'mmsafecheckout' => 'mmsafecheckout.com',
            'astixlimited' => 'astixlimited.com',
            'columbatech' => 'columbatech.com',
            'simpleood' => 'simpleood.com',
            'topdevs' => 'topdevs.org',
            'fyogaserv.com' => 'fyogaserv.com',
            'flnyog.com' => 'flnyog.com',
            'flnyoga.com' => 'flnyoga.com',
            'mrthexserv.com' => 'mrthexserv.com',
            'mrtnexp.com' => 'mrtnexp.com',
            'martnxp.com' => 'martnxp.com',
            'pwrliftserv.com' => 'pwrliftserv.com',
            'plgur.com' => 'plgur.com',
            'powerlfg.com' => 'powerlfg.com',
            'dailywoserv.com' => 'dailywoserv.com',
            'yourdwk.com' => 'yourdwk.com',
            'dailywkt.com' => 'dailywkt.com',
            'fitnstrserv.com' => 'fitnstrserv.com',
            'fttr365.com' => 'fttr365.com',
            'yfitrain.com' => 'yfitrain.com',
            'mrktskillsserv.com' => 'mrktskillsserv.com',
            'smmknwserv.com' => 'smmknwserv.com',
            'wwseoserv.com' => 'wwseoserv.com',
            'mrtksphere.com' => 'mrtksphere.com',
            'gadvtserv.com' => 'gadvtserv.com',
            'ffstyleserv.com' => 'ffstyleserv.com',
            'infcooksrv.com' => 'infcooksrv.com',
            'perfectfoodserv.com' => 'perfectfoodserv.com',
            'prsnchiefserv.com' => 'prsnchiefserv.com',
            'ysmchedserv.com' => 'ysmchedserv.com',
            'bmfitmot.com' => 'bmfitmot.com',
            'cmonmark.com' => 'cmonmark.com',
            'tkndlove.com' => 'tkndlove.com',
            'ygmoodn.com' => 'ygmoodn.com',
            'yprfshoot.com' => 'yprfshoot.com',
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
