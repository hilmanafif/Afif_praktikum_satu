@extends('dashboard')

@section('content')

  <div class="row">
      <div class="col-md-12">
          <h1>Employmentstatus : Edit</h1>
      </div>
  </div>

  <div class="row">
      <div class="col-md-6 raw-margin-bottom-24">
          <div>
              {!! Form::model($employmentstatus, ['route' => ['employmentstatuses.update', $employmentstatus->id], 'method' => 'patch']) !!}
                  {!! csrf_field() !!}
                  {!! method_field('PATCH') !!}

                  @form_maker_object($employmentstatus, FormMaker::getTableColumns('employmentstatuses'))

                  <div class="raw-margin-top-24">
                      <a class="btn btn-default" href="{{ URL::previous() }}">Cancel</a>
                      <button class="btn btn-primary pull-right" type="submit">Save</button>
                  </div>

            {!! Form::close() !!}
          </div>
      </div>
  </div>

@stop
