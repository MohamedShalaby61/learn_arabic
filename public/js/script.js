// scripts by Mona Ashmawey UI/UX developer for Arabic Mentors .
$(document).ready(function(){
    $(".clk-tutor").click(function(){
       $(".tut_info").show(); 
    });
    $(".clk-student").click(function(){
       $(".tut_info").hide(); 
    });
    // Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });
});
//change header color when scroll
$(window).scroll(function() {
  if ($(document).scrollTop() > 100) {
    $("nav").addClass("scrolled");
  } else {
    $("nav").removeClass("scrolled");
  }
});

//====================== caledar student ==========================
var currentDate = $('.calendar').fullCalendar('getDate');
function GetCalendarDateRange() {
    var calendar = $('.calendar').fullCalendar('getCalendar');
    var view = calendar.view;
    var start = view.start._d;
    var end = view.end._d;
    var dates = { start: start, end: end };
    return dates;
}
var events = [];
var getUrl = window.location;
var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
var date=new Date();
$('.calendar').fullCalendar({
  eventClick: function(event) {
    $("#fullCalModal").dialog({
      modal: true,
      title: event.title,
      width: 350
    });
  },

  header: {
    left: 'prev,next today',
    center: 'title',
    right: 'month,agendaWeek,agendaDay,listWeek'
  },

  editable: true,
  droppable: true, // this allows things to be dropped onto the calendar
  // drop: function() {
  //   // is the "remove after drop" checkbox checked?
  //   if ($('#drop-remove').is(':checked')) {
  //     // if so, remove the element from the "Draggable Events" list
  //     $(this).remove();
  //   }
  // }
  defaultDate:date,
  navLinks: true, // can click day/week names to navigate views
  editable: false,
  eventLimit: true, // allow "more" link when too many events
  // events: '/hackyjson/cal/',
  eventClick: function(event, jsEvent, view) {
    $('#modalTitle').html(event.title);
    $('#modalBody').html(event.description);
    $('#eventUrl').attr('href', event.url);
    $('#fullCalModal').modal();
  },

    events: function( start, end, timezone, callback ) { //include the parameters fullCalendar supplies to you!
        jQuery.ajax({
            url: siteUrl + 'tutor/time/',
            type: 'GET',
            dataType: 'json',
            data: '',
            success: function (doc) {
                if (doc != null) {
                    events=[];
                    $.each(doc,function(key,element) {
                        console.log(element);
                        
                        studentName = '';
                        if (element.booked_user) {
                            studentName = element.booked_user.name;
                        }
                        
                        events.push({
                            title: element.from +' - '+element.to,
                            start: element.date,
                            description: '<div class="row"><div class="col-md-8"><ul class="list-group"><li class="list-group-item"><div class="row"><div class="col-md-5"><b>'+ customLang['date'] + ':</b></div><div class="col-md-7"><span>'+element.date +'</span></div></div></li><li class="list-group-item"><div class="row"><div class="col-md-5"><b>'+ customLang['course_time'] + ':</b></div><div class="col-md-7"><span>'+element.from +' - '+element.to +'</span></div></div></li><li class="list-group-item"><div class="row"><div class="col-md-5"><b>'+ customLang['student'] + '</b></div><div class="col-md-7"><span>' + studentName + '</span></div></div></li></ul></div></div><div class="row mt-5 text-center justify-content-center"><div class="col-md-6"><a href="' + siteUrl + 'cancel/time/'+ element.id+'"   class="btn btn-primary">' + customLang['cancel_time'] + '</a></div></div>',
                            // end: element.from
                        });
                    });
                    // console.log(events);
                    // console.log(new GetCalendarDateRange());
                }

                callback(events); //you have to pass the list of events to fullCalendar!
            }
        });
    },

});

