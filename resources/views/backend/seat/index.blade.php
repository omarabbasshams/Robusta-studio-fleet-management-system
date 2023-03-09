@extends('adminlte::page')

@section('title', ' Seat')

@section('content_header')
    <h1>Trip</h1>
@stop

@section('content')
@php
$heads = [
    'ID',
    'Seat_no',
    'Trip Name',
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
];


$config = [
    'data' => $all_seats,
    'order' => [[1, 'asc']],
    'columns' => [null, null, null, ['orderable' => false]],
];
@endphp

{{-- Minimal example / fill data using the component slot --}}
<a href="{{ url('admin/seat/create') }}" class="btn btn-primary">{{ __('Create') }}</a>
<x-adminlte-datatable id="table1" :heads="$heads">
    @foreach($all_seats as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->seat_no }}</td>
            <td>{{$row->trip? $row->trip->trip_name : '' }}</td>
            <td><a href="{{ url('admin/seat/'.$row->id.'/edit') }}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ url('admin/seat/'.$row->id) }}" method="POST">
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
