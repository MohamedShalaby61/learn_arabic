@extends('common::layouts.master')

@section('content')
    <section class="content-header">
        <h1>
            @lang('common::common.home')
            <small>@lang('common::common.control')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin_home') }}"><i class="fa fa-dashboard"></i> @lang('common::common.home')</a></li>
            <li><a href="{{ route('students.index') }}">@lang('student::student.students')</a></li>
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
                        <h3 class="box-title">@lang('student::student.edit_students')</h3>
                    </div>

                    <form role="form" method="post" action="{{ route('students.update',$row->id) }}" enctype="multipart/form-data">
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
                                        <li class=""><a href="#tab_2-2" data-toggle="tab" aria-expanded="false">@lang('student::student.student_info')</a></li>
                                        <li class=""><a href="#tab_3-2" data-toggle="tab" aria-expanded="false">@lang('common::common.more_info')</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">@lang('student::student.name') *</label>
                                                <input type="text" class="form-control" value="{{ $row->name }}" name="name" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">@lang('admin::admin.phone')</label>
                                                <input type="text" class="form-control" value="{{ $row->mobile }}" name="mobile" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">@lang('admin::admin.email') *</label>
                                                <input type="email" class="form-control" value="{{ $row->email }}" name="email" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">@lang('admin::admin.password') *</label>
                                                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                            </div>
                                        </div><!-- /.tab-pane -->
                                        <div class="tab-pane" id="tab_2-2">
                                            <div class="form-group">
                                                <label>@lang('student::student.corrections')</label>
                                                <select name="corrections" class="form-control">
                                                    <option {{ $student->corrections == 'After every mistake' ? 'selected' : '' }} value="After every mistake">@lang('student-profile.after_every_mistake')</option>
                                                    <option {{ $student->corrections == 'Only after serious mistakes' ? 'selected' : '' }} value="Only after serious mistakes">@lang('student-profile.only_after_serious_mistakes')</option>
                                                    <option {{ $student->corrections == 'At the end of the session' ? 'selected' : '' }} value="At the end of the session">@lang('student-profile.at_the_end_of_the_session')</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>@lang('student::student.goals')</label>
                                                <select name="goals" class="form-control">
                                                    <option {{ $student->goals == 'Current Focus' ? 'selected' : '' }} value="Current Focus">@lang('student-profile.current_focus')</option>
                                                    <option {{ $student->goals == 'Professional Development' ? 'selected' : '' }} value="Professional Development">@lang('student-profile.professional_development')</option>
                                                    <option {{ $student->goals == 'Exam Preparation' ? 'selected' : '' }} value="Exam Preparation">@lang('student-profile.exam_preparation')</option>
                                                    <option {{ $student->goals == 'Foreign Travel' ? 'selected' : '' }} value="Foreign Travel">@lang('student-profile.foreign_travel')</option>
                                                    <option {{ $student->goals == 'Self Improvement' ? 'selected' : '' }} value="Self Improvement">@lang('student-profile.self_improvement')</option>
                                                    <option {{ $student->goals == 'Other' ? 'selected' : '' }} value="Other">@lang('student-profile.other')</option>
                                                </select>
                                            </div>
                                            <div class="form-group ">
                                                <label>@lang('common::common.image')</label>
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                        </div><!-- /.tab-pane -->
                                        <div class="tab-pane" id="tab_3-2">
                                            <div class="form-group">
                                                <label>@lang('student::student.levels')</label>
                                                <select name="level" class="form-control">
                                                    <option {{ $student->level== 'Elementary' ? 'selected' : '' }} value="Elementary">@lang('student-profile.elementary')</option>
                                                    <option {{ $student->level== 'Conversational' ? 'selected' : '' }} value="Conversational">@lang('student-profile.conversational')</option>
                                                    <option {{ $student->level== 'Intermediate' ? 'selected' : '' }} value="Intermediate">@lang('student-profile.intermediate')</option>
                                                    <option {{ $student->level== 'Advanced' ? 'selected' : '' }} value="Advanced">@lang('student-profile.advanced')</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>@lang('student::student.country')</label>
                                                <select name="country_id" class="form-control">
                                                    @foreach($countries as $country)
                                                        <option {{ $student->country_id == $country->id ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            {{--<div class="form-group">--}}
                                                {{--<h5><strong>@lang('student-profile.interests')</strong></h5>--}}
                                                {{--<div class="form-check">--}}
                                                    {{--<input class="form-check-input" type="checkbox" name="interests[]" id="14" value="Business" @if(in_array('Business', Auth::user()->profile->interests))checked=""@endif />--}}
                                                    {{--<label class="form-check-label" for="14">--}}
                                                        {{--@lang('student-profile.business')--}}
                                                    {{--</label>--}}
                                                {{--</div>--}}
                                                {{--<div class="form-check">--}}
                                                    {{--<input class="form-check-input" type="checkbox" name="interests[]" id="15" value="Sports" @if(in_array('Sports', Auth::user()->profile->interests))checked=""@endif />--}}
                                                    {{--<label class="form-check-label" for="15">--}}
                                                        {{--@lang('student-profile.sports')--}}
                                                    {{--</label>--}}
                                                {{--</div>--}}
                                                {{--<div class="form-check">--}}
                                                    {{--<input class="form-check-input" type="checkbox" name="interests[]" id="16" value="World News" @if(in_array('World News', Auth::user()->profile->interests))checked=""@endif  />--}}
                                                    {{--<label class="form-check-label" for="16">--}}
                                                        {{--@lang('student-profile.world_news')--}}
                                                    {{--</label>--}}
                                                {{--</div>--}}
                                                {{--<div class="form-check">--}}
                                                    {{--<input class="form-check-input" type="checkbox" name="interests[]" id="17" value="Literature" @if(in_array('Literature', Auth::user()->profile->interests))checked=""@endif />--}}
                                                    {{--<label class="form-check-label" for="17">--}}
                                                        {{--@lang('student-profile.literature')--}}
                                                    {{--</label>--}}
                                                {{--</div>--}}
                                                {{--<div class="form-check">--}}
                                                    {{--<input class="form-check-input" type="checkbox" name="interests[]" id="18" value="Entertainment & Lifestyle" @if(in_array('Entertainment & Lifestyle', Auth::user()->profile->interests))checked=""@endif />--}}
                                                    {{--<label class="form-check-label" for="18">--}}
                                                        {{--@lang('student-profile.entertainment_and_lifestyle')--}}
                                                    {{--</label>--}}
                                                {{--</div>--}}
                                                {{--<div class="form-check">--}}
                                                    {{--<input class="form-check-input" type="checkbox" name="interests[]" id="19" value="Science and Technology" @if(in_array('Science and Technology', Auth::user()->profile->interests))checked=""@endif />--}}
                                                    {{--<label class="form-check-label" for="19">--}}
                                                        {{--@lang('student-profile.science_and_technology')--}}
                                                    {{--</label>--}}
                                                {{--</div>--}}
                                                {{--<div class="form-check">--}}
                                                    {{--<input class="form-check-input" type="checkbox" name="interests[]" id="20" value="Language & Culture" @if(in_array('Language & Culture', Auth::user()->profile->interests))checked=""@endif />--}}
                                                    {{--<label class="form-check-label" for="20">--}}
                                                        {{--@lang('student-profile.language_and_culture')--}}
                                                    {{--</label>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        </div><!-- /.tab-pane -->
                                    </div><!-- /.tab-content -->
                                </div><!-- nav-tabs-custom -->
                            </div>

                        </div>


                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('common::common.edit')</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>

@endsection
