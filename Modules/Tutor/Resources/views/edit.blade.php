@extends('common::layouts.master')

@section('content')

    <section class="content-header">
        <h1>
            @lang('common::common.home')
            <small>@lang('common::common.control')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin_home') }}"><i class="fa fa-dashboard"></i> @lang('common::common.home')</a></li>
            <li><a href="{{ route('tutors.index') }}">@lang('tutor::tutor.tutors')</a></li>
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
                        <h3 class="box-title">@lang('tutor::tutor.create_tutors')</h3>
                    </div>

                    <form role="form" method="post" action="{{ route('tutors.update',$row->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="box-body">
                            @include('common::layouts._error')
                            @include('common::layouts._session')
                            <div class="col-md-12">
                                <!-- Custom Tabs (Pulled to the right) -->
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs pull-right">
                                        <li class="active"><a href="#tab_1-1" data-toggle="tab" aria-expanded="true">@lang('common::common.main_info')</a></li>
                                        <li class=""><a href="#tab_2-2" data-toggle="tab" aria-expanded="false">@lang('tutor::tutor.tutor_info')</a></li>
                                        <li class=""><a href="#tab_3-2" data-toggle="tab" aria-expanded="false">@lang('common::common.more_info')</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">@lang('tutor::tutor.name') *</label>
                                                <input type="text" class="form-control" value="{{ $tutor->name }}" name="name" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">@lang('tutor::tutor.title') *</label>
                                                <input type="text" class="form-control" value="{{ $tutor->title }}" name="title" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">@lang('admin::admin.phone')</label>
                                                <input type="text" class="form-control" value="{{ $tutor->mobile }}" name="mobile" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">@lang('admin::admin.email') *</label>
                                                <input type="email" class="form-control" value="{{ $row->email }}" name="email" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">@lang('admin::admin.password') *</label>
                                                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                            </div>
                                            <div class="form-group ">
                                                <label>@lang('tutor::tutor.teaching_experience')</label>
                                                <textarea type="text" name="teaching_experience" class="form-control">{{ $tutor->teaching_experience }}</textarea>
                                            </div>
                                        </div><!-- /.tab-pane -->
                                        <div class="tab-pane" id="tab_2-2">
                                            <div class="form-group ">
                                                <div class="form-group ">
                                                    <label>@lang('common::common.video')</label>
                                                    <input type="text" value="{{ $tutor->video }}" name="video" class="form-control">
                                                </div>
                                                <div class="form-group ">
                                                    <label>@lang('common::common.certificates')</label>
                                                    <input type="text" value="{{ $tutor->certificates[0] }}" name="certificates" class="form-control">
                                                </div>
                                                <div class="form-group ">
                                                    <label>@lang('tutor::tutor.speaks')</label>
                                                    <input type="text" value="{{ $tutor->speaks[0] }}" name="speaks" class="form-control">
                                                </div>
                                                <div class="form-group ">
                                                    <label>@lang('tutor::tutor.interests')</label>
                                                    <input type="text" value="{{ $tutor->interests }}" name="interests" class="form-control">
                                                </div>
                                                <label>@lang('common::common.image')</label>
                                                <input type="file" name="image" class="form-control">
                                                <div class="form-group ">
                                                    <label>@lang('tutor::tutor.profession')</label>
                                                    <textarea type="text" name="profession" class="form-control">{{ $tutor->profession }}</textarea>
                                                </div>
                                            </div>
                                        </div><!-- /.tab-pane -->
                                        <div class="tab-pane" id="tab_3-2">
                                            <div class="form-group col-lg-6">
                                                <label>@lang('tutor::tutor.levels')</label>
                                                <input type="text" value="{{ $tutor->levels[0] }}" name="levels" class="form-control">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>@lang('tutor::tutor.country')</label>
                                                <select name="country_id" class="form-control">
                                                    @foreach($countries as $country)
                                                        <option {{ $country->id == $tutor->country_id ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>@lang('tutor::tutor.lessons_type')</label>
                                                <select name="lessons_type_id" class="form-control">
                                                    @foreach($lessons_type as $lesson)
                                                        <option {{ $lesson->id == $tutor->lessons_type_id ? 'selected' : '' }} value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>@lang('tutor::tutor.tutoring_personality')</label>
                                                <select name="tutoring_personality_id" class="form-control">
                                                    @foreach($lessons_personalities as $pers)
                                                        <option {{ $pers->id == $tutor->tutoring_personality_id ? 'selected' : '' }} value="{{ $pers->id }}">{{ $pers->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>@lang('tutor::tutor.accent')</label>
                                                <select name="accent_id" class="form-control">
                                                    @foreach($accents as $accent)
                                                        <option {{ $accent->id == $tutor->accent_id ? 'selected' : '' }} value="{{ $accent->id }}">{{ $accent->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>@lang('tutor::tutor.status')</label>
                                                <select name="status" class="form-control">
                                                    <option {{ $tutor->status == 1 ? 'selected' : '' }} value="1">@lang('tutor::tutor.active')</option>
                                                    <option {{ $tutor->status == 0 ? 'selected' : '' }} value="0">@lang('tutor::tutor.pending')</option>
                                                </select>
                                            </div>
                                            <div class="form-group ">
                                                <label>@lang('tutor::tutor.education')</label>
                                                <input type="text" value="{{ $tutor->education }}" name="education" class="form-control">
                                            </div>
                                            <div class="form-group ">
                                                <label>@lang('tutor::tutor.enjoys_discussing')</label>
                                                <textarea type="text" name="enjoys_discussing" class="form-control">{{ $tutor->enjoys_discussing[0] }}</textarea>
                                            </div>
                                        </div><!-- /.tab-pane -->
                                    </div><!-- /.tab-content -->
                                </div><!-- nav-tabs-custom -->
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('common::common.edit')</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
        </div>

@endsection
