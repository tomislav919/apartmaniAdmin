<!-- jQuery -->
<script src="/apartmaniAdmin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/apartmaniAdmin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="/apartmaniAdmin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="/apartmaniAdmin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/apartmaniAdmin/dist/js/demo.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="/apartmaniAdmin/plugins/moment/moment.min.js"></script>
<script src="/apartmaniAdmin/plugins/fullcalendar/main.min.js"></script>
<script src="/apartmaniAdmin/plugins/fullcalendar-daygrid/main.min.js"></script>
<script src="/apartmaniAdmin/plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="/apartmaniAdmin/plugins/fullcalendar-interaction/main.min.js"></script>
<script src="/apartmaniAdmin/plugins/fullcalendar-bootstrap/main.min.js"></script>
<!-- Page specific script -->


<!-- ------ NAVIGATION  SCRIPT --------- -->
<script>
  let activeApp = <?php echo $apartmentId; ?>;
  activeApp = 'ap' + activeApp;
  console.log(activeApp);
  $('#' + activeApp).addClass('active');
</script>


<!-- ----- CUSTOM ADD DAY SCRIPT ----- -->
<script>
  Date.prototype.addDays = function(days) {
    var date = new Date(this.valueOf());
    date.setDate(date.getDate() + days);
    return date;
  };

  Date.prototype.subtractDays = function(days) {
    var date = new Date(this.valueOf());
    date.setDate(date.getDate() - days);
    return date;
  };
</script>



<!-- ------ CALENDAR SCRIPT --------- -->
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
      timeZone: 'Europe/Zagreb',
      eventReceive: function(info){   // this triggers when an event is dropped on the calendar

        /*
        console.log('element je droppan na calendar');
        console.log(eventsFromDB);
        console.log(calendar.getEvents());
        console.log("OVDJE ZAVRŠAVA PRVI DIO TESTA");
        calendar.getEvents().forEach(element => console.log(element));
        console.log("OVDJE ZAVRŠAVA DRUGI DIO TESTA");
        let arr = calendar.getEvents();
        let len = arr.length;
        console.log('instance id trenutnog elementa je: ' + info.event._instance.instanceId);
        console.log('len var je: ' + len);*/


        let arr = calendar.getEvents();
        let len = arr.length;

        // Provjerava da li trenutni datum prelazi preko drugih datuma (napomena: moze ici na zadnji dan postojeceg datuma)
        let arrEnd;
        let doAjax = true;
        for(let i = 0; i < (len); i++){
          if(!(arr[i]['_instance']['instanceId'] == info.event._instance.instanceId)){
            if (arr[i]['end'] == null){
              arrEnd = null;
            } else {
              arrEnd = arr[i]['end'].subtractDays(1);
            }
            if(arr[i]['start'] <= info.event.start && info.event.start <  arrEnd){
              //nemoj ubaciti u tablicu, izbaci error plači ča god ti paše
              console.log('Ubacujes datum preko drugog datuma');
              info.event.remove();
              doAjax = false;
              break;
            }
            /*
            if(info.event.start > arr[i]['start']){
              console.log('trenutni event ima veći početni datum od: ' + arr[i]['title']);
              console.log('zadani datum : ' + arr[i]['start']);
              var aaa = arr[i]['start'].addDays(2);
              console.log('Prva verzija: ' + aaa);
              //console.log('toISOString metoda: ' + aaa.toISOString());
              console.log('toLocaleString metoda: ' + aaa.toLocaleString());
              console.log('toISOString metoda: ' + aaa.toISOString());
            }*/

            /*console.log('--- THIS INSTANCE ---');
            console.log('arr ins ID: ' + arr[i]['_instance']['instanceId'] + ', info.even inst ID: ' + info.event._instance.instanceId);
            console.log(arr[i]['title']);
            console.log(arr[i]['start']);
            console.log(arr[i]['end']);
            console.log('--------');*/
          } else {
           /* console.log('arr ins ID: ' + arr[i]['_instance']['instanceId'] + ', info.even inst ID: ' + info.event._instance.instanceId);
            console.log('Sada je isti pa nece napravit cons log');*/
            console.log('Datum okej, kralj si');
          }
        }

       if (doAjax == true){
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
           success: function (data) {
             location.reload(true); //ovo za sada mora bit, dok taj id ne rijesim
             //console.log(data); //ID iz baze
             //info.event.id = data;
           },
           error: function (jqXHR, textStatus, errorThrown) {
             console.log('Došlo je do errora u ajax-u');
             console.log(textStatus);
             console.log(errorThrown);
             location.reload(true); //refresh stranice tako da user primjeti da mu fali event, da nebi doslo do overbookinga
           }

         });
       }
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
            console.log('Došlo je do errora u ajax-u');
            location.reload(true); //refresh stranice tako da user primjeti da mu fali event, da nebi doslo do overbookinga
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
         console.log(info.event);
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
               console.log('Došlo je do errora u ajax-u');
               location.reload(true); //refresh stranice tako da user primjeti da mu fali event, da nebi doslo do overbookinga
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
            console.log('Došlo je do errora u ajax-u');
            location.reload(true); //refresh stranice tako da user primjeti da mu fali event, da nebi doslo do overbookinga
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
<!--
//rijesit problem location.reload-a u prvom ajax pozivu uz pomoc data_parent_id koji je id eventa iz baze
eventRender: function (arg) {


              var photo = '<i class="far fa-clock edu-danger-error admin-check-pro" aria-hidden="true"></i>';
              var user_name = '';
              var has_class = '';

              if(!arg.event.extendedProps.user=='')
              {
                /*
                ovo ne brisat, ovako nekako bi trebalo funkcionirat kad bude delalo ćo
                photo = '<img class="img-event" src="../../slike_burza_m/avatari/mini-'+arg.event.extendedProps.user.profil_slika+'">';
                user_name = arg.event.extendedProps.user.name + '<br>';
                has_class = 'has-band';
                */

                has_class = 'has-band';
                switch (arg.event.extendedProps.user.user_id) {
                    case 1:
                        user_name = 'Mamut' + '<br>';
                        photo = '<img class="img-event" src="https://jammeet.com/slike_burza_m/avatari/mini-15573476095jpg.jpg">';
                        break;
                    case 2:
                        user_name = 'Asheraah' + '<br>';
                        photo = '<img class="img-event" src="https://jammeet.com/slike_burza_m/avatari/mini-15582820425732622224826114684382838836574265793839104ojpg.jpg">';
                        break;
                    case 3:
                        user_name = 'Sillycons' + '<br>';
                        photo = '<img class="img-event" src="https://jammeet.com/slike_burza_m/avatari/mini-1555932601coverjpg.jpg">';
                        break;
                }
              }

              arg.el.innerHTML =
                '<div class="fc-content '+has_class+'">'+
                  '<div class="div-left">'+
                    photo+
                  '</div>'+
                  '<div class="div-right">'+
                      '<p>' + user_name + arg.event.title + '</p>'+
                  '</div>'+
                  '<i class="delete-event fa fa-times edu-danger-error admin-check-pro" aria-hidden="true" data-parent_id ="'+arg.event.extendedProps.termin_id+'" data-id="'+arg.event.id+'" data-startdate="'+arg.event.extendedProps.datum_str+'"></i>' +
                '</div>';

             //console.log(arg);
          },

-->
