$(document).ready(function(){

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var draggable_el = document.getElementById('draggable-container');
    var calendar_el = document.getElementById('calendar');

    new Draggable(draggable_el, {
        itemSelector: '.fc-event',
        eventData: function(eventEl) {
            return {
                title: eventEl.innerText
            };
        }
    });

    var calendar = new Calendar(calendar_el, {
        initialView: 'dayGridMonth',
        themeSystem: 'bootstrap',
        aspectRatio: 2,
        locale: 'fr',
        nowIndicator: true,
        headerToolbar: {
            start: 'dayGridMonth,timeGridWeek,timeGridDay',
            center: 'title',
            end: 'today prev,next'
        },
        buttonText: {
            today:    'Aujourd\'hui',
            month:    'Mois',
            week:     'Semaine',
            day:      'Jour'
        },
        bootstrapFontAwesome: {
            prev: 'fa-chevron-left',
            next: 'fa-chevron-right',
        },
        editable: true,
        droppable: true,
        drop: function(info) {
            info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
    });
    calendar.render();
});
