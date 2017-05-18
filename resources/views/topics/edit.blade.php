@extends('dashboard')

@section('pre-javascript')
<script src="{{ url('js/ckeditor/ckeditor.js') }}"></script>
@stop

@section('javascript')
<script>
CKEDITOR.replace('body',
{ wordcount : {
  showWordCount: true,
  showCharCount: true,
  maxWordCount: -1,
  maxCharCount: 2000
  }
});
CKEDITOR.replace('description',
{ wordcount : {
  showWordCount: true,
  showCharCount: true,
  maxWordCount: -1,
  maxCharCount: 205
  }
});
</script>
@stop

@section('content')

  @if ($user=Auth::user())
  <div class="row">
      <div class="col-md-12">
          <h1>Topic : Edit</h1>
      </div>
  </div>

  <div class="row">
      <div class="col-md-6 raw-margin-bottom-24">
          <div>
              <style>
                .disabled { pointer-events: none; }
              </style>

              {!! Form::model($topic, ['route' => ['topics.update', $topic->id],  'method' => 'patch', 'files' => true ]) !!}
                  {!! csrf_field() !!}
                  {!! method_field('PATCH') !!}

                  @if (in_array($user->roles->first()->name, ['admin','redaktur','wakilpemimpinredaksi','pemimpinredaksi']))

                  @form_maker_object($topic,[
                    'name'=>['alt_name'=>'Judul'],
                    'description'=>['type'=>'text','alt_name'=>'Deskripsi Singkat'],
                    'body'=>['type'=>'text','alt_name'=>'Tajuk Rencana'],
                    'user_id'=>['type'=>'hidden'],
                    'status'=>['type'=>'select', 'options' => [
                          'Published' => 'PUBLISHED',
                          'Draft' => 'DRAFT',
                      ]],
                    ])

                  @else

                  @form_maker_object($topic,[
                    'name'=>['alt_name'=>'Judul'],
                    'description'=>['type'=>'text','alt_name'=>'Deskripsi Singkat'],
                    'body'=>['type'=>'text','alt_name'=>'Tajuk Rencana'],
                    'user_id'=>['type'=>'hidden'],
                    'status'=>['type'=>'select', 'options' => [
                          'Published' => 'PUBLISHED',
                          'Draft' => 'DRAFT',
                      ], 'alt_name'=>'Status (Disabled, hanya untuk Redaktur ke atas)','class'=>'disabled'],
                    ])

                  @endif

                  <div class="form-group">
                    <label class="control-label" for="avatar">Foto Illustrasi</label><br />
                    <img class="img-thumbnail" src="{{ url($topic->foto->url('small')) }}">
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
  @endif

@stop
