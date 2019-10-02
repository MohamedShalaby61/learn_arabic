@extends('layouts.app')

@section('css')
    <link href="vendors/fullcalendar/demo/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="vendors/fullcalendar/demo/fullcalendar.print.min.css" rel="stylesheet" type="text/css"  media='print' />
@endsection

@section('content')
    <!-- Modal -->
    <div id="fullCalModal" class="modal fade modal-lg">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                <div class="title title-center">
                  <h3 id="modalTitle" class="modal-title text-center"></h3>
                </div>
                <div id="modalBody" class="modal-body">
                </div>
            </div>
        </div>
    </div>

    <!-- main body -->
    <div class="main">
        <!-- innerpages-header  -->
        <div class="innerpages-top schedule-top">
            <div class="breadcrumb-container">
                <h4>@lang('students.schedule')</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('') }}">@lang('students.home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('students.schedule')</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Schedule -->
        <div class="container">
            <div class="row my-5">
                <div class="calendar"></div>
            </div>
        </div>
    </div>
@endsection