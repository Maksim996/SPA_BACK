<?php

namespace App\Http\Controllers\API;

use App\Models\{ City, Region };
use App\Http\Controllers\Controller;
use App\Http\Requests\Address\StoreCity;

class CityController extends Controller
{
    /**
     * Display a listing of the Cities.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return City::all();
    }

    /**
     * Store a newly created City in storage.
     *
     * @param  \App\Http\Requests\Address\StoreCity  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCity $request)
    {
        $validated = $request->validated();

        list ('region_id'=> $id, 'city' => $city) = $validated;

        $region = Region::findOrFail($id);
        $region->cities()->create(['city' => $city]);

        return response()->json(['message' => __('Data saved successfully')], 201);
    }

    /**
     * Display the city.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        return $city;
    }

    /**
     * Update the city resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCity $request, City $city)
    {
        $validated = $request->validated();
        $city->update($validated);
        return response()->json(['message' => __('Data updated successfully')]);
    }

    /**
     * Remove the city resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return response()->json(['message' => __('Data deleted successfully')], 200);
    }
}
