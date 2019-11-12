<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductSiteRequest;
use App\Models\Merchant;
use App\Models\ProductSite;
use Illuminate\Http\Request;

class ProductSiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ProductSite $productSite
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ProductSite $productSite)
    {
        return view('product_sites.index', [
            'product_sites' => $productSite->getAll($request),
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
     * @param \App\Http\Requests\ProductSiteRequest $request
     * @param \App\Models\ProductSite $productSite
     * @return \Illuminate\Http\Response
     */
    public function store(ProductSiteRequest $request, ProductSite $productSite)
    {
        $productSite->storeProductSite($request);

        return redirect()->route('product_sites.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductSite  $productSite
     * @return \Illuminate\Http\Response
     */
    public function show(ProductSite $productSite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductSite  $productSite
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductSite $productSite)
    {
        return view('product_sites.edit', [
            'product_site' => $productSite,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\ProductSiteRequest $request
     * @param \App\Models\ProductSite $productSite
     * @return \Illuminate\Http\Response
     */
    public function update(ProductSiteRequest $request, ProductSite $productSite)
    {
        $productSite->updateProductSite($request);
        return redirect()->route('product_sites.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ProductSite $productSite
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(ProductSite $productSite)
    {
        $productSite->delete();
        return redirect()->route('product_sites.index');
    }
}
