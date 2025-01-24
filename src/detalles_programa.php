<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del programa</title>
    <link rel="stylesheet" href="../assets/css/root.css">
    <link rel="stylesheet" href="../assets/css/vista_programa.css">
    <link rel="stylesheet" href="../assets/css/layout/header.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<body>
    <header>
        <?php include('./layout/header.php') ?>
    </header>

    <main>
        <ul class="breadcrumb">
            <li><a href="./coordinador_programa.php">Inicio</a></li>
            <li><a href="#">Detalles de programa:</a></li>

        </ul>
        <h2 id="titulo-programa" class="titulo_principal"></h2>

        <div id="detallesPrograma" class="full_center"></div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Obtener el id del programa de la URL
        const urlParams = new URLSearchParams(window.location.search);
        // Obtener el id del programa de la URL
        const idPrograma = urlParams.get('id');

        // Verificar si se tiene el id del programa
        if (idPrograma) {
            // Realizar la petición AJAX para obtener los detalles del programa y la lista de estudiantes
            $.ajax({
                url: `./api/coordinador_gral/obtenerDetallesPrograma.php?id=${idPrograma}`, // Cambia esta URL a la correcta
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.success) {
                        // Mostrar los detalles del programa
                        $('#titulo-programa').text(`Programa: ${data.data.nivel}`);
                        $('#descripcion-programa').text(data.data.descripcion || "N/A");
                        $('#fecha-inicio').text(data.data.inicio_periodo);
                        $('#fecha-fin').text(data.data.fin_periodo);
                        $('#nivel-programa').text(data.data.nivel);

                        // Crear la tabla de estudiantes
                        if (data.data.estudiantes && data.data.estudiantes.length > 0) {
                            let tableContent = `
                    <table id="estudiantesTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>CURP</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Estado Solicitud</th> <!-- Nueva columna para el estado -->
                            </tr>
                        </thead>
                        <tbody>
                    `;

                            // Agregar los estudiantes a la tabla
                            // Agregar los estudiantes a la tabla
                            data.data.estudiantes.forEach(function(estudiante) {
                                // Buscar la solicitud del estudiante (suponiendo que solo haya una solicitud por estudiante)
                                const solicitud = data.data.solicitudes.find(solicitud => solicitud.id_estudiante === estudiante.id);

                                tableContent += `
        <tr>
            <td><p  class="text-decoration-none">${estudiante.nombre}</p></td>
            <td>${estudiante.apellidos}</td>
            <td>${estudiante.curp}</td>
            <td>${estudiante.telefono}</td>
            <td>${estudiante.correo || "N/A"}</td>
            <td>
                <form>
                    <!-- Agregar el id_solicitud de la solicitud -->
                    <input type="hidden" name="id_solicitud" value="${solicitud ? solicitud.id : ''}"> 
                    <label>
                        <input type="radio" name="estado_${estudiante.id}" value="pendiente" ${estudiante.status === 'pendiente' ? 'checked' : ''}>
                        Pendiente
                    </label>
                    <label>
                        <input type="radio" name="estado_${estudiante.id}" value="aprobado" ${estudiante.status === 'aprobado' ? 'checked' : ''}>
                        Aprobado
                    </label>
                    <label>
                        <input type="radio" name="estado_${estudiante.id}" value="desaprobado" ${estudiante.status === 'desaprobado' ? 'checked' : ''}>
                        Desaprobado
                    </label>
                </form>
            </td>
        </tr>
    `;
                            });

                            tableContent += '</tbody></table>';
                            $('#detallesPrograma').append(tableContent);

                            // Inicializar DataTable sobre la tabla de estudiantes
                            $('#estudiantesTable').DataTable({
                                paging: true,
                                searching: true,
                                ordering: true,
                                info: true,
                                lengthChange: true, // Permitir seleccionar cantidad de registros por página
                                language: {
                                    search: "Buscar:",
                                    lengthMenu: "Mostrar _MENU_ registros por página",
                                    info: "Mostrando de _START_ a _END_ de _TOTAL_ registros",
                                    infoEmpty: "Mostrando 0 a 0 de 0 registros",
                                    infoFiltered: "(filtrado de _MAX_ registros en total)",
                                    paginate: {
                                        first: "Primero",
                                        previous: "Anterior",
                                        next: "Siguiente",
                                        last: "Último"
                                    }
                                }
                            });
                        } else {
                            $('#detallesPrograma').append('<p>No hay estudiantes registrados para este programa.</p>');
                        }

                    } else {
                        alert(data.message || 'Hubo un error al obtener los detalles del programa.');
                    }
                },
                error: function(error) {
                    console.log('Error al obtener los detalles del programa:', error);
                }
            });
        } else {
            console.log('No se encontró el id del programa en la URL');
        }

        $(document).on('change', 'input[type="radio"]', function() {
            // Obtener el ID del estudiante del atributo name
            const nameAttr = $(this).attr('name');
            const studentId = nameAttr.split('_')[1]; // Supone que el formato es "estado_ID"

            // Obtener el valor seleccionado
            const newStatus = $(this).val();

            // Obtener el id de la solicitud desde el campo oculto
            const solicitudId = $(this).closest('form').find('input[name="id_solicitud"]').val();

            // Enviar la petición AJAX
            $.ajax({
                url: './api/actualizarEstadoSolicitud.php', // Cambia a la URL correcta de tu API
                type: 'POST',
                data: {
                    id_solicitud: solicitudId, // Enviar el id de la solicitud
                    estado: newStatus // Nuevo estado seleccionado
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Mostrar notificación de éxito usando SweetAlert2 (Toast)
                        Swal.fire({
                            icon: 'success',
                            title: 'Estado actualizado correctamente.',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000, // Duración del toast
                            timerProgressBar: true
                        });
                    } else {
                        // Mostrar notificación de error usando SweetAlert2 (Toast)
                        Swal.fire({
                            icon: 'error',
                            title: 'Error al actualizar el estado.',
                            text: response.message || 'Inténtalo nuevamente.',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000, // Duración del toast
                            timerProgressBar: true
                        });
                    }
                },
                error: function(error) {
                    console.error('Error en la petición:', error);
                    // Notificación de error al fallar la petición AJAX
                    Swal.fire({
                        icon: 'error',
                        title: 'Hubo un problema al actualizar el estado.',
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000, // Duración del toast
                        timerProgressBar: true
                    });
                }
            });
        });
    </script>
</body>