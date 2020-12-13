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
        return Area::select('id', 'area_name')->orderBy('area_name')->get();
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
        $area->area_name = $validated['area_name'];
        $area->save();
        return response()->json(['message' => 'Area added successfully']);
    }

    /**
     * Update the area by id
     * @group Address
     * @param StoreArea $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        // $validated = $request->validated();
        $uri = $request->path();
        $ipAddress = $request->ip();
        dd($uri, $id, $request->all());
        return response()->json(['message' => 'Area updated successfully']);
    }
}
