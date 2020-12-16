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
        return Region::select('id', 'area_id', 'region')
            ->orderBy('area_id')
            ->orderBy('region')
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
            'region' => $validated['region']
        ]);

        return response()->json(['message' => __('Region added successfully')], 201);

    }
    /**
     * Update the give region.
     *
     * @param StoreRegion $request
     * @param integer $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRegion $request, $id)
    {
        $validated = $request->validated();

        $region = new Region([ $validated['regin'] ]);
        $area = Area::find($validated['area_id']);
        $area->region()->save($region);

        return response()->json(['message' => __('Data updated successfully')], 200);
    }

}
