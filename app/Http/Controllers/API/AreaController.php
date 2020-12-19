<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Address\StoreArea;
use App\Models\Area;

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
        return response()->json(['message' => __('Data saved successfully')], 201);
    }

    /**
     * Update the Area.
     *
     * @param  StoreArea $request
     * @param  \App\Models\Area $area
     * @return \Illuminate\Http\Response
     */
    public function update(StoreArea $request, Area $area)
    {
        $validated = $request->validated();
        $area->area = $validated['area'];
        $area->save();
        return response()->json(['message' => __('Data updated successfully')], 200);
    }

    /**
     * Remove the area resource from storage.
     *
     * @param \App\Models\Area $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $area->delete();
        return response()->json(['message' => __('Data deleted successfully')], 200);
    }

}
