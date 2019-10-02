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
          <img src="{{ url('/') }}/images/login-slider1.jpg" class="d-block">
        </div>
        <div class="carousel-item">
          <img src="{{ url('/') }}/images/login-slider.jpg" class="d-block">
        </div>
      </div>

    </div>
    <div class="login">
      <div class="container">
        <div class="row">
          <div class="col-md-5 ml-auto">
            <div class="login-form" style="margin-top: 100px">
              <div class="title text-center">
                <h3>@lang('tutor-register.become_a_tutor')</h3>
                <p>
                    @lang('tutor-register.become_a_tutor_desc')
                </p>
              </div>
              <form method="POST" action="{{ route('tutor.register') }}" class="mb-5 mt-3 form">
                @csrf
                <div class="form-group">
                  <input id="name" type="text" placeholder="@lang('tutor-register.name')" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <input id="name" type="text" placeholder="@lang('tutor-register.title')" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                  @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <input id="email" type="email" placeholder="@lang('tutor-register.email')" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? app('request')->input('email') }}" required autocomplete="email">

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="tel" placeholder="@lang('tutor-register.mobile_number')" name="mobile" class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}" />

                  @error('mobile')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <input id="password" type="password" placeholder="@lang('tutor-register.password')" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                  @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <input id="password-confirm" type="password" placeholder="@lang('tutor-register.confirm_password')" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="form-group">
                  <input id="video" type="file" placeholder="@lang('tutor-register.video')" class="form-control @error('video') is-invalid @enderror" name="video" value="{{ old('video') }}" required autocomplete="video" autofocus>

                  @error('video')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary btn-block" value="@lang('tutor-register.register')" />
                </div>
              </form>
              <hr />
              <div class="signup-btn text-center">
                <p>
                  <strong>@lang('tutor-register.have_account')</strong>
                </p>
                <a href="{{ route('login') }}" class="btn btn-border-primary mt-3">@lang('tutor-register.login')</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
