@extends('common::layouts.master')

@section('content')

    <section class="content-header">
        <h1>
            @lang('common::common.home')
            <small>@lang('common::common.control')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin_home') }}"><i class="fa fa-dashboard"></i> @lang('common::common.home')</a></li>
            <li>@lang('lesson::lesson.lessons')</li>
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
                        <h3 class="box-title">@lang('lesson::lesson.edit_lesson')</h3>
                    </div>
                    <!-- /.box-header -->
                    <form role="form" method="post" action="{{ route('lessons.update',$row->id) }}">
                        @csrf
                        @method('put')
                        <div class="box-body">
                            @include('common::layouts._error')
                            @include('common::layouts._session')
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('lesson::lesson.name') *</label>
                                <input type="text" class="form-control" value="{{ $row->name }}" name="name" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('lesson::lesson.content')</label>
                                <textarea class="form-control" name="content">{{ $row->content }}</textarea>
                            </div>

                            {{--<div class="form-group">--}}
                                {{--<label for="exampleInputEmail1">@lang('lesson::lesson.categories')</label>--}}
                                {{--<input class="form-control" value="{{ $row->categories[0] }}" name="categories">--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('lesson::lesson.image')</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> @lang('common::common.edit')</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
        </div>

        @endsection

        @push('js')
            <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
            <script>
                CKEDITOR.replace( 'content' );
            </script>
    @endpush