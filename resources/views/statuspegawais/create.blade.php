@extends('dashboard')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Status Pegawai : Create</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-6 raw-margin-bottom-24">

            {!! Form::open(['route' => 'statuspegawais.store']) !!}
                {!! csrf_field() !!}

                @form_maker_table("statuspegawais")

                <div class="raw-margin-top-24">
                    <a class="btn btn-default pull-left" href="{!! route('statuspegawais.index') !!}">Cancel</a>
                    <button class="btn btn-primary pull-right" type="submit">Create</button>
                </div>

            {!! Form::close() !!}
        </div>

    </div>
</div>

@stop
