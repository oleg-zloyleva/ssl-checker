<?php

namespace Tests\Feature\ProductSites;

use App\Models\ProductSite;
use Tests\AuthEnv;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductSiteUpdateTest extends TestCase
{
    use AuthEnv, WithFaker;

    public function testUpdateProductSite()
    {
        $tableName = (new ProductSite())->getTable();

        $this->createUser();
        $productSite = ProductSite::inRandomOrder()->first();

        $data = [
            'product_site-name' => $this->faker->colorName,
            'product_site-url' => $this->faker->url,
        ];

        $response = $this->actingAs($this->user)->putJson(route('product_sites.update', ['product_site' => $productSite]), $data);

        $response->assertStatus(302);

        $this->assertDatabaseHas($tableName, [
            'id' => $productSite->id,
            'name' => $data['product_site-name'],
            'url' => $data['product_site-url'],
        ]);
    }
}
