<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Address\StoreArea;
use App\Area; // !need move to dir Models;

class AreaController extends Controller
{
    /**
     * Display a listing area.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Area::select('id', 'area')->orderBy('area')->get();
    }

    /**
     * Show address
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
        return response()->json(['message' => 'Area added successfully'], 201);
    }

    /**
     * Update the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreArea $request, $id)
    {
        $validated = $request->validated();
        $area = Area::find($id);
        $area->area = $validated['area'];
        $area->save();
        return response()->json(['message' => "Updated"], 200);
    }

}
