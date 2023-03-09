<?php

namespace App\Http\Controllers;

use App\Http\Requests\IsAvilbelRequest;
use App\Http\Requests\ReserveRequest;
use App\Http\Resources\AvailabilResource;
use App\Http\Resources\SeatResource;
use App\Http\Resources\StationResource;
use App\Http\Resources\TripResource;
use App\Models\Availability;
use App\Models\Reservation;
use App\Models\Station;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontEndController extends Controller
{
    public function getAvilble()
    {
        $stations= StationResource::collection(Station::all());
        $trips=  TripResource::collection( Trip::all());
        $availability = AvailabilResource::collection(Availability::with(['trip', 'startstation', 'endstation'])->where('isavilable', 1)->get());

        return  responseSuccessData(['trips'=>$trips,'availability'=>$availability,'stations'=>$stations]);
    }


    public function reserve(ReserveRequest $request)
    {
        $check = Availability::where('trip_id', $request->trip_id)->where('seat_id', $request->seat_id)->where('from_station_id', '>=', $request->from_station_id)->where('to_station_id', '<=', $request->to_station_id)->get();

        if (empty($check->toArray())) {
            return 'invalid seat in this trip';
        }
        foreach ($check as $row) {
            if ($row->isavilable == 0) {
                return 'this seat is unavilble';
            }
        }
        $user = Auth::user();
        $reserve = new Reservation();
        $reserve->user_id = $user->id;
        $reserve->trip_id = $request->trip_id;
        $reserve->from_station_id = $request->from_station_id;
        $reserve->to_station_id = $request->to_station_id;
        $reserve->seat_id = $request->seat_id;
        $reserve->save();

        for ($x = $request->from_station_id; $x < $request->to_station_id; $x++) {
            $seat = Availability::where('from_station_id', $x)->where('seat_id', $request->seat_id)->first();

            $seat->isavilable = 0;
            $seat->save();
        }
        return  responseSuccessData('Seat is reserved');
    }

    public function isAvilbel(IsAvilbelRequest $request){
        $check = Availability::where('trip_id', $request->trip_id)->where('from_station_id', '=', $request->from_station_id)->where('to_station_id', '=', $request->to_station_id)->where('isavilable',1)->get();

        if (empty($check->toArray())) {
            return 'invalid seat in this trip';
        }
        foreach ($check as $row) {
            if ($row->isavilable == 0) {
                return 'this seat is unavilble';
            }
        }
        $user = Auth::user();
        $reserve = new Reservation();
        $reserve->user_id = $user->id;
        $reserve->trip_id = $request->trip_id;
        $reserve->from_station_id = $request->from_station_id;
        $reserve->to_station_id = $request->to_station_id;
        $reserve->seat_id = $check[0]->seat_id;
        $reserve->save();

        for ($x = $request->from_station_id; $x < $request->to_station_id; $x++) {
            $seat = Availability::where('from_station_id', $x)->where('seat_id', $check[0]->seat_id)->first();

            $seat->isavilable = 0;
            $seat->save();
        }
        return  responseSuccessData('Seat is reserved');
    }
}
