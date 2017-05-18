@extends('layouts.master')

@section('app-content')

    <div class="row">
        <div class="col-md-4 col-md-offset-4">

            <h1 class="text-center">Login</h1>

            <form method="POST" action="{!! url('login') !!}">
                {!! csrf_field() !!}
                <div class="col-md-12 raw-margin-top-24">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="col-md-12 raw-margin-top-24">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <div class="col-md-12 raw-margin-top-24">
                    <label>
                        Remember Me <input type="checkbox" name="remember">
                    </label>
                </div>
                <div class="col-md-12">
                  <br />
                    <button class="btn btn-primary" type="submit">Login</button>
                    <!-- Dimatiin untuk deploy client/PDAM
                    <button class="btn" href="{!! url('password/reset') !!}">Forgot Password</button>
                    <button class="btn btn-info" href="{!! url('register') !!}">Register</button>
                    -->
                </div>
            </form>

        </div>
    </div>

@stop
