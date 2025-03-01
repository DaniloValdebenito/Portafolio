
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Calendario de Citas</title>
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css" rel="stylesheet">
        <link rel="stylesheet" href="../styles/estilo_usuario.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>
    <body>
        
        <?php
            include("../components/sidebar_calendario.php");

        ?>
        <h1>Calendario de Citas</h1>
        <div id="calendar"></div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.js"></script>
        <script src="locale-all.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    locale: 'es',
                    initialView: 'dayGridMonth',
                    events: '../application/cal_logica_mostrar.php',
                    headerToolbar: {
                    start: 'prev,next today',
                    center: 'title',
                    end: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                dayHeaderFormat: { weekday: 'long' }, // Nombres en  mayus ( volver a probar)
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb'],
                views: {
                    dayGridMonth: {
                        buttonText: 'Mes'
                },
                    timeGridWeek: {
                        buttonText: 'Semana'
                },
                    timeGridDay: {
                        buttonText: 'Día'
                }
            },
            allDayText: '' 
        });
        calendar.render();
    });
        </script>
    </body>
    </html>