<?php

namespace App\Http\Controllers\Backend;

use App\Models\Station;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StationRequest;
use App\Http\Resources\StationResource;
use App\Models\Trip;

class StationController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_stations = Station::all();
        return view('backend.station.index', compact('all_stations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $trips= Trip::all();
        return view('backend.station.create',compact('trips'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StationResource  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StationRequest $request)
    {

        $station = new Station();

        saveOrUpdateModel($request->all(), $station);
        session()->flash('status', 'Task was successful!');
        return redirect()->to('admin/station');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function show(Station $station)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function edit(Station $station)
    {
        $trips=Trip::all();
        $data = Station::find($station->id);
        return view('backend.station.edit', compact(['data','trips']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StationRequest  $request
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function update(StationRequest $request, Station $station)
    {

        $station = Station::find($station->id);
        saveOrUpdateModel($request->all(), $station);
        $request->session()->flash('status', 'Task was successful!');
        return redirect()->to('admin/station');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function destroy(Station $station)
    {
        $station->delete();
        return redirect()->back();
    }
}
