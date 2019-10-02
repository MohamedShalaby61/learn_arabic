@extends('layouts.app')

@section('content')
<!-- main body -->
  <div class="main">
    <!-- innerpages-header  -->
    <!-- login/register layout -->
    <div id="login" class="carousel slide carousel-fade" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#login" data-slide-to="0" class="active"></li>
        <li data-target="#login" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ url('/') }}/images/login-slider.jpg" class="d-block">
        </div>
        <div class="carousel-item">
          <img src="{{ url('/') }}/images/login-slider1.jpg" class="d-block">
        </div>
      </div>

    </div>
    <div class="login">
      <div class="container">
        <div class="row">
          <div class="col-md-5 ml-auto">
            <div class="login-form">
              <div class="title text-center">
                <h3>@lang('auth-login.welcome_back')</h3>
                <p>
                  @lang('auth-login.welcome_desc')
                </p>
              </div>
              <form method="POST" action="{{ route('login') }}" class="mb-5 mt-3 form">
                @csrf
                <div class="form-group">
                  <input id="email" type="email" placeholder="@lang('auth-login.email')" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus aria-reqired="false">
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <input id="password" type="password" placeholder="@lang('auth-login.password')" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" aria-reqired="false">
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">
                    @lang('auth-login.login')
                  </button>
                </div>
              </form>
              <hr />
              <div class="signup-btn text-center">
                <p>
                  <strong>@lang('auth-login.do_not_have_account_yet')</strong>
                </p>
                <a href="{{ route('register') }}" class="btn btn-border-primary mt-3">@lang('auth-login.sign_up')</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
