<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Address\StoreRegion;
use App\{ Region, Area };

class RegionController extends Controller
{
    public function index()
    {
        return Region::select('id', 'area_id', 'region_name')
            ->orderBy('area_id')
            ->orderBy('region_name')
            ->get();
    }

    public function show($id)
    {
        return Region::findOrFail($id);
    }

    /**
     * Store a newly created region in storage.
     * @param StoreArea $request
     * @return \Illuminate\http\Response
     *
     */
    public function store(StoreRegion $request)
    {
        $validated = $request->validated();
        $area = Area::find($validated['area_id']);
        $area->regions()->create([
            'region_name' => $validated['region_name']
        ]);

        return response()->json(['message' => __('Region added successfully')]);

    }

}
