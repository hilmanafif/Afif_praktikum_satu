@extends('dashboard')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Gaji Pokok : Create</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-6 raw-margin-bottom-24">

            {!! Form::open(['route' => 'gajipokoks.store']) !!}
                {!! csrf_field() !!}

                @form_maker_table("gajipokoks")

                <div class="raw-margin-top-24">
                    <a class="btn btn-default pull-left" href="{!! route('gajipokoks.index') !!}">Cancel</a>
                    <button class="btn btn-primary pull-right" type="submit">Create</button>
                </div>

            {!! Form::close() !!}
        </div>

    </div>
</div>

@stop
