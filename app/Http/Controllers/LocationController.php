<?php

namespace App\Http\Controllers;

use App\Http\Resources\LocationCollection;
use App\Http\Resources\LocationResource;
use App\Location;

class LocationController extends Controller
{
    public function index()
    {
        return new LocationCollection(Location::all());
    }

    public function show(Location $location)
    {
        return new LocationResource($location);
    }
}
