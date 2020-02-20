<?php

namespace Tests;

use App\Models\Email;
use App\Models\Offer;
use App\Models\Sms;
use App\Models\UserClick;

trait DatabaseFactories
{
    public function offerInfo()
    {
        return [
            'campaign_id' => 1, // Real Campaign Id For SandBox Testing
            'product_id' => 1, // Real Product Id For SandBox Testing
            'country_iso' => 'US', // Real Country ISO For SandBox Testing Products
            'country' => 'United States',
        ];
    }

    public function createUserClick($data):UserClick
    {
        return factory(UserClick::class)->create($data);
    }

    public function createOffer(array $offerInfo)
    {
        /** @var Email $email */
        $email = factory(Email::class)->create([
            'name' => 'Email For PHPUnit Testing',
            'message' => '[userName] / [site] / [mailAddress] / [password]',
        ]);

        /** @var Sms $sms */
        $sms = factory(Sms::class)->create([
            'name' => 'Sms For PHPUnit Testing',
            'message' => '[userName] / [site]',
        ]);

        /** @var Offer $offer */
        $offer = factory(Offer::class)->create([
            'campaign_id' => $offerInfo['campaign_id'],
            'product_id_visa' => $offerInfo['product_id'],
            'product_id_master' => $offerInfo['product_id'],
            'email_id' => $email->id,
            'sms_id' => $sms->id,
        ]);

        return $offer;
    }
}
