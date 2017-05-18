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
        <h1>Create: Opini Pakar</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-6 raw-margin-bottom-24">

            {!! Form::open(['route' => 'contents.store', 'files' => true]) !!}
                {!! csrf_field() !!}
                <input id="topic" name="topic" type="hidden" value="{{Request::get('topic')}}">

                @if (in_array($user->roles->first()->name, ['redaktur','wakilpemimpinredaksi','pemimpinredaksi']))

                @form_maker_table("contents",[
                  'name'=>['alt_name'=>'Judul Opini'],
                  'description'=>['type'=>'text','alt_name'=>'Deskripsi Singkat'],
                  'quote'=>['type'=>'text','alt_name'=>'Quote/Kutipan Pakar'],
                  'body'=>['type'=>'text','alt_name'=>'Opini'],
                  'user_id'=>['type'=>'hidden'],
                  'offlinewriter_status'=>['alt_name'=>'Tulisan Pakar?', 'type'=>'select', 'options' => [
                        'Ya' => 'YES',
                        'Tidak (Penulis internal)' => 'NO',
                    ]],
                  'offlinewriter_id' => [
                      'type' => 'relationship',
                      'model' => 'App\Models\Offlinewriter',
                      'alt_name' => 'Nama Pakar'
                  ],
                  'category_id' => [
                      'type' => 'relationship',
                      'model' => 'App\Models\Category',
                      'alt_name' => 'Jendela'
                  ],
                  'topic_id'=>['type'=>'hidden'],
                  'status'=>['type'=>'select', 'options' => [
                        'Published' => 'PUBLISHED',
                        'Draft' => 'DRAFT',
                    ]],
                  'foto'=>['alt_name'=>'Foto Ilustrasi','type'=>'file'],
                  ])

                  @else

                  @form_maker_table("contents",[
                    'name'=>['alt_name'=>'Judul Opini','value'=>'Haha'],
                    'description'=>['type'=>'text','alt_name'=>'Deskripsi Singkat'],
                    'quote'=>['type'=>'text','alt_name'=>'Quote/Kutipan Pakar'],
                    'body'=>['type'=>'text','alt_name'=>'Opini'],
                    'user_id'=>['type'=>'hidden'],
                    'offlinewriter_status'=>['alt_name'=>'Tulisan Pakar?', 'type'=>'select', 'options' => [
                          'Ya' => 'YES',
                          'Tidak (Penulis internal)' => 'NO',
                      ]],
                    'offlinewriter_id' => [
                        'type' => 'relationship',
                        'model' => 'App\Models\Offlinewriter',
                        'alt_name' => 'Nama Pakar'
                    ],
                    'category_id' => [
                        'type' => 'relationship',
                        'model' => 'App\Models\Category',
                        'alt_name' => 'Jendela'
                    ],
                    'topic_id'=>['type'=>'hidden'],
                    'status'=>['alt_name' => 'Status (Anda hanya bisa membuat Draft)', 'type'=>'select', 'options' => [
                          'Draft' => 'DRAFT',
                      ]],
                    'foto'=>['alt_name'=>'Foto Ilustrasi','type'=>'file'],
                    ])

                  @endif

                <div class="raw-margin-top-24">
                    <a class="btn btn-default pull-left" href="{{ URL::previous() }}">Cancel</a>
                    <button class="btn btn-primary pull-right" type="submit">Create</button>
                </div>

            {!! Form::close() !!}
        </div>

    </div>
</div>
@endif

@stop
