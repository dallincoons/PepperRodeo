@extends('layouts.app')

<div class="signin-wrapper">
    <div class="signin-header">
        <a>CANCEL</a>
        <h1>PepperRodeo</h1>
        <a href='register'>JOIN NOW</a>
    </div>

    <div class="signin-form">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label">E-Mail Address</label>

                <div>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="example@gmail.com">

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label">Password</label>

                <div>
                    <input id="password" type="password" class="form-control" name="password" placeholder="********">

                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif

                    <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                </div>
            </div>

            <div class="form-group">
                <div class="login-button">
                    <button type="submit" class="pr-button">
                         Sign In <i class="fa fa-arrow-circle-right"></i>
                    </button>


                </div>
            </div>
        </form>
    </div>
</div>
