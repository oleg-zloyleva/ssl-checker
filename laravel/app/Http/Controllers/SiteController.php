<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteRequest;
use App\Models\Merchant;
use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Site $site
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Site $site)
    {
        return view('product_sites.index', [
            'product_sites' => $site->getAll($request),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product_sites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\SiteRequest $request
     * @param \App\Models\Site $site
     * @return \Illuminate\Http\Response
     */
    public function store(SiteRequest $request, Site $site)
    {
        $site->storeProductSite($request);

        return redirect()->route('product_sites.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        return view('sites.edit', [
            'site' => $site,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\SiteRequest $request
     * @param \App\Models\Site $site
     * @return \Illuminate\Http\Response
     */
    public function update(SiteRequest $request, Site $site)
    {
        $site->updateProductSite($request);
        return redirect()->route('sites.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Site $site
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Site $site)
    {
        $site->delete();
        return redirect()->route('sites.index');
    }
}
