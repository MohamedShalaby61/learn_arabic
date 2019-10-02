@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/edit-tutors.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.rawgit.com/nizarmah/calendar-javascript-lib/master/calendarorganizer.min.css" rel="stylesheet" />
    <style>
        #calendarContainer label {
            margin-bottom: 0 !important;
        }
        .cjslib-days, #organizerContainer-list-container {
            background-color: #fff !important;
        }
        .cjslib-calendar.cjslib-size-small {
            width: 320px !important;
            height: 358px !important;
        }
        .cjslib-events.cjslib-size-small {
            height: 358px !important;
        }
        .cjslib-year, .cjslib-month, .cjslib-date {
            width: 100% !important;
        }
        .cjslib-calendar.cjslib-size-small .cjslib-day > .cjslib-day-indicator {
            width: 12px;
            height: 12px;
            bottom: 3px;
            @lang('main.right'): 3px;
        }
        .cjslib-calendar.cjslib-size-small .cjslib-day > .cjslib-indicator-type-numeric {
            font-size: 9px;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

  <!-- main body -->
  <div class="main">
    <!-- innerpages-header  -->
    <div class="innerpages-top all-courses">
        {{--@include('layouts.msg')--}}
      <div class="alert" style="padding:30px 0 30px 0; margin-bottom: 0px; border-radius: 0px;"><div class="container"><div style="box-sizing: border-box; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); background: transparent; height: 56px; padding: 0px 24px; display: flex; justify-content: space-between;"><div style="position: relative; margin-@lang('main.left'): -24px; display: flex; justify-content: space-between; align-items: center; max-width: 80%;"><span style="padding-@lang('main.right'): 16px; line-height: 4vh; font-size: 3vh; font-family: Roboto, sans-serif; position: relative; text-overflow: ellipsis; white-space: nowrap; overflow: hidden; color: rgb(51, 51, 51); font-size: 3vh; padding-@lang('main.left'): 0px;">@lang('students.find_tutor')</span></div>
	  <div id="tutor-search-tabs" class="hidden-xs" style="position: relative; margin-@lang('main.left'): initial; margin-@lang('main.right'): auto; display: flex; justify-content: space-between; align-items: center;">
		  <a data-filter="all" class="active_tab"><h5 data-filter="all">@lang('students.all')</h5></a>
		  <a data-filter="1"><h5 data-filter="1">@lang('students.online')</h5></a>
		  <a data-filter="2"><h5 data-filter="2">@lang('students.favorites')</h5></a>
	  </div>
	  <div id="tutor-search-searchbox" style="position: relative; margin-@lang('main.right'): -24px; display: flex; justify-content: space-between; align-items: center; flex-shrink: 1;"><div style="background-color: white; display: flex; align-items: center; padding: 0px 15px; margin-@lang('main.left'): 0px; flex-grow: 1;"><div class="jss2737 jss2738" style="margin: 0px; min-width: 250px;"><div class="jss2707 jss2724 jss2708 jss2711 jss2727 jss2712 jss2728" style="
    display: none;
"><fieldset aria-hidden="true" class="jss2654 jss2731" style="padding-@lang('main.left'): 8px;"><legend class="jss2655" style="width: 0px;"></legend></fieldset><div class="jss2668 jss2670"><svg class="jss2659" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation" style="color: rgb(119, 119, 119);"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path><path fill="none" d="M0 0h24v24H0z"></path></svg></div><input aria-invalid="false" class="jss2717 jss2732 jss2720 jss2721 jss2722 jss2735 jss2723 jss2736" placeholder="Name, language, hobby" type="search" value=""><div class="jss2668 jss2671"><p class="jss2672 jss2680 jss2705"></p></div></div></div></div></div></div>
{{-- <div class="hidden-xs" style="box-sizing: border-box; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); background: transparent; height: initial; padding: 0px 24px; display: flex; justify-content: space-between; margin: 0px -4px;"><div style="position: relative; margin-@lang('main.left'): -24px; display: flex; justify-content: space-between; align-items: center;"><div style="margin: 0px 4px;"><button class="btn-filter jss2741 jss2744 jss2746 jss2747 jss2752 jss2753" tabindex="0" type="button" id="anchor-element" style="line-height: 2; letter-spacing: 0.6px;"><span class="jss2745">Conversation Practice</span><span class="jss2773"></span></button></div><div style="margin: 0px 4px;"><button class="btn-filter jss2741 jss2744 jss2746 jss2752" tabindex="0" type="button" id="anchor-element" style="line-height: 2; letter-spacing: 0.6px;"><span class="jss2745">Lesson Level</span><span class="jss2773"></span></button></div><div style="margin: 0px 4px;"><button class="btn-filter jss2741 jss2744 jss2746 jss2752" tabindex="0" type="button" id="anchor-element" style="line-height: 2; letter-spacing: 0.6px;"><span class="jss2745">Tutor Accent</span><span class="jss2773"></span></button></div><div style="margin: 0px 4px;"><button class="btn-filter jss2741 jss2744 jss2746 jss2752" tabindex="0" type="button" id="anchor-element" style="line-height: 2; letter-spacing: 0.6px;"><span class="jss2745">Tutor Personality</span><span class="jss2773"></span></button></div><div style="margin: 0px 4px;"><button class="btn-filter jss2741 jss2744 jss2746 jss2752" tabindex="0" type="button" style="height: 100%;"><span class="jss2745"><div style="display: flex; align-items: center;">Availability</div></span><span class="jss2773"></span></button></div></div></div> --}}
          </div></div>
    </div>

    <div class="container">
      <div class="row filter-courses mb-5">
        <div class="search-row col-md-9">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <input type="text" class="fltr-controls filtr-search form-control" name="filtr-search" data-search placeholder="@lang('students.search_here_for_tutors')" />
          </div>
        </div>
        <div class="input-group-btn col-md-3">
          <a class="btn btn-block dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @lang('students.availability')
          </a>

          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">    
            <!-- For filtering controls add -->
            <li class="dropdown-item" data-filter="all"> @lang('students.all_items') </li>
            <li class="dropdown-item" data-filter="1"> @lang('students.online') </li>
            <li class="dropdown-item" data-filter="0"> @lang('students.offline') </li>
          </ul>
        </div>
      </div>
    </div>



    <!-- To choose the value by which you want to sort add -->

    <div class="container mentors py-5">
        <div class="row filtr-container" style="width: none">
        @foreach ($tutors as $tutor)
        <div class="col-md-4 col-sm-6 filtr-item" id="filtr-item-{{ $tutor->id }}" data-category="{{ $tutor->online }}{{ in_array($tutor->id, $favorites_ids) ? ',2' : '' }}" data-sort="value">
          <figure class="item">
            <div style="padding-bottom: 0px; height: 270px; display: flex; flex-flow: column; justify-content: space-between; border-radius: inherit;">
                <div style="padding: 16px; font-weight: 500; box-sizing: border-box; position: relative; white-space: nowrap; cursor: pointer; overflow: hidden;">
                    <img src="{{ $tutor->image }}" style="margin-@lang('main.right'): 16px; height: 100px; width: 100px; border-radius: 8px;" data-toggle="modal" data-target="#tutor_image">
                    <div style="display: inline-block; vertical-align: top; white-space: normal; padding-@lang('main.right'): 90px;">
                        <span style="color: rgba(0, 0, 0, 0.87); display: block; font-size: 18.5px; line-height: 22px; padding-@lang('main.right'): 50px;">
                            <span class="tutor-name" style="font-weight: 600;">{{ $tutor->name }}</span></span>
                        <span style="color: rgba(0, 0, 0, 0.54); display: block; font-size: 14px;">
                            <div style="display: flex; flex-flow: column; font-size: 12px; line-height: 12px;"><div style="height: 2px;"></div>
                                <span style="display: flex; align-items: center; color: rgb(72, 72, 72); font-size: 12px; flex-wrap: wrap; margin-bottom: 7px;">
                                    <div class="rateyo" style="margin: 5px -3px -5px;" data-rateyo-rating="{{ $tutor->rating }}" data-rateyo-spacing="5px" data-rateyo-num-stars="5" data-rateyo-star-width="10px"></div></span>
{{--                                <div style="height: 2px;"></div><span style="display: flex; align-items: center; line-height: 13px; margin-@lang('main.left'): -5px; margin-@lang('main.right'): -5px; padding-@lang('main.left'): 0px; padding-@lang('main.right'): 25px;"><img id="badge" src="images/US.png" style="width: 32px; margin-@lang('main.right'): 5px; margin-@lang('main.left'): 5px;">Portland, Oregon. USA</span>--}}
                                <div style="display: flex; flex-flow: row wrap; align-items: center; margin: 15px -3px -5px;"><div tabindex="0" style="border: 10px; box-sizing: border-box; display: flex; font-family: Roboto, sans-serif; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); cursor: default; text-decoration: none; margin: 2px 3px 0px; padding: 0px; outline: none; font-size: inherit; font-weight: inherit; position: relative; background-color: rgb(224, 224, 224); border-radius: 4px; white-space: nowrap; width: fit-content;">@if(isset($tutor->certificates[0]))<span style="color: rgb(119, 119, 119); font-size: 11px; font-weight: 400; line-height: 18px; padding-@lang('main.left'): 12px; padding-@lang('main.right'): 12px; user-select: none; white-space: nowrap;"><span><i class="fas fa-graduation-cap"></i>{{$tutor->certificates[0]}}</span></span>@endif</div></div>
							</div>
						</span>
					</div>


					<div id="filtr-item-title-{{ $tutor->id }}" title="{{ $tutor->online ? __('students.available') : __('students.not_available') }}" style="width: 15px; height: 15px; border-radius: 4px; border: 2px solid rgb(255, 255, 255); position: absolute; bottom: 7%; background-color: {{ $tutor->online ? 'rgb(150, 196, 94)' : 'rgb(255, 57, 17)' }}; @lang('main.left'): 2.5%;"></div>
					<div style="position: absolute; top: 0px; @lang('main.right'): 0px;">
						<span role="checkbox" aria-checked="false" aria-label="Favorite" tabindex="-1">
							<button tabindex="0" type="button" style="border: 10px; box-sizing: border-box; display: inline-block; font-family: Roboto, sans-serif; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); cursor: pointer; text-decoration: none; margin: 0px; padding: 12px; outline: none; font-size: 0px; font-weight: inherit; position: relative; overflow: visible; transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms; width: 48px; height: 48px; background: none;">
								<div class="unlike" id="like_icon_{{ $tutor->id }}" onclick="like_tutor('{{ $tutor->id }}', 1)" {!! in_array($tutor->id, $favorites_ids) ? 'style="display: none"' : '' !!}><svg viewBox="0 0 24 24" style="display: inline-block; color: rgba(0, 0, 0, 0.87); fill: rgb(119, 119, 119); height: 24px; width: 24px; user-select: none; transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms;"><path d="M16.5 3c-1.74 0-3.41.81-4.5 2.09C10.91 3.81 9.24 3 7.5 3 4.42 3 2 5.42 2 8.5c0 3.78 3.4 6.86 8.55 11.54L12 21.35l1.45-1.32C18.6 15.36 22 12.28 22 8.5 22 5.42 19.58 3 16.5 3zm-4.4 15.55l-.1.1-.1-.1C7.14 14.24 4 11.39 4 8.5 4 6.5 5.5 5 7.5 5c1.54 0 3.04.99 3.57 2.36h1.87C13.46 5.99 14.96 5 16.5 5c2 0 3.5 1.5 3.5 3.5 0 2.89-3.14 5.74-7.9 10.05z"></path></svg></div>
								<div class="like" id="dislike_icon_{{ $tutor->id }}" onclick="like_tutor('{{ $tutor->id }}', 0)" {!! in_array($tutor->id, $favorites_ids) ? '' : 'style="display: none"' !!}><svg viewBox="0 0 24 24" style="display: inline-block; color: rgba(0, 0, 0, 0.87); fill: rgb(246, 186, 1); height: 24px; width: 24px; user-select: none; transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms;"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"></path></svg></div>
							</button>
						</span>
					</div>
				</div>
				<div style="padding: 0px 16px 16px; font-size: 15px; color: rgb(119, 119, 119); cursor: pointer; font-weight: 300; max-height: 150px; overflow-y: auto; margin-bottom: auto;"><p style="margin-bottom: 0px;">{{--<i><small>Busy in 10 minutes</small><br></i> --}} {{ $tutor->title }}</p></div><div style="padding: 0px 8px 8px; position: relative; display: flex; justify-content: flex-end; align-items: center; height: 50px; border-bottom-@lang('main.right')-radius: inherit; border-bottom-@lang('main.left')-radius: inherit;"><button class="btn btn-sm undefined tutor_profile" title="profile" style="border-width: 0px; margin-@lang('main.left'): 3px; margin-@lang('main.right'): 3px; color: #fff; background: #ffc000; padding: 6px 20px;" id="tutor_{{ $tutor->id }}">@lang('students.profile')</button>
                    {{--<button class="btn btn-sm btn-tertiary" title="call" style="border-width: 0px; background: {{ $tutor->online ? '#0069d9' : '#0069d9' }}; margin-@lang('main.left'): 3px; margin-@lang('main.right'): 3px; padding: 6px 15px;">CALL</button>--}}
            </div></div>
          </figure>
        </div>

        {{-- <div class="col-md-3 filtr-item" data-category="{{ in_array($tutor->id, $favorites_ids) ? '2' : $tutor->online }}" data-sort="value">
          <figure class="item">
            <div class="img-mentor">
              <img src="{{ $tutor->image }}" class="w-100" />
            </div>

            <figcaption>
              <h5>{{ $tutor->name }}</h5>
              <p>
                <small>{{ $tutor->title }}</small>
              </p>
              <div class="row">
                <div class="col-md-7">
                  <div class="rateyo" data-rateyo-read-only="true" data-rateyo-half-star="true" data-rateyo-rating="{{ $tutor->rating - 1 }}" data-rateyo-spacing="5px" data-rateyo-num-stars="5" data-rateyo-star-width="10px"></div>
                </div>
                <div class="col-md-5">
                  @if($tutor->chats_count)
                  <p>
                    <small>({{ $tutor->chats_count }})</small><i class="fas fa-user"></i>
                  </p>
                  @endif
                </div>
                <button id="tutor_{{ $tutor->id }}" class="btn btn-primary btn-block mt-3 mx-3 tutor_profile">@lang('students.view_profile')</button>
              </div>
            </figcaption>
          </figure>
        </div> --}}
        @endforeach
      </div>
    </div>
  </div>


    
@endsection

@section('scripts')
<script src="{{ env('SOCKET_DOMAIN') }}/socket.io/socket.io.js"></script>
<script src="https://cdn.rawgit.com/nizarmah/calendar-javascript-lib/master/calendarorganizer.min.js"></script>
{{--<script src="{{ env('SOCKET_DOMAIN') }}/socket.io/socket.io.js"></script>--}}
<script type='text/javascript'>
    $(document).ready(function(){
        var socket = io.connect("{{ env('SOCKET_DOMAIN') }}");

        setInterval(function() {
            socket.emit('heartbeat');
        }, 1000);

        socket.on('connected_tutor', function (id) {
            console.log('connected tutor: ' + id);

            filterCat = $("#filtr-item-" + id).data("category");
            filterCat2 = filterCat.replace("0", "1");
            $("#filtr-item-" + id).attr("data-category", filterCat2);
            $("#filtr-item-title-" + id).attr("title", "Available");
            $("#filtr-item-title-" + id).css("background-color", "rgb(150, 196, 94)");

            filterizd.filterizr({filter: $('.active_tab').data('filter')});
        });
        socket.on('disconnected_tutor', function (id) {
            console.log('disconnected tutor: ' + id);

            filterCat = $("#filtr-item-" + id).data("category");
            filterCat2 = filterCat.replace("1", "0");
            $("#filtr-item-" + id).attr("data-category", filterCat2);
            $("#filtr-item-title-" + id).attr("title", "Not Available");
            $("#filtr-item-title-" + id).css("background-color", "rgb(255, 57, 17)");

            filterizd.filterizr({filter: $('.active_tab').data('filter')});
        });

        $('.tutor_profile').click(function(){
            var id = this.id;
            var splitid = id.split('_');
            var userid = splitid[1];

            // AJAX request
            $.ajax({
                url: '{{ url("tutor") }}/' + userid,
                type: 'get',
                data: {},
                success: function(response){
                    // Add response in Modal body
                    $('.modal-content').html(response);

                    // Display Modal
                    $('#tutor_profile').modal('show');
                }
            });
        });
    });
	
	function like_tutor(id, value)
	{
        filterCat = $("#filtr-item-" + id).data("category");
        filterCat2 = '';
        if (value == "0") {
            filterCat2 = filterCat.replace(",2", "");
        } else {
            filterCat2 = filterCat + ",2";
        }
        $("#filtr-item-" + id).attr("data-category", filterCat2);
        filterizd.filterizr({filter: $('.active_tab').data('filter')});
        //$('.active_tab').trigger( "click" );
		if (value == 1) {
			$("#like_icon_" + id).hide();
			$("#dislike_icon_" + id).show();
		} else {
			$("#like_icon_" + id).show();
			$("#dislike_icon_" + id).hide();
		}
		$.ajax({
			url: "{{ url('student/like_tutor') }}",
			data: JSON.stringify({'tutor_id': id, 'value': value}),
			headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
			contentType: "application/json",
			success: function(result) {
				console.log('like success');
			}
		});
	}
	
	$('#tutor-search-tabs a').click(function() {
		$('#tutor-search-tabs a').removeClass('active_tab');
		$(this).addClass('active_tab');
	});
</script>
@endsection