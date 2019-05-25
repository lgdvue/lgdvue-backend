<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationStoreRequest;
use App\Http\Resources\LocationCollection;
use App\Http\Resources\LocationResource;
use App\Location;
use App\User;

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

    public function store(LocationStoreRequest $request)
    {
        $location = Location::create([
            'latitude' => $request->lat,
            'longitude' => $request->lng,
            'user_id' => $request->user_id ?? User::first()->id,
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return new LocationResource($location);
    }
}
