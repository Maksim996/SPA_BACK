<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Area; // need move to dir Models;

class AreaController extends Controller
{
    public function index()
    {
        return Area::all();
    }
    /**
     * Show address
     *
     * @param integer $id
     * @return json
     */
    public function show($id)
    {
        return Area::findOrFail($id);
    }

    public function create(Request $request) {
        //
    }
}
