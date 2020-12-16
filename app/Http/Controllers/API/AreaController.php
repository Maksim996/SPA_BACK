<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Address\StoreArea;
use App\Area; // !need move to dir Models;

class AreaController extends Controller
{
    /**
     * Display a listing Areas ordered by a-z.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Area::select('id', 'area')->orderBy('area')->get();
    }

    /**
     * Show address by id
     *
     * @param integer $id
     * @return Response
     */
    public function show($id)
    {
        return Area::findOrFail($id);
    }

    /**
     * Store a newly area.
     *
     * @param StoreArea $request
     * @return \illuminate\Http\Response
     */
    public function store(StoreArea $request) {
        $validated = $request->validated();

        $area = new Area;
        $area->area = $validated['area'];
        $area->save();
        return response()->json(['message' => __('Area added successfully')], 201);
    }

    /**
     * Update the Area.
     *
     * @param  StoreArea $request
     * @param  \App\Area $area
     * @return \Illuminate\Http\Response
     */
    public function update(StoreArea $request, Area $area)
    {
        $validated = $request->validated();
        $area->area = $validated['area'];
        $area->save();
        return response()->json(['message' => __('Data updated successfully')], 200);
    }

}
