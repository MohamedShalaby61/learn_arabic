@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">
@endsection

@section('content')
  <!-- main body -->
  <div class="main">
    <!-- innerpages-header  -->
    <div class="innerpages-top course-details-top">
      <img src="{{ url('/') }}/images/course-imgs/img-1.jpg" />
      <div class="breadcrumb-container">
        <h4>{{ $course->title }}</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">@lang('courses.home')</a></li>
            <li class="breadcrumb-item"><a href="{{ url('courses') }}">@lang('courses.all_courses')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('courses.course_details')</li>
          </ol>
        </nav>
      </div>
    </div>

    <!-- course details -->
    <div class="course-details py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <div class="course-img">
              <img src="{{ $course->image }}" class="img-circle" />
            </div>
            <h4 class="mt-3">{{ $course->title }}</h4>
			@guest
              <a href="{{ route('login') }}" class="btn btn-primary btn-block my-3">@lang('courses.enroll_course')</a>
			@else
              <!-- <a href="{{ url('student/enroll_course') . '/' . $course->id }}" class="btn btn-primary btn-block my-3">Enroll Course</a> -->
              <a href="{{ url('student/subscribe_course') . '/' . $course->id }}" class="btn btn-primary btn-block my-3">@lang('courses.enroll_course')</a>
			@endguest
            <h5>@lang('courses.is_this_course_for_me')</h5>
            <p>
                {{ $course->suitable_for }}
            </p>
          </div>
          <div class="col-md-7">
            <div class="lesson-list">
              @foreach ($course->lessons as $lesson)
              <div class="item">
                <div class="row">
                  <div class="col-sm-2">
                    <div class="lesson-img">
                      <img src="{{ $lesson->image }}" />
                    </div>
                  </div>
                  <div class="col-9">
                    <a href="{{ url('lesson') . '/' . $lesson->id }}">{{ $lesson->name }}</a>
                  </div>
                  <div class="col-1">
                    <a href="{{ url('lesson') . '/' . $lesson->id }}"><i class="icon_right fas fa-angle-right float-right"></i></a>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
