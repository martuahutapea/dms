$(document).ready(function () {
  var calendar = $("#calendar").fullCalendar({
    header: {
      left: "prev,next today",
      center: "title",
      right: "month,agendaWeek,agendaDay",
    },
    events: "../calendar/load.php",
    selectable: true,
    selectHelper: true,
    select: function (start, end, allDay) {
      var title = prompt("Enter Event Title");
      if (title) {
        var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
        var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
        $.ajax({
          url: "../calendar/insert.php",
          type: "POST",
          data: { title: title, start: start, end: end },
          success: function () {
            calendar.fullCalendar("refetchEvents");
            alert("Added Successfully");
          },
        });
      }
    },
    editable: true,
    eventDrop: function (event) {
      var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
      var title = event.title;
      var id = event.id;
      $.ajax({
        url: "../calendar/update.php",
        type: "POST",
        data: { title: title, start: start, end: end, id: id },
        success: function () {
          calendar.fullCalendar("refetchEvents");
          alert("Event Update");
        },
      });
    },

    eventResize: function (event) {
      var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
      var title = event.title;
      var id = event.id;
      $.ajax({
        url: "../calendar/update.php",
        type: "POST",
        data: { title: title, start: start, end: end, id: id },
        success: function () {
          calendar.fullCalendar("refetchEvents");
          alert("Event Update");
        },
      });
    },

    eventClick: function (event) {
      if (confirm("Are you sure you want to remove it?")) {
        var id = event.id;
        $.ajax({
          url: "../calendar/delete.php",
          type: "POST",
          data: { id: id },
          success: function () {
            calendar.fullCalendar("refetchEvents");
            alert("Event Removed");
          },
        });
      }
    },
  });
});
