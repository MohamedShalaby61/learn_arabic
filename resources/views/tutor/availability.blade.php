@extends('layouts.app')
@section('calender')
 <link href="{{ asset('css/calendar_avilable.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

  <!-- main body -->
  <div class="main">

    <!-- innerpages-header  -->
    <div class="innerpages-top all-courses">
      @include('layouts.msg')
    <div id="calendar-box">
      <style>
        .alert{
          padding-top: 25px;
        }
      </style>
    <div class="col-xs-12 calendar-box-tops red-box" id="calendar-left-box">
      <p class="left-box-element" id="date-display">13</p>
      <p class="left-box-element" id="day-display">Wednesday</p>
      
      <div id="todo-box">
        <ul>
          <li id="li1">
                
          </li>
        </ul>
      </div>
    </div><!--calendar-left-box-->
    
    <div class="calendar-box-tops red-box" id="todo-list-window">
      
     
      <div class="window-lists" id="window-list-box">
        <h3 id="window-date">2019년&nbsp&nbsp7월&nbsp&nbsp7일</h3>
        <ul>
          <li class="window-todo-list" id="window-li-clone">
            
          </li>
        </ul>
      </div>
    
    
    </div>

    <div class=" col-xs-12 calendar-box-tops cal-mg" id="calendar-right-box">
      
      <div id="right-box-top-container">
        <p class="arrow" id="left-arrow">&#60;</p>
        <p id="month-year-display">February 2019</p>
        <p class="arrow" id="right-arrow">&#62;</p>
      </div><!--right-box-top-container-->

      <div id="right-box-bottom-container">
        <ul class="day-list">
          <li class="day">Sun</li>
          <li class="day">Mon</li>
          <li class="day">Tue</li>
          <li class="day">Wed</li>
          <li class="day">Thu</li>
          <li class="day">Fri</li>
          <li class="day">Sat</li>
        </ul>
      </div><!--right-box-top-container-->
      <div id="day-number-box">
        <ul class="day-list">
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
          <li class="day">
            <p></p>
            <img id="dot" src="" alt="">
          </li>
        </ul>
      </div>
    </div><!--canlendar-right-box-->
  </div><!--calendar-box-->
  <div id="btn-container" style="display: none;">
    <button class="additional-btn" id="calandar-btn">@lang('tutor-availability.calendar')</button>
    <button class="additional-btn todo-window-btn"id="all-btn">@lang('tutor-availability.all')</button>
    <button class="additional-btn todo-window-btn" id="active-btn">@lang('tutor-availability.active')</button>
    <button class="additional-btn todo-window-btn" id="completed-btn">@lang('tutor-availability.completed')</button>
  </div>
  
    </div>
  </div>
@endsection