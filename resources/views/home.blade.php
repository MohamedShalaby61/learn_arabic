@extends('layouts.app')

@section('css')
    <link href="https://cdn.rawgit.com/nizarmah/calendar-javascript-lib/master/calendarorganizer.min.css" rel="stylesheet" />
    <style>
        #calendarContainer label {
            margin-bottom: 0 !important;
        }
        .cjslib-days, #organizerContainer-list-container {
            background-color: #fff !important;
        }
        .cjslib-calendar.cjslib-size-small {
            width: 320px !important;
            height: 358px !important;
        }
        .cjslib-events.cjslib-size-small {
            height: 358px !important;
        }
        .cjslib-year, .cjslib-month, .cjslib-date {
            width: 100% !important;
        }
        .cjslib-calendar.cjslib-size-small .cjslib-day > .cjslib-day-indicator {
            width: 12px;
            height: 12px;
            bottom: 3px;
            @lang('main.right'): 3px;
        }
        .cjslib-calendar.cjslib-size-small .cjslib-day > .cjslib-indicator-type-numeric {
            font-size: 9px;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <!-- main body -->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="row">
          <div class="carousel-img">
            <img src="{{ url('/') }}/images/course-imgs/img-3.jpg" alt="student-1">
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <div class="row">
          <div class="carousel-img">
            <img src="{{ url('/') }}/images/course-imgs/4-1.jpg" alt="student-1">

          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="slider_bg">
    <div class="container">
      <div class="row">
        <div class="col-md-5 slider_caption">
          <div class="title title-slider">
            <h2>@lang('home.welcome_title')</h2>
          </div>
          <p>
            @lang('home.welcome_desc')
          </p>
          @guest
            <form class="form" method="GET" action="{{ route('register') }}">
              @csrf
              <input name="email" type="email" placeholder="@lang('home.enter_email_address')" class="form-control mt-5" required="" />
              <input type="submit" value="@lang('home.get_started_it_is_free')" class="btn btn-primary btn-block mt-3" />
            </form>
          @else
            <a href="{{ route('about') }}" class="btn btn-primary btn-block mt-3">@lang('home.read_more')</a>
          @endguest
        </div>
      </div>
    </div>
  </div>
  <!-- wave-light -->
  <div class="main">

    <!-- About -->
  <section class="learning">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <h3>@lang('home.learn_to_speak_like_a_native')</h3>
          <p>
            @lang('home.intro')
          </p>
        </div>
      </div>
    </div>
  </section>

    <!-- Mentors -->
    <section class="mentors py-5" data-aos="fade-down">
      <div class="container">
        <div class="row">
          <div class="title title-side">
            <h3 class="float-@lang('main.left')">@lang('home.great_mentors')</h3>
            @if (Auth::check())
            <a href="{{ url('students') }}" class="btn btn-primary float-@lang('main.right')">@lang('home.see_all')</a>
            @else
            <a href="{{ url('students') }}" class="btn btn-primary float-@lang('main.right')" style="display: none;">@lang('home.see_all')</a>
            @endif
          </div>
        </div>
        <div class="owl-carousel owl-theme mt-5">
          @foreach ($topTutors as $tutor)
          <figure class="item tutor_profile" id="tutor_{{ $tutor->id }}">
            <div style="padding-bottom: 0px; height: 285px; display: flex; flex-flow: column; justify-content: space-between; border-radius: inherit;">
                <div style="padding: 16px; font-weight: 500; box-sizing: border-box; position: relative; white-space: nowrap; cursor: pointer; overflow: hidden;">
                    <img src="{{ $tutor->image }}" style="margin-@lang('main.right'): 16px; height: 100px; width: 100px; border-radius: 8px; float: @lang('main.left');" data-toggle="modal" data-target="#tutor_profile">
                    <div style="display: inline-block; vertical-align: top; white-space: normal; padding-@lang('main.right'): 90px;">
                        <span style="color: rgba(0, 0, 0, 0.87); display: block; font-size: 18.5px; line-height: 22px; padding-@lang('main.right'): 50px;">
                            <span class="tutor-name" style="font-weight: 600;">{{ $tutor->name }}</span></span>
                        <span style="color: rgba(0, 0, 0, 0.54); display: block; font-size: 14px;">
                            <div style="display: flex; flex-flow: column; font-size: 12px; line-height: 12px;"><div style="height: 2px;"></div>
                                <span style="display: flex; align-items: center; color: rgb(72, 72, 72); font-size: 12px; flex-wrap: wrap; margin-bottom: 7px;">
                                    <div class="rateyo" style="margin: 5px -3px -5px;" data-rateyo-rating="{{ $tutor->rating ? ($tutor->rating - 0.5) : 0 }}" data-rateyo-spacing="5px" data-rateyo-num-stars="5" data-rateyo-star-width="10px"></div></span>
{{--                                <div style="height: 2px;"></div><span style="display: flex; align-items: center; line-height: 13px; margin-@lang('main.left'): -5px; margin-@lang('main.right'): -5px; padding-@lang('main.left'): 0px; padding-@lang('main.right'): 25px;"><img id="badge" src="images/US.png" style="width: 32px; margin-@lang('main.right'): 5px; margin-@lang('main.left'): 5px;">Portland, Oregon. USA</span>--}}
                                <div style="display: flex; flex-flow: row wrap; align-items: center; margin: 15px -3px -5px;"><div tabindex="0" style="border: 10px; box-sizing: border-box; display: flex; font-family: Roboto, sans-serif; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); cursor: default; text-decoration: none; margin: 2px 3px 0px; padding: 0px; outline: none; font-size: inherit; font-weight: inherit; position: relative; background-color: rgb(224, 224, 224); border-radius: 4px; white-space: nowrap; width: fit-content;">@if(isset($tutor->certificates[0]))<span style="color: rgb(119, 119, 119); font-size: 11px; font-weight: 400; line-height: 18px; padding-@lang('main.left'): 12px; padding-@lang('main.right'): 12px; user-select: none; white-space: nowrap;"><span><i class="fas fa-graduation-cap"></i> {{$tutor->certificates[0]}}</span></span>@endif</div></div></div></span></div><div title="{{ $tutor->online ? __('home.available') : __('home.not_available') }}" style="width: 15px; height: 15px; border-radius: 4px; border: 2px solid rgb(255, 255, 255); position: absolute; bottom: 7%; background-color: {{ $tutor->online ? 'rgb(150, 196, 94)' : 'rgb(255, 57, 17)' }}; @lang('main.left'): 2.5%;"></div><div style="position: absolute; top: 0px; @lang('main.right'): 0px;">
                                    <span role="checkbox" aria-checked="false" aria-label="Favorite" tabindex="-1">
                                        @if(Auth::check())
                                        <button tabindex="0" type="button" style="border: 10px; box-sizing: border-box; display: inline-block; font-family: Roboto, sans-serif; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); cursor: pointer; text-decoration: none; margin: 0px; padding: 12px; outline: none; font-size: 0px; font-weight: inherit; position: relative; overflow: visible; transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms; width: 48px; height: 48px; background: none;">
                                            <div class="unlike" id="like_icon_{{ $tutor->id }}" onclick="like_tutor('{{ $tutor->id }}', 1)" {!! in_array($tutor->id, $favorites_ids) ? 'style="display: none"' : '' !!}><svg viewBox="0 0 24 24" style="display: inline-block; color: rgba(0, 0, 0, 0.87); fill: rgb(119, 119, 119); height: 24px; width: 24px; user-select: none; transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms;"><path d="M16.5 3c-1.74 0-3.41.81-4.5 2.09C10.91 3.81 9.24 3 7.5 3 4.42 3 2 5.42 2 8.5c0 3.78 3.4 6.86 8.55 11.54L12 21.35l1.45-1.32C18.6 15.36 22 12.28 22 8.5 22 5.42 19.58 3 16.5 3zm-4.4 15.55l-.1.1-.1-.1C7.14 14.24 4 11.39 4 8.5 4 6.5 5.5 5 7.5 5c1.54 0 3.04.99 3.57 2.36h1.87C13.46 5.99 14.96 5 16.5 5c2 0 3.5 1.5 3.5 3.5 0 2.89-3.14 5.74-7.9 10.05z"></path></svg></div>
                                            <div class="like" id="dislike_icon_{{ $tutor->id }}" onclick="like_tutor('{{ $tutor->id }}', 0)" {!! in_array($tutor->id, $favorites_ids) ? '' : 'style="display: none"' !!}><svg viewBox="0 0 24 24" style="display: inline-block; color: rgba(0, 0, 0, 0.87); fill: rgb(246, 186, 1); height: 24px; width: 24px; user-select: none; transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms;"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"></path></svg></div>
                                        </button>
                                        @endif
                                    </span></div></div><div style="padding: 0px 16px 16px; font-size: 15px; color: rgb(119, 119, 119); cursor: pointer; font-weight: 300; max-height: 150px; overflow-y: auto; margin-bottom: auto;"><p style="margin-bottom: 0px;"><i><small></small><br></i>{{ $tutor->title }}</p></div></div>
          </figure>
          @endforeach

        </div>
      </div>
    </section>

    <!-- Services -->
    <section class="services">
      <div class="sevice_img">
        <img src="{{ url('/') }}/images/blog-img/1-2.jpg" />
      </div>
      <div class="service_bg">
        <div class="container">
          <div class="row">
            <div class="col-md-6 ml-auto">
              <div class="item">
                <div class="row">
                  <div class="col-md-2">
                    <img src="{{ url('/') }}/images/svg/service1@2x.svg" />
                  </div>
                  <div class="col-md-10 text-center">
                    <h4>@lang('home.get_most_classes')</h4>
                    <p>
                      @lang('home.get_most_classes_desc')
                    </p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="row">
                  <div class="col-md-2">
                    <img src="{{ url('/') }}/images/svg/service2@2x.svg" />
                  </div>
                  <div class="col-md-10 text-center">
                    <h4>@lang('home.speak_without_fear')</h4>
                    <p>
                      @lang('home.speak_without_fear_desc')
                    </p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="row">
                  <div class="col-md-2">
                    <img src="{{ url('/') }}/images/svg/service3@2x.svg" />
                  </div>
                  <div class="col-md-10 text-center">
                    <h4>@lang('home.work_on_your_own_schedule')</h4>
                    <p>
                      @lang('home.work_on_your_own_schedule_desc')
                    </p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="row">
                  <div class="col-md-2">
                    <img src="{{ url('/') }}/images/svg/service4@2x.svg" />
                  </div>
                  <div class="col-md-10 text-center">
                    <h4>@lang('home.courses')</h4>
                    <p>
                      @lang('home.courses_desc')
                    </p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="row">
                  <div class="col-md-2">
                    <img src="{{ url('/') }}/images/svg/service5@2x.svg" />
                  </div>
                  <div class="col-md-10 text-center">
                    <h4>@lang('home.certificate')</h4>
                    <p>
                        @lang('home.certificate_desc')
                    </p>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- our plans -->
    <section class="see_plans">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-4">
            <a href="{{ route('student.subscribe') }}" class="btn btn-bordered-light btn-block">@lang('home.see_our_plans')</a>
          </div>
        </div>
      </div>
    </section>

    <!-- facility -->
    <section class="facility">
      <div class="facility_img">
        <img src="{{ url('/') }}/images/bg/bg-trail.jpg" />
      </div>
      <div class="facility_bg">
        <div class="container">
          <div class="row">
            <div class="col-md-6 description" data-aos="fade-@lang('main.right')" data-aos-delay="250">
              <div class="title">
                <h3>@lang('home.always_be_learning_on_the_device_you_prefer')</h3>
              </div>
              <p>
               @lang('home.always_be_learning_on_the_device_you_prefer_desc')
              </p>
              <ul>
                <li>
                  @lang('home.always_be_learning_on_the_device_you_prefer_desc_2')
                </li>
                <li>
                  @lang('home.always_be_learning_on_the_device_you_prefer_desc_3')
                </li>
                <li>
                  @lang('home.always_be_learning_on_the_device_you_prefer_desc_4')
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials py-5">
      <div class="title title-center wow fadeIn" data-wow-delay="0.5s">
        <h3 data-aos="fade-down" data-aos-delay="150">@lang('home.testimonials')</h3>
      </div>
      <div class="container-fluid">
        <div class="bg-testimonials" data-aos="fade-@lang('main.left')" data-aos-delay="250"></div>
      </div>
      <div class="container">
        <div class="owl-carousel owl-theme">
          
          @foreach ($testimonials as $testimonial)
          <div class="item">
            <div class="row">
              <div class="col-md-5 description-testimonials" data-aos="fade-@lang('main.right')" data-aos-delay="550">
                <h4>{{ $testimonial->student->name ?? '' }}</h4>
                <small>{{ $testimonial->course->name ?? '' }}</small>
                <p class="xs-wid">
                  <i>{{ $testimonial->content ?? '' }}</i>
                </p>
              </div>
              <div class="col-md-7 video-testimonials">
                <div class="overlay" data-aos="fade-@lang('main.left')" data-aos-delay="250">
                  <img src="{{ url('/') }}/images/course-imgs/img-1.jpg" />
                  <div class="play">
                    <a class="youtube" href="http://www.youtube.com/embed/-PqP0BCiTlE?rel=0&amp;wmode=transparent">
                      <i class="fas fa-play"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>


  </div>
@endsection

@section('scripts')
<script src="https://cdn.rawgit.com/nizarmah/calendar-javascript-lib/master/calendarorganizer.min.js"></script>
<script type='text/javascript'>
    function like_tutor(id, value)
	{
		if (value == 1) {
			$("#like_icon_" + id).hide();
			$("#dislike_icon_" + id).show();
		} else {
			$("#like_icon_" + id).show();
			$("#dislike_icon_" + id).hide();
		}
		$.ajax({
			url: "{{ url('student/like_tutor') }}",
			data: JSON.stringify({'tutor_id': id, 'value': value}),
			headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
			contentType: "application/json",
			success: function(result) {
				console.log('like success');
			}
		});
	}

    $('.tutor_profile').click(function(){
        var id = this.id;
        var splitid = id.split('_');
        var userid = splitid[1];

        // AJAX request
        $.ajax({
            url: '{{ url("tutor") }}/' + userid,
            type: 'get',
            data: {},
            success: function(response){
                // Add response in Modal body
                $('.modal-content').html(response);

                // Display Modal
                $('#tutor_profile').modal('show');
            }
        });
    });
</script>
@endsection