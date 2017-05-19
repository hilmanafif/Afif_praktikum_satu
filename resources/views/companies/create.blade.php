@extends('dashboard')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1>Companies : Create</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-6 raw-margin-bottom-24">

            {!! Form::open(['route' => 'companies.store', 'files' => true]) !!}
                {!! csrf_field() !!}

                @form_maker_table("companies",[
                  'name'=>['alt_name'=>'Name'],
                  'tax'=>['alt_name'=>'Tax Identification Number'],
                  'reg'=>['alt_name'=>'Legal Registry / Certificate'],
                  'phone'=>[],
                  'fax'=>[],
                  'address1'=>[],
                  'address2'=>[],
                  'city'=>[],
                  'province'=>[],
                  'zip'=>[],
                  'country'=>[],
                  'timezone'=>[],
                  'currency'=>[],
                  'officer_position'=>[],
                  'officer_name'=>[],
                  'logo'=>['type'=>'file'],
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
