<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Calendario de Citas</title>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/css/estilo_citas.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <img src="styles/img/logo.jpg" class="logo" alt="">
        <h1 class="titulo-barra">Veterinaria AHQ</h1>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index_us.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="presentation/ver_citas_usuario.php">Mis citas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index_atencion.php">Calendario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index_usuario.php">Perfil</a>
                </li>
            </ul>
        </div>
    </nav>
    <h1>Calendario de Citas</h1>
    <div id="calendar"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.js"></script>
    <script src="locale-all.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'es',
                initialView: 'dayGridMonth',
                events: 'application/solicitar_cita.php', // Asegúrate de que la ruta sea correcta
                headerToolbar: {
                    start: 'prev,next today',
                    center: 'title',
                    end: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                dayHeaderFormat: { weekday: 'long' },
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juev', 'Vie', 'Sáb'],
                views: {
                    dayGridMonth: {
                        buttonText: 'Mes'
                    },
                    timeGridWeek: {
                        buttonText: 'Semana'
                    },
                    timeGridDay: {
                        buttonText: 'Día'
                    },
                },
                allDayText: '',
                dateClick: function (info) {
                    if (info.dateStr > new Date().toISOString()) {
                        // Fecha en el futuro
                        var eventosEnFecha = calendar.getEvents().filter(function (event) {
                            return event.start.toISOString() === info.dateStr;
                        });
                        if (eventosEnFecha.length > 0) {
                            var evento = eventosEnFecha[0];
                            if (evento.extendedProps.editable === false) {
                                // Evento "pendiente" o "tomado", muestra alerta
                                alert('Esta cita no está disponible para su programación');
                            } else {
                                // Fecha disponible, redirige al formulario
                                window.location.href = 'presentation/formulario_solicitud.php?fecha_hora=' + info.dateStr;
                            }
                        }
                    }
                }
            });
            calendar.render();
        });
    </script>
</body>

</html>