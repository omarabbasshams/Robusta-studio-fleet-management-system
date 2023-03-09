@extends('adminlte::page')

@section('title', ' Trip')

@section('content_header')
    <h1>Trip</h1>
@stop

@section('content')
@php
$heads = [
    'ID',
    'Station Name',
    'Trip Name',
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
];


$config = [
    'data' => $all_stations,
    'order' => [[1, 'asc']],
    'columns' => [null, null, null, ['orderable' => false]],
];
@endphp

{{-- Minimal example / fill data using the component slot --}}
<a href="{{ url('admin/station/create') }}" class="btn btn-primary">{{ __('Create') }}</a>
<x-adminlte-datatable id="table1" :heads="$heads">
    @foreach($all_stations as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->station_name }}</td>
            <td>{{$row->trip? $row->trip->trip_name : '' }}</td>
            <td><a href="{{ url('admin/station/'.$row->id.'/edit') }}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ url('admin/station/'.$row->id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-danger" value="Delete"/>
                </form>
            </td>

        </tr>
    @endforeach
</x-adminlte-datatable>

{{-- Compressed with style options / fill data using the plugin config --}}

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
