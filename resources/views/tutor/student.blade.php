@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/edit-tutors.css') }}" rel="stylesheet" type="text/css"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <!-- Modal -->
    <div id="tutor_image" class="modal fade modal-lg">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="mentor-header-profile">
                    <h4 class="tutor-name">
                        <div title="Available"
                             style="width: 15px; height: 15px; border-radius: 4px; border: 2px solid rgb(255, 255, 255);  background-color: rgb(150, 196, 94); display: inline-block; margin-right: 5px;"></div>

                    </h4>
                    <a href="#" style="color: #fff; margin: 5px auto; text-align: center;">username@email.com</a>
                </div>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span
                            class="sr-only">close</span>
                </button>

                <div class="tab-pane fade show active" id="intro" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <img src="images/blog-img/1-2.jpg" style="margin-right: 16px; height: 450px; width: 100%;"
                         data-toggle="modal" data-target="#tutor_image">

                </div>
            </div>
        </div>
    </div>

    <div id="search">
        <button type="button" class="close">×</button>
        <form class="search-form" method="post" action="">
            <input type="search" name="search" placeholder="@lang('students.search_here') ...">
            <button type="submit" class="btn btn-search">@lang('students.search') <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <!-- main body -->
    <div class="main">
        <!-- innerpages-header  -->
        <div class="innerpages-top ">

        </div>

        <div class="container">
            <div class="row filter-courses mb-5 mr-top">
                <div class="search-row col-md-9">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input type="text" class="fltr-controls filtr-search form-control" name="filtr-search"
                               data-search placeholder="@lang('students.search_here_for_students')"/>
                    </div>
                </div>
                <div class="input-group-btn col-md-3">
                    <a class="btn btn-block dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @lang('students.availability')
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">    
                        <!-- For filtering controls add -->
                        <li class="dropdown-item" data-filter="all"> @lang('students.all_items')</li>
                        <li class="dropdown-item" data-filter="1"> @lang('students.online')</li>
                        <li class="dropdown-item" data-filter="2"> @lang('students.offline')</li>
                        <!-- <li class="dropdown-item" data-filter="3"> Category 3 </li>     -->
                    </ul>
                </div>
                <!-- <div class="view-layout col-md-2">
                  <span class="grid-layout"><i class="fas fa-th-large"></i></span>
                  <span class="list-layout"><i class="fas fa-th-list"></i></span>
                </div> -->
            </div>
        </div>

        <!-- To choose the value by which you want to sort add -->
        <div class="container mentors py-5">
            <div class="row filtr-container" style="width: none;">
                @foreach($tutorStudent as $item)
                    <div class="col-md-4 col-sm-6 filtr-item" data-category="1" data-sort="value">
                        <figure class="item">
                            <div style="padding-bottom: 0px; height: 285px; display: flex; flex-flow: column; justify-content: space-between; border-radius: inherit;">
                                <div style="padding: 16px; font-weight: 500; box-sizing: border-box; position: relative; white-space: nowrap; cursor: pointer; overflow: hidden;">
                                    <img src="{{ $item->image }}"
                                         style="margin-right: 16px; height: 100px; width: 100px; border-radius: 8px;"
                                         {{-- data-toggle="modal" data-target="#tutor_image{{$item->id}}" --}}>
                                    <div style="display: inline-block; vertical-align: top; white-space: normal; padding-right: 90px;">
                        <span style="color: rgba(0, 0, 0, 0.87); display: block; font-size: 18.5px; line-height: 22px; padding-right: 50px;">
                            <span class="tutor-name" style="font-weight: 600;">{{$item->name}}</span></span>
                                        <span style="color: rgba(0, 0, 0, 0.54); display: block; font-size: 14px;">
                            <div style="display: flex; flex-flow: column; font-size: 12px; line-height: 12px;"><div
                                        style="height: 2px;"></div>
                                <span style="display: flex; align-items: center; color: rgb(72, 72, 72); font-size: 12px; flex-wrap: wrap; margin-bottom: 7px;">
                                    <div class="rateyo" style="margin: 5px -3px -5px;" data-rateyo-rating="0"
                                         data-rateyo-spacing="5px" data-rateyo-num-stars="5"
                                         data-rateyo-star-width="10px"></div></span>
                                </div></span></div>
                                    <div title="Available"
                                         style="width: 15px; height: 15px; border-radius: 4px; border: 2px solid rgb(255, 255, 255); position: absolute; bottom: 7%; background-color: rgb(150, 196, 94); left: 2.5%;"></div>
                                </div>
                                <div style="padding: 0px 16px 16px; font-size: 15px; color: rgb(119, 119, 119); cursor: pointer; font-weight: 300; max-height: 150px; overflow-y: auto; margin-bottom: auto;">
                                    <div class="text-center" style="margin-top: 5px;">
                                        <span style="color: rgb(119, 119, 119); font-size: 11px; border-radius: 4px; background-color: rgb(224, 224, 224); font-weight: 400; line-height: 18px; padding-left: 12px; padding-right: 12px; user-select: none; white-space: nowrap;"><span><i
                                                        class="fas fa-graduation-cap"></i> @lang('students.teaching_certificate')</span></span>
                                        <span style="color: rgb(119, 119, 119); font-size: 11px; border-radius: 4px; background-color: rgb(224, 224, 224); font-weight: 400; line-height: 18px; padding-left: 12px; padding-right: 12px; user-select: none; white-space: nowrap;"><span><i
                                                        class="fas fa-graduation-cap"></i> @lang('students.teaching_certificate')</span></span>
                                    </div>
                                    <div class="text-center" style="margin-top: 5px;">
                                        <span style="color: rgb(119, 119, 119); font-size: 11px; border-radius: 4px; background-color: rgb(224, 224, 224); font-weight: 400; line-height: 18px; padding-left: 12px; padding-right: 12px; user-select: none; white-space: nowrap;"><span><i
                                                        class="fas fa-graduation-cap"></i> @lang('students.teaching_certificate')</span></span>
                                        <span style="color: rgb(119, 119, 119); font-size: 11px; border-radius: 4px; background-color: rgb(224, 224, 224); font-weight: 400; line-height: 18px; padding-left: 12px; padding-right: 12px; user-select: none; white-space: nowrap;"><span><i
                                                        class="fas fa-graduation-cap"></i> @lang('students.teaching_certificate')</span></span>
                                    </div>
                                </div>
                                <div style="padding: 0px 8px 8px; position: relative; text-align: center; align-items: center; height: 50px; border-bottom-right-radius: inherit; border-bottom-left-radius: inherit;">
                                    <button class="btn btn-sm btn-tertiary" title="call"
                                            style="border-width: 0px; background: #0069d9; margin-left: 3px; margin-right: 3px; padding: 6px 40px;">
                                        CALL
                                    </button>
                                </div>
                            </div>
                        </figure>
                        {{-- <!-- Modal -->
                        <div id="tutor_image{{$item->id}}" class="modal fade modal-lg">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="mentor-header-profile">
                                        <h4 class="tutor-name">
                                            <div title="Available"
                                                 style="width: 15px; height: 15px; border-radius: 4px; border: 2px solid rgb(255, 255, 255);  background-color: rgb(150, 196, 94); display: inline-block; margin-right: 5px;"></div>

                                        </h4>
                                        <a href="#" style="color: #fff; margin: 5px auto; text-align: center;">{{$item->email}}</a>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span
                                                class="sr-only">close</span>
                                    </button>

                                    <div class="tab-pane fade show active" id="intro" role="tabpanel" aria-labelledby="pills-profile-tab">
                                        <img src="{{ $item->image }}" style="margin-right: 16px; height: 450px; width: 100%;">

                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                @endforeach
            </div>
        </div>


    </div>
@endsection

@section('script')
    <script>
        /*
    Full tutorial on how to use the Calendar Javascript Library

    https://github.com/nizarmah/calendar-javascript-lib/blob/master/README.md
    */

        function Calendar(id, size, labelSettings, colors) {
            this.id = id;
            this.size = size;
            this.labelSettings = labelSettings;
            this.colors = colors;

            months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
            label = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

            this.months = months;

            this.label = [];
            this.labels = [];
            for (var i = 0; i < 7; i++)
                this.label.push(label[(label.indexOf(labelSettings[0]) + this.label.length >= label.length) ? Math.abs(label.length - (label.indexOf(labelSettings[0]) + this.label.length)) : (label.indexOf(labelSettings[0]) + this.label.length)]);
            for (var i = 0; i < 7; i++)
                this.labels.push(this.label[i].substring(0, (labelSettings[1] > 3) ? 3 : labelSettings[1]));

            this.date = new Date();

            this.draw();
            this.update();
        }

        Calendar.prototype.constructor = Calendar;

        Calendar.prototype.draw = function () {
            backSvg = '<svg style="width: 24px; height: 24px;" viewBox="0 0 24 24"><path fill="' + this.colors[3] + '" d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z"></path></svg>';
            nextSvg = '<svg style="width: 24px; height: 24px;" viewBox="0 0 24 24"><path fill="' + this.colors[3] + '" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z"></path></svg>';

            theCalendar = document.createElement("DIV");
            theCalendar.className = "calendar " + this.size;

            document.getElementById(this.id).appendChild(theCalendar);

            theContainers = [], theNames = ['year', 'month', 'labels', 'days'];
            for (var i = 0; i < theNames.length; i++) {
                theContainers[i] = document.createElement("DIV");
                theContainers[i].className = theNames[i];

                if (theNames[i] != "days") {
                    if (theNames[i] != "month") {
                        theContainers[i].style.backgroundColor = this.colors[1];
                        theContainers[i].style.color = this.colors[3];

                        if (theNames[i] != "labels") {
                            backSlider = document.createElement("DIV");
                            backSlider.id = this.id + "-year-back";
                            backSlider.insertAdjacentHTML('beforeend', backSvg);
                            theContainers[i].appendChild(backSlider);

                            theText = document.createElement("SPAN");
                            theText.id = this.id + "-" + theNames[i];
                            theContainers[i].appendChild(theText);

                            nextSlider = document.createElement("DIV");
                            nextSlider.id = this.id + "-year-next";
                            nextSlider.insertAdjacentHTML('beforeend', nextSvg);
                            theContainers[i].appendChild(nextSlider);
                        }
                    } else {
                        theContainers[i].style.backgroundColor = this.colors[0];
                        theContainers[i].style.color = this.colors[2];

                        backSlider = document.createElement("DIV");
                        backSlider.id = this.id + "-month-back";
                        backSlider.insertAdjacentHTML('beforeend', backSvg);
                        theContainers[i].appendChild(backSlider);

                        theText = document.createElement("SPAN");
                        theText.id = this.id + "-" + theNames[i];
                        theContainers[i].appendChild(theText);

                        nextSlider = document.createElement("DIV");
                        nextSlider.id = this.id + "-month-next";
                        nextSlider.insertAdjacentHTML('beforeend', nextSvg);
                        theContainers[i].appendChild(nextSlider);
                    }
                }
            }

            for (var i = 0; i < this.labels.length; i++) {
                theLabel = document.createElement("SPAN");
                theLabel.id = this.id + "-label-" + (i + 1);
                theLabel.appendChild(document.createTextNode(this.labels[i]));

                theContainers[2].appendChild(theLabel);
            }

            theRows = [], theDays = [], theRadios = [];
            for (var i = 0; i < 6; i++) {
                theRows[i] = document.createElement("DIV");
                theRows[i].className = "row";
            }

            for (var i = 0, j = 0; i < 42; i++) {
                theRadios[i] = document.createElement("INPUT");
                theRadios[i].className = "day-radios";
                theRadios[i].type = "radio";
                theRadios[i].name = this.id + "-day-radios";
                theRadios[i].id = this.id + "-day-radio-" + (i + 1);

                theDays[i] = document.createElement("LABEL");
                theDays[i].className = "day";
                theDays[i].htmlFor = this.id + "-day-radio-" + (i + 1);
                theDays[i].id = this.id + "-day-" + (i + 1);
//      theDays[i].id ="day";

                theText = document.createElement("SPAN");
                theText.id = this.id + "-day-num-" + (i + 1);

                theDays[i].appendChild(theText);

                theRows[j].appendChild(theRadios[i]);
                theRows[j].appendChild(theDays[i]);

                if ((i + 1) % 7 == 0) {
                    j++;
                }
            }

            for (var i = 0; i < 6; i++) {
                theContainers[3].appendChild(theRows[i]);
            }

            for (var i = 0; i < theContainers.length; i++) {
                theCalendar.appendChild(theContainers[i]);
            }

            document.getElementById(this.id).appendChild(theCalendar);
        }

        Calendar.prototype.update = function () {
            document.getElementById(this.id + '-year').innerHTML = this.date.getFullYear();
            document.getElementById(this.id + '-month').innerHTML = months[this.date.getMonth()];

            for (i = 1; i <= 42; i++) {
                document.getElementById(this.id + '-day-num-' + i).innerHTML = "";
                document.getElementById(this.id + '-day-' + i).className = this.id + " day";
            }

            firstDay = new Date(this.date.getFullYear(), this.date.getMonth(), 1).getDay();
            lastDay = new Date((this.date.getMonth() + 1 > 11) ? this.date.getFullYear() + 1 : this.date.getFullYear(), (this.date.getMonth() + 1 > 12) ? 0 : this.date.getMonth() + 1, 0).getDate();

            previousLastDay = new Date((this.date.getMonth() < 0) ? this.date.getFullYear() - 1 : this.date.getFullYear(), (this.date.getMonth() < 0) ? 11 : this.date.getMonth(), 0).getDate();

            if (firstDay != 0)
                for (i = 0, j = previousLastDay; i < this.label.indexOf(label[firstDay]); i++, j--) {
                    document.getElementById(this.id + '-day-num-' + (1 + i)).innerHTML = j;
                    document.getElementById(this.id + '-day-' + (1 + i)).className = this.id + " day diluted";
                }

            for (i = 1; i <= lastDay; i++) {
                document.getElementById(this.id + '-day-num-' + (this.label.indexOf(label[firstDay]) + i)).innerHTML = i;
                if (i == this.date.getDate())
                    document.getElementById(this.id + '-day-radio-' + (this.label.indexOf(label[firstDay]) + i)).checked = true;
            }

            for (i = lastDay + 1, j = 1; (this.label.indexOf(label[firstDay]) + i) <= 42; i++, j++) {
                document.getElementById(this.id + '-day-num-' + (this.label.indexOf(label[firstDay]) + i)).innerHTML = j;
                document.getElementById(this.id + '-day-' + (this.label.indexOf(label[firstDay]) + i)).className = this.id + " day diluted";
            }
        }

        function Organizer(id, calendar) {
            this.id = id;
            this.calendar = calendar;

            this.draw();
            this.update();
        }

        Organizer.prototype = {
            constructor: Organizer,
            back: function (func) {
                date = this.calendar.date;
                lastDay = new Date((date.getMonth() + 1 > 11) ? date.getFullYear() + 1 : date.getFullYear(), (date.getMonth() + 1 > 12) ? 0 : date.getMonth() + 1, 0).getDate();
                previousLastDay = new Date((date.getMonth() < 0) ? date.getFullYear() - 1 : date.getFullYear(), (date.getMonth() < 0) ? 11 : date.getMonth(), 0).getDate();

                if (func == "day") {
                    if (date.getDate() != 1) {
                        this.changeDateTo(date.getDate() - 1);
                    } else {
                        this.back('month');
                        this.changeDateTo(lastDay);
                    }
                } else {
                    if (func == "month") {
                        if (date.getDate() > previousLastDay) {
                            this.changeDateTo(previousLastDay);
                        }
                        if (date.getMonth() != 0)
                            date.setMonth(date.getMonth() - 1);
                        else {
                            date.setMonth(11);
                            date.setFullYear(date.getFullYear() - 1);
                        }
                    } else
                        date.setFullYear(date.getFullYear() - 1);
                }

                this.calendar.update();
                this.update();
            },
            next: function (func) {
                date = this.calendar.date;
                lastDay = new Date((date.getMonth() + 1 > 11) ? date.getFullYear() + 1 : date.getFullYear(), (date.getMonth() + 1 > 12) ? 0 : date.getMonth() + 1, 0).getDate();
                soonLastDay = new Date((date.getMonth() + 2 > 11) ? date.getFullYear() + 1 : date.getFullYear(), (date.getMonth() + 2 > 12) ? 0 : date.getMonth() + 2, 0).getDate();

                if (func == "day") {
                    if (date.getDate() != lastDay) {
                        date.setDate(date.getDate() + 1);
                    } else {
                        this.next('month');
                        date.setDate(1);
                    }
                } else {
                    if (func == "month") {
                        if (date.getDate() > soonLastDay) {
                            this.changeDateTo(soonLastDay);
                        }
                        if (date.getMonth() != 11)
                            date.setMonth(date.getMonth() + 1);
                        else {
                            date.setMonth(0);
                            date.setFullYear(date.getFullYear() + 1);
                        }
                    } else
                        date.setFullYear(date.getFullYear() + 1);
                }

                this.calendar.update();
                this.update();
            },
            changeDateTo: function (theDay, theBlock) {
                if ((theBlock >= 31 && theDay <= 11) || (theBlock <= 6 && theDay >= 8)) {
                    if (theBlock >= 31 && theDay <= 11)
                        this.next('month');
                    else if (theBlock <= 6 && theDay >= 8)
                        this.back('month');
                }
                this.calendar.date.setDate(theDay);
                this.calendar.update();
                this.update();
                calendar = this.calendar;
                setTimeout(function () {
                    calendar.update();
                }, 10);
            }
        }

        Organizer.prototype.draw = function () {
            backSvg = '<svg style="width: 24px; height: 24px;" viewBox="0 0 24 24"><path fill="' + this.calendar.colors[3] + '" d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z"></path></svg>';
            nextSvg = '<svg style="width: 24px; height: 24px;" viewBox="0 0 24 24"><path fill="' + this.calendar.colors[3] + '" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z"></path></svg>';

            theOrganizer = document.createElement("DIV");
            theOrganizer.className = "events " + this.calendar.size;

            theDate = document.createElement("DIV");
            theDate.className = "date";
            theDate.style.backgroundColor = this.calendar.colors[1];
            theDate.style.color = this.calendar.colors[3];

            backSlider = document.createElement("DIV");
            backSlider.id = this.id + "-day-back";
            backSlider.insertAdjacentHTML('beforeend', backSvg);
            theDate.appendChild(backSlider);

            theText = document.createElement("SPAN");
            theText.id = this.id + "-date";
            theDate.appendChild(theText);

            nextSlider = document.createElement("DIV");
            nextSlider.id = this.id + "-day-next";
            nextSlider.insertAdjacentHTML('beforeend', nextSvg);
            theDate.appendChild(nextSlider);

            theRows = document.createElement("DIV");
            theRows.className = "rows";

            theList = document.createElement("OL");
            theList.className = "list";
            theList.id = this.id + "-list";

            theRows.appendChild(theList);

            theOrganizer.appendChild(theDate);
            theOrganizer.appendChild(theRows);

            document.getElementById(this.id).appendChild(theOrganizer);
        }

        Organizer.prototype.update = function () {
            document.getElementById(this.id + "-date").innerHTML = this.calendar.months[this.calendar.date.getMonth()] + " " + this.calendar.date.getDate() + ", " + this.calendar.date.getFullYear();
            document.getElementById(this.id + "-list").innerHTML = "";
        }

        Organizer.prototype.list = function (data) {
            document.getElementById(this.id + "-list").innerHTML = "";

            content = "";
            for (var i = 0; i < data.length; i++) {
                content += '<li id="' + this.id + '-list-item-' + i + '"><div><span class="' + this.id + ' time" id="' + this.id + '-list-item-' + i + '-time">' + data[i].startTime + ' - ' + data[i].endTime + '</span><span class="' + this.id + ' m" id="' + this.id + '-list-item-' + i + '-m">' + data[i].mTime + '</span></div><p style="display: flex; justify-content: space-between;" id="' + this.id + '-list-item-' + i + '-text">' + data[i].text + '</p></li>';
            }

            document.getElementById(this.id + "-list").innerHTML = content;
        }

        Organizer.prototype.setupBlock = function (blockId, theOrganizer, callback) {
            document.getElementById(calendarId + "-day-" + blockId).addEventListener('click', function () {
                if (document.getElementById(calendarId + "-day-num-" + blockId).innerHTML.length > 0) {
                    theOrganizer.changeDateTo(document.getElementById(calendarId + "-day-num-" + blockId).innerHTML, blockId);
                    callback();
                }
            });
        }

        Organizer.prototype.setOnClickListener = function (theCase, backCallback, nextCallback) {
            calendarId = this.calendar.id;
            organizerId = this.id;

            theOrganizer = this;

            switch (theCase) {
                case "days-blocks":
                    for (i = 1; i <= 42; i++) {
                        theOrganizer.setupBlock(i, theOrganizer, backCallback);
                    }
                    break;
                case "day-slider":
                    document.getElementById(organizerId + "-day-back").addEventListener('click', function () {
                        theOrganizer.back('day');
                        backCallback();
                    });
                    document.getElementById(organizerId + "-day-next").addEventListener('click', function () {
                        theOrganizer.next('day');
                        nextCallback();
                    });
                    break;
                case "month-slider":
                    document.getElementById(calendarId + "-month-back").addEventListener('click', function () {
                        theOrganizer.back('month');
                        backCallback();
                    });
                    document.getElementById(calendarId + "-month-next").addEventListener('click', function () {
                        theOrganizer.next('month');
                        nextCallback();
                    });
                    break;
                case "year-slider":
                    document.getElementById(calendarId + "-year-back").addEventListener('click', function () {
                        theOrganizer.back('year');
                        backCallback();
                    });
                    document.getElementById(calendarId + "-year-next").addEventListener('click', function () {
                        theOrganizer.next('year');
                        nextCallback();
                    });
                    break;
            }
        };

        // end of library
        // full tutorial on how to use it is on GitHub
        // https://github.com/nizarmah/Calendar-Javascript-Library/blob/master/README.md

        /* end of library; everything is explained below; i'm sorry for the messy code and my bad practices; please criticise me */

        var calendar = new Calendar("calendarContainer", "small", ["Wednesday", 3], ["#e91e63", "#c2185b", "#ffffff", "#f8bbd0"]);
        var organizer = new Organizer("organizerContainer", calendar);

        currentDay = calendar.date.getDate(); // used this in order to make anyday today depending on the current today

        // my best way of organizing data, maybe that can be the outcome of joining multiple tables in the database and then parsing them in such a manner, easier for the person to push use a date and the events of it
        data = {
            years: [
                {
                    int: 1999,
                    months: [
                        {
                            int: 4,
                            days: [
                                {
                                    int: 28,
                                    events: [
                                        {
                                            startTime: "6:00",
                                            endTime: "6:30",
                                            mTime: "pm",
                                            text: "Weirdo was born"
                                        }
                                    ]
                                }
                            ]
                        }
                    ]
                },
                {
                    int: (new Date().getFullYear()),
                    months: [
                        {
                            int: (new Date().getMonth() + 1),
                            days: [
                                {
                                    int: (new Date().getDate()),
                                    events: [
                                        {
                                            startTime: "6:00",
                                            endTime: "7:00",
                                            mTime: "am",
                                            text: "This is scheduled to show today, anyday. <button class='btn btn-primary' style='font-size: 14px; padding: 2px 5px;'>select</button>"
                                        },
                                        {
                                            startTime: "5:45",
                                            endTime: "7:15",
                                            mTime: "pm",
                                            text: "WIP Library <button class='btn btn-primary' style='font-size: 14px; padding: 3px; right: 0px;'>booked</button>"
                                        },
                                        {
                                            startTime: "10:00",
                                            endTime: "11:00",
                                            mTime: "pm",
                                            text: "Probably won't fix that (time width) <button class='btn btn-primary' style='font-size: 14px; padding: 2px 5px;'>select</button>"
                                        },
                                        {
                                            startTime: "8:00",
                                            endTime: "9:00",
                                            mTime: "pm",
                                            text: "Next spam is for demonstration purposes only <button class='btn btn-primary' style='font-size: 14px; padding: 3px; right: 0px;'>booked</button>"
                                        },
                                        {
                                            startTime: "5:45",
                                            endTime: "7:15",
                                            mTime: "pm",
                                            text: "WIP Library <button class='btn btn-primary' style='font-size: 14px; padding: 2px 5px;'>select</button>"
                                        },
                                        {
                                            startTime: "10:00",
                                            endTime: "11:00",
                                            mTime: "pm",
                                            text: "Probably won't fix that (time width)"
                                        },
                                        {
                                            startTime: "5:45",
                                            endTime: "7:15",
                                            mTime: "pm",
                                            text: "WIP Library"
                                        },
                                        {
                                            startTime: "10:00",
                                            endTime: "11:00",
                                            mTime: "pm",
                                            text: "Probably won't fix that (time width)"
                                        },
                                        {
                                            startTime: "5:45",
                                            endTime: "7:15",
                                            mTime: "pm",
                                            text: "WIP Library"
                                        },
                                        {
                                            startTime: "10:00",
                                            endTime: "11:00",
                                            mTime: "pm",
                                            text: "Probably won't fix that (time width)"
                                        },
                                        {
                                            startTime: "5:45",
                                            endTime: "7:15",
                                            mTime: "pm",
                                            text: "WIP Library"
                                        },
                                        {
                                            startTime: "10:00",
                                            endTime: "11:00",
                                            mTime: "pm",
                                            text: "Probably won't fix that (time width)"
                                        },
                                        {
                                            startTime: "5:45",
                                            endTime: "7:15",
                                            mTime: "pm",
                                            text: "WIP Library"
                                        },
                                        {
                                            startTime: "10:00",
                                            endTime: "11:00",
                                            mTime: "pm",
                                            text: "Probably won't fix that (time width)"

                                        }
                                    ]
                                }
                            ]
                        }
                    ]
                }
            ]
        };

        function showEvents() {
            theYear = -1, theMonth = -1, theDay = -1;
            for (i = 0; i < data.years.length; i++) {
                if (calendar.date.getFullYear() == data.years[i].int) {
                    theYear = i;
                    break;
                }
            }
            if (theYear == -1) return;
            for (i = 0; i < data.years[theYear].months.length; i++) {
                if ((calendar.date.getMonth() + 1) == data.years[theYear].months[i].int) {
                    theMonth = i;
                    break;
                }
            }
            if (theMonth == -1) return;
            for (i = 0; i < data.years[theYear].months[theMonth].days.length; i++) {
                if (calendar.date.getDate() == data.years[theYear].months[theMonth].days[i].int) {
                    theDay = i;
                    break;
                }
            }
            if (theDay == -1) return;
            theEvents = data.years[theYear].months[theMonth].days[theDay].events;
            organizer.list(theEvents); // what's responsible for listing
        }

        showEvents();

        organizer.setOnClickListener('day-slider', function () {
            showEvents();
            console.log("Day back slider clicked");
        }, function () {
            showEvents();
            console.log("Day next slider clicked");
        });
        organizer.setOnClickListener('days-blocks', function () {
            showEvents();
            console.log("Day block clicked");
        }, null);
        organizer.setOnClickListener('month-slider', function () {
            showEvents();
            console.log("Month back slider clicked");
        }, function () {
            showEvents();
            console.log("Month next slider clicked");
        });
        organizer.setOnClickListener('year-slider', function () {
            showEvents();
            console.log("Year back slider clicked");
        }, function () {
            showEvents();
            console.log("Year next slider clicked");
        });

        //    $(".unlike").click(function(){
        //        $(".unlike").hide();
        //        $(".like").show();
        //    });
        //    $(".like").click(function(){
        //        $(".like").hide();
        //        $(".unlike").show();
        //    });
    </script>
@endsection
