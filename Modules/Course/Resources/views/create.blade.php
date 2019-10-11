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
            <li class="active">@lang('common::common.add')</li>
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

                    <form role="form" method="post" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-footer">
                            <button type="submit" name="add_and_go_to_lesson" class="btn btn-success"><i class="fa fa-plus"></i> @lang('course::course.add_and_go_to_lesson')</button>
                            <button type="submit" name="add_and_close" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('course::course.add_and_close')</button>
                            <button type="submit" name="close" class="btn btn-default"><i class="fa fa-close"></i> @lang('course::course.close')</button>
                        </div>
                        <div class="box-body">
                            @include('common::layouts._error')
                            @include('common::layouts._session')
                            <div class="col-md-12">
                                <!-- Custom Tabs (Pulled to the right) -->
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs pull-right">
                                        <li class="active"><a href="#tab_1-1" data-toggle="tab" aria-expanded="true">@lang('common::common.arabic')</a></li>
                                        <li class=""><a href="#tab_2-2" data-toggle="tab" aria-expanded="false">@lang('common::common.english')</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">@lang('course::course.title_ar') *</label>
                                                <input type="text" class="form-control" value="{{ old('title_ar') }}" name="title_ar" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">@lang('course::course.description_ar') *</label>
                                                <textarea class="form-control" name="description_ar">{{ old('description_ar') }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">@lang('course::course.suitable_for_ar') *</label>
                                                <textarea class="form-control" name="suitable_for_ar">{{ old('suitable_for_ar') }}</textarea>
                                            </div>
                                        </div><!-- /.tab-pane -->
                                        <div class="tab-pane" id="tab_2-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">@lang('course::course.title') *</label>
                                                <input type="text" class="form-control" value="{{ old('title') }}" name="title" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">@lang('course::course.descriptions') *</label>
                                                <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">@lang('course::course.suitable_for') *</label>
                                                <textarea class="form-control" name="suitable_for">{{ old('suitable_for') }}</textarea>
                                            </div>
                                        </div><!-- /.tab-pane -->
                                    </div><!-- /.tab-content -->
                                </div><!-- nav-tabs-custom -->
                                <div class="form-group">
                                    <label>@lang('course::course.cost')</label>
                                    <input class="form-control" value="{{ old('cost') }}" type="number" name="cost">
                                </div>
                                <div class="form-group">
                                    <label>@lang('course::course.image')</label>
                                    <input class="form-control" type="file" name="image">
                                </div>
                            </div>

                        </div>


                        <div class="box-footer">
                            <button type="submit" name="add_and_go_to_lesson" class="btn btn-success"><i class="fa fa-plus"></i> @lang('course::course.add_and_go_to_lesson')</button>
                            <button type="submit" name="add_and_close" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('course::course.add_and_close')</button>
                            <button type="submit" name="close" class="btn btn-default"><i class="fa fa-close"></i> @lang('course::course.close')</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>

@endsection
