<?php

namespace Tests\Feature\ProductSites;

use App\Models\ProductSite;
use Tests\AuthEnv;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductSiteDeleteTest extends TestCase
{
    use AuthEnv, WithFaker;

    public function testDeleteProductSite()
    {
        $tableName = (new ProductSite())->getTable();

        $this->createUser();
        $product_site = ProductSite::inRandomOrder()->first();

        $response = $this->actingAs($this->user)->deleteJson(route('product_sites.destroy', ['product_site' => $product_site]));

        $response->assertStatus(302);

        $this->assertDatabaseMissing($tableName, [
            'id' => $product_site->id,
        ]);
    }
}
