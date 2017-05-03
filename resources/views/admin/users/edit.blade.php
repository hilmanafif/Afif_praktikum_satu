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

<div class="container"><h2>Profile</h2></div>

<div id="exTab2" class="container">
<ul class="nav nav-tabs">
			<li class="active">
        <a  href="#1" data-toggle="tab">Account</a>
			</li>
			<li><a href="#2" data-toggle="tab">Profil</a>
			</li>
      <li><a href="#3" data-toggle="tab">Keluarga</a>
      <li><a href="#4" data-toggle="tab">Pendidikan</a>
      <li><a href="#5" data-toggle="tab">Karir</a>
			<li><a href="#6" data-toggle="tab">Pengalaman</a>
			</li>
		</ul>

			<div class="tab-content ">
			  <div class="tab-pane active" id="1">
          <div class="row row-eq-height">
            <div class="col-md-6">
              <div class="row">
					        <div class="col-md-8">
					            <form method="POST" action="/user/settings">
					                {!! csrf_field() !!}

					                <div class="raw-margin-top-24">
					                    @input_maker_label('Email')
					                    @input_maker_create('email', ['type' => 'string'], $user)
					                </div>

													<div class="raw-margin-top-24">
					                    @input_maker_label('Name')
					                    @input_maker_create('name', ['type' => 'string'], $user)
					                </div>

                          @if ($user->roles->first()->name === 'admin' || $user->id == 1)
                              <div class="raw-margin-top-24">
                                  @input_maker_label('Role')
                                  @input_maker_create('roles', ['type' => 'relationship', 'model' => 'App\Models\Role', 'label' => 'label', 'value' => 'name'], $user)
                              </div>
                          @endif

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



					                <div class="raw-margin-top-24">
					                    <a class="btn btn-default pull-left" href="{{ URL::previous() }}">Cancel</a>
					                </div>
					            </form>
					        </div>
					    </div>

            </div>
            <div class="col-md-6">
              <div class="raw-margin-top-24">
                  <h3>Foto Profil</h3>
                  <img class="img-thumbnail img-circle" src="{{ url($user->meta->avatar->url('small')) }}">
                  <input type="file" name="avatar"style="display:inline" >
              </div>

              <div class="raw-margin-top-24 pull-bottom">
                  <button class="btn btn-primary pull-right" type="submit">Save</button>
                  <a class="btn btn-info pull-right raw-margin-right-16"  href="/user/password">Change Password</a><br>
              </div>
            </div>

          </div>
				</div>

				<div class="tab-pane" id="2">

					<div class="row">
            <form method="POST" action="/user/settings">
							<div class="col-md-6">
                <div class="row">
      							<div class="col-md-6">
      											{!! csrf_field() !!}

                            <div class="raw-margin-top-24">
                                @input_maker_label('Tempat Lahir')
                                <input id="meta[tempat_lahir]" class="form-control" type="text" name="meta[tempat_lahir]" value="{{ $user['meta']['tempat_lahir'] }}" placeholder="Tempat Lahir">
                            </div>

                            <div class="raw-margin-top-24">
                                @input_maker_label('Jenis Kelamin')
                                <input id="meta[tempat_lahir]" class="form-control" type="text" name="meta[tempat_lahir]" value="{{ $user['meta']['tempat_lahir'] }}" placeholder="Tempat Lahir">
                            </div>

                            <div class="raw-margin-top-24">
                                @input_maker_label('Agama')
                                <input id="meta[tempat_lahir]" class="form-control" type="text" name="meta[tempat_lahir]" value="{{ $user['meta']['tempat_lahir'] }}" placeholder="Tempat Lahir">
                            </div>

                </div>
                <div class="col-md-6">
                        {!! csrf_field() !!}

                        <div class="raw-margin-top-24">
                            @input_maker_label('Tanggal Lahir')
                            <input id="meta[tgl_lahir]" class="form-control" type="date" name="meta[tgl_lahir]" value="{{ $user['meta']['tgl_lahir'] }}" >
                        </div>

                  </div>
                  <div class="col-md-12">
                    <div class="raw-margin-top-24">
                        @input_maker_label('Alamat')
                        <input id="meta[alamat]" class="form-control" type="text" name="meta[alamat]" value="{{ $user['meta']['alamat'] }}" placeholder="Alamat">
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="raw-margin-top-24">
                        @input_maker_label('Phone')
                        <input id="meta[phone]" class="form-control" type="text" name="meta[phone]" value="{{ $user['meta']['phone'] }}" placeholder="Phone">
                    </div>
                  </div>
              </div>
              <div class="raw-margin-top-24">
                  <a class="btn btn-default pull-left" href="{{ URL::previous() }}">Cancel</a>
                  <button class="btn btn-primary pull-right" type="submit">Save</button>
              </div>
						</div>
              <div class="col-md-6">

                  <div class="row">
      							<div class="col-md-9">
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

              </div>
            </form>
					</div>
				</div>

        <div class="tab-pane" id="3">

					<div class="row">
							<div class="col-md-6">
									<h3>Anggota Keluarga</h3>
                  <table class="table">
                    <tr>
                      <td>Nama</td>
                      <td><button type="button" class="btn btn-xs btn-primary pull-right" name="button">View</button></td>
                    </tr>
                    <tr>
                      <td>Nama</td>
                      <td><button type="button" class="btn btn-xs btn-primary pull-right" name="button">View</button></td>
                    </tr>
                  </table>
                  <br>
                  <table style="width:50%">
                    <tr>
                      <td>Suami/Istri</td>
                      <td>:</td>
                      <td>x</td>
                    </tr>
                    <tr>
                      <td>Anak</td>
                      <td>:</td>
                      <td>y</td>
                    </tr>
                  </table>
                  <br>
                  <table style="width:50%">
                    <tr>
                      <td>Jumlah Anggota Keluarga</td>
                      <td>:</td>
                      <td>x+y</td>
                    </tr>
                  </table>
							</div>
              <div class="col-md-6">
									<h3>Penambahan Anggota Keluarga</h3>
                  <div class="raw-margin-top-24">
                      @input_maker_label('Hubungan Keluarga')
                      <input type="text" placeholder="Hubungan Keluarga" class="form-control" >
                  </div>

                  <div class="raw-margin-top-24">
                      @input_maker_label('Nama Lengkap')
                      <input type="text" placeholder="Nama Lengkap" class="form-control" >
                  </div>

                  <div class="raw-margin-top-24">
                      @input_maker_label('Hubungan Keluarga')
                      <input type="text" placeholder="Hubungan Keluarga" class="form-control" >
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="raw-margin-top-24">
                          @input_maker_label('Tempat Lahir')
                          <input type="text" placeholder="Tempat Lahir" class="form-control" >
                      </div>
                      <div class="raw-margin-top-24">
                          @input_maker_label('Jenis Kelamin')
                          <input type="text" placeholder="Jenis Kelamin" class="form-control" >
                      </div>
                      <div class="raw-margin-top-24">
                          @input_maker_label('Agama')
                          <input type="text" placeholder="Agama" class="form-control" >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="raw-margin-top-24">
                          @input_maker_label('Tanggal Laghir')
                          <input type="date" placeholder="Tanggal Laghir" class="form-control" >
                      </div>
                    </div>
                </div>
                <div class="raw-margin-top-24">
                  <button class="btn btn-primary pull-right" type="submit">Save</button>
                </div>

							</div>
					</div>

				</div>
        <div class="tab-pane" id="4">

					<div class="row">
							<div class="col-md-8">
									Pendidikan
							</div>
					</div>

				</div>
        <div class="tab-pane" id="5">

					<div class="row">
							<div class="col-md-8">
									Karir
							</div>
					</div>

				</div>
        <div class="tab-pane" id="6">

					<div class="row">
							<div class="col-md-8">
									Pengalaman
							</div>
					</div>

				</div>
			</div>
  </div>
@stop
