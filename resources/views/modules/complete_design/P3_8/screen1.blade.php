@extends('layouts.app')
@section('content')

@push('styles')
@section('title')
    {{trans('messages.sidebar.Dashboard')}} Inmoconnect
@endsection

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">
<link  rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">


<div class="overlay" id="overlay"></div>
<div id="page-content-wrapper" class="main-content-crm b-color-background  min-vh-100">
    <div class="crm-main-content">

        <!-- ////////////////////////////breadcrum///////////////////////////////////// -->
        <div class="empty-search-header">
            <div class="header-title d-flex align-items-center justify-content-between">
                <div class="header-left-breadcrumb d-flex align-items-center">
                    <div class="text-20 lineheight-24 color-primary d-inline-block breadcrumb-bottom font-weight-700 letter-s-36"
                      >My Calendar 
                    </div>
                </div>
                <div class="header-right-button_one d-flex align-items-center gap-3">
                    <div class="header-right-button border-r-8 opacity-5 border-blue width-36 height-36 d-flex justify-content-center align-items-center"
                        data-bs-toggle="modal" data-bs-target="#dataFilterModal">
                        <div class=" icon-To_do_list"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ///////////////////////////end-breadcrum////////////////////////////////////// -->

        <!-- //////////////////////////calender////////////////////////////////////////////// -->
        <div class="row">
            <div class="col-lg-3">
              <div class="border-r-12 b-color-white box-shadow-one   p-15">
                <div class="calender-event mb-20">
                   <div class="color-black text-14 font-weight-700 lineheight-18 mb-3">Event:</div>
                   <div class="c_event-header">
                    <div class="calender_event_one green mb-2">Call</div>
                    <div class="calender_event_one sky mb-2">View</div>
                    <div class="calender_event_one red mb-2">Meeting</div>
                   </div>
                </div>
                <div class="calender-event mb-20">
                   <div class="color-black text-14 font-weight-700 lineheight-18 mb-3">Priority</div>
                   <div class="c_event-header">
                    <div class="calender_event_one  mb-2 orange-color">High Priority</div>
                    <div class="calender_event_one  mb-2 purple-color">Medium Priority</div>
                    <div class="calender_event_one mb-2 light-pink">Low Priority</div>
                   </div>
                </div>
              </div>
            </div>
            <div class="col-lg-9">
               <div class="border-r-12 b-color-white box-shadow-one  calender-dashboard p-10">
                    <div id="calendar"></div>
               </div>
            </div>
        </div>
        <!-- ///////////////////////////////end_calender//////////////////////////////////////// -->
    </div>
</div>


@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale-all.js"></script>

<!-- <script>
    $(document).ready(function() {

$('#calendar').fullCalendar({
  //locale: 'zh-cn',
  header: {
    left: 'prev,next today',
    center: 'title',
    right: 'month,basicWeek,basicDay'
  },
  defaultDate: '2018-03-12',
  navLinks: true, // can click day/week names to navigate views
  editable: true,
  eventLimit: true, // allow "more" link when too many events
  events: [
    {
      title: 'All Day Event',
      start: '2018-03-01'
    },
    {
      title: 'Long Event',
      start: '2018-03-07',
      end: '2018-03-10'
    },
    {
      id: 999,
      title: 'Repeating Event',
      start: '2018-03-09T16:00:00'
    },
    {
      id: 999,
      title: 'Repeating Event',
      start: '2018-03-16T16:00:00'
    },
    {
      title: 'Conference',
      start: '2018-03-11',
      end: '2018-03-13'
    },
    {
      title: 'Meeting',
      start: '2018-03-12T10:30:00',
      end: '2018-03-12T12:30:00'
    },
    {
      title: 'Lunch',
      start: '2018-03-12T12:00:00'
    },
    {
      title: 'Meeting',
      start: '2018-03-12T14:30:00'
    },
    {
      title: 'Happy Hour',
      start: '2018-03-12T17:30:00'
    },
    {
      title: 'Dinner',
      start: '2018-03-12T20:00:00'
    },
    {
      title: 'Birthday Party',
      start: '2018-03-13T07:00:00'
    },
    {
      title: 'Click for Google',
      url: 'http://google.com/',
      start: '2018-03-28'
    }
  ]
});

});
</script> -->
<script>
    var events = [];

