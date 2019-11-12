<?php


use Illuminate\Database\Seeder;

class ProductSitesTableSeeder extends Seeder
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
        ];

        foreach ($descriptors as $url => $product_site_url) {

            $data = [
                'name' => strtok($product_site_url, '.'),
                'url' => $product_site_url,
            ];
            factory(\App\Models\ProductSite::class)->create($data);
        }
    }
}
