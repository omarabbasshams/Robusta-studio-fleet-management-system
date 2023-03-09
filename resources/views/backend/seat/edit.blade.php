@extends('adminlte::page')

@section('title', 'Edit Seat')

@section('content_header')
    <h1>Edit Seat</h1>
@stop

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card">
    <div class="card-header">{{ __('Seat') }}</div>
    <div class="card-body">
        <form action="{{ url('admin/seat/' . $data->id) }}" method="post">
            @method('PUT')
            @csrf
        @csrf
        <x-adminlte-select name="seat_no" label="Seat">
            <option selected disabled>choose option</option>
            @foreach ($seats as $seat)

            <option value="{{ $seat }}" {{ $seat == $data->seat_no ? 'selected' : '' }} >
                {{$seat}}</option>
            @endforeach
        </x-adminlte-select>
        <x-adminlte-select name="trip_id" label="Trip">
            <option selected disabled>choose option</option>
            @foreach ($trips as $item)
                <option value="{{ $item->id }}" {{ $item->id == $data->trip_id ? 'selected' : '' }}>
                    {{ $item->trip_name }}</option>
            @endforeach
        </x-adminlte-select>

        <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success" icon="fas fa-lg fa-save"/>

        </form>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
