@extends('dashboard')

@section('content')

  <div class="row">
      <div class="col-md-12">
          <h1>General Information</h1>
      </div>
  </div>

  <div class="row">
      <div class="col-md-6 raw-margin-bottom-24">
          <div>
              {!! Form::model($company, ['route' => ['companies.update', $company->id], 'method' => 'patch', 'files' => true]) !!}
                  {!! csrf_field() !!}
                  {!! method_field('PATCH') !!}

                      @form_maker_object($company, [
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
                        'officer_name'=>[]
                        ])
                  <div class="form-group">
                    <label class="control-label" for="avatar">Logo</label><br />
                    <img class="img-thumbnail" src="{{ url($company->logo->url('small')) }}">
                    <input type="file" name="logo">
                  </div>

                  <div class="raw-margin-top-24">
                      <a class="btn btn-default" href="{{ URL::previous() }}">Cancel</a>
                      <button class="btn btn-primary pull-right" type="submit">Save</button>
                  </div>

            {!! Form::close() !!}
          </div>
      </div>
  </div>

@stop
