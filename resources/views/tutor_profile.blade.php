<div class="mentor-header-profile">
    <div class="tutor-profile">
        <img src="{{ $tutor->image }}" />
    </div>
    <h4 class="tutor-name">{{ $tutor->name }}</h4>
    @if(Auth::check() && $tutor->online == 1)
        <a id="call_tutor" class="btn btn-bordered-light">@lang('tutor_profile.call_now')</a>
    @endif
</div>
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
<div class="modal-body text-center" id="tutor_profile_call_modal_body" style="display: none">
    <img class="img-circle" src="{{ asset('images/calling.gif') }}" alt="" width="200"/>
</div>
<div class="modal-body" id="tutor_profile_modal_body">
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="pills-home-tab">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="pill" href="#about" role="tab" aria-controls="pills-home" aria-selected="true">@lang('tutor_profile.about')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#qualifications" role="tab" aria-controls="pills-profile" aria-selected="false">@lang('tutor_profile.qualifications')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#background" role="tab" aria-controls="pills-contact" aria-selected="false">@lang('tutor_profile.background')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="pill" href="#interests" role="tab" aria-controls="pills-contact" aria-selected="false">@lang('tutor_profile.interests')</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="panel-title">
                        <h5>@lang('tutor_profile.specialized_in')</h5>
                    </div>
                    <div class="panel-body">
                        @if ($tutor->specialities)
                            @foreach($tutor->specialities as $speciality)
                                <label class="label-badge">{{ $speciality->name ?? '' }}</label>
                            @endforeach
                        @endif
                    </div>
                    <hr/>

                    <div class="panel-title">
                        <h5>@lang('tutor_profile.tutoring_style')</h5>
                    </div>
                    <div class="panel-body">
                        <p>{{ $tutor->tutoringPersonality->name ?? '' }}</p>
                    </div>
                    <hr/>

                    <div class="panel-title">
                        <h5>@lang('tutor_profile.best_with_levels')</h5>
                    </div>
                    <div class="panel-body">
                        @if ($tutor->levels)
                            @foreach ($tutor->levels as $level)
                                <label class="label-badge">{{ $level }}</label>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="tab-pane fade" id="qualifications" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="panel-title">
                        <h5>@lang('tutor_profile.certificates')</h5>
                    </div>
                    <div class="panel-body">
                        @if ($tutor->certificates)
                            @foreach ($tutor->certificates as $certificate)
                                <label class="label-badge">{{ $certificate }}</label>
                            @endforeach
                        @endif
                    </div>
                    <hr/>

                    <div class="panel-title">
                        <h5>@lang('tutor_profile.teaching_experience')</h5>
                    </div>
                    <div class="panel-body">
                        <p>{{ $tutor->teaching_experience }}</p>
                    </div>
                </div>
                <div class="tab-pane fade" id="background" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <div class="panel-title">
                        <h5>@lang('tutor_profile.speaks')</h5>
                    </div>
                    <div class="panel-body">
                        <label class="label-badge">@lang('tutor_profile.speaks_english')</label>
                        <label class="label-badge">@lang('tutor_profile.speaks_spanish')</label>
                    </div>
                    <hr/>

                    <div class="panel-title">
                        <h5>@lang('tutor_profile.profession')</h5>
                    </div>
                    <div class="panel-body">
                        <p>{{ $tutor->profession }}</p>
                    </div>
                    <hr/>

                    <div class="panel-title">
                        <h5>@lang('tutor_profile.education')</h5>
                    </div>
                    <div class="panel-body">
                        <p>{{ $tutor->education }}</p>
                    </div>
                </div>
                <div class="tab-pane fade" id="interests" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <div class="panel-title">
                        <h5>@lang('tutor_profile.enjoys_discussing')</h5>
                    </div>
                    <div class="panel-body">
                        @if ($tutor->enjoys_discussing)
                            @foreach ($tutor->enjoys_discussing as $enjoy_discussing)
                                <label class="label-badge">{{ $enjoy_discussing }}</label>
                            @endforeach
                        @endif
                    </div>
                    <hr/>

                    <div class="panel-title">
                        <h5>@lang('tutor_profile.interests')</h5>
                    </div>
                    <div class="panel-body">
                        <p>{{ $tutor->interests }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade show active" id="intro" role="tabpanel" aria-labelledby="pills-profile-tab">
            <video id="tutorVideo" width="100%" height="315" controls ><source src="{{url('uploads/'.$tutor->video) }}"/></video>
        </div>
        <div class="tab-pane fade" id="schedule" role="tabpanel" aria-labelledby="pills-contact-tab">
            <div class="wrapper">
                <div id="calendarContainer"></div>
                <div id="organizerContainer" style="margin-left: 8px;"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer" id="tutor_profile_modal_footer">
    <nav class="nav nav-pills flex-column flex-sm-row">
        <a class="flex-sm-fill text-sm-center nav-link" data-toggle="pill" href="#profile" role="tab"><i class="fas fa-user"></i>@lang('tutor_profile.profile')</a>
        <a class="flex-sm-fill text-sm-center nav-link active" data-toggle="pill" href="#intro" role="tab"><i class="fas fa-video"></i>@lang('tutor_profile.intro')</a>
        @if(Auth::user())
            <a class="flex-sm-fill text-sm-center nav-link" data-toggle="pill" href="#schedule" role="tab"><i class="fas fa-calendar-alt"></i>@lang('tutor_profile.schedule')</a>
        @endif
    </nav>
</div>

@if(Auth::user())
<script>
    months = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]
    var calendar = new Calendar("calendarContainer",         // HTML container ID,                                                                     Required
        "small",                     // Size: (small, medium, large)                                                           Required
        ["Sunday", 3],               // [ Starting day, day abbreviation length ]                                              Required
        [ "#ffc000", "#E1AB04", "#ffffff", "#ffffff" ],               // Text Dark Color                                                                        Required
        { // Following is optional
            days: [ "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday",  "Saturday" ],
            months: [ "January", "Feburary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ],
            indicator: true,         // Day Event Indicator                                                                    Optional
            indicator_type: 1,       // Day Event Indicator Type (0 not to display num of events, 1 to display num of events)  Optional
            indicator_pos: "bottom", // Day Event Indicator Position (top, bottom)                                             Optional
            placeholder: ""
        });
    var data = {!! json_encode($timesArr) !!}
    /*{
        2019: {
            9: {
                25: [
                    {
                        startTime: "00:00",
                        endTime: "24:00"
                    }
                ]
            }
        }
    };*/

    var organizer = new Organizer("organizerContainer", calendar, data);

    theInput=document.createElement('INPUT');
    theInput.setAttribute("type", "hidden");
    theInput.setAttribute("name", "hiddenInput");
    theInput.setAttribute("value", "");
    theInput.id = "organizerContainer-hiddenInput";
    document.body.appendChild(theInput);

    Organizer.prototype.update = function () {
        document.getElementById("organizerContainer-date").innerHTML = this.calendar.months[this.calendar.date.getMonth()] + " " + this.calendar.date.getDate() + ", " + this.calendar.date.getFullYear();
        document.getElementById("organizerContainer-hiddenInput").value=this.calendar.months[this.calendar.date.getMonth()] + " " + this.calendar.date.getDate() + ", " + this.calendar.date.getFullYear();
        document.getElementById("organizerContainer-list").innerHTML = "";
    }

	objTextBox = document.getElementById("organizerContainer-hiddenInput");
    oldValue = null;
    var somethingChanged = false;

    function track_change()
    {
        if(objTextBox.value != oldValue)
        {
            oldValue = objTextBox.value;
            somethingChanged = true;
            var Rdate=$('#organizerContainer-date').text();
            var tutor='{{ $tutor->id }}';
            $.ajax({
                url:"{{url('getTutorTime')}}/" + Rdate+"/"+tutor ,
                type:'GET',
                success:function (res) {
                    // data=res;
                    $('#organizerContainer-list').html(res);
                }
            });
            $.ajax({
                url: '{{url('tutor/time')}}/'+tutor,
                type: 'GET',
                dataType: 'json',
                data: '',
                success: function (doc) {
                    if (doc != null) {
                        $.each(doc,function(key,element) {
                            if(new Date(element.date).getFullYear()==$('#calendarContainer-year').text()){
                                if(months[new Date(element.date).getMonth()]==$('#calendarContainer-month').text()){
                                    if(new Date(element.date).getDate()==$('#calendarContainer-day-num-'+(new Date(element.date).getDate()+1)).text()){
                                        if( $('#calendarContainer-day-num-'+(new Date(element.date).getDate()+1)).children().length == 0){
                                            $('#calendarContainer-day-num-'+(new Date(element.date).getDate()+1)).append('<span><div style="width: 10px;height: 10px;background-color: #ffc107;border-radius: 50%;"></div></span>');
                                        }
                                    }
                                }
                            }
                        });
                    }
                }
            });
        };
    }
    setInterval(function() { track_change()}, 500);
</script>

<script src="{{ env('SOCKET_DOMAIN') }}/socket.io/socket.io.js"></script>
<script>
	var downloadTimer1;
	var timeleft1;
    var socket = io.connect("{{ env('SOCKET_DOMAIN') }}",{query:'student_id={{ Auth::user()->fk_id }}'});
    setInterval(function() {
        socket.emit('heartbeat', {student_id: {{ Auth::user()->fk_id }}});
    }, 1000);

    $('#call_tutor').click(function() {
        $('#tutor_profile_modal_body').hide();
        $('#tutor_profile_modal_footer').hide();
        $(this).hide();
		
		timeleft1 = {{ env('CALL_TIMER') }} - 1;
		downloadTimer1 = setInterval(function() {
			timeleft1 -= 1;
			if (timeleft1 < 0) {
				clearInterval(downloadTimer1);
				$('#tutor_profile_call_modal_body').html('<h3>@lang("tutor_profile.tutor_busy")</h3>');
			}
		}, 1000);
		
        $('#tutor_profile_call_modal_body').show();
        socket.emit('call', { tutor_id: {{ $tutor->id }}, student_id: '{{ Auth::user()->fk_id }}' });
    });

    socket.on('accepted_call', function (data) {
        clearInterval(downloadTimer1);
        $('#tutor_profile_call_modal_body').html('<h3>@lang("tutor_profile.call_accepted_msg")</h3>');
        window.open(data.join_url, '_blank');
        //window.location.href = data.join_url;
    });
	
	socket.on('rejected_call', function (data) {
        clearInterval(downloadTimer1);
		$('#tutor_profile_call_modal_body').html('<h3>@lang("tutor_profile.tutor_busy")</h3>');
    });
	
	var downloadTimer;
	var timeleft;
	function openConfirmationDialog() {
		timeleft = {{ env('CALL_TIMER') }} - 1;
		downloadTimer = setInterval(function() {
			document.getElementById("countdown").innerHTML = timeleft;
			timeleft -= 1;
			if (timeleft < 0) {
				clearInterval(downloadTimer);
				$('#confirm-call').modal('toggle');
			}
		}, 1000);

		$("#confirm-call").modal();
	}
</script>
@endif