@extends('adminlte::page')

@section('title', 'Create Station')

@section('content_header')
    <h1>Create Station</h1>
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
    <div class="card-header">{{ __('Station') }}</div>
    <div class="card-body">
        <form action="{{ url('admin/station') }}" method="post">
        @csrf
        <div class="row">
            <x-adminlte-input name="station_name" label="Station Name" placeholder="Name"
                fgroup-class="col-md-6" disable-feedback/>
        </div>
        <x-adminlte-select name="trip_id" label="Trip">
            <option selected disabled>choose option</option>
            @foreach ($trips as $item)
                <option value="{{ $item->id }}" >
                    {{ $item->title }}</option>
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
