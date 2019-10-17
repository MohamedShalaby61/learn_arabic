@extends('common::layouts.master')

@section('content')
    <section class="content-header">
        <h1>
            @lang('common::common.home')
            <small>@lang('common::common.control')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin_home') }}"><i class="fa fa-dashboard"></i> @lang('common::common.home')</a></li>
            <li><a href="{{ route('courses.index') }}">@lang('course::course.courses')</a></li>
            <li class="active">@lang('common::common.edit_config')</li>
        </ol>
    </section>


    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('course::course.create_courses')</h3>
                    </div>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs pull-right">
                            <li class="active"><a href="#tab_1-1" data-toggle="tab" aria-expanded="true">@lang('common::common.about_us')</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1-1">
                                <form role="form" method="post" action="{{ route('configs.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="box-body">
                                        @include('common::layouts._error')
                                        @include('common::layouts._session')
                                        <div class="col-md-12">
                                            <!-- Custom Tabs (Pulled to the right) -->
                                            <div class="nav-tabs-custom">
                                                <ul class="nav nav-tabs pull-right">
                                                    <li class="active"><a href="#lang_1-1" data-toggle="tab" aria-expanded="true">@lang('common::common.arabic')</a></li>
                                                    <li class=""><a href="#lang_2-2" data-toggle="tab" aria-expanded="false">@lang('common::common.english')</a></li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="lang_1-1">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">@lang('config::config.aboutus_ar_one') *</label>
                                                            <textarea class="form-control ckeditor" name="aboutus_ar_one">{{ $row->aboutus_ar_one }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">@lang('config::config.aboutus_ar_two') *</label>
                                                            <textarea class="form-control ckeditor" name="aboutus_ar_two">{{ $row->aboutus_ar_two }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">@lang('config::config.aboutus_ar_three') *</label>
                                                            <textarea class="form-control ckeditor" name="aboutus_ar_three">{{ $row->aboutus_ar_three }}</textarea>
                                                        </div>
                                                    </div><!-- /.tab-pane -->
                                                    <div class="tab-pane" id="lang_2-2">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">@lang('config::config.aboutus_en_one') *</label>
                                                            <textarea class="form-control ckeditor" name="aboutus_en_one">{{ $row->aboutus_en_one }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">@lang('config::config.aboutus_en_two') *</label>
                                                            <textarea class="form-control ckeditor" name="aboutus_en_two">{{ $row->aboutus_en_two }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">@lang('config::config.aboutus_en_three') *</label>
                                                            <textarea class="form-control ckeditor" name="aboutus_en_three">{{ $row->aboutus_en_three }}</textarea>
                                                        </div>

                                                    </div><!-- /.tab-pane -->
                                                </div><!-- /.tab-content -->
                                            </div>
                                            <div class="form-group">
                                                <label>@lang('config::config.video')</label>
                                                <input class="form-control" type="file" name="video">
                                            </div>
                                        </div>

                                    </div>


                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> @lang('common::common.edit_config')</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>

@endsection
@push('js')
            <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    @endpush