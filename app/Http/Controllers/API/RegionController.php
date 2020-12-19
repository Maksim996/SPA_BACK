<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Address\StoreRegion;
use App\Models\{ Region, Area };

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
     *
     * @param StoreArea $request
     * @return \Illuminate\http\Response
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
     * Update the Region.
     *
     * @param StoreRegion $request
     * @param \App\Models\Region $region
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRegion $request, Region $region)
    {
        $region->update( $request->validated() );
        return response()->json(['message' => __('Data updated successfully')], 200);
    }

    /**
     * Remove the region resource from storage.
     *
     * @param \App\Models\Region $region
     * @return \illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
        $region->delete();
        return response()->json(['message' => __('Data deleted successfully')], 200);
    }

}
