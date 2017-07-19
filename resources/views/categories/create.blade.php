@extends('dashboard')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Jendela: Create</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-6 raw-margin-bottom-24">

            {!! Form::open(['route' => 'categories.store', 'files' => true]) !!}
                {!! csrf_field() !!}

                @form_maker_table("categories",[
                  'name'=>['alt_name'=>'Judul Jendela'],
                  'description'=>['type'=>'text','alt_name'=>'Deskripsi Singkat'],
                  'foto'=>['alt_name'=>'Foto Ilustrasi','type'=>'file'],
                  ])

                <div class="raw-margin-top-24">
                    <a class="btn btn-default pull-left" href="{{ URL::previous() }}">Cancel</a>
                    <button class="btn btn-primary pull-right" type="submit">Create</button>
                </div>

            {!! Form::close() !!}
        </div>

    </div>
</div>

@stop
