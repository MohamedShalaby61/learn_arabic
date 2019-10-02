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
            <div class="login-form register-form">
              <div class="title text-center">
                <h3>@lang('auth-register.create_new_account')</h3>
                <p>
                  @lang('auth-register.create_new_account_desc')
                </p>
              </div>
              <form method="POST" action="{{ route('register') }}" class="mt-3 form" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <input id="name" type="text" placeholder="@lang('auth-register.name')" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <input id="email" type="email" placeholder="@lang('auth-register.email')" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? app('request')->input('email') }}" required autocomplete="email">

                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="tel" placeholder="@lang('auth-register.mobile_number')" name="mobile" class="form-control @error('mobile') is-invalid @enderror" value="{{ old('mobile') }}" />

                  @error('mobile')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <input id="password" type="password" placeholder="@lang('auth-register.password')" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                  @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <input id="password-confirm" type="password" placeholder="@lang('auth-register.confirm_password')" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="form-group text-center" style="color: #939393;">
                    <input type="radio" name="type" value="3" class="radio-type clk-student" @if(!old('type') || old('type') == 3)checked @endif/> @lang('auth-register.student')
                    <input type="radio" name="type" value="2" class="radio-type clk-tutor" @if(old('type') == 2)checked @endif /> @lang('auth-register.tutor')
                </div>
                <div class="tut_info"  @if(!old('type') || old('type') == 3)style="display: none;"@endif>
                  <div class="form-group">
                    <input id="name" type="text" placeholder="@lang('auth-register.bio')" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" maxlength="140" autofocus>
                     @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                  </div>
                    <div class="form-group">
                         <span style="color: #333; font-size: 17px;">@lang('auth-register.choose_video')</span>
                         <input id="video" type="file" placeholder="@lang('auth-register.video')" @error('video') is-invalid @enderror" name="video" value="{{ old('video') }}" autocomplete="video" autofocus style="color: #333; font-size: 15px; border: none;">
                          @error('video')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                    </div>
                </div>
              </div>  
               
                <div class="form-group">
                  <input type="submit" class="btn btn-primary btn-block" value="@lang('auth-register.register')" />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
