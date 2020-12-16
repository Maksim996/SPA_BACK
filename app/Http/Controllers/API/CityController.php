<?php

namespace App\Http\Controllers\API;

use App\{ City, Region };
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Address\StoreCity;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
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

        return response()->json(['message' => __('City added successfully')]);
    }

    /**
     * Display the city.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        return $city;
    }

    /**
     * Update the specified City in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCity $request, City $city)
    {
        $validated = $request->validated();
        $region = Region::find($validated['region_id']);
        $region->cities()->save($city);
        return response()->json(['message' => __('Data updated successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }
}
