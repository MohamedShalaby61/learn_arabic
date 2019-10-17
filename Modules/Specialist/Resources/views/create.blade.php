@extends('common::layouts.master')

@section('content')
    <section class="content-header">
        <h1>
            @lang('common::common.home')
            <small>@lang('common::common.control')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin_home') }}"><i class="fa fa-dashboard"></i> @lang('common::common.home')</a></li>
            <li><a href="{{ route('specialists.index') }}">@lang('type::type.specialists')</a></li>
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
                        <h3 class="box-title">@lang('specialist::specialist.create_specialists')</h3>
                    </div>

                    <form role="form" method="post" action="{{ route('specialists.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            @include('common::layouts._error')
                            @include('common::layouts._session')
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('type::type.name')</label>
                                    <input name="name" placeholder="@lang('specialist::specialist.notes')" class="form-control">
                                </div>
                            </div>

                        </div>


                        <div class="box-footer">
                            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> @lang('common::common.add')</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>

@endsection
