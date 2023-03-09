<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TripRequest;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_trips = Trip::all();
        return view('backend.trip.index', compact('all_trips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.trip.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\TripRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TripRequest $request)
    {

        $trip = new trip();

        saveOrUpdateModel($request->all(), $trip);
        session()->flash('status', 'Task was successful!');
        return redirect()->to('admin/trip');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trip  $aboutus
     * @return \Illuminate\Http\Response
     */
    public function show(Trip $trip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trip  $aboutus
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $trip)
    {

        $data = Trip::find($trip->id);
        return view('backend.trip.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\TripRequest  $request
     * @param  \App\Models\Trip  $aboutus
     * @return \Illuminate\Http\Response
     */
    public function update(TripRequest $request, Trip $trip)
    {

        $aboutus = Trip::find($trip->id);
        saveOrUpdateModel($request->all(), $aboutus, $request->local);
        $request->session()->flash('status', 'Task was successful!');
        return redirect()->to('admin/trip');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trip  $aboutus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trip $trip)
    {
        $trip->delete();
        return redirect()->back();
    }

}
