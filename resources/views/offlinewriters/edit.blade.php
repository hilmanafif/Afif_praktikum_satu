@extends('dashboard')

@section('pre-javascript')
<script src="{{ url('js/ckeditor/ckeditor.js') }}"></script>
@stop

@section('javascript')
<script>
CKEDITOR.replace('description',
{ wordcount : {
  showWordCount: true,
  showCharCount: true,
  maxWordCount: -1,
  maxCharCount: 150
  }
});
</script>
@stop

@section('content')

  <div class="row">
      <div class="col-md-12">
          <h1>Non-user Writer: Edit</h1>
      </div>
  </div>

  <div class="row">
      <div class="col-md-6 raw-margin-bottom-24">
          <div>
              {!! Form::model($offlinewriter, ['route' => ['offlinewriters.update', $offlinewriter->id], 'method' => 'patch', 'files' => true ]) !!}
                  {!! csrf_field() !!}
                  {!! method_field('PATCH') !!}

                  @form_maker_object($offlinewriter, [
                    'name'=>['alt_name'=>'Nama Lengkap'],
                    'description'=>['alt_name'=>'Deskripsi Perkenalan'],
                    'twitter'=>['alt_name'=>'Akun Twitter','placeholder'=>'Format: @nama_akun'],
                    'email',
                    'phone'=>['alt_name'=>'Nomor Handphone'],
                    'status'=>['alt_name'=>'Status Publikasi','type'=>'select', 'options' => [
                          'Tampil di Frontpage' => 'STICKY',
                          'Normal' => 'NORMAL',
                      ]],
                    ])

                  <div class="form-group">
                    <label class="control-label" for="avatar">Foto Profil</label><br />
                    <img class="img-thumbnail img-circle" src="{{ url($offlinewriter->avatar->url('small')) }}">
                    <input type="file" name="avatar">
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
