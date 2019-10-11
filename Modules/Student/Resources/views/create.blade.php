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
                        <h3 class="box-title">@lang('student::student.create_students')</h3>
                    </div>

                    <form role="form" method="post" action="{{ route('students.store') }}" enctype="multipart/form-data">
                        @csrf
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
                                                <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">@lang('admin::admin.phone')</label>
                                                <input type="text" class="form-control" value="{{ old('mobile') }}" name="mobile" id="exampleInputEmail1">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="exampleInputEmail1">@lang('admin::admin.email') *</label>
                                                <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="exampleInputEmail1">
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
                                                    <option value="After every mistake">@lang('student-profile.after_every_mistake')</option>
                                                    <option value="Only after serious mistakes">@lang('student-profile.only_after_serious_mistakes')</option>
                                                    <option value="At the end of the session">@lang('student-profile.at_the_end_of_the_session')</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>@lang('student::student.goals')</label>
                                                <select name="goals" class="form-control">
                                                    <option value="Current Focus">@lang('student-profile.current_focus')</option>
                                                    <option value="Professional Development">@lang('student-profile.professional_development')</option>
                                                    <option value="Exam Preparation">@lang('student-profile.exam_preparation')</option>
                                                    <option value="Foreign Travel">@lang('student-profile.foreign_travel')</option>
                                                    <option value="Self Improvement">@lang('student-profile.self_improvement')</option>
                                                    <option value="Other">@lang('student-profile.other')</option>
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
                                                    <option value="Elementary">@lang('student-profile.elementary')</option>
                                                    <option value="Conversational">@lang('student-profile.conversational')</option>
                                                    <option value="Intermediate">@lang('student-profile.intermediate')</option>
                                                    <option value="Advanced">@lang('student-profile.advanced')</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>@lang('student::student.country')</label>
                                                <select name="country_id" class="form-control">
                                                    @foreach($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <h5><strong>@lang('student-profile.interests')</strong></h5>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="interests[]" id="14" value="Business" />
                                                    <label class="form-check-label" for="14">
                                                        @lang('student-profile.business')
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="interests[]" id="15" value="Sports" />
                                                    <label class="form-check-label" for="15">
                                                        @lang('student-profile.sports')
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="interests[]" id="16" value="World News" />
                                                    <label class="form-check-label" for="16">
                                                        @lang('student-profile.world_news')
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="interests[]" id="17" value="Literature" />
                                                    <label class="form-check-label" for="17">
                                                        @lang('student-profile.literature')
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="interests[]" id="18" value="Entertainment & Lifestyle" />
                                                    <label class="form-check-label" for="18">
                                                        @lang('student-profile.entertainment_and_lifestyle')
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="interests[]" id="19" value="Science and Technology" />
                                                    <label class="form-check-label" for="19">
                                                        @lang('student-profile.science_and_technology')
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="interests[]" id="20" value="Language & Culture"  />
                                                    <label class="form-check-label" for="20">
                                                        @lang('student-profile.language_and_culture')
                                                    </label>
                                                </div>
                                            </div>
                                        </div><!-- /.tab-pane -->
                                    </div><!-- /.tab-content -->
                                </div><!-- nav-tabs-custom -->
                            </div>

                        </div>


                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('common::common.add')</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>

@endsection
