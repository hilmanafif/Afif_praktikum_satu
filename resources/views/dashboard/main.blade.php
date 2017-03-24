@extends('dashboard')

@section('content')

@if (Auth::user())
<style type="text/css">

.square, .btn {
border-radius: 0px!important;
}

.white {
color: #fff!important;
}

div.user-menu-container .thumbnail {
width:100%;
min-height:200px;
border: 0px!important;
padding: 0px;
border-radius: 0;
border: 0px!important;
}

/* -- Custom classes for the snippet, won't effect any existing bootstrap classes of your site, but can be reused. -- */

.user-pad {
padding: 20px 25px;
}

.no-pad {
padding-right: 0;
padding-left: 0;
padding-bottom: 0;
}

.user-details {
background: #eee;
min-height: 333px;
}

.user-image {
max-height:200px;
overflow:hidden;
}

.overview h3 {
font-weight: 300;
margin-top: 15px;
margin: 10px 0 0 0;
}

.overview h4 {
font-weight: bold!important;
font-size: 40px;
margin-top: 0;
color: #aaa;
}

/* -- media query for user profile image -- */
@media (max-width: 767px) {
.user-image {
    max-height: 400px;
}
}
</style>

<div class="container">
    <div class="row user-menu-container">
        <div class="col-md-7 user-details">
            <div class="row bg-primary white">
                <div class="col-md-6 no-pad">
                    <div class="user-pad">
                        <h3>Welcome back, {{ Auth::user()->name }}</h3>
                        <h4 class="white"><i class="fa fa-envelope"></i> {{ $user['email'] }}</h4>
                        <h4 class="white"><i class="fa fa-phone"></i> {{ $user['meta']['phone'] }}</h4>
                        <a class="btn btn-default" href="{!! url('user/settings') !!}">Edit Profile</a>
                    </div>
                </div>
                <div class="col-md-6 no-pad">
                    <div class="user-image">
                        <img src="{{ url($user->meta->avatar->url('medium')) }}" class="img-responsive thumbnail">
                    </div>
                </div>
            </div>
            <div class="row overview">
                <div class="col-md-4 user-pad text-center">
                    <h3>Messages</h3>
                    <h4>248</h4>
                </div>
                <div class="col-md-4 user-pad text-center">
                    <h3>Tasks</h3>
                    <h4>501</h4>
                </div>
                <div class="col-md-4 user-pad text-center">
                    <h3>Attendance</h3>
                    <h4>12</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@stop
