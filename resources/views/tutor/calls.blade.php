@extends('layouts.app')

@section('content')
  <!-- main body -->
  <div class="main">
    <!-- innerpages-header  -->
    <div class="innerpages-top enrolled-top">
      <div class="breadcrumb-container">
        <h4>@lang('calls.received_calls')</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">@lang('calls.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('calls.received_calls')</li>
          </ol>
        </nav>
      </div>
    </div>
    
    <div class="container enrolled">
      <div class="row my-5">
        <div class="col-md-12">
          <div class="panel px-5">
            <ul class="list-group">
              @foreach ($calls as $call)
              <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $call->student->name }}
                @if ($call->join_url)
                  <a href="{{ $call->join_url }}" target="_blank" class="btn btn-sm color-white btn-primary">@lang('calls.join')</a>
                @endif
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
