@extends('adminlte::page')

@section('title', ' Trip')

@section('content_header')
    <h1>Trip</h1>
@stop

@section('content')
@php
$heads = [
    'ID',
    'Trip Name',
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
];


$config = [
    'data' => $all_trips,
    'order' => [[1, 'asc']],
    'columns' => [null, null, null, ['orderable' => false]],
];
@endphp

{{-- Minimal example / fill data using the component slot --}}
<a href="{{ url('admin/trip/create') }}" class="btn btn-primary">{{ __('Create') }}</a>
<x-adminlte-datatable id="table1" :heads="$heads">
    @foreach($all_trips as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->trip_name }}</td>
            <td><a href="{{ url('admin/trip/'.$row->id.'/edit') }}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ url('admin/trip/'.$row->id) }}" method="POST">
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
