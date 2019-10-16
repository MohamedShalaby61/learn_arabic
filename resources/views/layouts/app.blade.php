<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Learn Arabic') }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <!-- Declaring Css Files -->
    <!-- Animate css -->
    <link href="{{ asset('vendors/WOW-master/css/libs/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendors/animate-scroller/aos.css') }}" rel="stylesheet" type="text/css" />
    <!-- colorbox -->
    <link href="{{ asset('vendors/colorbox-master/example3/colorbox.css') }}" rel="stylesheet" type="text/css" />
    <!-- rate-stars -->
    <link href="{{ asset('vendors/rate-stars/jquery.rateyo.min.css') }}" rel="stylesheet" type="text/css" />
    {{--  <script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>  --}}
    <script src="{{ env('SOCKET_DOMAIN') }}/socket.io/socket.io.js"></script>
    <!-- Custom stylesheet -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css" />
    @if(app()->getLocale() == 'ar')
        <link href="{{ asset('css/style-rtl.css') }}" rel="stylesheet" type="text/css" />
    @endif
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />

    @yield('css')

    @yield('calender')

    <link href="{{ asset('css/responsive-all-site.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/notifiation.css') }}" rel="stylesheet" type="text/css" />


    <style>
        .wrapper .calendar.small {
            width: 220px;
            height: 343px;
        }
        .wrapper .events.small {
            width: 324px;
            height: 343px;
        }
    </style>

    <script>
        var siteUrl = "{{ url('') }}/";
        var customLang = {
            'date': "@lang('students.date')",
            'course_time': "@lang('students.course_time')",
            'student': "@lang('students.student')",
            'cancel_time': "@lang('students.cancel_time')"
        };
    </script>
