
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      locale:'pt-br',
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,listYear'
      },
      selectable: true,
      selectMirror: true,
      editable:true,
      eventLimit: true,
      events:'lib/listaeventos.php',




});



    calendar.render();
});
