<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationStoreRequest;
use App\Http\Resources\ReservationResource;
use App\Location;
use App\Reservation;
use App\User;

class ReservationController extends Controller
{
    public function store(ReservationStoreRequest $request)
    {
        $reservation = Reservation::create([
            'user_id' => $request->user_id ?? User::first()->id,
            'location_id' => $request->location_id ?? Location::first()->id,
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'phone' => $request->phone,
            'date' => $request->date,
            'time' => $request->time,
            'duration' => $request->duration,
            'adult' => $request->adult,
            'more' => $request->more,
        ]);

        return new ReservationResource($reservation);
    }
}
