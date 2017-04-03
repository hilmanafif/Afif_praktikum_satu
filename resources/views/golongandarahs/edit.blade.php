@extends('dashboard')

@section('content')

  <div class="row">
      <div class="col-md-12">
          <h1>GolonganDarah : Edit</h1>
      </div>
  </div>

  <div class="row">
      <div class="col-md-6 raw-margin-bottom-24">
          <div>
              {!! Form::model($golongandarah, ['route' => ['golongandarahs.update', $golongandarah->id], 'method' => 'patch']) !!}
                  {!! csrf_field() !!}
                  {!! method_field('PATCH') !!}

                  @form_maker_object($golongandarah, FormMaker::getTableColumns('golongandarahs'))

                  <div class="raw-margin-top-24">
                      <a class="btn btn-default pull-left" href="{!! route('golongandarahs.index') !!}">Cancel</a>
                      <button class="btn btn-primary pull-right" type="submit">Save</button>
                  </div>

            {!! Form::close() !!}
          </div>
      </div>
  </div>

@stop
