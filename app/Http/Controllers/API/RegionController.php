<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Region;

class RegionController extends Controller
{
    public function index()
    {
        return Region::all(['id','region_name', 'area_id']);
    }

    public function show($id)
    {
        return Region::findOrFail($id);
    }
}
