<?php

namespace Tests\Feature\ProductSites;

use App\Models\Site;
use Tests\AuthEnv;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductSiteCreateTest extends TestCase
{
    use AuthEnv, WithFaker;

    public function testCreateProductSite()
    {
        $tableName = (new Site())->getTable();

        $this->createUser();

        $data = [
            'product_site-name' => $this->faker->colorName,
            'product_site-url' => $this->faker->url,
        ];

        $response = $this->actingAs($this->user)->postJson(route('product_sites.store'), $data);

        $response->assertStatus(302);

        $this->assertDatabaseHas($tableName, [
             'name' => $data['product_site-name'],
             'url' => $data['product_site-url'],
        ]);
    }
}
