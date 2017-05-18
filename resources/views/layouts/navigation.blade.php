<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-brand">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavbar">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="{!! url('/') !!}">{{ env('APP_NAME') }}</a>
    </div>
    <div class="collapse navbar-collapse navbar-right" id="mainNavbar">
        <ul class="nav navbar-nav">
            @if (Auth::user())
                <li><a href="{!! url('user/settings') !!}"><span class="fa fa-user"></span> {{ Auth::user()->name }}</a></li>
                <li><a class="raw-margin-right-24" href="{!! url('logout') !!}">Logout</a></li>
            @endif
        </ul>
    </div>
</div>
