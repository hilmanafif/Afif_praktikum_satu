@extends('dashboard')

@section('content')

  <div class="row">
      <div class="col-md-12">
          <h1>Pendidikan : Edit</h1>
      </div>
  </div>

  <div class="row">
      <div class="col-md-6 raw-margin-bottom-24">
          <div>
              {!! Form::model($pendidikan, ['route' => ['pendidikans.update', $pendidikan->id], 'method' => 'patch']) !!}
                  {!! csrf_field() !!}
                  {!! method_field('PATCH') !!}

                  @form_maker_object($pendidikan, FormMaker::getTableColumns('pendidikans'))

                  <div class="raw-margin-top-24">
                      <a class="btn btn-default pull-left" href="{!! route('pendidikans.index') !!}">Cancel</a>
                      <button class="btn btn-primary pull-right" type="submit">Save</button>
                  </div>

            {!! Form::close() !!}
          </div>
      </div>
  </div>

@stop
