<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <title>@lang('attendence.site_name')</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Declaring Css Files -->
  <!-- Animate css -->
  <link href="vendors/WOW-master/css/libs/animate.css" rel="stylesheet" type="text/css">
  <link href="vendors/animate-scroller/aos.css" rel="stylesheet" type="text/css" />
  <!-- colorbox -->
  <link href="vendors/colorbox-master/example3/colorbox.css" rel="stylesheet" type="text/css" />
  <!-- rate-stars -->
  <link rel="stylesheet" href="vendors/rate-stars/jquery.rateyo.min.css" type="text/css" />
  <!-- Custom stylesheet -->
  <link href="css/styles.css" rel="stylesheet" type="text/css" />

</head>
    <body class="" style="font-size: 14px; padding: 20px;">
<div class="container">

<div class="row">
</div>
<div class="row">
<div class="col-xs-6">
<h3>@lang('attendence.attendance_record')</h3>
<br />
<h4>@lang('attendence.site_name')</h4>
<p>@lang('attendence.address')</p>
<br />
<table class="table">
<tr>
<td>@lang('attendence.student_name')</td>
<td>
<input type="text" value="{{ Auth::user()->name }}" placeholder="@lang('attendence.enter_full_name')" size="40">
</td>
</tr>
<tr>
<td>@lang('attendence.industry_category')</td>
<td>@lang('attendence.education')</td>
</tr>
<tr>
<td>@lang('attendence.class_duration')</td>
<td>2019-06-09 &ndash; 2019-07-09</td>
</tr>
<tr>
<td>@lang('attendence.course')</td>
<td>@lang('attendence.on_demand_speaking')</td>
</tr>
<tr>
<td>@lang('attendence.plan_type')</td>
<td>@lang('attendence.minutes_daily_plan')</td>
</tr>
</table>
</div>
</div>
<div class="row">
<div class="col-xs-12">
<table class="table table-bordered">
<thead>
<tr>
<th>@lang('attendence.tutor_name')</th>
<th>@lang('attendence.date')</th>
<th>@lang('attendence.state')</th>
<th>@lang('attendence.attendance')</th>
</tr>
</thead>
<tbody>
</tbody>
<tfoot>
<tr>
<td colspan="3">@lang('attendence.total_attendance_rate')</th>
<td>0/30</td>
</tfoot>
</table>
<br />
<p>@lang('attendence.attendance_desc') <a href="">[email&#160;protected]</a></p>
<p>2019-07-09</p>
<p>@lang('attendence.site_name')</p>
</div>
</div>
</div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

<script>if (window != top) { top.location.href = self.location.href; }</script>
</body>
</html>