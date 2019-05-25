<?php

namespace App\Http\Controllers;

use App\Http\Resources\LocationCollection;
use App\Location;

class LocationController extends Controller
{
    public function index()
    {
        return new LocationCollection(Location::all());
    }
}
