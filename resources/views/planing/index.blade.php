<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8' />
    <link href='{{ asset('/assets/lib/fullcalendar/main.css') }}' rel='stylesheet' />
    <script src='{{ asset('/assets/lib/fullcalendar/main.js')}}'></script>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                selectable:true,
                initialView: 'dayGridMonth',
                locale:'fr',
                timeZone:'Europe/Paris',
                headerToolbar:{
                    left:'prev,next today',
                    center:'title',
                    right: 'dayGridMonth,timeGridWeek'

                },
            });
            calendar.render();
        });

    </script>
</head>
<body>
<div id='calendar'></div>
</body>
</html>
