@extends('layouts.app')

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
  <div class="modal fade" id="upload_img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">@lang('tutor-profile.change_your_photo')</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="{{ route('tutor.profile') }}" class="mt-3" id="profile_0" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="put" />
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <input type="file" name="image" class="form-control-file required" required="" />
            </div>
        </div>
        <div class="modal-footer" style="margin: 0px !important; padding: 5px !important">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('tutor-profile.close')</button>
          <button type="submit" class="btn btn-primary">@lang('tutor-profile.save_changes')</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- main body -->
  <div class="main">
    <!-- innerpages-header  -->
    <div class="innerpages-top profile-top">
      <div class="profile-img">
        <div class="profile-edit">
          <img src="{{ Auth::user()->profile->image }}" style="transform: scale(2);" />
        </div>
        <span class="edit-icon" data-toggle="modal" data-target="#upload_img"><i class="fas fa-edit"></i></span>
      </div>
      <div class="profile-name">
        <h4>{{ Auth::user()->name }}</h4>
        <a href="#">{{ Auth::user()->email }}</a>
      </div>
    </div>

    @if (!Auth::user()->profile->teaching_experience || !Auth::user()->profile->education)
    <div class="container">
        <div class="alert alert-info">@lang('tutor-profile.must_complete_profile')</div>
    </div>
    @endif

    <div class="container profile">
      <nav>
        <div class="nav nav-tabs" role="tablist">
          <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-account" role="tab" aria-controls="nav-plan" aria-selected="false">@lang('tutor-profile.account')</a>
          <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">@lang('tutor-profile.about_and_qualification')</a>
          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#interests" role="tab" aria-controls="nav-activities" aria-selected="false">@lang('tutor-profile.background_and_interests')</a>
        </div>
      </nav>
      <div class="tab-content mb-5">
        <div class="tab-pane fade show active" id="nav-account" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="container">
              <form method="post" action="{{ route('tutor.profile') }}" class="mb-5 mt-3" id="profile_1" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="put" />
              @csrf
              <div class="row">
                 <div class="col-md-6">
                  <div class="form-group">
                    <label><strong>@lang('tutor-profile.name')</strong></label>
                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required="" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label><strong>@lang('tutor-profile.password')</strong></label>
                    <input type="password" class="form-control" name="password" value="password" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label><strong>@lang('tutor-profile.email')</strong></label>
                    <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}" required="" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label><strong>@lang('tutor-profile.phone')</strong></label>
                    <input type="text" class="form-control" name="mobile" value="{{ Auth::user()->profile->mobile }}" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label><strong>@lang('tutor-profile.title')</strong></label>
                    <input type="text" class="form-control" name="title" value="{{ Auth::user()->profile->title }}" required="" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label><strong>@lang('tutor-profile.video')</strong></label>
                    <input type="file" class="form-control"  style="border: none;" name="video" value="{{ Auth::user()->video }}" required="" @error('video') is-invalid @enderror" />
                      @if(isset(auth()->user()->profile->video))
                          <video width="300" height="300" controls src="{{url('uploads/'.auth()->user()->profile->video)}}"></video>
                          @endif
                  </div>
                </div>
              </div>
              <div class="ml-auto mt-5">
                <button type="submit" class="btn btn-primary display-block">@lang('tutor-profile.save')</button>
              </div>
              </form>
            </div>
        </div>
        <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="nav-home-tab">
          <form method="post" action="{{ route('tutor.profile') }}" class="mb-5 mt-3" id="profile_2">
          <input type="hidden" name="_method" value="put" />
          @csrf
          <div class="form-group">
            <div class="container">
                <h4> @lang('tutor-profile.about') </h4>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><strong>@lang('tutor-profile.specialized_in')</strong></label>
                            <select class="form-control" name="specialities[]" id="specialities" multiple="multiple" required="">
                                @foreach ($specialities as $speciality)
                                    <option value="{{ $speciality->id }}" @if(in_array($speciality->id, $tutorSpecialities))selected=""@endif>{{ $speciality->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><strong>@lang('tutor-profile.tutoring_style')</strong></label>
                            <select class="form-control" name="tutoring_personality_id" required="">
                                <option value=""></option>
                                @foreach ($tutoringPersonalities as $personality)
                                    <option value="{{ $personality->id }}" @if($personality->id == Auth::user()->profile->tutoring_personality_id)selected=""@endif>{{ $personality->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label><strong>@lang('tutor-profile.best_with_levels')</strong></label>
                            <select class="form-control" name="levels[]" id="levels" multiple="multiple" required="">
                                <option value="Elementary" @if(in_array('Elementary', Auth::user()->profile->levels))selected=""@endif>@lang('tutor-profile.elementary')</option>
                                <option value="Conversational" @if(in_array('Conversational', Auth::user()->profile->levels))selected=""@endif>@lang('tutor-profile.conversational')</option>
                                <option value="Intermediate" @if(in_array('Intermediate', Auth::user()->profile->levels))selected=""@endif>@lang('tutor-profile.intermediate')</option>
                                <option value="Advanced" @if(in_array('Advanced', Auth::user()->profile->levels))selected=""@endif>@lang('tutor-profile.advanced')</option>
                            </select>
                        </div>
                    </div>
                </div>
                <h4> @lang('tutor-profile.qualifications') </h4>
                <div class="row">
                    <div class="col-md-6">
                        <label><strong>@lang('tutor-profile.certificates')</strong></label>
                        <select class="form-control" name="certificates[]" id="certificates" multiple="multiple" required="">
                            @foreach (Auth::user()->profile->certificates as $certificate)
                                <option value="{{ $certificate }}" selected="">{{ $certificate }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label><strong>@lang('tutor-profile.teaching_experience')</strong></label>
                        <textarea type="text" class="form-control required" name="teaching_experience" rows="3" required="">{{ Auth::user()->profile->teaching_experience }}</textarea>
                    </div>
                </div>
            </div>
          </div>
          <div class="ml-auto">
              <button type="submit" class="btn btn-primary display-block">@lang('tutor-profile.save')</button>
          </div>
          </form>
        </div>
        <div class="tab-pane fade" id="interests" role="tabpanel" aria-labelledby="nav-contact-tab">
          <form method="post" action="{{ route('tutor.profile') }}" class="mb-5 mt-3" id="profile_3">
          <input type="hidden" name="_method" value="put" />
          @csrf
          <div class="container">
            <h4> @lang('tutor-profile.background') </h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label><strong>@lang('tutor-profile.speaks')</strong></label>
                        <select class="form-control" name="speaks[]" id="speaks" multiple="multiple" required="">
                            @foreach (Auth::user()->profile->speaks as $speaks)
                                <option value="{{ $speaks }}" selected="">{{ $speaks }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label><strong>@lang('tutor-profile.profession')</strong></label>
                        <textarea type="text" class="form-control" name="profession" rows="3" required="">{{ Auth::user()->profile->profession }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label><strong>@lang('tutor-profile.education')</strong></label>
                        <textarea type="text" class="form-control" name="education" rows="3" required="">{{ Auth::user()->profile->education }}</textarea>
                    </div>
                </div>
            </div>
            <br>
            <h4> @lang('tutor-profile.interests') </h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label><strong>@lang('tutor-profile.enjoys_discussing')</strong></label>
                        <select class="form-control" name="enjoys_discussing[]" id="enjoys_discussing" multiple="multiple" required="">
                            @foreach (Auth::user()->profile->enjoys_discussing as $enjoy)
                                <option value="{{ $enjoy }}" selected="">{{ $enjoy }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label><strong>@lang('tutor-profile.interests')</strong></label>
                        <textarea type="text" class="form-control" name="interests" rows="3" required="">{{ Auth::user()->profile->interests }}</textarea>
                    </div>
                </div>
            </div>
          </div>
          <div class="ml-auto mt-5">
              <button type="submit" class="btn btn-primary display-block">@lang('tutor-profile.save')</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#specialities').select2();
            $('#levels').select2();
            $('#certificates').select2({tags: true});
            $('#speaks').select2({tags: true});
            $('#enjoys_discussing').select2({tags: true});
        });

        $("#profile_0").validate({
            errorElement: "span",
            errorClass: "error"
        });
        $("#profile_1").validate({
            errorElement: "span",
            errorClass: "error"
        });
        $("#profile_2").validate({
            errorElement: "span",
            errorClass: "error"
        });
        $("#profile_3").validate({
            errorElement: "span",
            errorClass: "error"
        });
    </script>
@endsection