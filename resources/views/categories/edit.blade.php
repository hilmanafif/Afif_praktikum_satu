@extends('dashboard')

@section('content')

  <div class="row">
      <div class="col-md-12">
          <h1>Jendela : Edit</h1>
      </div>
  </div>

  <div class="row">
      <div class="col-md-6 raw-margin-bottom-24">
          <div>
              {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'patch', 'files' => true]) !!}
                  {!! csrf_field() !!}
                  {!! method_field('PATCH') !!}

                  @form_maker_object($category,[
                    'name'=>['alt_name'=>'Judul Jendela'],
                    'description'=>['type'=>'text','alt_name'=>'Deskripsi Singkat'],
                    ])
                    <div class="form-group">
                      <label class="control-label" for="avatar">Foto Illustrasi</label><br />
                      <img class="img-thumbnail" src="{{ url($category->foto->url('small')) }}">
                      <input type="file" name="foto">
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
