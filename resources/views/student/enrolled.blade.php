@extends('layouts.app')

@section('content')
  <!-- main body -->
  <div class="main">
    <!-- innerpages-header  -->
    <div class="innerpages-top enrolled-top">
      <div class="breadcrumb-container">
        <h4>@lang('student-enrolled.enrolled_classrooms')</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">@lang('student-enrolled.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('student-enrolled.enrolled_classrooms')</li>
          </ol>
        </nav>
      </div>
    </div>

    <!-- Enrolled -->
    <div class="container enrolled">
      <div class="row my-5">
        <div class="col-md-7">
          <div class="panel">
            <h4>@lang('student-enrolled.inprogress_courses')</h4>
            <ul class="list-group">
              @foreach ($enrolled_courses as $enrolledCourse)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <a href="{{ url('/course/' . $enrolledCourse->course_id) }}">{{ $enrolledCourse->course->title }}</a>
                  <i class="fas fa-angle-right"></i>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="col-md-5">
          <div class="panel">
            <h4>@lang('student-enrolled.courses_status_tracker')</h4>
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                @lang('student-enrolled.enrolled_courses')
                <span class="badge badge-primary badge-pill">{{ $courses_enrolled_count }}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                @lang('student-enrolled.completed_courses')
                <span class="badge badge-primary badge-pill">{{ $courses_completed_count }}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                @lang('student-enrolled.course_in_progress')
                <span class="badge badge-primary badge-pill">{{ $courses_inprogress_count }}</span>
              </li>
              {{-- <li class="list-group-item d-flex justify-content-between align-items-center">
                Upcoming Courses
                <span class="badge badge-primary badge-pill">16</span>
              </li> --}}
            </ul>
          </div>
        </div>
      </div>

      {{--<div class="row my-5">
        <div class="col-md-12">
          <div class="panel">
            <h4>Upcoming Courses</h4>
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="course-name">
                  <a href="course-details.html">Classroom</a>
                </div>
                <div class="course-progress">
                      <strong>Starts in</strong>
                      <span>0<strong>d</strong> 3<strong>h</strong> 10 <strong>m</strong></span>
                </div>
                <i class="fas fa-angle-right"></i>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="course-name">
                  <a href="course-details.html">Classroom</a>
                </div>
                <div class="course-progress">
                      <strong>Starts in</strong>
                      <span>0<strong>d</strong> 3<strong>h</strong> 10 <strong>m</strong></span>
                </div>
                <i class="fas fa-angle-right"></i>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="course-name">
                  <a href="course-details.html">Classroom</a>
                </div>
                <div class="course-progress">
                      <strong>Starts in</strong>
                      <span>0<strong>d</strong> 3<strong>h</strong> 10 <strong>m</strong></span>
                </div>
                <i class="fas fa-angle-right"></i>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="course-name">
                  <a href="course-details.html">Classroom</a>
                </div>
                <div class="course-progress">
                      <strong>Starts in</strong>
                      <span>0<strong>d</strong> 3<strong>h</strong> 10 <strong>m</strong></span>
                </div>
                <i class="fas fa-angle-right"></i>
              </li>
            </ul>
          </div>
        </div>
      </div> --}}
    </div>
  </div>
@endsection
