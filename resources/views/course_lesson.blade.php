@extends('layouts.app')

@section('content')
  <!-- main body -->
  <div class="main">
    <!-- innerpages-header  -->
    <div class="innerpages-top enrolled-top">
      <div class="breadcrumb-container">
        <h4>{{ $lesson->name }}</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">@lang('courses.home')</a></li>
            <li class="breadcrumb-item"><a href="{{ url('course') . '/' . $lesson->course_id }}">{{ $lesson->course->title }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('courses.lesson')</li>
          </ol>
        </nav>
      </div>
    </div>
    
    <div class="container enrolled">
      <div class="row my-5">
        <div class="col-md-12">
          <div class="panel px-5">
            <p>{!! $lesson->content !!}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
