<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
  
 document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

   var calendar = new FullCalendar.Calendar(calendarEl, {
  
    
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    locale:'es',
    initialView: 'dayGridMonth',
    weekNumbers: false,
    eventLimit: true,
    buttonIcons: false, // show the prev/next text
    navLinks: true, // can click day/week names to navigate views
    dayMaxEvents: true, // allow "more" link when too many events
    editable: false,
    dateClick:function (date,jsEvent,view){
      alert(date.format());
      alert("aydaa");
    },
    eventClick: function(calEvent,jsEvent,view){
      $("#nombre").text(calEvent.event.title);
      $("#tituloEvento").html(calEvent.event.title);
      $("#descripcionEvento").html(calEvent.event.title);
      //$('$exampleModal').modal();
      console.log('Event: ' + calEvent.event.title);
      var nameSite = document.getElementById('nombre');
      nameSite.innerHTML.value="dsada";
    },    
    events:'/eventos',
      eventMouseover: function (event, jsEvent, view) {
      console.log('in');
      bgEvent.start = event.start;
      bgEvent.end = event.end;
      var events = calendar.fullCalendar('clientEvents', bgEvent.id);
      if (events.length) {
        var e = events[0];
        calendar.fullCalendar('updateEvent', e);        
      }
      else
        calendar.fullCalendar('renderEvent', bgEvent);
    },
    eventMouseout: function (event, jsEvent, view) {
      console.log('out');
      calendar.fullCalendar('removeEvents', bgEvent.id);
    },
   
  }); 
  calendar.render();
});
</script>
