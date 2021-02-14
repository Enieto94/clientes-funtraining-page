function getEvents() {
    // const {events} = await ApiCall('/users/1/events', 'GET');
    // console.log(events);

    const events = [
        {
            id: 1,
            title: 'Evento 1',
            start: '2021-02-12 04:15:00',
            end: '2021-02-12 05:15:00'
        },
        {
            id: 2,
            title: 'Evento 2',
            start: '2021-02-13 04:15:00',
            end: '2021-02-13 05:15:00'
        }
    ];

    return events;
};

async function createEvent(dataToSend) {
    const newEvent = await Api('POST', '/events', dataToSend);
    return newEvent;
};

async function editEvent(event) {
    console.log("SE EDITA EL EVENTO");
    const newEvent = await Api('PUT', `/events/${event.id}`, event);
    return newEvent;
};

async function deleteEvent(event) {
    console.log("SE ELIMINA EL EVENTO");
    // await Api('DELETE', `/events/${event.id}`);
};

function edit(event){
    start = event.start.format('YYYY-MM-DD HH:mm:ss');
    if(event.end){
        end = event.end.format('YYYY-MM-DD HH:mm:ss');
    }else{
        end = start;
    }

    id = event.id;

    Event = [];
    Event[0] = id;
    Event[1] = start;
    Event[2] = end;
    
    $.ajax({
        url: 'editEventDate.php',
        type: "POST",
        data: {Event:Event},
        success: function(rep) {
            if(rep == 'OK'){
                alert('Evento se ha guardado correctamente');
            }else{
                alert('No se pudo guardar. Inténtalo de nuevo.'); 
            }
        }
    });
}

function getTodayDate() {
    const actualYear = new Date().getFullYear();
    const actualMonth = new Date().getMonth() + 1;
    const actualDay = new Date().getDate();
    const today = `${actualYear}-${(actualMonth < 10) ? '0' + actualMonth : actualMonth}-${(actualDay < 10) ? '0' + actualDay : actualDay}`;

    return today;
}


let userEvents = getEvents();
const calendarElement = document.getElementById('calendar');

let calendar = new FullCalendar.Calendar(calendarElement, {
    locale: 'es',
    initialView: 'dayGridMonth', // ['dayGridMonth : DEFAULT', 'dayGridWeek', 'timeGridDay', 'listWeek']
    timeZone: 'local',
    validRange: {
        start: getTodayDate()
    },
    events: userEvents,
    dateClick: function (date) {
        console.log("[DATE INFO]: ", JSON.stringify(date));
        console.log("CON MOMENT: ", moment(date.dateStr).format('YYYY-MM-DD HH:mm:ss'));
        $('#ModalAdd #start').val(date.dateStr);
        $('#ModalAdd #end').val(date.dateStr);
        // $('#ModalAdd #end').val(moment(date.dateStr).format('YYYY-MM-DD HH:mm:ss'));
        $('#ModalAdd').modal('show');
    }
});

calendar.render();

// $('#calendar').fullCalendar({
//     header: {
//         language: 'es',
//         left: 'prev,next today',
//         center: 'title',
//         right: 'month,basicWeek,basicDay',
//     },
//     defaultDate: yyyy+"-"+mm+"-"+dd,
//     editable: true,
//     eventLimit: true, // allow "more" link when too many events
//     selectable: true,
//     selectHelper: true,
//     select: function(start, end) {
//         const check = moment(start).format('YYYY-MM-DD');
//         const actualYear = new Date().getFullYear();
//         const actualMonth = new Date().getMonth() + 1;
//         const actualDay = new Date().getDate();
//         const today = `${actualYear}-${(actualMonth < 10) ? '0' + actualMonth : actualMonth}-${(actualDay < 10) ? '0' + actualDay : actualDay}`;
//         const todayFormatted = moment(today).format('YYYY-MM-DD');

//         if(check < todayFormatted){
//             alert('la fecha es vieja,no se puede añadir el evento');

//         }else{
//             $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
//             $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
//             $('#ModalAdd').modal('show');
//         }
//     },
//     eventRender: function(event, element) {
//         element.bind('dblclick', function() {
//             $('#ModalEdit #id').val(event.id);
//             $('#ModalEdit #title').val(event.title);
//             $('#ModalEdit #color').val(event.color);
//             $('#ModalEdit').modal('show');
//         });
//     },
//     eventDrop: function(event, delta, revertFunc) { // si changement de position
//         // edit(event);
//         const eventEditted = editEvent(event);
//     },
//     eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur
//         // edit(event);
//         deleteEvent(event);
//     },
//     events: userEvents
// });


$('#create-event-form').submit(function (event) {
    event.preventDefault();

    const newEventTitle = $('#title').val();
    const newEventColor = $('#color').val();
    const newEventStart = $('#start').val();
    const newEventEnd = $('#end').val();

    const newEvent = createEvent({
        title: newEventTitle,
        color: newEventColor,
        start: newEventStart,
        end: newEventEnd
    });

    userEvents.push(newEvent);

    calendar.addEvent(newEvent);
    $('#ModalAdd').modal('toggle');
});