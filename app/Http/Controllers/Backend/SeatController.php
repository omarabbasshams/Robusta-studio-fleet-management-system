<?php

namespace App\Http\Controllers\Backend;

use App\Enums\Seats;
use App\Http\Controllers\Controller;
use App\Http\Requests\SeatRequest;
use App\Models\Seat;
use App\Models\Trip;
use Illuminate\Http\Request;

class SeatController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_seats = Seat::all();
        return view('backend.seat.index', compact('all_seats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $seats = Seats::bus_seats;
        $trips = Trip::all();
        return view('backend.seat.create', compact(['trips', 'seats']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\SeatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeatRequest $request)
    {

        $seat = new Seat();

        saveOrUpdateModel($request->all(), $seat);
        session()->flash('status', 'Task was successful!');
        return redirect()->to('admin/seat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seat  $station
     * @return \Illuminate\Http\Response
     */
    public function show(Seat $seat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seat  $station
     * @return \Illuminate\Http\Response
     */
    public function edit(Seat $seat)
    {
        $trips = Trip::all();
        $data = Seat::find($seat->id);
        $seats = Seats::bus_seats;
        return view('backend.seat.edit', compact(['data', 'trips', 'seats']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\SeatRequest  $request
     * @param  \App\Models\Seat  $station
     * @return \Illuminate\Http\Response
     */
    public function update(SeatRequest $request, Seat $seat)
    {

        $station = Seat::find($seat->id);
        saveOrUpdateModel($request->all(), $station);
        $request->session()->flash('status', 'Task was successful!');
        return redirect()->to('admin/seat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seat $seat)
    {
        $seat->delete();
        return redirect()->back();
    }
}
