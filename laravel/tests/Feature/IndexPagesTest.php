<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\AuthEnv;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IndexPagesTest extends TestCase
{
    use WithFaker, AuthEnv;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    /**
     * Provider For Index Pages
     *
     * @return array
     */
    public function providerIndexPages()
    {
        return [
            [ "descriptors.index",        "<h1>Descriptors</h1>" ],
            [ "email.index",              "<h1>Emails Templates</h1>" ],
            [ "merchants.index",          "<h1>Merchants</h1>" ],
            [ "offers.index",             "<h1>Offers</h1>" ],
            [ "partners.index",           "<h1>Partners</h1>" ],
            [ "product_sites.index",      "<h1>Product Sites</h1>" ],
            [ "rawclicks.index",          "<h1>Raw Clicks</h1>" ],
            [ "sms.index",                "<h1>SMS Templates</h1>" ],
            [ "landing_pages.index",     "<h1>Domains</h1>" ],
            [ "templates_html.index",     "<h1>Template HTMLs</h1>" ],
            [ "userclicks.index",         "<h1>Conversions</h1>" ],
        ];
    }

    /**
     * @param string $route
     * @param string $text
     * @dataProvider providerIndexPages
     */
    public function testIndexPages($route, $text)
    {
        $this->createUser();
        $response = $this->actingAs($this->user)->get(route($route));

        $response
            ->assertStatus(200)
            ->assertSee($text)
        ;
    }
}