//===================== course calendar =======================
$('.course-calendar').fullCalendar({
    eventClick: function(event) {
        $("#fullCalModal").dialog({
            modal: true,
            title: event.title,
            width: 350
        });
    },
  header: {
    left: 'prev,next today',
    center: 'title',
    right: 'month,listWeek'
  },
  editable: true,
  droppable: true, // this allows things to be dropped onto the calendar
  // drop: function() {
  //   // is the "remove after drop" checkbox checked?
  //   if ($('#drop-remove').is(':checked')) {
  //     // if so, remove the element from the "Draggable Events" list
  //     $(this).remove();
  //   }
  // }
  defaultDate: date,
  navLinks: true, // can click day/week names to navigate views
  editable: false,
  eventLimit: true, // allow "more" link when too many events
    eventClick: function(event, jsEvent, view) {
        $('#modalTitle').html(event.title);
        $('#modalBody').html(event.description);
        $('#eventUrl').attr('href', event.url);
        $('#fullCalModal').modal();
    },
    events: function( start, end, timezone, callback ) { //include the parameters fullCalendar supplies to you!
        jQuery.ajax({
            url: '/student/time/',
            type: 'GET',
            dataType: 'json',
            data: '',
            success: function (doc) {
                if (doc != null) {
                    events=[];
                    $.each(doc,function(key,element) {
                        console.log(element);
                        events.push({
                            title: element.date,
                            start: element.date,
                            description: '<div class="row"><div class="col-md-8"><ul class="list-group"><li class="list-group-item"><div class="row"><div class="col-md-6"><b>date:</b></div><div class="col-md-6"><span>'+element.date +'</span></div></div></li><li class="list-group-item"><div class="row"><div class="col-md-5"><b>Course time:</b></div><div class="col-md-7"><span>'+element.from +' - '+element.to +'</span></div></div></li><li class="list-group-item"><div class="row"><div class="col-md-5"><b>Tutor</b></div><div class="col-md-7"><span>'+element.tutor.name +'</span></div></div></li></ul></div></div><div class="row mt-5 text-center justify-content-center"><div class="col-md-6"><a href="/cancel/student/time/'+ element.id+'"   class="btn btn-primary">Cancel Time</a></div></div>',
                            // end: element.from
                        });
                    });
                    // console.log(events);
                    // console.log(new GetCalendarDateRange());
                }

                callback(events); //you have to pass the list of events to fullCalendar!
            }
        });
    },



  // events: [{
  //     title: 'All Day Event',
  //     start: '2017-10-01',
  //   },
  //   {
  //     title: 'Long Event',
  //     start: '2017-10-07',
  //     end: '2017-10-10'
  //   },
  //   {
  //     id: 999,
  //     title: 'Repeating Event',
  //     start: '2017-10-09T16:00:00'
  //   },
  //   {
  //     id: 999,
  //     title: 'Repeating Event',
  //     start: '2017-10-16T16:00:00'
  //   },
  //   {
  //     title: 'Conference',
  //     start: '2017-10-11',
  //     end: '2017-10-13'
  //   },
  //   {
  //     title: 'Meeting',
  //     start: '2017-10-12T10:30:00',
  //     end: '2017-10-12T12:30:00'
  //   },
  //   {
  //     title: 'Lunch',
  //     start: '2017-10-12T12:00:00'
  //   },
  //   {
  //     title: 'Meeting',
  //     start: '2017-10-12T14:30:00'
  //   },
  //   {
  //     title: 'Happy Hour',
  //     start: '2017-10-12T17:30:00'
  //   },
  //   {
  //     title: 'Dinner',
  //     start: '2017-10-12T20:00:00'
  //   },
  //   {
  //     title: 'Birthday Party',
  //     start: '2017-10-13T07:00:00'
  //   },
  //   {
  //     title: 'Click for Google',
  //     url: 'http://google.com/',
  //     start: '2017-10-28'
  //   }
  // ]
});

//============================ calndar teacher ===========================

/* initialize the external events
-----------------------------------------------------------------*/

$('#external-events .fc-event').each(function() {

  // store data so the calendar knows to render an event upon drop
  $(this).data('event', {
    title: $.trim($(this).text()), // use the element's text as the event title
    stick: true // maintain when user navigates (see docs on the renderEvent method)
  });


  // make the event draggable using jQuery UI
  $(this).draggable({
    zIndex: 999,
    revert: true, // will cause the event to go back to its
    revertDuration: 0 //  original position after the drag
  });


});


/* initialize the calendar
-----------------------------------------------------------------*/

$('.calendar-teacher').fullCalendar({

  header: {
    left: 'prev,next today',
    center: 'title',
    right: 'month,agendaWeek,agendaDay'
  },
  editable: true,
  droppable: true, // this allows things to be dropped onto the calendar

  eventRender: function(event, element) {
              element.append( "<span class='closeon fa fa-times'></span>" );
              element.find(".closeon").click(function() {
                 $('.calendar-teacher').fullCalendar('removeEvents',event._id);
              });
          },
  // drop: function() {
  //     // if so, remove the element from the "Draggable Events" list
  //     $(this).remove();
  // }
});
// scroller
// new WOW().init();
new AOS.init();

// rate stars

$(".rateyo").rateYo();


