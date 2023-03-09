@extends('adminlte::page')

@section('title', 'Edit Trip')

@section('content_header')
    <h1>Edit Trip</h1>
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
    <div class="card-header">{{ __('Trip') }}</div>
    <div class="card-body">
        <form action="{{ url('admin/trip/' . $data->id) }}" method="post">
            @method('PUT')
            @csrf
        @csrf
        <div class="row">
            <x-adminlte-input name="trip_name" label="Trip Name" placeholder="Name" value="{{ $data->trip_name }}"
                fgroup-class="col-md-6" disable-feedback/>
        </div>

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
