@extends('dashboard')

@section('content')

<div class="container"><h2>Profile</h2></div>

<div id="exTab2" class="container">
<ul class="nav nav-tabs">
			<li class="active">
        <a  href="#1" data-toggle="tab">Account</a>
			</li>
			<li><a href="#2" data-toggle="tab">Profil</a>
			</li>
			<li><a href="#3" data-toggle="tab">Photo</a>
			</li>
		</ul>

			<div class="tab-content ">
			  <div class="tab-pane active" id="1">

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

					                @if ($user->roles->first()->name === 'admin' || $user->id == 1)
					                    <div class="raw-margin-top-24">
					                        @input_maker_label('Role')
					                        @input_maker_create('roles', ['type' => 'relationship', 'model' => 'App\Models\Role', 'label' => 'label', 'value' => 'name'], $user)
					                    </div>
					                @endif

					                <div class="raw-margin-top-24">
					                    <a class="btn btn-default pull-left" href="{{ URL::previous() }}">Cancel</a>
					                    <button class="btn btn-primary pull-right" type="submit">Save</button>
					                    <a class="btn btn-info pull-right raw-margin-right-16" href="/user/password">Change Password</a><br>
					                </div>
					            </form>
					        </div>
					    </div>


				</div>

				<div class="tab-pane" id="2">

					<div class="row">
							<div class="col-md-8">
									<form method="POST" action="/user/settings">
											{!! csrf_field() !!}

											@input_maker_create('email', ['type' => 'hidden'], $user)
											@input_maker_create('name', ['type' => 'hidden'], $user)
											<input type="hidden" name="meta[terms_and_cond]" value="1" @if ($user->meta->terms_and_cond) checked @endif>

											<div class="raw-margin-top-24">
													@input_maker_label('Phone')
													<input id="meta[phone]" class="form-control" type="text" name="meta[phone]" value="{{ $user['meta']['phone'] }}" placeholder="Phone">
											</div>
											<!--
											<div class="raw-margin-top-24">
													@input_maker_label('Bagian')
													@input_maker_create('bagians', ['type' => 'relationship', 'model' => 'App\Models\Bagian', 'label' => 'name', 'value' => 'id'], $user)
											</div>
											<div class="raw-margin-top-24">
													@input_maker_label('Wilayah')
													@input_maker_create('wilayahs', ['type' => 'relationship', 'model' => 'App\Models\Wilayah', 'label' => 'name', 'value' => 'id'], $user)
											</div>
											<div class="raw-margin-top-24">
													@input_maker_label('Pangkat')
													@input_maker_create('pangkats', ['type' => 'relationship', 'model' => 'App\Models\Pangkat', 'label' => 'name', 'value' => 'id'], $user)
											</div>
											<div class="raw-margin-top-24">
													@input_maker_label('Jabatan')
													@input_maker_create('jabatans', ['type' => 'relationship', 'model' => 'App\Models\Jabatan', 'label' => 'name', 'value' => 'id'], $user)
											</div>
											-->
											<div class="raw-margin-top-24">
													<a class="btn btn-default pull-left" href="{{ URL::previous() }}">Cancel</a>
													<button class="btn btn-primary pull-right" type="submit">Save</button>
											</div>
									</form>
							</div>
					</div>

				</div>

        <div class="tab-pane" id="3">

					<div class="row">
							<div class="col-md-8">
									<form method="POST" action="/user/editmeta/{{$user['id']}}" enctype="multipart/form-data">
											{!! csrf_field() !!}

											@input_maker_create('email', ['type' => 'hidden'], $user)
											@input_maker_create('name', ['type' => 'hidden'], $user)
											<input type="hidden" name="meta[terms_and_cond]" value="1" @if ($user->meta->terms_and_cond) checked @endif>

											<div class="raw-margin-top-24">
													<img class="img-thumbnail img-circle" src="{{ url($user->meta->avatar->url('small')) }}">
													<br />
													<input type="file" name="avatar">
											</div>

											<div class="raw-margin-top-24">
													<a class="btn btn-default pull-left" href="{{ URL::previous() }}">Cancel</a>
													<button class="btn btn-primary pull-right" type="submit">Save</button>
											</div>
									</form>
							</div>
					</div>

				</div>
			</div>
  </div>

@stop
