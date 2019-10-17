@extends('common::layouts.master')

@section('content')
    <section class="content-header">
        <h1>
            @lang('common::common.home')
            <small>@lang('common::common.control')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin_home') }}"><i class="fa fa-dashboard"></i> @lang('common::common.home')</a></li>
            <li><a href="{{ route('types.index') }}">@lang('type::type.types')</a></li>
            <li class="active">@lang('common::common.edit')</li>
        </ol>
    </section>


    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">@lang('type::type.edit_types')</h3>
                    </div>

                    <form role="form" method="post" action="{{ route('types.update',$row->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="box-body">
                            @include('common::layouts._error')
                            @include('common::layouts._session')
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('type::type.name')</label>
                                    <input name="name" value="{{ $row->name }}" placeholder="@lang('type::type.notes')" class="form-control">
                                </div>
                            </div>

                        </div>


                        <div class="box-footer">
                            <button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> @lang('common::common.edit')</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>

@endsection
