@extends('layouts.app')

@section('content')
  <!-- main body -->
  <div class="main">
    <!-- innerpages-header  -->
    <div class="innerpages-top about-us"></div>
    <!-- About -->
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-md-7 py-3">
          <div class="title title-center">
            <h3>@lang('about.about_us')</h3>
          </div>
          <p>
            @if(App()->getLocale() == 'ar')
            {!! $config->aboutus_ar_one !!}
            @else
            {!! $config->aboutus_en_one !!}
            @endif
          </p>
        </div>
      </div>
    </div>
    <div class="about pt-5">
      <div class="container-fluid">
        <div class="bg-about"></div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <div class="side-video" data-aos="fade-right">
              <div class="overlay">
                <img src="https://img.youtube.com/vi/-PqP0BCiTlE/hqdefault.jpg" />
                <div class="play">
                  <a class="youtube" href="http://www.youtube.com/embed/-PqP0BCiTlE?rel=0&amp;wmode=transparent">
                    <i class="fas fa-play"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="description" data-aos="fade-left">
              <div class="title title-side">
                <h3>@lang('about.who_we_are')</h3>
                <div class="seperator"></div>
              </div>
              <p>
                @if(App()->getLocale() == 'ar')
                  {!! $config->aboutus_ar_two !!}
                @else
                  {!! $config->aboutus_en_two !!}
                @endif
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- why-choose-us -->
    <div class="why-choose-us py-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="title title-center" data-aos="fade-down" data-aos-delay="50">
              <h3>@lang('about.why_take_classes_on_arabic_mentors')</h3>
            </div>
            <p>
              @if(App()->getLocale() == 'ar')
                {!! $config->aboutus_ar_three !!}
              @else
                {!! $config->aboutus_en_three !!}
              @endif
            </p>
            <div class="row counter">
              <div class="col-md-4">
                <h3 data-aos="fade-right" data-aos-delay="250"><span class='numscroller' data-min='1' data-max='100' data-delay='5' data-increment='1'>100</span>+</h3>
                <p>
                  <small>@lang('about.teacher_experts')</small>
                </p>
              </div>
              <div class="col-md-4">
                <h3 data-aos="fade-right" data-aos-delay="450"><span class='numscroller' data-min='1' data-max='1000' data-delay='5' data-increment='1'>1000</span>+</h3>
                <p>
                  <small>@lang('about.active_users')</small>
                </p>
              </div>
              <div class="col-md-4">
                <h3 data-aos="fade-right" data-aos-delay="650"><span class='numscroller' data-min='1' data-max='90' data-delay='5' data-increment='1'>90</span>%</h3>
                <p>
                  <small>@lang('about.self_improvement')</small>
                </p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