var renderPopup = function (jsEvent, start, end, calEvent) {
  var $popup = $('#calendar-popup');
  var $eventForm = $('#event-form');
  $event = $('#event');
  var $selectedElmt = $(jsEvent.target);

  var relativeStartDay = start.calendar(null, { lastDay: '[yesterday]', sameDay: '[today]'});
  var endNextDay = '';

  if(relativeStartDay === 'yesterday') {
    endNextDay = '[Today at] ';
  }
  else if(relativeStartDay === 'today') {
    endNextDay = '[Tomorrow at] ';
  }
  else {
    endNextDay = 'dddd ';
  }

  $('.start-time').html(
    '<p>' + (start.isSameOrBefore(moment()) ? 'Started' : 'Starts') + '</p>'
      + '<time datetime="' + start.format() + '">'
      + start.calendar(null, {
        lastWeek: 'L LT',
        nextWeek: 'dddd LT',
        sameElse: 'L LT'
      })
      + '</time>'
  );
  $('.end-time').html(
    '<p>'
      + (end.isSameOrBefore(moment()) ? 'Ended' : 'Ends')
      + (end.isSame(start, 'day') ? ' at' : '')
      + '</p>'
      + '<time datetime="' + end.format() + '">'
      + end.calendar(start, {
        sameDay: 'LT',
        nextDay: endNextDay + 'LT',
        nextWeek: 'dddd LT',
        sameElse: 'L LT'
      })
      + '</time>'
  );

  if(calEvent) {
    $eventForm.hide();

    $event.children('header').text(calEvent.title);
    $event.find('.location').text(calEvent.location ? calEvent.location : '(No location information.)');
    $event.find('.details').text(calEvent.details ? calEvent.details : '');

    $event.show();
  }
  else {
    $event.hide();
    $('#event-start').val(start.format('YYYY-MM-DD[T]HH:mm'));
    $('#event-end').val(end.format('YYYY-MM-DD[T]HH:mm'));
    $eventForm.show();
  }

  var leftPosition = 0;
  var $prong = $('.prong');
  var prongPos = 0;

  if($selectedElmt.hasClass('fc-highlight')) {
    leftPosition = $selectedElmt.offset().left - $popup.width() + ($selectedElmt.width() / 2);
    if(leftPosition <= 0) {
      leftPosition = 5;
      prongPos = $popup.width() - $selectedElmt.offset().left - 30
    }
    else {
      prongPos = 15;
    }

    $popup.css('left', leftPosition);
    $prong.css({
      'left': '',
      'right': prongPos,
      'float': 'right'
    });
  }
  else {
    leftPosition = jsEvent.originalEvent.pageX - $popup.width()/2;
    if(leftPosition <= 0) {
      leftPosition = 5;
    }
    prongPos = jsEvent.originalEvent.pageX - leftPosition - ($prong.width() * 1.7);

    $popup.css('left', leftPosition);
    $prong.css({
      'left': prongPos,
      'float': 'none',
      'right': ''
    });
  }

  var topPosition = (calEvent ? jsEvent.originalEvent.pageY : $selectedElmt.offset().top) - $popup.height() - 15;

  if((topPosition <= window.pageYOffset)
    && !((topPosition + $popup.height()) > window.innerHeight)) {
      $popup.css('top', jsEvent.originalEvent.pageY + 15);
      $prong.css('top', -($popup.height() + 12))
        .children('div:first-child').removeClass('bottom-prong-dk').addClass('top-prong-dk')
        .next().removeClass('bottom-prong-lt').addClass('top-prong-lt');
  }
  else {
    $popup.css('top', topPosition);
    $prong.css({'top': 0, 'bottom': 0})
      .children('div:first-child').removeClass('top-prong-dk').addClass('bottom-prong-dk')
      .next().removeClass('top-prong-lt').addClass('bottom-prong-lt');
  }

  $popup.show();
  $popup.find('input[type="text"]:first').focus();
}

$(document).ready(function() {
  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay'
    },
    timezone: 'local',
    defaultView: 'agendaWeek',
    allDayDefault: false,
    allDaySlot: false,
    slotEventOverlap: true,
    slotDuration: "01:00:00",
    slotLabelInterval: "01:00:00",
    snapDuration: "00:15:00",
    contentHeight: 700,
    scrollTime :  "8:00:00",
    axisFormat: 'h:mm a',
    timeFormat: 'h:mm A()',
    selectable: true,
    events: function(start, end, timezone, callback) {
      callback(events);
    },
    eventColor: 'red',
    eventClick: function (calEvent, jsEvent) {
      renderPopup(jsEvent, calEvent.start, calEvent.end, calEvent);
    },
    select: function(start, end, jsEvent) {
      renderPopup(jsEvent, start.local(), end.local());
    }
  });

  $('#event-form').on('submit', function(e) {
    e.preventDefault();

    $form = $(e.currentTarget);

    $title = $form.find('input#event-title');
    $location = $form.find('input#event-location');
    $details = $form.find('textarea#event-details');

    events.push({
      title: $title.val(),
      start: $form.find('input#event-start').val(),
      end: $form.find('input#event-end').val(),
      location: $location.val(),
      details: $details.val()
    });

    $title.val('');
    $location.val('');
    $details.val('');

    $form.parent().blur().hide();
    $('#calendar').fullCalendar('refetchEvents');
  });

  //Set hide action for ESC key event
  $('#calendar-popup').on('keydown', function(e) {
    $this = $(this);
    console.log($this);
    if($this.is(':visible') && e.which === 27) {
      $this.blur();
    }
  })
  //Set hide action for lost focus event
  .on('focusout', function(e) {
    $this = $(this);
    if($this.is(':visible') && !$(e.relatedTarget).is('#calendar-popup, #calendar-popup *')) {
      $this.hide();
    }
  });
});

/*** TESTING/DEMO ***/
var date = new Date();
var today = date.getDate();
var month = date.getMonth() + 1;
month = month < 10 ? '0' + month.toString() : month.toString;
var year = date.getFullYear();
var tomorrow = today + 1 < 10 ? '0' + (today + 1).toString() : today + 1; //today not last day
var yesterday = today - 1 < 10 ? '0' + (today - 1).toString() : today - 1; //today not first day
today = today < 10 ? '0' + today.toString() : today;

// events.push(
//   {title: 'test1', start: year + '-' + month + '-' + today + 'T07:00', end: year + '-' + month + '-' + today + 'T10:00', location: 'The Moon', details: 'There will be cheese'},
//   { start: year + '-' + month + '-' + tomorrow + 'T03:00', end: year + '-' + month + '-' + tomorrow + 'T08:00', location: 'The Moon', details: 'There will be cheese'},
//   {title: 'test3', start: year + '-' + month + '-' + yesterday + 'T20:00', end: year + '-' + month + '-' + today + 'T05:00', location: 'The Moon', details: 'There will be cheese'}
// );
/***************/

</script>
   
   @endpush
@endsection