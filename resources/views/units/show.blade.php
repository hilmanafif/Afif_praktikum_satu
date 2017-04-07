@extends('dashboard')

@section('content')

    <div class="row">
        <div class="col-md-12">
        <h1>{{ $unit->name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        Modify this page for detailed show/info.
        </div>
    </div>
    {!! link_to(URL::previous(), 'Back', ['class' => 'btn btn-default btn-primary pull-right']) !!}
@stop
