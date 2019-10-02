@extends('layouts.app')

@section('content')
  <!-- main body -->
  <div class="main">
    <!-- innerpages-header  -->
    <div class="" style="padding-top: 50px; padding-bottom: 50px;">
        <div class="container page-section bg-gray student-history-page">
			<div class="row" style="margin: 50px 0 30px 0;">
				<div class="col-xs-12"  style="width:100%; box-shadow:1px 1px 30px #eee; padding: 15px;">
					<div class="horizontal panel-default hidden-sm hidden-xs" style="display: flex; justify-content: space-evenly;">
						<div style="display: flex; flex-flow: column; justify-content: space-around; align-items: center;">
							<h2 class="display-3" style="font-size:35px; padding-top:10px;">0</h2>
							<small>@lang('progress.current_day_streak')</small>
						</div>
						<div style="width: 0px; border-right: 1px solid rgb(204, 204, 204);"></div>
						<div style="display: flex; flex-flow: column; justify-content: space-around; align-items: center;">
							<h2 class="display-3" style="font-size:35px; padding-top:10px;">0</h2>
							<small>@lang('progress.tutors_met')</small>
						</div>
						<div style="display: flex; flex-flow: column; justify-content: space-around; align-items: center;">
							<h2 class="display-3" style="font-size:35px; padding-top:10px;">0</h2>
							<small>@lang('progress.minutes_of_english_conversation')</small>
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="display: flex; justify-content: space-evenly; align-items: flex-start; flex-flow: wrap;">
				<div class="col-xs-12 col-md-4 col-lg-3">
					<div class="panel panel-default" style="padding: 15px; box-shadow:1px 1px 30px #eee;">
						<div class="panel-body" style="">
							<p>
								<a href="/en/student/settings#certificate" style="text-decoration: none;">
									<button class="btn btn-accent btn-block" style="padding: 10px 0px; margin-bottom: 10px; color: #fff; background-color: #d22f32; border: none; display: none;">@lang('progress.cambly_certificate')</button>
								</a>
							</p>
							<p>
								<a href="#{{-- url("attendence-record") --}}" style="text-decoration: none;">
									<button class="btn btn-secondary btn-block" style="padding: 10px 0px; margin-bottom: 10px; color: #fff; background-color: #333; border: none;">@lang('progress.attendance_record')</button>
								</a>
							</p>
						</div>
						<ul class="list-group">
							<li class="list-group-item" style="padding: 0px;"></li>
						</ul>
					</div>
				</div>
				<div class="col-xs-12 col-md-8 col-lg-9">
					<div class="session-history-panel panel panel-default">
						<div class="" style="color: #333; background-color: #f5f5f5; border-color: #ddd;">
							<h3 class="" style="margin-top: 0; margin-bottom: 0; color:#333; padding:10px; border-bottom: 1px solid #ccc; font-size: 16px; font-weight: 400;">@lang('progress.session_history')</h3>
						</div>
						<div class="infinite-scrollbox" style="padding-top: 20px; min-height: 400px; height: 400px;">
							<div class="text-center">
								<h5>@lang('progress.your_chat_history_will_appear_here_after_you_chat_with_a_tutor')</h5>
								<a href="{{ url("student/subscribe") }}">
									<button class="btn btn-accent btn-lg" style="padding: 15px 30px; margin-bottom: 10px; color: #fff; background-color: #d22f32; border: none;">@lang('progress.practice_english')</button>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>    
	</div>
</div>

@stop
