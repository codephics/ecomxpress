<?php

namespace App\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;

use App\Models\Ecommerce\Ecommerce;
use App\Models\Ecommerce\EcommerceSite;

use Illuminate\Http\Request;

class EcommerceSiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Ecommerce::take(60)->get();

        return view('frontend.ecommerce.items', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SiteTemplates $siteTemplates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SiteTemplates $siteTemplates)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SiteTemplates $siteTemplates)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SiteTemplates $siteTemplates)
    {
        //
    }
}
