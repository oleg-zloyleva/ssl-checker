<?php

namespace App\Models;

use App\Http\Requests\ProductSiteRequest;
use App\Models\Traits\Pagination;
use App\Models\Traits\Search;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * App\Models\ProductSite
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Merchant[] $merchants
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductSite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductSite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductSite query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductSite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductSite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductSite whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductSite whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductSite whereUrl($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Descriptor[] $descriptors
 */
class ProductSite extends Model
{
    protected $searchable = [ 'name', 'url' ];
    protected $fillable = [ 'name', 'url' ];

    use Search, Pagination;

    public function merchants()
    {
        return $this->hasMany(Merchant::class);
    }

    public function descriptors()
    {
        return $this->hasMany(Descriptor::class);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Builder
     */
    public function getAll(Request $request)
    {
        $query = $this->query()->latest();

        if ($request->has('search')) {
            $this->addSearch($query, $request->get('search'), $this->searchable);
        }

        return $this->addPagination($query, $request->query());
    }

    /**
     * @param \App\Http\Requests\ProductSiteRequest $request
     * @return bool
     */
    public function storeProductSite(ProductSiteRequest $request)
    {
        $this->name = $request->get('product_site-name');
        $this->url = $request->get('product_site-url');

        return $this->save();
    }

    /**
     * @param \App\Http\Requests\ProductSiteRequest $request
     * @return bool
     */
    public function updateProductSite(ProductSiteRequest $request)
    {
        $this->name = $request->get('product_site-name');
        $this->url = $request->get('product_site-url');

        return $this->save();
    }
}
