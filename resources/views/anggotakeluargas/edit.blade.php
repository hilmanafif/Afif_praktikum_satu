@extends('dashboard')

@section('content')

  <div class="row">
      <div class="col-md-12">
          <h1>AnggotaKeluarga : Edit</h1>
      </div>
  </div>

  <div class="row">
      <div class="col-md-6 raw-margin-bottom-24">
          <div>
          {!! Form::model($anggotakeluarga, ['route' => ['anggotakeluargas.update', $anggotakeluarga->id], 'method' => 'patch']) !!}
              {!! csrf_field() !!}
              {!! method_field('PATCH') !!}
              @form_maker_object($anggotakeluarga, [
                'nama'=>['alt_name'=>'Nama'],
                'id'=>['type'=>'hidden'],
                'user_id'=>['type'=>'hidden'],
                'hub_keluarga'=>['alt_name'=>'Hubungan Keluarga', 'type'=>'select', 'options' => [
                      'Pasangan' => 'pasangan',
                      'Anak' => 'anak',
                  ]],
                'tempat_lahir',
                'tanggal_lahir'=>['type'=>'date'],
                'agama_id'=>['alt_name'=>'Agama', 'type'=>'select', 'options' => [
                      'Islam' => '1',
                      'Kristen Protestan' => '2',
                  ]],
              ])
              <br />
              <a class="btn btn-default" href="{{ URL::previous() }}">Cancel</a>
              <button class="btn btn-primary" type="submit">Tambah</button>
          {!! Form::close() !!}
          </div>
      </div>
  </div>

@stop
