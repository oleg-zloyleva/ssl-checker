<?php
namespace App\Models\Traits;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\Paginator;
trait Pagination
{
    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param array $params
     * @param int|null $per_page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Builder
     */
    public function addPagination(Builder $query, array $params, int $per_page = null)
    {
        if($per_page === 'all'){
            $per_page = $query->count();
        }
        $query = $query->paginate($per_page ?? config('custom.page.perPage'));
        foreach ($params as $paramKey => $paramValue) {
            $query->appends($paramKey, $paramValue);
        }
        return $query;
    }
}