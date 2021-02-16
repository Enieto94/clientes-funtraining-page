async function getUserEvents() {
    try {
        const serverResponse = await axios.get(`${API_URL}/users/${user.id}/events`, { headers: { 'Authorization': `Bearer ${getCookie("token")}` } });
        const events = serverResponse.data.data;
        return events;

    } catch (error) {
        console.warn("ERROR: ", error);
        if (error.response.status === 401) {
            window.location.href = "/";
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Problema interno.',
                text: "Lo sentimos, ha surgido un problema interno. Intentalo más tarde"
            });
        }
    }

};

async function createEvent(event) {
    try {
        const serverResponse = await axios.post(`${API_URL}/events`, event, { headers: { 'Authorization': `Bearer ${getCookie("token")}` } });
        return serverResponse.data;

    } catch (error) {
        console.warn("ERROR: ", error);
        if (error.response.status === 401) {
            window.location.href = "/";
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Problema interno.',
                text: "Lo sentimos, ha surgido un problema interno. Intentalo más tarde"
            });
        }
    }
};

async function updateEvent(event) {
    try {
        const serverResponse = await axios.put(`${API_URL}/events/${event.id}`, event, { headers: { 'Authorization': `Bearer ${getCookie("token")}` } });
        return serverResponse.data;

    } catch (error) {
        console.warn("ERROR: ", error);
        if (error.response.status === 401) {
            window.location.href = "/";
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Problema interno.',
                text: "Lo sentimos, ha surgido un problema interno. Intentalo más tarde"
            });
        }
    }
};

async function deleteEvent(eventId) {
    try {
        await axios.delete(`${API_URL}/events/${eventId}`, { headers: { 'Authorization': `Bearer ${getCookie("token")}` } });

    } catch (error) {
        console.warn("ERROR: ", error);
        if (error.response.status === 401) {
            window.location.href = "/";
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Problema interno.',
                text: "Lo sentimos, ha surgido un problema interno. Intentalo más tarde"
            });
        }
    }
};

function getTodayDate() {
    const actualYear = new Date().getFullYear();
    const actualMonth = new Date().getMonth() + 1;
    const actualDay = new Date().getDate();
    const today = `${actualYear}-${(actualMonth < 10) ? '0' + actualMonth : actualMonth}-${(actualDay < 10) ? '0' + actualDay : actualDay}`;

    return today;
}

/**
 * INIT
 */
let userEvents;
let calendar;

async function main() {
    userEvents = await getUserEvents();
    const calendarElement = document.getElementById('calendar');

    calendar = new FullCalendar.Calendar(calendarElement, {
        locale: 'es',
        initialView: 'dayGridMonth', // ['dayGridMonth : DEFAULT', 'dayGridWeek', 'timeGridDay', 'listWeek']
        timeZone: 'local',
        fixedWeekCount: false,
        validRange: {
            start: getTodayDate()
        },
        events: userEvents,
        dateClick: function (dateInfo) {
            $('#ModalAdd #title').val(user.name);
            $('#ModalAdd #start').val(moment(dateInfo.date).format('YYYY-MM-DDTHH:mm'));
            $('#ModalAdd #end').val(moment(dateInfo.date).add(1, 'hour').format('YYYY-MM-DDTHH:mm'));
            $('#ModalAdd').modal('show');
        },
        eventClick: function (info) {
            let eventSelected = info.event;

            $('#ModalEdit #edit-id').val(eventSelected.id);
            $('#ModalEdit #edit-title').val(eventSelected.title);
            $('#ModalEdit #edit-color').val(eventSelected.backgroundColor);
            $('#ModalEdit #edit-start').val(moment(eventSelected.start).format('YYYY-MM-DDTHH:mm'));
            $('#ModalEdit #edit-end').val(moment(eventSelected.end).format('YYYY-MM-DDTHH:mm'));
            $('#ModalEdit').modal('show');
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

}
main();

$('#create-event-form').submit(async function (event) {
    event.preventDefault();

    const newEventTitle = $('#title').val();
    const newEventColor = $('#color').val();
    const newEventStart = $('#start').val();
    const newEventEnd = $('#end').val();

    const newEvent = await createEvent({
        title: newEventTitle,
        color: newEventColor,
        start: moment(newEventStart).format('YYYY-MM-DD HH:mm:ss'),
        end: moment(newEventEnd).format('YYYY-MM-DD HH:mm:ss'),
        user_id: user.id
    });

    calendar.addEvent(newEvent);
    $('#ModalAdd').modal('toggle');
});


$('#edit-event-form').submit(async function (event) {
    event.preventDefault();

    const eventSelectedId = $('#edit-id').val();
    const eventToEdit = calendar.getEventById(eventSelectedId);

    if ($('#delete-event-checkbox').prop("checked")) {
        await deleteEvent(eventSelectedId);
        eventToEdit.remove();
        $('#delete-event-checkbox').prop("checked", false);

    } else {
        const edittingEventTitle = $('#edit-title').val();
        const edittingEventColor = "#0071c5";
        const edittingEventStart = $('#edit-start').val();
        const edittingEventEnd = $('#edit-end').val();

        const eventEditted = await updateEvent({
            id: eventSelectedId,
            title: edittingEventTitle,
            color: edittingEventColor,
            start: moment(edittingEventStart).format('YYYY-MM-DD HH:mm:ss'),
            end: moment(edittingEventEnd).format('YYYY-MM-DD HH:mm:ss'),
            user_id: user.id
        });

        eventToEdit.remove();
        calendar.addEvent(eventEditted);
    }

    $('#ModalEdit').modal('toggle');
});