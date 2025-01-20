<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alfabetizatec - Coor. Programa</title>
    <link rel="stylesheet" href="../assets/css/root.css">
    <link rel="stylesheet" href="../assets/css/layout/header.css">
    <link rel="stylesheet" href="../assets/css/coordinador_programa.css">

</head>


<body>


    <header>
        <?php include('./layout/header.php') ?>
    </header>

    <main>
        <h2 class="titulo_principal">Bienvenido <?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido']; ?></h2>
        <p class="tec_nombre"><?php echo $_SESSION['nombre_tecnologico']; ?></p>

        <div class="actions">
            <button class="btn_submit_educador">Registrar educador </button>
            <button class="btn_submit_programa">Nuevo Programa </button>
            <button class="btn_submit_estudiante">Agregar Estudiante </button>
        </div>


    </main>

    <!-- Modal programa -->
    <div id="modal_programa" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Formulario de Registro</h2>
            <form id="registrationForm">
                <div class="input_grupo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>

                <div class="input_grupo">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" id="descripcion" name="descripcion" required>
                </div>

                <div class="input_grupo">
                    <label for="id_nivel">Nivel:</label>
                    <select id="id_nivel" name="id_nivel" required>
                        <option value="1">Básico</option>
                        <option value="2">Medio Superior</option>
                        <option value="3">Superior</option>
                    </select>
                </div>

                <div class="input_grupo">
                    <label for="educador">Educador:</label>
                    <select id="educador" name="educador" required>
                        <option value="1">Juan</option>
                        <option value="2">pepe Superior</option>
                        <option value="3">paco</option>
                    </select>
                </div>

                <div class="input_grupo">
                    <label for="meta">Meta:</label>
                    <input type="number" id="meta" name="meta" required>
                </div>

                <div class="input_grupo">
                    <label for="inicio_periodo">Inicio Periodo:</label>
                    <input type="date" id="inicio_periodo" name="inicio_periodo" required>
                </div>

                <div class="input_grupo">
                    <label for="fin_periodo">Fin Periodo:</label>
                    <input type="date" id="fin_periodo" name="fin_periodo" required>
                </div>

                <button type="submit">Enviar</button>
            </form>


        </div>
    </div>

    <!-- Modal Educador -->
    <div id="modal_educador" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Formulario de Registro - Educador</h2>
            <form id="registrationFormEducador">
                <div class="input_grupo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>

                <div class="input_grupo">
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" required>
                </div>

                <div class="input_grupo">
                    <label for="curp">CURP:</label>
                    <input type="text" id="curp" name="curp">
                </div>

                <div class="input_grupo">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" required>
                </div>

                <div class="input_grupo">
                    <label for="correo">Correo:</label>
                    <input type="email" id="correo" name="correo" required>
                </div>

                <div class="input_grupo">
                    <label for="correo_inst">Correo Institucional:</label>
                    <input type="email" id="correo_inst" name="correo_inst">
                </div>

                <div class="input_grupo">
                    <label for="contrasena">Contraseña:</label>
                    <input type="password" id="contrasena" name="contrasena" required>
                </div>

                <input type="hidden" value="4" id="rol_id" name="rol_id" required>

                <div class="input_grupo">
                    <label for="puesto">Puesto:</label>
                    <input type="text" id="puesto" name="puesto">
                </div>

                <div class="input_grupo">
                    <label for="tipo_participante">Tipo de Participante:</label>
                    <select id="tipo_participante" name="tipo_participante" class="styled-select" required>
                        <option value="" disabled selected>Seleccione</option>
                        <option value="estudiante">Estudiante</option>
                        <option value="docente">Docente</option>
                        <option value="externo">Externo</option>
                    </select>
                </div>


                <div class="input_grupo">
                    <label for="modalidad">Modalidad:</label>
                    <select id="modalidad" name="modalidad" required>
                        <option value="alfabetizaTEC">Construyendo tu Servicio Social en AlfabetizaTEC</option>
                        <option value="servicio_comunitario">Servicio Social Comunitario</option>
                        <option value="creditos_complementarios">Créditos Complementarios</option>
                        <option value="valor_curricular">Constancia de Valor Curricular</option>
                        <option value="participacion_honorifica">Diploma de Participación Honorífica</option>
                    </select>
                </div>

                <div class="input_grupo" id="grupo_numero_control" style="display:none;">
                    <label for="numero_control">Número de Control:</label>
                    <input type="number" id="numero_control" name="numero_control">
                </div>

                <div class="input_grupo" id="grupo_carrera" style="display:none;">
                    <label for="carrera">Carrera:</label>
                    <input type="number" id="carrera" name="carrera">
                </div>

                <div class="input_grupo" id="grupo_semestre" style="display:none;">
                    <label for="semestre">Semestre:</label>
                    <input type="number" id="semestre" name="semestre">
                </div>

                <button type="btn_submit">Enviar</button>
            </form>


        </div>
    </div>

    <!-- Modal Estudiante -->
    <div id="modal_estudiante" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Formulario de Registro - Estudiante</h2>
            <form id="registrationFormEstudiante">
                <!-- Campos del formulario aquí -->
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>
    <script src="../assets/js/sweetalert.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <script src="api/auth/login.js"></script>


    <script>
        $(document).ready(function() {

            //formulario dinamico educador
            // Mostrar campos adicionales si se selecciona "Estudiante"
            $('#tipo_participante').change(function() {
                if ($(this).val() === 'estudiante') {
                    $('#grupo_numero_control').show();
                    $('#grupo_carrera').show();
                    $('#grupo_semestre').show();
                } else {
                    $('#grupo_numero_control').hide();
                    $('#grupo_carrera').hide();
                    $('#grupo_semestre').hide();
                }
            });

            // Opcional: Asegurarse de que los campos estén ocultos al cargar la página
            if ($('#tipo_participante').val() !== 'estudiante') {
                $('#grupo_numero_control').hide();
                $('#grupo_carrera').hide();
                $('#grupo_semestre').hide();
            }
            //fin educador


            // Mostrar modal_programa al hacer clic en el botón
            $('.btn_submit_programa').click(function() {
                $('#modal_programa').fadeIn();
            });

            // Mostrar modal_educador al hacer clic en el botón
            $('.btn_submit_educador').click(function() {
                $('#modal_educador').fadeIn();
            });

            // Mostrar modal_estudiante al hacer clic en el botón
            $('.btn_submit_estudiante').click(function() {
                $('#modal_estudiante').fadeIn();
            });

            // Cerrar modal_programa
            $('.close').click(function() {
                $(this).closest('.modal').fadeOut();
            });

            // Si el usuario hace clic fuera del modal, lo cierra
            $(window).click(function(event) {
                if ($(event.target).is('.modal')) {
                    $('.modal').fadeOut();
                }
            });

            // Procesar formulario de modal_programa
            $('#registrationFormPrograma').submit(function(event) {
                event.preventDefault();
                alert('Formulario Programa Enviado');
                $('#modal_programa').fadeOut();
            });

            // Procesar formulario de modal_educador
            $('#registrationFormEducador').submit(function(event) {
                event.preventDefault();
                alert('Formulario Educador Enviado');
                $('#modal_educador').fadeOut();
            });

            // Procesar formulario de modal_estudiante
            $('#registrationFormEstudiante').submit(function(event) {
                event.preventDefault();
                alert('Formulario Estudiante Enviado');
                $('#modal_estudiante').fadeOut();
            });
        });
    </script>
</body>

</html>