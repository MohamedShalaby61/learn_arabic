@extends('layouts.app')

@section('content')
  <div class="modal fade" id="upload_img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">@lang('student-profile.change_your_photo')</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="{{ route('student.profile') }}" class="mt-3 form" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="put" />
        @csrf
        <div class="modal-body">
            <div class="form-group">
              <input type="file" name="image" class="form-control-file" />
            </div>
        </div>
        <div class="modal-footer" style="margin: 0 !important; padding: 5px !important;">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('student-profile.close')</button>
          <button type="submit" class="btn btn-primary">@lang('student-profile.save_changes')</button>
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
          <img src="{{ auth()->user()->profile ? Auth::user()->profile->image : '' }}" style="transform: scale(2);"/>
        </div>
        <span class="edit-icon" data-toggle="modal" data-target="#upload_img"><i class="fas fa-edit"></i></span>
      </div>
      <div class="profile-name">
        <h4>{{ Auth::user()->name }}</h4>
        <a href="#">{{ Auth::user()->email }}</a>
      </div>
    </div>

    <div class="container profile">
      <nav>
        <div class="nav nav-tabs" role="tablist">
          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-info" role="tab" aria-controls="nav-info" aria-selected="true">@lang('student-profile.my_informatiom')</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-account" role="tab" aria-controls="nav-plan" aria-selected="false">@lang('student-profile.account')</a>
          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-setting" role="tab" aria-controls="nav-activities" aria-selected="false">@lang('student-profile.setting')</a>
        </div>
      </nav>
      <div class="tab-content mb-5">
        <div class="tab-pane fade show active" id="nav-info" role="tabpanel" aria-labelledby="nav-home-tab">
          <form method="post" action="{{ route('student.profile') }}" class="mb-5 mt-3 form">
          <input type="hidden" name="_method" value="put" />
          @csrf
          <div class="form-group">
            <div class="row">
              <div class="col-md-3">
                <h5><strong>@lang('student-profile.level')</strong></h5>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="level" id="1" value="Elementary" @if(Auth::user()->profile->level == 'Elementary')checked=""@endif />
                  <label class="form-check-label" for="1">
                    @lang('student-profile.elementary')
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="level" id="2" value="Conversational" @if(Auth::user()->profile->level == 'Conversational')checked=""@endif />
                  <label class="form-check-label" for="2">
                    @lang('student-profile.conversational')
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="level" id="3" value="Intermediate" @if(Auth::user()->profile->level == 'Intermediate')checked=""@endif />
                  <label class="form-check-label" for="3">
                    @lang('student-profile.intermediate')
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="level" id="4" value="Advanced" @if(Auth::user()->profile->level == 'Advanced')checked=""@endif />
                  <label class="form-check-label" for="4">
                    @lang('student-profile.advanced')
                  </label>
                </div>
              </div>

              <div class="col-md-3">
                <h5><strong>@lang('student-profile.corrections')</strong></h5>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="corrections" id="5" value="After every mistake" @if(Auth::user()->profile->corrections == 'After every mistake')checked=""@endif />
                  <label class="form-check-label" for="1">
                    @lang('student-profile.after_every_mistake')
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="corrections" id="6" value="Only after serious mistakes" @if(Auth::user()->profile->corrections == 'Only after serious mistakes')checked=""@endif />
                  <label class="form-check-label" for="6">
                    @lang('student-profile.only_after_serious_mistakes')
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="corrections" id="7" value="At the end of the session" @if(Auth::user()->profile->corrections == 'At the end of the session')checked=""@endif />
                  <label class="form-check-label" for="7">
                    @lang('student-profile.at_the_end_of_the_session')
                  </label>
                </div>
              </div>

              <div class="col-md-3">
                <h5><strong>@lang('student-profile.goals')</strong></h5>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="goals" id="8" value="Current Focus" @if(Auth::user()->profile->goals == 'Current Focus')checked=""@endif />
                  <label class="form-check-label" for="8">
                    @lang('student-profile.current_focus')
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="goals" id="9" value="Professional Development" @if(Auth::user()->profile->goals == 'Professional Development')checked=""@endif />
                  <label class="form-check-label" for="9">
                    @lang('student-profile.professional_development')
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="goals" id="10" value="Exam Preparation" @if(Auth::user()->profile->goals == 'Exam Preparation')checked=""@endif />
                  <label class="form-check-label" for="10">
                    @lang('student-profile.exam_preparation')
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="goals" id="11" value="Foreign Travel" @if(Auth::user()->profile->goals == 'Foreign Travel')checked=""@endif />
                  <label class="form-check-label" for="11">
                    @lang('student-profile.foreign_travel')
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="goals" id="12" value="Self Improvement" @if(Auth::user()->profile->goals == 'Self Improvement')checked=""@endif />
                  <label class="form-check-label" for="12">
                    @lang('student-profile.self_improvement')
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="goals" id="13" value="Other" @if(Auth::user()->profile->goals == 'Other')checked=""@endif />
                  <label class="form-check-label" for="13">
                    @lang('student-profile.other')
                  </label>
                </div>
              </div>

              <div class="col-md-3">
                <h5><strong>@lang('student-profile.interests')</strong></h5>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="interests[]" id="14" value="Business" @if(in_array('Business', Auth::user()->profile->interests))checked=""@endif />
                  <label class="form-check-label" for="14">
                    @lang('student-profile.business')
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="interests[]" id="15" value="Sports" @if(in_array('Sports', Auth::user()->profile->interests))checked=""@endif />
                  <label class="form-check-label" for="15">
                    @lang('student-profile.sports')
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="interests[]" id="16" value="World News" @if(in_array('World News', Auth::user()->profile->interests))checked=""@endif  />
                  <label class="form-check-label" for="16">
                    @lang('student-profile.world_news')
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="interests[]" id="17" value="Literature" @if(in_array('Literature', Auth::user()->profile->interests))checked=""@endif />
                  <label class="form-check-label" for="17">
                    @lang('student-profile.literature')
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="interests[]" id="18" value="Entertainment & Lifestyle" @if(in_array('Entertainment & Lifestyle', Auth::user()->profile->interests))checked=""@endif />
                  <label class="form-check-label" for="18">
                    @lang('student-profile.entertainment_and_lifestyle')
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="interests[]" id="19" value="Science and Technology" @if(in_array('Science and Technology', Auth::user()->profile->interests))checked=""@endif />
                  <label class="form-check-label" for="19">
                    @lang('student-profile.science_and_technology')
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="interests[]" id="20" value="Language & Culture" @if(in_array('Language & Culture', Auth::user()->profile->interests))checked=""@endif />
                  <label class="form-check-label" for="20">
                    @lang('student-profile.language_and_culture')
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="ml-auto">
              <button type="submit" class="btn btn-primary display-block">@lang('student-profile.save')</button>
          </div>
          </form>
        </div>
        <div class="tab-pane fade p-4" id="nav-account" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="container">
              <form method="post" action="{{ route('student.profile') }}" class="mb-5 mt-3 form">
              <input type="hidden" name="_method" value="put" />
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label><strong>@lang('student-profile.name')</strong></label>
                    <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label><strong>@lang('student-profile.mobile')</strong></label>
                    <input type="text" class="form-control" name="mobile" value="{{ Auth::user()->profile->mobile }}" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label><strong>@lang('student-profile.password')</strong></label>
                    <input type="password" class="form-control" name="password" value="password" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label><strong>@lang('student-profile.email')</strong></label>
                    <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" />
                  </div>
                </div>
                <div class="ml-auto">
                    <button type="submit" class="btn btn-primary display-block">@lang('student-profile.save')</button>
                </div>
              </div>
              </form>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-setting" role="tabpanel" aria-labelledby="nav-contact-tab">
          <form method="post" action="{{ route('student.profile') }}" class="mb-5 mt-3 form">
          <input type="hidden" name="_method" value="put" />
          @csrf
          <div class="row" style="padding:7px;">
            <div class="col-md-4">
              <h4>@lang('student-profile.language')</h4>
            </div>
            <div class="8">
              <select class="form-control" name="lang">
                <option value="en" @if(Auth::user()->profile->lang == 'en')selected=""@endif>
                  @lang('student-profile.english')
                </option>
                <option value="ar" @if(Auth::user()->profile->lang == 'ar')selected=""@endif>
                  @lang('student-profile.arabic')
                </option>
                <option value="fr" @if(Auth::user()->profile->lang == 'fr')selected=""@endif>
                  @lang('student-profile.france')
                </option>
              </select>
            </div>
          </div>

          <div class="row" style="padding:7px;">
            <div class="col-md-4">
              <h4>@lang('student-profile.country')</h4>
            </div>
            <div class="8">
                <select class="form-control" name="country_id" id="country_id">
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}" @if(Auth::user()->profile->country_id == $country->id)selected=""@endif>{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>
          </div>
          
          <div class="row" style="padding:7px;">
            <div class="col-md-4">
              <h4>@lang('student-profile.city')</h4>
            </div>
            <div class="8">
                <input type="text" class="form-control" name="city" value="{{ Auth::user()->profile->city }}" />
            </div>
          </div>

          <div class="row" style="padding:7px;">
            <div class="col-md-4">
              <h4>@lang('student-profile.desktop_notifications')</h4>
            </div>

            <div class="8">
                <div class="checkbox">
                    <input type="checkbox" name="desktop_notifications" value="1" @if(Auth::user()->profile->desktop_notifications == 1)checked=""@endif >
                </div>
            </div>
          </div>
          <div class="ml-auto mt-5">
              <button type="submit" class="btn btn-primary display-block">@lang('student-profile.save')</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection