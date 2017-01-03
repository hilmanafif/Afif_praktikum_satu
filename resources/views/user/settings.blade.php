@extends('dashboard')

@section('content')

<div class="container"><h2>Example tab 2 (using standard nav-tabs)</h2></div>

<div id="exTab2" class="container">
<ul class="nav nav-tabs">
			<li class="active">
        <a  href="#1" data-toggle="tab">Overview</a>
			</li>
			<li><a href="#2" data-toggle="tab">Without clearfix</a>
			</li>
			<li><a href="#3" data-toggle="tab">Solution</a>
			</li>
		</ul>

			<div class="tab-content ">
			  <div class="tab-pane active" id="1">
          <h3>Standard tab panel created on bootstrap using nav-tabs</h3>
				</div>
				<div class="tab-pane" id="2">
          <h3>Notice the gap between the content and tab after applying a background color</h3>
				</div>
        <div class="tab-pane" id="3">
          <h3>add clearfix to tab-content (see the css)</h3>
				</div>
			</div>
  </div>

    <div class="row">
        <div class="col-md-12">
            <h1>Settings</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
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

                @include('user.meta')

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

@stop
