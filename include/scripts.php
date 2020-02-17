<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/fullcalendar/main.min.js"></script>
<script src="plugins/fullcalendar-daygrid/main.min.js"></script>
<script src="plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="plugins/fullcalendar-interaction/main.min.js"></script>
<script src="plugins/fullcalendar-bootstrap/main.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
      m    = date.getMonth(),
      y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        console.log(eventEl);
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };
      }
    });

    var eventsFromDB = <?php echo $events; ?>;
    var apartmentId = <?php echo $apartmentId; ?>;


    var calendar = new Calendar(calendarEl, {
      plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month'
      },

      events    : eventsFromDB,
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      eventDurationEditable: true,
      eventReceive: function(info){   // this triggers when an event is dropped on the calendar
        $.ajax({
          url: '/apartmaniAdmin/controllers/eventCreate.php',
          type: 'POST',
          data: {
            title: info.event.title,
            start: info.event.start.toISOString(),
            end: info.event.end,
            backgroundColor: info.event.backgroundColor,
            borderColor: info.event.borderColor,
            apartmentId: apartmentId,
          },
          success: function (res) {
            location.reload(true);
            console.log('ajax je uspio');

          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
            console.log(errorThrown);
          }

        });
      },

      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      },
      eventDrop: function(info) {
        var endEvent;
        var eventNew = calendar.getEventById(info.event.id);
        if(info.event.end == null){
          endEvent = null;
        } else {
          endEvent = eventNew.end.toISOString();
        }

        /*
        console.log('end novog kalendara: ' + eventNew.end);
        console.log('event start: ' +  info.event.start);
        console.log('event start ISO: ' + info.event.start.toISOString());
        console.log('endEvent custom: ' + endEvent);
        console.log('end normal: ' + info.event.end);
        console.log('id: ' + info.event.id);
        console.log('apartmentId: ' + apartmentId);
        */

        $.ajax({
          url: '/apartmaniAdmin/controllers/eventUpdate.php',
          type: 'POST',
          data: {
            start: info.event.start.toISOString(),
            end: endEvent,
            id: info.event.id,
            apartmentId: apartmentId,
          },
          success: function (res) {
            console.log('ajax je uspio');

          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
            console.log(errorThrown);
          }

        });

        /*
        alert(info.event.title + " was dropped on " + info.event.start.toISOString());

        if (!confirm("Are you sure about this change?")) {
          info.revert();
        }
        */
      },
      eventRecieve: function(info) {
        console.log('eventRecieve je aktiviran');
      },
      eventClick: function(info) {
       if(confirm("Are you sure you want to DELETE: " + info.event.title)) {

          info.event.remove();

          $.ajax({
             url: '/apartmaniAdmin/controllers/eventDelete.php',
             type: 'POST',
             data: {
               id: info.event.id
             },
             success: function (res) {
               console.log('ajax je uspio, event obrisan');
             },
             error: function (jqXHR, textStatus, errorThrown) {
               console.log(textStatus);
               console.log(errorThrown);
             }
          });
       };


      },
      eventResize: function(info) {
        console.log(info.event.start.toISOString());
        console.log(info.event.end.toISOString());
        console.log(info.event);
        console.log(apartmentId);
        $.ajax({
          url: '/apartmaniAdmin/controllers/eventUpdate.php',
          type: 'POST',
          data: {
            start: info.event.start.toISOString(),
            end: info.event.end.toISOString(),
            id: info.event.id,
            apartmentId: apartmentId,
          },
          success: function (res) {
            console.log('ajax je uspio');

          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
            console.log(errorThrown);
          }
        });
      }
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      ini_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  })
</script>
