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
        <h1>Pakar: Create</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-6 raw-margin-bottom-24">

            {!! Form::open(['route' => 'offlinewriters.store', 'files' => true]) !!}
                {!! csrf_field() !!}

                @form_maker_table("offlinewriters",[
                  'name'=>['alt_name'=>'Nama Lengkap'],
                  'description'=>['type'=>'text', 'alt_name'=>'Deskripsi Perkenalan'],
                  'twitter'=>['alt_name'=>'Akun Twitter','placeholder'=>'Format: @nama_akun'],
                  'email',
                  'phone'=>['alt_name'=>'Nomor Handphone'],
                  'status'=>['alt_name'=>'Status Publikasi','type'=>'select', 'options' => [
                        'Normal' => 'NORMAL',
                        'Tampil di Frontpage' => 'STICKY',
                    ]],
                  'avatar'=>['alt_name'=>'Foto Profil','type'=>'file'],
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
