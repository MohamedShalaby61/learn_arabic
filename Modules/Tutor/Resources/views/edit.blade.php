@extends('common::layouts.master')

@section('content')

    <section class="content-header">
        <h1>
            @lang('common::common.home')
            <small>@lang('common::common.control')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin_home') }}"><i class="fa fa-dashboard"></i> @lang('common::common.home')</a></li>
            <li><a href="{{ route('admins.index') }}">@lang('admin::admin.admins')</a></li>
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
                        <h3 class="box-title">@lang('admin::admin.create_admin')</h3>
                    </div>
                    <!-- /.box-header -->
                    <form role="form" method="post" action="{{ route('admins.update',$row->id) }}">
                        @csrf
                        @method('put')
                        <div class="box-body">
                            @include('common::layouts._error')
                            @include('common::layouts._session')
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('admin::admin.name') *</label>
                                <input type="text" class="form-control" value="{{ $row->name }}" name="name" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('admin::admin.phone')</label>
                                <input type="text" class="form-control" value="{{ $row->phone }}" name="phone" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">@lang('admin::admin.email') *</label>
                                <input type="email" class="form-control" value="{{ $row->email }}" name="email" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">@lang('admin::admin.password') *</label>
                                <input type="password" placeholder="@lang('common::common.leave_it')" name="password" class="form-control" id="exampleInputPassword1">
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
