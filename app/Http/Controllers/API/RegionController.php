<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Address\StoreRegion;
use App\Region;

class RegionController extends Controller
{
    public function index()
    {
        return Region::all(['id','region_name', 'area_id']);
    }

    public function show($id)
    {
        return Region::findOrFail($id);
    }

    /**
     * Store a newly created region in storage.
     */
    public function store(StoreRegion $request)
    {
        $validated = $request->validated();


    }

}
