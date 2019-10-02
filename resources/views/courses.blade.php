@extends('layouts.app')

@section('content')
  @guest
  <!-- modal free trail -->
  <div id="free_trail" class="modal fade modal-lg">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-body pt-5">
          <h2>@lang('courses.free_trail')</h2>
          <p>
            @lang('courses.free_trail_session_free')
          </p>
          <div class="row">
            <div class="col-md-6">
              <input type="email" class="form-control mb-3" placeholder="@lang('courses.email')" />
              <input type="phone" class="form-control mb-3" placeholder="@lang('courses.phone')" />
              <a href="#" class="btn btn-primary btn-block">@lang('courses.start_free_trail')</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endguest

  <!-- main body -->
  <div class="main">
    <!-- innerpages-header  -->
    <div class="innerpages-top all-courses">
      @guest
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h3 class="pt-5 pb-2">@lang('courses.welcome_to_site')</h3>
            <p>
              @lang('courses.welcome_to_site_desc')
            </p>
            <hr class="pt-4" />
            <p class="pb-4">
              <strong>@lang('courses.free_trail_desc')</strong>
            </p>
            <a href="{{ url('register') }}" class="btn btn-primary" {{-- data-toggle="modal" data-target="#free_trail" --}}>@lang('courses.start_free_trail')</a>
          </div>
        </div>
      </div>
      @endguest
    </div>

    <div class="container">
      <div class="row filter-courses mb-5">
        <div class="search-row col-md-10">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input type="text" class="fltr-controls filtr-search form-control" name="filtr-search" data-search placeholder="@lang('courses.search_for_course')" />
          </div>
        </div>

        <div class="view-layout col-md-2">
          <span class="grid-layout"><i class="fas fa-th-large"></i></span>
          <span class="list-layout"><i class="fas fa-th-list"></i></span>
        </div>
      </div>
    </div>

    <!-- To choose the value by which you want to sort add -->

    <div class="container featured-courses py-5">
      <div class="row filtr-container" style="direction: ltr">
        @foreach($courses as $course)
        <div class="col-md-4 filtr-item" data-category="1" data-sort="value">
          <figure class="item">
            <div class="img-course">
              <img src="{{ $course->image }}" />
            </div>
            <figcaption>
              <h5 class="price-header total-price" style="display: flex; justify-content: space-between; padding-bottom: 10px;"><span>{{ $course->title }}</span>
                <span class="price" style="color: #0069d9;">${{ $course->cost }}</span>
              </h5>
              <p>
                {{ $course->description }}
              </p>
              <a href="{{ url('/course/' . $course->id) }}"><i class="fas fa-plus"></i></a>
            </figcaption>
          </figure>
        </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