// OwlCarousel

var owl = $('.featured-courses .owl-carousel');
owl.owlCarousel({
  items: 3,
  loop: true,
  margin: 40,
  autoplay: true,
  autoplayTimeout: 4000,
  autoplayHoverPause: true,
  responsiveClass: true,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 2,
      nav: false
    },
    1000: {
      items: 3,
      // nav:true,
      loop: false
    },
    1600: {
      items: 4,
      // nav:true,
      loop: false
    }
  }
});
$('.play').on('click', function() {
  owl.trigger('play.owl.autoplay', [1000])
})
$('.stop').on('click', function() {
  owl.trigger('stop.owl.autoplay')
})

var owl = $('.mentors .owl-carousel');
owl.owlCarousel({
  items: 3,
  margin: 20,
  responsiveClass: true,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 2,
      nav: false
    },
    1000: {
      items: 3,
      // nav:true,
    }
  }
});

var owl = $('.plans .owl-carousel');
owl.owlCarousel({
  items: 3,
  margin: 20,
  responsiveClass: true,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 2,
      nav: false
    },
    1000: {
      items: 3,
      // nav:true,
    }
  }
});

$('.play').on('click', function() {
  owl.trigger('play.owl.autoplay', [1000])
})
$('.stop').on('click', function() {
  owl.trigger('stop.owl.autoplay')
})

var owl = $('.testimonials .owl-carousel');
owl.owlCarousel({
  autoplay: false,
  items: 1,
  loop: true,
  margin: 0,
  nav: true,
  dots: false,
  video: true,
  merge: true,
  // responsiveClass:true,
  //   responsive:{
  //       0:{
  //           items:1,
  //       },
  //       600:{
  //           items:1,
  //           nav:false
  //       },
  //       1000:{
  //           items:1,
  //           nav:true,
  //           loop:false
  //       },
  //       1600:{
  //         items:1,
  //         nav:true,
  //         loop:false
  //       }
  //   }
});
//Colorbox
$(".youtube").click(function() {
  $(this).colorbox({
    iframe: true,
    innerWidth: 640,
    innerHeight: 390
  });
});
$(document).on('cbox_open', function() {
  $(document.body).css('overflow', 'hidden');
}).on('cbox_closed', function() {
  $(document.body).css('overflow', '');
});



//carousel



//animated  carousel start
// $(document).ready(function() {
//
//   //to add  start animation on load for first slide
//   $(function() {
//     $.fn.extend({
//       animateCss: function(animationName) {
//         var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
//         this.addClass('animated ' + animationName).one(animationEnd, function() {
//           $(this).removeClass(animationName);
//         });
//       }
//     });
//     $('.carousel-item.active img').animateCss('fadeInUp');
//     $('.carousel-item.active .title-slider').animateCss('fadeInDown');
//     $('.carousel-item.active .caption-slider').animateCss('fadeInUp');
//
//   });
//
//   //to start animation on  mousescroll , click and swipe
//
//   $("#carouselExampleIndicators").on('slide.bs.carousel', function() {
//     $.fn.extend({
//       animateCss: function(animationName) {
//         var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
//         this.addClass('animated ' + animationName).one(animationEnd, function() {
//           $(this).removeClass(animationName);
//         });
//       }
//     });
//
//     // add animation type  from animate.css on the element which you want to animate
//
//     $('.carousel-item img').animateCss('fadeInUp');
//     $('.carousel-item .title-side').animateCss('fadeInDown');
//     $('.carousel-item h3').animateCss('fadeInUp');
//   });
// });

// search

$('a[href="#search"]').on('click', function(event) {
  event.preventDefault();
  $('#search').addClass('open');
  $('header, .slider_bg, .carousel, .main, footer').addClass("filter");
  $('body').addClass("overflow");
  $('#search > form > input[type="search"]').focus();
});

$('#search, #search button.close').on('click keyup', function(event) {
  if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
    $(this).removeClass('open');
    $('header, .slider_bg, .carousel, .main, footer').removeClass("filter");
    $('body').removeClass("overflow");
  }
});

// filterizr
var filterizd;
if ($('.filtr-container').length) {
	filterizd = $('.filtr-container').filterizr({
	  //options object
	});
}

//change dropdownmto select
$(".view-layout .list-layout").click(function() {
  $(".featured-courses").addClass("listview");
});
$(".view-layout .grid-layout").click(function() {
  $(".featured-courses").removeClass("listview");
});



// grid and listview
$(".dropdown-menu li").click(function() {

});
