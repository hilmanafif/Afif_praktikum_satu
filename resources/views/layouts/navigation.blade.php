<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavbar">
            <span class="sr-only">Brand</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <span class="navbar-brand" ><a href="{!! URL::to('/') !!}">JerbeeHRM</a></span>
    </div>
    <div class="collapse navbar-collapse navbar-right" id="mainNavbar">
        <ul class="nav navbar-nav">
            @if (Auth::user())
                <li><a href="{!! url('user/settings') !!}"><span class="fa fa-user"></span> {{ Auth::user()->name }}</a></li>
                <li><a class="raw-margin-right-24" href="/logout">Logout</a></li>
            @endif
        </ul>
    </div>
</div>
