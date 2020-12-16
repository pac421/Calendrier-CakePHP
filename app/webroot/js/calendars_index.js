var calendar;

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

    calendar = new Calendar(calendar_el, {
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
            drag_event(info);
        },
        eventDrop: function(info) {
            replace_event(info);
        }
    });
    calendar.render();

    window.FontAwesome.config.autoReplaceSvg = 'nest';

    get_data();
});

function get_data(){
    let csrfToken = $('#csrfToken').val();
    $.ajax({
        url: '/calendars/get',
        dataType: "json",
        headers: { 'X-XSRF-TOKEN' : csrfToken },
        beforeSend: function (xhr) {
            xhr.setRequestHeader('X-CSRF-Token', csrfToken);
        }
    }).done(function(response){
        display_undated_events(response);
        calendar.getEvents().forEach(event => event.remove());
        calendar.addEventSource(response);
        calendar.refetchEvents();
    });
}

function display_undated_events(events){
    $('#draggable-items-container').html('');
    $.each(events, function(i, event){
        if(event.start === null){
            let html = '<div class="fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event" style="margin-bottom: 5px" id="'+event.id+'"><div class="fc-event-main">'+event.title+'</div></div>';
            $('#draggable-items-container').append(html);
        }
    });
}

$('#form-add-event').submit(function(e) {
    e.preventDefault();
    let csrfToken = $('#csrfToken').val();
    let title = $('#title-add-event').val();
    if(title === ''){
        return;
    }
    $.ajax({
        type: 'POST',
        url: '/calendars/add',
        data: { 'title': title },
        dataType: 'json',
        headers: { 'X-XSRF-TOKEN' : csrfToken },
        beforeSend: function(xhr){ xhr.setRequestHeader('X-CSRF-Token', csrfToken); }
    }).done(function(response){
        $('#title-add-event').val('');
        get_data();
    });
});

function drag_event(info){
    info.draggedEl.parentNode.removeChild(info.draggedEl);

    let csrfToken = $('#csrfToken').val();
    $.ajax({
        type: 'POST',
        url: '/calendars/edit',
        data: {
            'id': info.draggedEl.id,
            'start': info.dateStr
        },
        dataType: 'json',
        headers: { 'X-XSRF-TOKEN' : csrfToken },
        beforeSend: function(xhr){ xhr.setRequestHeader('X-CSRF-Token', csrfToken); }
    }).done(function(response){
        get_data();
    });
}

function replace_event(info){
    let csrfToken = $('#csrfToken').val();
    $.ajax({
        type: 'POST',
        url: '/calendars/edit',
        data: {
            'id': info.oldEvent._def.publicId,
            'start': info.event.startStr
        },
        dataType: 'json',
        headers: { 'X-XSRF-TOKEN' : csrfToken },
        beforeSend: function(xhr){ xhr.setRequestHeader('X-CSRF-Token', csrfToken); }
    }).done(function(response){
        get_data();
    });
}
