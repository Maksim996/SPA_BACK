<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Address\StoreAddress;
use App\Models\{ Address, City };

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Address::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAddress  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddress $request)
    {
        $validated = $request->validated();
        $city = City::findOrFail($validated['city_id']);
        $city->addresses()->create($validated);

        return response()->json(['message' => __('Data saved successfully')], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  StoreAddress $request
     * @param  \App\Models\Address $address
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAddress $request, Address $address)
    {
        $address->update( $request->validated() );
        return response()->json(['message' => __('Data updated successfully')], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return response()->json(['message' => __('Data deleted successfully')], 200);
    }
}
