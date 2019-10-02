@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/calling.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="caling-page pd-100-top">
        <div class="container  page-section ">
            <div class="row">
                <div class="calling-form col-12">

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="title text-center">
                                <h3>@lang('calls.calling_history')</h3>
                                <div class="btn-group btn-group-toggle filter-call" data-toggle="buttons">
                                    <label class="btn btn-sm btn-outline-primary btn-filter active" data-target="all">
                                        <input type="radio" name="options" id="option1" autocomplete="off" checked> @lang('calls.all')
                                    </label>
                                    <label class="btn btn-sm btn-outline-primary btn-filter" data-target="missed">
                                        <input type="radio" name="options" id="option2" autocomplete="off"> @lang('calls.missed')
                                    </label>

                                </div>
                            </div>

                            <div class="table-container mb-3 mr-5 ml-5">
                                <table class="table table-filter">
                                    <tbody>
                                        @foreach ($calls as $call)
                                        <tr data-status="{{ $call->join_url ? '' : 'missed' }}">
                                            <td>
                                                <div class="media">
                                                    <a class="float-left">
                                                        @if (Auth::user()->type == 3)
                                                            <img src="{{ $call->tutor->image }}" class="media-photo">
                                                        @else
                                                            <img src="{{ $call->student->image }}" class="media-photo">
                                                        @endif
                                                        
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="title">
                                                            @if (Auth::user()->type == 3)
                                                                {{ $call->tutor->name }}
                                                            @else
                                                                {{ $call->student->name }}
                                                            @endif
                                                        </h4>
                                                        <p class="summary">@lang('calls.outgoing')</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="media-body">
                                                    <h4 class="title">
                                                        <span class="float-right date">{{ Carbon\Carbon::parse($call->created_at)->format('M d,Y') }}</span>
                                                    </h4>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.btn-filter').on('click', function() {
            var $target = $(this).data('target');
            if ($target != 'all') {
                $('.table tr').css('display', 'none');
                $('.table tr[data-status="' + $target + '"]').fadeIn('slow');
            } else {
                $('.table tr').css('display', 'none').fadeIn('slow');
            }
        });
    </script>
@endsection