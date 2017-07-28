@extends('dashboard')
@section('stylesheets')
<style media="screen">
.row-eq-height {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display:         flex;
}
.pull-bottom
{
  position: absolute;
  bottom: 0;
  right: 0;
}
</style>
@stop
@section('content')

<div class="row">

<div class="container"><h2>Detail</h2></div>

<div id="exTab2" class="container">
      <ul class="nav nav-tabs">
      			<li id="tab1"><a href="#1" data-toggle="tab">Account</a></li>
            <li id="tab2"><a href="#2" data-toggle="tab">Kepegawaian</a></li>
      			<li id="tab3"><a href="#3" data-toggle="tab">Biodata</a></li>
            <li id="tab4"><a href="#4" data-toggle="tab">Keluarga</a></li>
            <li id="tab5"><a href="#5" data-toggle="tab">Pendidikan</a></li>
      			<li id="tab6"><a href="#6" data-toggle="tab">Pengalaman</a></li>
      </ul>

			<div class="tab-content">
			  <div class="tab-pane" id="1">
          <form method="POST" action="/admin/users/update" enctype="multipart/form-data">
          {!! csrf_field() !!}
          <div class="row row-eq-height">
            <div class="col-md-5">
              <div class="row">
					        <div class="col-md-8">
                          {{ method_field('PUT') }}
                          <input type="hidden" name="id" value="{{ $user->id }}">
					                <div class="raw-margin-top-24">
					                    @input_maker_label('Email (Berlaku sebagai username juga)')
					                    @input_maker_create('email', ['type' => 'string'], $user)
					                </div>

													<div class="raw-margin-top-24">
					                    @input_maker_label('Nama Lengkap')
					                    @input_maker_create('name', ['type' => 'string'], $user)
					                </div>

                          @if ($user->roles->first()->name === 'admin' || $user->id == 1)
                              <div class="raw-margin-top-24">
                                  @input_maker_label('Role')
                                  @input_maker_create('roles', ['type' => 'relationship', 'model' => 'App\Models\Role', 'label' => 'label', 'value' => 'name'], $user)
                              </div>
                          @endif

                          <!--
													<div class="raw-margin-top-24">
															<label>
																	<input type="checkbox" name="meta[marketing]" value="1" @if ($user->meta->marketing) checked @endif>
																	I agree to recieve marketing materials
															</label>
													</div>

													<div class="raw-margin-top-24">
											        <label>
											            <input type="checkbox" name="meta[terms_and_cond]" value="1" @if ($user->meta->terms_and_cond) checked @endif>
											            I agree to the <a href="{{ url('terms-and-conditions') }}">Terms &amp; Conditions</a>
											        </label>
											    </div>
                          -->

					        </div>
					    </div>
            </div>
            <div class="col-md-5">
              <div class="raw-margin-top-24">
                  <h3>Foto Profil</h3>
                  <img class="img-thumbnail img-circle" src="{{ url($user->meta->avatar->url('small')) }}">
                  <input type="file" name="meta[avatar]"style="display:inline" >
              </div>
            </div>
          </div>
          <div class="row row-eq-height">
            <div class="col-md-10" style="margin-top:12px; border-top:1px solid #ddd;">
              <br />
              <a class="btn btn-default" href="{{ URL::previous() }}">Cancel</a>
              <a class="btn btn-info"  href="/admin/users/password/{{ $user->id }}">Change Password</a>
              <button class="btn btn-primary" type="submit">Save</button>
            </div>
          </div>
          </form>
        </div>

        <div class="tab-pane" id="2">
          <form method="POST" action="/admin/users/update">
					<div class="row">
              {{ method_field('PUT') }}
              <input type="hidden" name="id" value="{{$user->id}}">
							<div class="col-md-8">
                {!! csrf_field() !!}
                <div class="raw-margin-top-24">
                    @input_maker_label('Pangkat')
                    @input_maker_create('pangkats', ['type' => 'relationship', 'model' => 'App\Models\Pangkat', 'label' => 'name', 'value' => 'id'], $user)
                </div>
                <div class="raw-margin-top-24">
                    @input_maker_label('Jabatan')
                    @input_maker_create('jabatans', ['type' => 'relationship', 'model' => 'App\Models\Jabatan', 'label' => 'name', 'value' => 'id'], $user)
                </div>
                <div class="raw-margin-top-24">
                    @input_maker_label('Bagian')
                    @input_maker_create('bagians', ['type' => 'relationship', 'model' => 'App\Models\Bagian', 'label' => 'name', 'value' => 'id'], $user)
                </div>
                <div class="raw-margin-top-24">
                    @input_maker_label('Wilayah')
                    @input_maker_create('wilayahs', ['type' => 'relationship', 'model' => 'App\Models\Wilayah', 'label' => 'name', 'value' => 'id'], $user)
                </div>
                <div class="row row-eq-height">
                  <div class="col-md-10" style="margin-top:12px; border-top:1px solid #ddd;">
                    <br />
                    <a class="btn btn-default" href="{{ URL::previous() }}">Cancel</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                  </div>
                </div>
              </form>
							</div>
					</div>
				</div>

				<div class="tab-pane" id="3">
          <form method="POST" action="/admin/users/update">
					<div class="row">
              {{ method_field('PUT') }}
              <input type="hidden" name="user_id" value="{{$user->id}}">
							<div class="col-md-5">
                <div class="row">
      							<div class="col-md-6">
      											{!! csrf_field() !!}
                            <div class="raw-margin-top-24">
                                @input_maker_label('Tempat Lahir')
                                <input id="meta[tempat_lahir]" class="form-control" type="text" name="meta[tempat_lahir]" value="{{ $user['meta']['tempat_lahir'] }}" placeholder="Tempat Lahir" required>
                            </div>
                            <div class="raw-margin-top-24">
                                @input_maker_label('Jenis Kelamin')
                                <select class="form-control" name="meta[jenis_kelamin]" required>
                                  <option style="display:none">Jenis Kelamin</option>
                                  <option value="L" {{$user->meta->jenis_kelamin=="L"?"selected":""}}>Laki-laki</option>
                                  <option value="P" {{$user->meta->jenis_kelamin=="P"?"selected":""}}>Perempuan</option>
                                </select>
                            </div>
                            <div class="raw-margin-top-24">
                                @input_maker_label('Agama')
                                <select class="form-control" name="meta[agama_id]" required>
                                  <option style="display:none">Agama</option>
                                  @foreach ($agamas as $agama)
                                    <option value="{{$agama->id}}" {{$user->meta->agama_id==$agama->id?"selected":""}}>{{$agama->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                      </div>
                    <div class="col-md-6">
                        <div class="raw-margin-top-24">
                            @input_maker_label('Tanggal Lahir')
                            <input id="meta[tanggal_lahir]" class="form-control" type="date" name="meta[tanggal_lahir]" value="{{ $user['meta']['tanggal_lahir'] }}" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                      <div class="raw-margin-top-24">
                          @input_maker_label('Alamat')
                          <input id="meta[alamat]" class="form-control" type="text" name="meta[alamat]" value="{{ $user['meta']['alamat'] }}" placeholder="Alamat" required>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="raw-margin-top-24">
                          @input_maker_label('Phone')
                          <input id="meta[phone]" class="form-control" type="text" name="meta[phone]" value="{{ $user['meta']['phone'] }}" placeholder="Phone" required>
                      </div>
                    </div>
                </div>
						  </div>
              <div class="col-md-5">
                <div class="raw-margin-top-24">
                    @input_maker_label('No KTP')
                    <input id="meta[no_ktp]" class="form-control" type="text" name="meta[no_ktp]" value="{{ $user['meta']['no_ktp'] }}" placeholder="No KTP">
                </div>
                <div class="raw-margin-top-24">
                  <img src="{{url('img/ktp.jpg')}}" class="img-responsive img-thumbnail" alt="KTP">
                </div>
                <div class="raw-margin-top-24">
                  <input type="file" name="ktp">
                </div>
              </div>
					</div>
          <div class="row row-eq-height">
            <div class="col-md-10" style="margin-top:12px; border-top:1px solid #ddd;">
              <br />
              <a class="btn btn-default" href="{{ URL::previous() }}">Cancel</a>
              <button class="btn btn-primary" type="submit">Save</button>
            </div>
          </div>
          </form>
				</div>

        <div class="tab-pane" id="4">
					<div class="row">
							<div class="col-md-5">
									<h3>Anggota Keluarga</h3>
                  @if($user->anggotaKeluargas)
                  <table class="table">
                    @foreach ($user->anggotaKeluargas as $anggotaKeluarga)
                    <tr style="background:#eee;">
                      <td>{{$anggotaKeluarga->nama}}</td>
                      <td>{{$anggotaKeluarga->hub_keluarga}}</td>
                      <td><a href="{{url('admin/users/'.$anggotaKeluarga->user_id.'/edit?button=4&mode=edit&anggotakeluarga_id='.$anggotaKeluarga->id)}}" class="btn btn-xs btn-primary pull-right">Edit</a></td>
                      @if ($anggotaKeluarga->is_active==1)
                        <td><a href="{{url('anggotakeluargas/'.$anggotaKeluarga->id.'/changeActive')}}" onclick="return confirm('Nonaktifkan {{$anggotaKeluarga->nama}} dari tunjangan?')" class="btn btn-xs btn-success pull-right">Aktif</a></td>
                      @else
                        <td><a href="{{url('anggotakeluargas/'.$anggotaKeluarga->id.'/changeActive')}}" onclick="return confirm('Aktifkan {{$anggotaKeluarga->nama}} dari tunjangan?')" class="btn btn-xs btn-danger pull-right">Nonaktif</a></td>
                      @endif
                    </tr>
                    @endforeach
                  </table>
                  <br>
                  <table style="width:70%;">
                    <tr>
                      <td style="font-weight:bold;">Suami / Istri</td>
                      <td>: {{ $jumlahPasangan}} orang</td>
                    </tr>
                    <tr>
                      <td style="font-weight:bold;">Anak</td>
                      <td>: {{ $jumlahAnak }} orang</td>
                    </tr>
                    <tr><td></td><td>&nbsp;</td></tr>
                    <tr>
                      <td style="font-weight:bold;">Jumlah Anggota Keluarga</td>
                      <td>: {{ $jumlahAnggotaKeluarga }} orang</td>
                    </tr>
                  </table>
                @else
                  <p>Data anggota keluarga tidak ditemukan</p>
                @endif
							</div>
              <div class="col-md-5" style="border-left:1px solid #ddd;">
                @if (app('request')->input('mode')=='edit')
                  {!! Form::model($anggotakeluarga, ['route' => ['anggotakeluargas.update', $anggotakeluarga->id], 'method' => 'patch']) !!}
                      {!! csrf_field() !!}
                      {!! method_field('PATCH') !!}
                      <h3>Edit Anggota Keluarga</h3>
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
                      <a class="btn btn-default" href="{{url('admin/users/'.$anggotaKeluarga->user_id.'/edit?button=4')}}">Cancel / Create New</a>
                      <button class="btn btn-primary" type="submit">Simpan</button>
                  {!! Form::close() !!}
                @else
                <form method="POST" action="/anggotakeluargas">
                   {{ csrf_field() }}
                  <input type="hidden" name="user_id" value="{{$user->id}}">
									<h3>Penambahan Anggota Keluarga</h3>
                  <div class="raw-margin-top-24">
                      @input_maker_label('Nama Lengkap')
                      <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control" required>
                  </div>
                  <div class="raw-margin-top-24">
                      @input_maker_label('Hubungan Keluarga')
                      <select class="form-control" name="hub_keluarga" required>
                        <option style="display:none">Hubungan Keluarga</option>
                        <option value="Anak">Anak</option>
                        <option value="Pasangan">Pasangan</option>
                      </select>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="raw-margin-top-24">
                          @input_maker_label('Tempat Lahir')
                          <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" class="form-control" required>
                      </div>
                      <div class="raw-margin-top-24">
                          @input_maker_label('Jenis Kelamin')
                          <select class="form-control" name="jenis_kelamin" required>
                            <option style="display:none">Jenis Kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                          </select>
                      </div>
                      <div class="raw-margin-top-24">
                          @input_maker_label('Agama')
                          <select class="form-control" name="agama_id" required>
                            <option style="display:none">Agama</option>
                            @foreach ($agamas as $agama)
                              <option value="{{$agama->id}}">{{$agama->name}}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="raw-margin-top-24">
                          @input_maker_label('Tanggal Lahir')
                          <input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" class="form-control" required>
                      </div>
                    </div>
                  </div>
                  <br />
                  <a class="btn btn-default" href="{{url('admin/users/'.$anggotaKeluarga->user_id.'/edit?button=4')}}">Cancel / Create New</a>
                  <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
                @endif
							</div>
					</div>
				</div>

        <div class="tab-pane" id="5">
					<div class="row">
							<div class="col-md-8">
								<br />[ Akan diisi data Pendidikan ]
							</div>
					</div>
				</div>

        <div class="tab-pane" id="6">
					<div class="row">
							<div class="col-md-8">
								<br />[ Akan diisi data Pengalaman ]
							</div>
					</div>
				</div>


			</div>
  </div>

</div>

@stop

@section('javascript')

  <script type="text/javascript">
  $("#1").addClass("active");
  $("#tab1").addClass("active");
  </script>

  @if (app('request')->input('button')=='2')
  <script type="text/javascript">
  $("#1").removeClass("active");
  $("#tab1").removeClass("active");
  $("#2").addClass("active");
  $("#tab2").addClass("active");
  </script>
  @endif

  @if (app('request')->input('button')=='3')
  <script type="text/javascript">
  $("#1").removeClass("active");
  $("#tab1").removeClass("active");
  $("#3").addClass("active");
  $("#tab3").addClass("active");
  </script>
  @endif

  @if (app('request')->input('button')=='4')
  <script type="text/javascript">
  $("#1").removeClass("active");
  $("#tab1").removeClass("active");
  $("#4").addClass("active");
  $("#tab4").addClass("active");
  </script>
  @endif

  @if (app('request')->input('button')=='5')
  <script type="text/javascript">
  $("#1").removeClass("active");
  $("#tab1").removeClass("active");
  $("#5").addClass("active");
  $("#tab5").addClass("active");
  </script>
  @endif

  @if (app('request')->input('button')=='6')
  <script type="text/javascript">
  $("#1").removeClass("active");
  $("#tab1").removeClass("active");
  $("#6").addClass("active");
  $("#tab6").addClass("active");
  </script>
  @endif

@endsection