</head>
<body {!! $bodyAttributes ?? '' !!}>
    @guest
      <header>
        <nav class="navbar navbar-expand-md bg-light">
          <div class="container">
            <a class="navbar-brand" href="{{ url('') }}"></a>
            <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span>
              <i class="fas fa-bars"></i>
            </button>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div class="mr-auto">
              <div class="row res-nav">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a href="{{ url('') }}" class="nav-link"><i class="fas fa-home"></i></a></li>
                    <li class="nav-item"><a href="{{ url('courses') }}" class="nav-link">@lang('main.all_courses')</a></li>
                    <li class="nav-item"><a href="{{ url('about') }}" class="nav-link" role="button">@lang('main.about_us')</a></li>
                    <li class="nav-item"><a href="{{ url('contact') }}" class="nav-link">@lang('main.contact_us')</a></li>
                </ul>
              </div>
            </div>
            <div class="ml-auto" style="margin-top: 1px;">
			  {{-- <div class="search">
                <a href="#search"><i class="fas fa-search"></i></a>
			  </div> --}}
              <div class="lang">
                 @if(app()->getLocale() == 'en')
                    <a href="{{ url('setlocale/ar') }}"><i class="fas fa-globe"></i></a>
                 @else
                    <a href="{{ url('setlocale/en') }}"><i class="fas fa-globe"></i></a>
                 @endif
              </div>
              <div class="profile">
                <a href="{{ route('login') }}">@lang('main.login')</a>
                <a href="{{ route('register') }}" class="register-btn">@lang('main.register')</a>
              </div>
            </div>
			</div>
          </div>
        </nav>
      </header>
    @else
        @if (true || Auth::user()->type == 3)
          <!-- nav -->
          <header>
            <nav class="navbar navbar-expand-md bg-light">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                    </a>
					<button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span>
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <div class="mr-auto">
                        <div class="row res-nav">
							<ul class="nav navbar-nav ml-auto">
								<li class="nav-item"><a href="{{ url('') }}" class="nav-link"><i class="fas fa-home"></i></a></li>
								<li class="nav-item"><a href="{{(auth()->user()->type==2)? url('tutor/student'): url('students')}}" class="nav-link">{{(auth()->user()->type==2)?__('main.students'):__('main.tutors')}}</a></li>
								<li class="nav-item"><a href="{{ url('courses') }}" class="nav-link">@lang('main.courses')</a></li>
								<li class="nav-item"><a href="{{ url('progress') }}" class="nav-link">@lang('main.progress')</a></li>
							</ul>
                        </div>
                    </div>
                    <div class="ml-auto">
                        <div class="search">
                            <div style="position: relative; display: flex; justify-content: space-between; align-items: center;"><a href="{{ route('student.subscribe') }}"><button class="btn-subscribe" tabindex="0" type="button" style="border: 10px; box-sizing: border-box; display: inline-block; font-family: Roboto, sans-serif; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); cursor: pointer; text-decoration: none; margin: 0px; padding: 0px; outline: none; font-size: inherit; font-weight: inherit; position: relative; height: 36px; line-height: 36px; min-width: 88px; color: rgba(0, 0, 0, 0.87); transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms; border-radius: 2px; user-select: none; overflow: hidden; background-color: rgb(255, 98, 80); text-align: center;"><div><span style="position: relative; padding-left: 16px; padding-right: 16px; vertical-align: middle; letter-spacing: 0px; text-transform: uppercase; font-weight: 500; font-size: 14px; color: rgb(255, 255, 255);">@lang('main.subscribe')</span></div></button></a></div>
                        </div>
                        {{--<div class="search">
                            <a href="#search"><i class="fas fa-search"></i></a>
                        </div> --}}
                        <div class="lang">
                          @if(app()->getLocale() == 'en')
                            <a href="{{ url('setlocale/ar') }}"><i class="fas fa-globe"></i></a>
                          @else
                            <a href="{{ url('setlocale/en') }}"><i class="fas fa-globe"></i></a>
                          @endif
                        </div>
                       
                        
                                            <!-- **************** start notification ************ -->
                     @if(auth()->user()->type==2)                       
                    <div class="notification">
                        <div class="dropdown">
                            <button class="btn bk-not" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bell"><sup><b>10</b></sup></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div class="item-per" role="menu">
                                    <div role="menuitem" class="word-not">
                                        <div>@lang('main.notification')</div>
                                    </div>
                                    <div class="word-new">
                                        NEW
                                    </div>
                                    <div class="per-new">
                                        <div class="contact-per" role="menuitem">
                                            <div class="contact-action">
                                                <button tabindex="0" class="btn-video" type="button" style="">
                                                  <div>
                                                    <svg viewBox="0 0 24 24" style="display: inline-block; color: rgba(0, 0, 0, 0.2); fill: rgba(0, 0, 0, 0.2); height: 24px; width: 24px; user-select: none; transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms;">
                                                      <path d="M17 10.5V7c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v10c0 .55.45 1 1 1h12c.55 0 1-.45 1-1v-3.5l4 4v-11l-4 4z"></path>
                                                    </svg>
                                                  </div>
                                                </button>
                                                
                                            </div>
                                            <img size="40" color="#757575" src="images/course-imgs/4-1.jpg" draggable="true" data-bukket-ext-bukket-draggable="true">
                                            
                                            <span style="">Emy Earle</span>
                                            <p>selected time from 5:00 Am to 6:00 Am.</p>
                                        </div>
                                    </div>
                                    <div class="per-new">
                                        <div class="contact-per" role="menuitem">
                                            <div class="contact-action">
                                                <button tabindex="0" class="btn-video" type="button" style="">
                                                  <div>
                                                    <svg viewBox="0 0 24 24" style="display: inline-block; color: rgba(0, 0, 0, 0.2); fill: rgba(0, 0, 0, 0.2); height: 24px; width: 24px; user-select: none; transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms;">
                                                      <path d="M17 10.5V7c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v10c0 .55.45 1 1 1h12c.55 0 1-.45 1-1v-3.5l4 4v-11l-4 4z"></path>
                                                    </svg>
                                                  </div>
                                                </button>
                                                
                                            </div>
                                            <img size="40" color="#757575" src="images/course-imgs/5-1.jpg" draggable="true" data-bukket-ext-bukket-draggable="true">
                                            
                                            <span style="">Andrew Earle</span>
                                            <p>selected time from 12:00 Am to 1:00 Am.</p>
                                        </div>
                                    </div>
                                    <div style="box-sizing: border-box; color: rgba(0, 0, 0, 0.54); font-size: 14px; font-weight: 500; line-height: 48px; padding-left: 16px; width: 100%;">EARLIER</div>
                                    <div class="per-new old-note">
                                        <div class="contact-per" role="menuitem">
                                            <div class="contact-action">
                                                <button tabindex="0" class="btn-video" type="button" style="">
                                                  <div>
                                                    <svg viewBox="0 0 24 24" style="display: inline-block; color: rgba(0, 0, 0, 0.2); fill: rgba(0, 0, 0, 0.2); height: 24px; width: 24px; user-select: none; transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms;">
                                                      <path d="M17 10.5V7c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v10c0 .55.45 1 1 1h12c.55 0 1-.45 1-1v-3.5l4 4v-11l-4 4z"></path>
                                                    </svg>
                                                  </div>
                                                </button>
                                                
                                            </div>
                                            <img size="40" color="#757575" src="images/course-imgs/5-1.jpg" draggable="true" data-bukket-ext-bukket-draggable="true">
                                            
                                            <span style="">Andrew Earle</span>
                                            <p>selected time from 12:00 Am to 1:00 Am.</p>
                                        </div>
                                    </div>
                                    <div class="per-new old-note">
                                        <div class="contact-per" role="menuitem">
                                            <div class="contact-action">
                                                <button tabindex="0" class="btn-video" type="button" style="">
                                                  <div>
                                                    <svg viewBox="0 0 24 24" style="display: inline-block; color: rgba(0, 0, 0, 0.2); fill: rgba(0, 0, 0, 0.2); height: 24px; width: 24px; user-select: none; transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms;">
                                                      <path d="M17 10.5V7c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v10c0 .55.45 1 1 1h12c.55 0 1-.45 1-1v-3.5l4 4v-11l-4 4z"></path>
                                                    </svg>
                                                  </div>
                                                </button>
                                                
                                            </div>
                                            <img size="40" color="#757575" src="images/course-imgs/5-1.jpg" draggable="true" data-bukket-ext-bukket-draggable="true">
                                            
                                            <span style="">Andrew Earle</span>
                                            <p>selected time from 1:00 Am to 3:00 Am.</p>
                                        </div>
                                    </div>
                                </div>
                          
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    @if(auth()->user()->type==3)
                        <div class="favourite_tutors">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle favorite-btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-users"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    
                                    
                                    <div class="cambly-contact-list" role="menu" style="padding: 8px 0px; display: table-cell; user-select: none; width: 336px;">
                                        <div>
                                            <div role="menuitem" style="color: rgba(0, 0, 0, 0.3); display: block; font-size: 16px; line-height: 48px; position: relative; transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms; margin-left: 0px; padding: 0px 16px; cursor: default; min-height: 48px; white-space: nowrap; margin-bottom: -10px;">
                                                <div>@lang('main.favorite_tutors')</div>
                                            </div>
                                        </div>
                                        @if(isset($favorites[0]) && !empty($favorites[0]))
                                            <div style="box-sizing: border-box; color: rgba(0, 0, 0, 0.54); font-size: 14px; font-weight: 500; line-height: 48px; padding-left: 16px; width: 100%;">
                                                Offline
                                            </div>
                                        @endif
                                        @if(isset($favorites[1]) && !empty($favorites[1]))
                                        <div style="box-sizing: border-box; color: rgba(0, 0, 0, 0.54); font-size: 14px; font-weight: 500; line-height: 48px; padding-left: 16px; width: 100%;">
                                            Online
                                        </div>
                                        @endif
                                        <div id="favoriteContainer">
    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="profile">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="nav-profile">
                                    <img src="{{ auth()->user()->profile ? Auth::user()->profile->image : '' }}" style="transform: scale(1.8);"/>
                                </div>
                                <span>{{ Auth::user()->name }}</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @if (Auth::user()->type == 3)
                                    <a class="dropdown-item" href="{{ route('student.profile') }}">@lang('main.account_settings')</a>
                                @else
                                    <a class="dropdown-item" href="{{ route('tutor.profile') }}">@lang('main.account_settings')</a>
                                @endif
                                <a class="dropdown-item" href="{{(auth()->user()->type==2)? url('schedule'): url('student/schedule')}}">@lang('main.schedule')</a>
                                @if (Auth::user()->type != 3)
                                    <a class="dropdown-item" href="{{ route('tutor.availability') }}">@lang('main.my_availability')</a>                            
                                @endif
                                
                                <a class="dropdown-item" href="{{ route('student.enrolled') }}">@lang('main.my_courses')</a>
                                <a class="dropdown-item" href="{{ route('calls') }}">@lang('main.my_calling')</a>
                                <hr>
                                <a class="dropdown-item" href="{{ route('contact') }}">@lang('main.contact_us')</a>
                                <a class="dropdown-item logout" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">@lang('main.log_out') <i class="fas fa-sign-out"></i></a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
            </nav>
          </header>
        @elseif (false && Auth::user()->type == 2)
          <!-- nav -->
          <header>
            <nav class="navbar navbar-expand-md bg-light">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                    </a>
					<button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span>
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <div class="mr-auto">
                        <div class="row res-nav">
                            
							<ul class="nav navbar-nav ml-auto">
								<li class="nav-item"><a href="{{ url('') }}" class="nav-link"><i class="fas fa-home"></i></a></li>
								<li class="nav-item"><a href="{{ url('tutor/calls') }}" class="nav-link">@lang('main.received_calls')</a></li>
							</ul>
                            
                        </div>
                    </div>
                    <div class="ml-auto">
                        {{--<div class="lang">
                            <a href="#"><i class="fas fa-globe"></i></a>
                        </div>--}}

                        <div class="profile">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="nav-profile">
                                        <img src="{{ Auth::user()->profile->image }}" />
                                    </div>
                                    <span>{{ Auth::user()->name }}</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('tutor.profile') }}">@lang('main.profile')</a>
                                    <a class="dropdown-item logout" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">@lang('main.logout') <i class="fas fa-sign-out"></i></a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
					</div>
                </div>
            </nav>
          </header>
        @endif
    @endguest



    <div id="search">
      <button type="button" class="close">×</button>
      <form class="search-form" method="get" action="">
          <input type="search" name="search" placeholder="@lang('main.search_here') ..." required="">
          <button type="button" class="btn btn-search">@lang('main.search') <i class="fas fa-search"></i>
          </button>
      </form>
    </div>
    <!-- Modal -->
    <div id="tutor_profile" class="modal fade modal-lg">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

            </div>
        </div>
    </div>

    @yield('content')

    <footer class="clearfix">
        <div class="container footer">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ url('/') }}/images/logo-footer.png" class="w-90" />
                    <p>
                        @lang('main.footer_desc')
                    </p>
                </div>
                <div class="col-md-2 offset-md-1">
                    <h4>@lang('main.product')</h4>
                    <ul>
                        <li>
                            <a href="#">@lang('main.how_it_works') </a>
                        </li>
                        <li>
                            <a href="#">@lang('main.benefits') </a>
                        </li>
                        <li>
                            <a href="#">@lang('main.features') </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h4>@lang('main.support')</h4>
                    <ul>
                        <li>
                            <a href="#">@lang('main.blog')</a>
                        </li>
                        <li>
                            <a href="#">@lang('main.help')</a>
                        </li>
                        <li>
                            <a href="#">@lang('main.faq')</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h4>@lang('main.contact')</h4>
                    <ul>
                        <li>
                            <a href="mailto:info@arabic-mentor.com">info@arabic-mentor.com</a>
                        </li>
                        <li>
                            809-347-1289
                        </li>
                    </ul>
                    <ul class="social-icons">
                        <li>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="row">
                <div class="col">
                    <p>
                        @lang('main.copyright')
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!--  rate stars  -->
    <script src="{{ asset('vendors/rate-stars/jquery.rateyo.js') }}" type="text/javascript"></script>
    <!-- NumScroller -->
    <script src="{{ asset('vendors/numscroller-gh-pages/numscroller-1.0.js') }}" type="text/javascript"></script>
    <!-- WOW-master -->
    <script src="{{ asset('vendors/WOW-master/dist/wow.min.js') }}"></script>
    <script src="{{ asset('vendors/animate-scroller/aos.js') }}" type="text/javascript"></script>
    <!-- owlcarousel -->
    <script src="{{ asset('vendors/OwlCarousel2-2.3.2/docs/assets/owlcarousel/owl.carousel.min.js') }}" type="text/javascript"></script>
    <!-- colorbox -->
    <script src="{{ asset('vendors/colorbox-master/jquery.colorbox-min.js') }}" type="text/javascript"></script>
    <!-- filterjs -->
    <script src="{{ asset('vendors/filterizr-master/dist/jquery.filterizr.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('vendors/fullcalendar/demo/lib/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendors/fullcalendar/demo/fullcalendar.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}" type="text/javascript"></script>

    @if(app()->getLocale() == 'ar')
    <script>
        jQuery.extend(jQuery.validator.messages, {
            required: "هذا الحقل إلزامي",
            remote: "يرجى تصحيح هذا الحقل للمتابعة",
            email: "رجاء إدخال عنوان بريد إلكتروني صحيح",
            url: "رجاء إدخال عنوان موقع إلكتروني صحيح",
            date: "رجاء إدخال تاريخ صحيح",
            dateISO: "رجاء إدخال تاريخ صحيح (ISO)",
            number: "رجاء إدخال عدد بطريقة صحيحة",
            digits: "رجاء إدخال أرقام فقط",
            creditcard: "رجاء إدخال رقم بطاقة ائتمان صحيح",
            equalTo: "رجاء إدخال نفس القيمة",
            extension: "رجاء إدخال ملف بامتداد موافق عليه",
            maxlength: $.validator.format( "الحد الأقصى لعدد الحروف هو {0}" ),
            minlength: $.validator.format( "الحد الأدنى لعدد الحروف هو {0}" ),
            rangelength: $.validator.format( "عدد الحروف يجب أن يكون بين {0} و {1}" ),
            range: $.validator.format( "رجاء إدخال عدد قيمته بين {0} و {1}" ),
            max: $.validator.format( "رجاء إدخال عدد أقل من أو يساوي {0}" ),
            min: $.validator.format( "رجاء إدخال عدد أكبر من أو يساوي {0}" )
        });
    </script>
    @endif

    <script type="text/javascript">
        $(".form").validate({
            errorElement: "span",
            errorClass: "error"
        });
    </script>
    
    <!-- custom -->
    <script src="{{ asset('js/script.js') }}" type="text/javascript"></script>
    @if(app()->getLocale() == 'ar')
        <script src="{{ asset('js/calendar-arabic.js') }}" type="text/javascript"></script>
    @else
        <script src="{{ asset('js/calendar.js') }}" type="text/javascript"></script>
    @endif

    @yield('scripts')
    <script>
        $(document).ready(function(){
            $('#favoriteContainer').on('click', '.tutor_profile',function(){
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
            $('#tutor_profile').on('hidden.bs.modal', function (){
                 $('#tutorVideo').get(0).pause();
                $('#tutorVideo').currentTime = 0;
            });

            $('.favourite_tutors .favorite-btn').click(function(){
                // AJAX request
                $.ajax({
                    url: '{{ url("/ajax/students") }}',
                    type: 'get',
                    data: {},
                    success: function(response){
                        
                        if(response.favorites[0] != '' && response.favorites[0] != undefined && response.favorites[0].length !==0)
                        {
                            $('#favoriteContainer').empty();
                            $.each(response.favorites[0], function(index, item){
                                $('#favoriteContainer').append(
                                    '<div>'
                                            +'<div class="cambly-contact" role="menuitem" style="color: rgba(0, 0, 0, 0.3); display: block; font-size: 16px; line-height: 48px; position: relative; transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms; margin-left: 0px; padding: 0px 38px 0px 72px; cursor: default; min-height: 48px; white-space: nowrap;">'
                                                +'<div class="contact-action-buttons" style="float: right; margin: 0px 6px; max-height: 48px; display: flex; align-items: center;">'
                                                    +'<button id="tutor_'+item.id+'" class="tutor_profile" tabindex="0" type="button" style="border: 10px; box-sizing: border-box; display: inline-block; font-family: Roboto, sans-serif; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); cursor: pointer; text-decoration: none; margin: 0px; padding: 12px 6px; outline: none; font-size: 0px; font-weight: inherit; position: relative; overflow: visible; transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms; width: 36px; height: 48px; background: none;">'
                                                        +'<div>'
                                                            +'<svg viewBox="0 0 24 24" style="display: inline-block; color: rgba(0, 0, 0, 0.2); fill: rgba(0, 0, 0, 0.2); height: 20px; width: 20px; user-select: none; transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms;">'
                                                            +'<path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z">  </path>'
                                                            +'</svg>'
                                                        +'</div>'
                                                    +'</button>'
                                                +'</div>'
                                                +'<img size="40" color="#757575" src="'+item.image+'" draggable="true" data-bukket-ext-bukket-draggable="true" style="color: rgb(117, 117, 117); background-color: rgb(188, 188, 188); user-select: none; display: block; align-items: center; justify-content: center; font-size: 20px; border-radius: 50%; height: 40px; width: 40px; position: absolute; top: 0px; margin: 4px 0px 4px 12px; left: 4px;">'
                                                +'<span style="color: rgba(0, 0, 0, 0.6);">'+item.name+'</span>'
                                        +'</div>'
                                    )
                            });
                        }
                        if(response.favorites[1] != '' && response.favorites[1] != undefined && response.favorites[1].length !==0)
                        {
                            $('#favoriteContainer').empty();
                            $.each(response.favorites[1], function(index, item){
                                $('#favoriteContainer').append(
                                    '<div>'
                                            +'<div class="cambly-contact" role="menuitem" style="color: rgba(0, 0, 0, 0.3); display: block; font-size: 16px; line-height: 48px; position: relative; transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms; margin-left: 0px; padding: 0px 38px 0px 72px; cursor: default; min-height: 48px; white-space: nowrap;">'
                                                +'<div class="contact-action-buttons" style="float: right; margin: 0px 6px; max-height: 48px; display: flex; align-items: center;">'
                                                    +'<button id="tutor_'+item.id+'" class="tutor_profile" tabindex="0" type="button" style="border: 10px; box-sizing: border-box; display: inline-block; font-family: Roboto, sans-serif; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); cursor: pointer; text-decoration: none; margin: 0px; padding: 12px 6px; outline: none; font-size: 0px; font-weight: inherit; position: relative; overflow: visible; transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms; width: 36px; height: 48px; background: none;">'
                                                        +'<div>'
                                                            +'<svg viewBox="0 0 24 24" style="display: inline-block; color: rgba(0, 0, 0, 0.2); fill: rgba(0, 0, 0, 0.2); height: 20px; width: 20px; user-select: none; transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms;">'
                                                            +'<path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z">  </path>'
                                                            +'</svg>'
                                                        +'</div>'
                                                    +'</button>'
                                                +'</div>'
                                                +'<img size="40" color="#757575" src="'+item.image+'" draggable="true" data-bukket-ext-bukket-draggable="true" style="color: rgb(117, 117, 117); background-color: rgb(188, 188, 188); user-select: none; display: block; align-items: center; justify-content: center; font-size: 20px; border-radius: 50%; height: 40px; width: 40px; position: absolute; top: 0px; margin: 4px 0px 4px 12px; left: 4px;">'
                                                +'<span style="color: rgba(0, 0, 0, 0.6);">'+item.name+'</span>'
                                        +'</div>'
                                    )
                            });
                        }
                    }
                });
            });

        });


    </script>
    @if (Auth::check() && Auth::user()->type == 2)
        <div class="modal fade" id="confirm-call" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Received call</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                    </div>
                    <div class="modal-body">
                        <div id="countdown">{{ env('CALL_TIMER') }}</div>
                    <div class="text-center clearfix">
                        <input type="hidden" id="call_student_id" />
                        <a class="btn btn-success btn-ok text-white" id="accept_call">Accept</a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" id="reject_call">Reject</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>


        {{--<script src="https://cdn.socket.io/socket.io-1.3.4.js"></script>--}}
        {{--<script src="{{ env('SOCKET_DOMAIN') }}/socket.io/socket.io.js"></script>--}}
        <script>
            var socket = io.connect("{{ env('SOCKET_DOMAIN') }}",{query:'tutor_id={{ Auth::user()->fk_id }}'});
            socket.on('incomming_call', function (data) {
                $('#call_student_id').val(data.student_id);
                openConfirmationDialog();
            });
            setInterval(function() {
                socket.emit('heartbeat', {tutor_id: {{ Auth::user()->fk_id }}});
            }, 1000);
            
            var downloadTimer;
            var timeleft;
            function openConfirmationDialog() {
                timeleft = {{ env('CALL_TIMER') }} - 1;
                downloadTimer = setInterval(function() {
//                    document.getElementById("countdown").style.display = '';
                    document.getElementById("countdown").innerHTML = timeleft;
                    timeleft -= 1;
                    if (timeleft < 0) {
                        clearInterval(downloadTimer);
//                        document.getElementById("countdown").style.display = 'none';
                        $('#confirm-call').modal('toggle');
                    }
                }, 1000);

                $("#confirm-call").modal();
            }

            $('#confirm-call').on('hidden.bs.modal', function () {
                clearInterval(downloadTimer);
                document.getElementById("countdown").innerHTML = "{{ env('CALL_TIMER') }}";
            });

            $('#accept_call').click(function(e){
                clearInterval(downloadTimer);
                document.getElementById("countdown").innerHTML = "{{ env('CALL_TIMER') }}";

                $('#confirm-call').modal('toggle');

                $.ajax({
                    url: '{{ url("/tutor/accept_call") }}/' + $('#call_student_id').val(),
                    type: 'get',
                    data: {},
                    success: function(response){
                        console.log('from app',response);
                        socket.emit('call_accepted', {join_url: response, student_id: $('#call_student_id').val(), tutor_id: {{ Auth::user()->fk_id }} });
                        window.open(response, '_blank');
                    }
                });
            });
			
			$('#reject_call').click(function(e){
                clearInterval(downloadTimer);
                document.getElementById("countdown").innerHTML = "{{ env('CALL_TIMER') }}";

                $('#confirm-call').modal('toggle');

                socket.emit('call_rejected', {student_id: $('#call_student_id').val(), tutor_id: {{ Auth::user()->fk_id }} });
            });
        </script>
    @endif
</body>
</html>