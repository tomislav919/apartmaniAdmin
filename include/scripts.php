<!-- jQuery -->
<script src="<?=ROOTPATH?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?=ROOTPATH?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="<?=ROOTPATH?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=ROOTPATH?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=ROOTPATH?>/dist/js/demo.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="<?=ROOTPATH?>/plugins/moment/moment.min.js"></script>
<script src="<?=ROOTPATH?>/plugins/fullcalendar/main.min.js"></script>
<script src="<?=ROOTPATH?>/plugins/fullcalendar-daygrid/main.min.js"></script>
<script src="<?=ROOTPATH?>/plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="<?=ROOTPATH?>/plugins/fullcalendar-interaction/main.min.js"></script>
<script src="<?=ROOTPATH?>/plugins/fullcalendar-bootstrap/main.min.js"></script>
<!-- Custom scripts -->
<script src="<?=ROOTPATH?>/js/addDays.js"></script>
<script src="<?=ROOTPATH?>/js/subtractDays.js"></script>



<!-- Page specific script -->

<!-- ------ NAVIGATION  SCRIPT --------- -->
<script>
  let activeApp = <?php echo $apartmentId; ?>;
  activeApp = 'ap' + activeApp;
  console.log(activeApp);
  $('#' + activeApp).addClass('active');
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
    let clickCnt = 0;

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
      firstDay: 6,
      eventReceive: function(info){   // this triggers when an event is dropped on the calendar

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
          } else {
            console.log('Date ok');
          }
        }
       if (doAjax == true){
         $.ajax({
           url: '<?=ROOTPATH?>/controllers/handlers/eventHandler.php',
           type: 'POST',
           data: {
             methodName: 'createEvent',
             title: info.event.title,
             start: info.event.start.toISOString(),
             end: info.event.end,
             backgroundColor: info.event.backgroundColor,
             borderColor: info.event.borderColor,
             apartmentId: apartmentId,
           },
           success: function (data) {
             data = JSON.parse(data);
             if (data.result == 'event created' ){
               info.event.setExtendedProp('idFromDB', data.id);
             } else {
               alert('Rezervacija nije zapisana u bazu, pokušajte ponovno, ako se greška nastavi javljati kontaktirajte administratora!');
               location.reload(true);
             }
           },
           error: function (jqXHR, textStatus, errorThrown) {
             console.log('Došlo je do errora u ajax-u');
             console.log(textStatus);
             console.log(errorThrown);
             alert('Došlo je do greške spremanja rezervacije, molimo Vas da pokušate ponovno');
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
      eventDrop: function(info) {  // Ovo se pokrene kada se event uzme s kalendara i baci natrag na kalendar

        //ovaj dio je dodan jer iz nekog razloga ovdje info.event.end.toISOString() ne radi, ali kad ga dodijelim novoj varijabli najnormalnije funkcionira
        var endEvent;
        var eventNew = calendar.getEventById(info.event.extendedProps.idFromDB);

        if(info.event.end == null){
          endEvent = null;
        } else {
          endEvent = eventNew.end.toISOString();
        }



        let arr = calendar.getEvents();
        let len = arr.length;

        // Provjerava da li trenutni datum prelazi preko drugih datuma (napomena: moze ici na zadnji dan postojeceg datuma)
        let arrStart;
        let arrEnd;
        let doAjax = true;
        for(let i = 0; i < (len); i++){
          if(!(arr[i]['_instance']['instanceId'] == info.event._instance.instanceId)){
            if (arr[i]['end'] == null){
              arrEnd = null;
            } else {
              arrEnd = arr[i]['end'].subtractDays(1);
            }
            arrStart = arr[i]['start'].addDays(1);

            //provjerava da li se pocetak rezervacije koju drzi preklapa sa rezervacijom prije i dopušta joj da se preklapa 1 dan
            if(arr[i]['start'] <= info.event.start && info.event.start <  arrEnd){
              //nemoj ubaciti u tablicu
              console.log('Ubacujes rezervaciju preko rezervacije koja se nalazi prije');
              info.revert();
              doAjax = false;
              break;
            }
            //provjera da li se kraj rezervacije koju drzi preklapa sa rezervacijom poslije i dopušta joj da se preklapa 1 dan
            if(info.event.start <= arr[i]['start'] && info.event.end > arrStart){
              //nemoj ubaciti u tablicu
              console.log('Ubacujes rezervaciju preko rezervacije koja se nalazi poslije');
              info.revert();
              doAjax = false;
              break;
            }
          } else {
            console.log('Date ok');
          }
        }

        if(doAjax == true){
          $.ajax({
            url: '<?=ROOTPATH?>/controllers/handlers/eventHandler.php',
            type: 'POST',
            data: {
              methodName: 'eventUpdate',
              title: info.event.title,
              start: info.event.start.toISOString(),
              end: endEvent,
              id: info.event.extendedProps.idFromDB,
              apartmentId: apartmentId,
            },
            success: function (data) {
              data = JSON.parse(data);
              if (data == 'event updated' ){
                console.log('Event updated!');
              } else {
                alert('Rezervacija nije zapisana u bazu, pokušajte ponovno, ako se greška nastavi javljati kontaktirajte administratora!');
                location.reload(true);
              }
            },
            error: function (jqXHR, textStatus, errorThrown) {
              console.log(textStatus);
              console.log(errorThrown);
              console.log('Došlo je do errora u ajax-u');
              alert('Došlo je do greške spremanja rezervacije, molimo Vas da pokušate ponovno');
              location.reload(true); //refresh stranice tako da user primjeti da mu fali event, da nebi doslo do overbookinga
            }
          });
        }

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


      eventClick:  function(info) { //Modal options

        $('textarea#modalTitle').val(info.event.title);
        $('textarea#modalBody').val(info.event.extendedProps.description);
        $('#calendarModal').modal();


        //function for delete button
        $('#deleteButton').unbind( "click" ).click(function(){
          if(confirm("Are you sure you want to DELETE reservation: " + info.event.title + info.event.extendedProps.idFromDB)) {

            $('#calendarModal').modal('hide');
            $.ajax({
              url: '<?=ROOTPATH?>/controllers/handlers/eventHandler.php',
              type: 'POST',
              data: {
                methodName: 'eventDelete',
                id: info.event.extendedProps.idFromDB
              },
              success: function (res) {
                info.event.remove();
                console.log('ajax je uspio, event obrisan');
              },
              error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
                console.log(errorThrown);
                console.log('Došlo je do errora u ajax-u');
                alert('Došlo je do greške kod brisanja rezervacije, molimo Vas da pokušate ponovno');
                location.reload(true); // Refresh stranice tako da user primjeti da mu fali event, da nebi doslo do overbookinga
              }
            });
          }
        });

        //function for save button
        $('#saveButton').unbind( "click" ).click(function(){

            $('#calendarModal').modal('hide');
            let newTitle = $('textarea#modalTitle').val();
            let newDescription = $('textarea#modalBody').val();

            info.event.setProp('title', newTitle );
            info.event.setExtendedProp('description', newDescription);

            $.ajax({
              url: '<?=ROOTPATH?>/controllers/handlers/eventHandler.php',
              type: 'POST',
              data: {
                methodName: 'eventUpdateDescription',
                id: info.event.extendedProps.idFromDB,
                title: newTitle,
                description: newDescription
              },
              success: function (data) {
                data = JSON.parse(data);
                if (data == 'event updated' ){
                  console.log('Event updated!');
                } else {
                  alert('Rezervaciji nije promijenjen datum, pokušajte ponovno, ako se greška nastavi javljati kontaktirajte administratora!');
                  location.reload(true);
                }
              },
              error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
                console.log(errorThrown);
                console.log('Došlo je do errora u ajax-u');
                alert('Došlo je do greške kod brisanja rezervacije, molimo Vas da pokušate ponovno');
                location.reload(true); // Refresh stranice tako da user primjeti da mu fali event, da nebi doslo do overbookinga
              }
            });

        });
      },


      eventResize: function(info) { // Ovo se pokrene kada se eventu doda ili smanji broj dana

        // Provjerava da li trenutni datum prelazi preko drugih datuma (napomena: moze ici na prvi dan slijedece rezervacije)
        let arr = calendar.getEvents();
        let arrStart;
        let len = arr.length;
        let doAjax = true;
        for(let i = 0; i < (len); i++){
          if(!(arr[i]['_instance']['instanceId'] == info.event._instance.instanceId)){
            arrStart = arr[i]['start'].addDays(1);
            if(info.event.start < arr[i]['start'] && info.event.end > arrStart){
              //nemoj ubaciti u tablicu, izbaci error plači ča god ti paše
              console.log('Povlacis trenutnu rezervaciju preko druge rezervacije');
              info.revert();
              doAjax = false;
              break;
            }
          } else {
            console.log('Datum ok');
          }
        }

        if(doAjax == true){
          $.ajax({
            url: '<?=ROOTPATH?>/controllers/handlers/eventHandler.php',
            type: 'POST',
            data: {
              methodName: 'eventUpdate',
              title: info.event.title,
              start: info.event.start.toISOString(),
              end: info.event.end.toISOString(),
              id: info.event.extendedProps.idFromDB,
              apartmentId: apartmentId,
            },
            success: function (data) {
              data = JSON.parse(data);
              if (data == 'event updated' ){
                console.log('Event updated!');
              } else {
                alert('Rezervaciji nije promijenjen datum, pokušajte ponovno, ako se greška nastavi javljati kontaktirajte administratora!');
                location.reload(true);
              }

            },
            error: function (jqXHR, textStatus, errorThrown) {
              console.log(textStatus);
              console.log(errorThrown);
              console.log('DošloŽ je do errora u ajax-u');


              0
              
              alert('Došlo je do greške spremanja rezervacije, molimo Vas da pokušate ponovno');
              location.reload(true); //refresh stranice tako da user primjeti da mu fali event, da nebi doslo do overbookinga
            }
          });
        }
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
