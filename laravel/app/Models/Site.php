<?php

namespace App\Models;

use App\Http\Requests\SiteRequest;
use App\Models\Traits\Pagination;
use App\Models\Traits\Search;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * App\Models\Site
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Merchant[] $merchants
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Site whereUrl($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Descriptor[] $descriptors
 */
class Site extends Model
{
    protected $searchable = [ 'name', 'url' ];
    protected $fillable = [ 'name', 'url' ];

    use Search, Pagination;

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
     * @param \App\Http\Requests\SiteRequest $request
     * @return bool
     */
    public function storeProductSite(SiteRequest $request)
    {
        $this->name = $request->get('name');
        $this->url = $request->get('url');

        return $this->save();
    }

    /**
     * @param \App\Http\Requests\SiteRequest $request
     * @return bool
     */
    public function updateProductSite(SiteRequest $request)
    {
        $this->name = $request->get('name');
        $this->url = $request->get('url');

        return $this->save();
    }
}
