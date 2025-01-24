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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">


</head>


<body>


    <header>
        <?php include('./layout/header.php') ?>
    </header>

    <main>
        <ul class="breadcrumb">
            <li><a href="#">Inicio</a></li>

        </ul>
        <h2 class="titulo_principal">Bienvenido <?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido']; ?></h2>
        <p class="tec_nombre"><?php echo $_SESSION['nombre_tecnologico']; ?></p>

        <a class="contra" href="./api/auth/cambiar_contrasena.php">Cambiar contraseña</a>

        <div class="actions">
            <button class="btn_submit_educador">1. -Registrar educador </button>
            <button class="btn_submit_programa">2.- Nuevo Programa </button>
            <button class="btn_submit_estudiante">3. -Agregar Estudiante </button>
        </div>


        <div class="datos_tec">

            <div class="info">
                <h4>Educadores:</h4>
                <div id="Educadores_tec"></div>
            </div>

            <div class="info">
                <h4>Programas:</h4>
                <div id="Programas_tec"></div>
            </div>


            <!--  <div class="info">
                <h4>Estudiantes:</h4>
                <div id="Estudiantes_tec">
                </div>


            </div> -->



        </div>


    </main>

    <!-- Modal programa -->
    <div id="modal_programa" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Formulario de Registro</h2>
            <form id="registrationForm">
                <!-- Oculto para despues -->
                <!-- <div class="input_grupo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>

                <div class="input_grupo">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" id="descripcion" name="descripcion" required>
                </div> -->

                <div class="input_grupo">
                    <label for="id_nivel">Nivel:</label>
                    <select id="id_nivel" name="id_nivel" required>
                        <option value="1">Analfabeta</option>
                        <option value="2">Inicial</option>
                        <option value="3">Superior</option>
                    </select>
                </div>

                <div class="input_grupo">
                    <label for="educador">Educador:</label>
                    <select id="educadorSelect" name="educador" required>
                        <option value="">Selecciona un educador</option> <!-- Opción por defecto -->
                    </select>

                    <span class="tooltip">Recuerda que debes registrar primero a tus educadores:</span>
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

                <button class="btn_submit">Enviar</button>
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
                    <label for="nombre">Nombre(s):</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>

                <div class="input_grupo">
                    <label for="primer_apellido">Primer Apellido:</label>
                    <input type="text" id="primer_apellido" name="primer_apellido" required>
                </div>

                <div class="input_grupo">
                    <label for="segundo_apellido">Segundo Apellido:</label>
                    <input type="text" id="segundo_apellido" name="segundo_apellido">
                </div>



                <div class="input_grupo">
                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
                </div>

                <div class="input_grupo">
                    <label for="rfc">RFC:</label>
                    <input type="text" id="rfc" name="rfc">
                </div>

                <div class="input_grupo">
                    <label for="nacionalidad">Nacionalidad:</label>
                    <select id="nacionalidad" name="nacionalidad" required>
                        <option value="">Seleccione</option>
                        <option value="mexicano">Mexicano</option>
                        <option value="extranjero">Extranjero</option>
                    </select>
                </div>

                <div class="input_grupo">
                    <label for="entidad_nacimiento">Entidad de Nacimiento:</label>
                    <select id="entidad_nacimiento" name="entidad_nacimiento">
                        <option value="">Seleccione</option>
                        <option value="Aguascalientes">Aguascalientes</option>
                        <option value="Baja California">Baja California</option>
                        <option value="Baja California Sur">Baja California Sur</option>
                        <option value="Campeche">Campeche</option>
                        <option value="Chiapas">Chiapas</option>
                        <option value="Chihuahua">Chihuahua</option>
                        <option value="Ciudad de México">Ciudad de México</option>
                        <option value="Coahuila">Coahuila</option>
                        <option value="Colima">Colima</option>
                        <option value="Durango">Durango</option>
                        <option value="Guanajuato">Guanajuato</option>
                        <option value="Guerrero">Guerrero</option>
                        <option value="Hidalgo">Hidalgo</option>
                        <option value="Jalisco">Jalisco</option>
                        <option value="México">México</option>
                        <option value="Michoacán">Michoacán</option>
                        <option value="Morelos">Morelos</option>
                        <option value="Nayarit">Nayarit</option>
                        <option value="Nuevo León">Nuevo León</option>
                        <option value="Oaxaca">Oaxaca</option>
                        <option value="Puebla">Puebla</option>
                        <option value="Querétaro">Querétaro</option>
                        <option value="Quintana Roo">Quintana Roo</option>
                        <option value="San Luis Potosí">San Luis Potosí</option>
                        <option value="Sinaloa">Sinaloa</option>
                        <option value="Sonora">Sonora</option>
                        <option value="Tabasco">Tabasco</option>
                        <option value="Tamaulipas">Tamaulipas</option>
                        <option value="Tlaxcala">Tlaxcala</option>
                        <option value="Veracruz">Veracruz</option>
                        <option value="Yucatán">Yucatán</option>
                        <option value="Zacatecas">Zacatecas</option>
                    </select>
                </div>

                <div class="input_grupo">
                    <label for="curp">CURP:</label>
                    <input type="text" id="curp" name="curp">
                </div>

                <div class="input_grupo">
                    <label for="sexo">Sexo:</label>
                    <select id="sexo" name="sexo" required>
                        <option value="">Seleccione</option>
                        <option value="mujer">Mujer</option>
                        <option value="hombre">Hombre</option>
                    </select>
                </div>

                <div class="input_grupo">
                    <label for="estado_civil">Estado Civil:</label>
                    <select id="estado_civil" name="estado_civil">
                        <option value="">Seleccione</option>
                        <option value="soltero">Soltero</option>
                        <option value="union_libre">Unión Libre</option>
                        <option value="casado">Casado</option>
                        <option value="separado">Separado</option>
                        <option value="divorciado">Divorciado</option>
                        <option value="viudo">Viudo</option>
                    </select>
                </div>

                <div class="input_grupo">
                    <label for="num_hijos">No. de Hijos:</label>
                    <input type="number" id="num_hijos" name="num_hijos" min="0">
                </div>

                <div class="input_grupo">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" required>
                </div>

                <div class="input_grupo">
                    <label for="correo">Correo Personal:</label>
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

                <div class="input_grupo">
                    <label for="escolaridad">Escolaridad:</label>
                    <select id="escolaridad" name="escolaridad">
                        <option value="">Seleccione</option>
                        <option value="primaria_completa">Primaria Completa</option>
                        <option value="secundaria_completa">Secundaria Completa</option>
                        <option value="bachillerato_completo">Bachillerato Completo</option>
                        <option value="tecnica_completa">Carrera Técnica Completa</option>
                        <option value="licenciatura_completa">Licenciatura Completa</option>
                        <option value="postgrado_completo">Postgrado Completo</option>
                    </select>
                </div>

                <div class="input_grupo">
                    <label for="puesto">Puesto:</label>
                    <input type="text" id="puesto" name="puesto">
                </div>

                <div class="input_grupo">
                    <label for="tipo_participante">Tipo de Educador:</label>
                    <select id="tipo_participante" name="tipo_participante" class="styled-select" required>
                        <option value="" disabled selected>Seleccione</option>
                        <option value="estudiante_universitario">Estudiante Universitario</option>
                        <option value="docente">Docente</option>
                        <option value="externo">Externo</option>
                    </select>
                </div>

                <div class="input_grupo">
                    <label for="modalidad">Modalidad:</label>
                    <select id="modalidad" name="modalidad" required>
                        <option value="" selected>Selecciona</option>
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
                    <input type="text" id="carrera" name="carrera">
                </div>

                <div class="input_grupo" id="grupo_semestre" style="display:none;">
                    <label for="semestre">Semestre:</label>
                    <input type="number" id="semestre" name="semestre">
                </div>

                <input type="hidden" value="4" id="rol_id" name="rol_id" required>
                <input type="hidden" id="id_tec" name="id_tecnologico" value="<?php echo isset($_SESSION['id_tecnologico']) ? $_SESSION['id_tecnologico'] : ''; ?>">

                <button class="submit_principal" type="submit">Enviar</button>
            </form>


        </div>
    </div>

    <!-- Modal Estudiante -->
    <div id="modal_estudiante" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Formulario de Registro - Estudiante</h2>
            <form id="registrationFormEstudiante" class="formulario_registro">
                <!-- Datos Generales -->
                <div class="input_grupo">
                    <label for="nombres">Nombre(s):</label>
                    <input type="text" name="nombres" required maxlength="100">
                </div>
                <div class="input_grupo">
                    <label for="primer_apellido">Primer Apellido:</label>
                    <input type="text" name="primer_apellido" required maxlength="100">
                </div>
                <div class="input_grupo">
                    <label for="segundo_apellido">Segundo Apellido:</label>
                    <input type="text" name="segundo_apellido" maxlength="100">
                </div>

                <div class="input_grupo">
                    <label for="curp">CURP:</label>
                    <input type="text" name="curp" required maxlength="18" pattern="[A-Z0-9]{18}">
                </div>


                <!-- Información Personal -->
                <div class="input_grupo">
                    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                    <input type="date" name="fecha_nacimiento" required>
                </div>
                <div class="input_grupo">
                    <label>Sexo:</label>
                    <select name="sexo" required>
                        <option value="">Seleccionar</option>
                        <option value="mujer">Mujer</option>
                        <option value="hombre">Hombre</option>
                        <option value="no_binario">No binario</option>
                    </select>
                </div>
                <div class="input_grupo">
                    <label for="nacionalidad">Nacionalidad:</label>
                    <select name="nacionalidad" id="nacionalidad" required>
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="mexicana">Mexicana</option>
                        <option value="extranjera">Extranjera</option>
                    </select>
                </div>

                <div class="input_grupo">
                    <label for="entidad_nacimiento">Entidad de Nacimiento:</label>
                    <select name="entidad_nacimiento" id="entidad_nacimiento" required>
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="Aguascalientes">Aguascalientes</option>
                        <option value="Baja California">Baja California</option>
                        <option value="Baja California Sur">Baja California Sur</option>
                        <option value="Campeche">Campeche</option>
                        <option value="Chiapas">Chiapas</option>
                        <option value="Chihuahua">Chihuahua</option>
                        <option value="Ciudad de México">Ciudad de México</option>
                        <option value="Coahuila">Coahuila</option>
                        <option value="Colima">Colima</option>
                        <option value="Durango">Durango</option>
                        <option value="Estado de México">Estado de México</option>
                        <option value="Guanajuato">Guanajuato</option>
                        <option value="Guerrero">Guerrero</option>
                        <option value="Hidalgo">Hidalgo</option>
                        <option value="Jalisco">Jalisco</option>
                        <option value="Michoacán">Michoacán</option>
                        <option value="Morelos">Morelos</option>
                        <option value="Nayarit">Nayarit</option>
                        <option value="Nuevo León">Nuevo León</option>
                        <option value="Oaxaca">Oaxaca</option>
                        <option value="Puebla">Puebla</option>
                        <option value="Querétaro">Querétaro</option>
                        <option value="Quintana Roo">Quintana Roo</option>
                        <option value="San Luis Potosí">San Luis Potosí</option>
                        <option value="Sinaloa">Sinaloa</option>
                        <option value="Sonora">Sonora</option>
                        <option value="Tabasco">Tabasco</option>
                        <option value="Tamaulipas">Tamaulipas</option>
                        <option value="Tlaxcala">Tlaxcala</option>
                        <option value="Veracruz">Veracruz</option>
                        <option value="Yucatán">Yucatán</option>
                        <option value="Zacatecas">Zacatecas</option>
                    </select>
                </div>


                <!-- Estado Civil -->
                <div class="input_grupo">
                    <label>Estado Civil:</label>
                    <select name="estado_civil">
                        <option value="">Seleccionar</option>
                        <option value="soltero">Soltero</option>
                        <option value="casado">Casado</option>
                        <option value="union_libre">Unión Libre</option>
                        <option value="separado">Separado</option>
                        <option value="divorciado">Divorciado</option>
                        <option value="viudo">Viudo</option>
                    </select>
                </div>
                <div class="input_grupo">
                    <label for="num_hijos">Número de Hijos:</label>
                    <input type="number" name="num_hijos" min="0" max="20">
                </div>

                <!-- Domicilio Detallado -->
                <div class="input_grupo">
                    <label for="vialidad_tipo">Tipo de Vialidad:</label>
                    <select name="vialidad_tipo">
                        <option value="">Seleccionar</option>
                        <option value="calle">Calle</option>
                        <option value="avenida">Avenida</option>
                        <option value="boulevard">Boulevard</option>
                        <option value="privada">Privada</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>
                <div class="input_grupo">
                    <label for="vialidad_nombre">Nombre de Vialidad:</label>
                    <input type="text" name="vialidad_nombre" required>
                </div>
                <div class="input_grupo">
                    <label for="num_exterior">Número Exterior:</label>
                    <input type="text" name="num_exterior" required>
                </div>
                <div class="input_grupo">
                    <label for="num_interior">Número Interior:</label>
                    <input type="text" name="num_interior">
                </div>
                <div class="input_grupo">
                    <label for="codigo_postal">Código Postal:</label>
                    <input type="text" name="codigo_postal" pattern="[0-9]{5}" required>
                </div>

                <!-- Contacto -->
                <div class="input_grupo">
                    <label for="telefono_fijo">Teléfono Fijo:</label>
                    <input type="tel" name="telefono_fijo" pattern="[0-9]{10}" maxlength="10">
                </div>
                <div class="input_grupo">
                    <label for="telefono_celular">Teléfono Celular:</label>
                    <input type="tel" name="telefono_celular" pattern="[0-9]{10}" maxlength="10" required>
                </div>
                <div class="input_grupo">
                    <label for="correo_personal">Correo Electrónico Personal:</label>
                    <input type="email" name="correo_personal">
                </div>

                <!-- Idioma -->
                <div class="input_grupo">
                    <label>Habla Lengua Indígena:</label>
                    <select name="habla_lengua_indigena">
                        <option value="no">No</option>
                        <option value="si">Sí</option>
                    </select>
                </div>

                <!-- Ocupación -->
                <div class="input_grupo">
                    <label>Situación Laboral:</label>
                    <select name="situacion_laboral">
                        <option value="">Seleccionar</option>
                        <option value="trabajando">Trabajando</option>
                        <option value="jubilado">Jubilado/Pensionado</option>
                        <option value="desempleado">Desempleado</option>
                        <option value="estudiante">Estudiante</option>
                        <option value="hogar">Quehaceres del Hogar</option>
                    </select>
                </div>

                <!-- Discapacidad -->
                <div class="input_grupo">
                    <label>¿Tiene alguna discapacidad?</label>
                    <select name="discapacidad" multiple>
                        <option value="ninguna">Ninguna</option>
                        <option value="fisica">Física o Motriz</option>
                        <option value="visual">Visual</option>
                        <option value="auditiva">Auditiva</option>
                        <option value="intelectual">Intelectual</option>
                        <option value="psicosocial">Psicosocial</option>
                    </select>
                </div>

                <!-- Nivel Educativo -->
                <div class="input_grupo">
                    <label>Nivel Educativo:</label>
                    <select name="nivel_educativo">
                        <option value="">Seleccionar</option>
                        <option value="sin_estudios">Sin Estudios</option>
                        <option value="primaria_incompleta">Primaria Incompleta</option>
                        <option value="primaria_completa">Primaria Completa</option>
                        <option value="secundaria_incompleta">Secundaria Incompleta</option>
                        <option value="secundaria_completa">Secundaria Completa</option>
                    </select>
                </div>

                <!-- Motivación para Estudiar -->
                <div class="input_grupo">
                    <label>Motivación para Estudiar:</label>
                    <select name="motivacion" multiple>
                        <option value="certificado">Obtener Certificado</option>
                        <option value="educacion">Continuar Educación</option>
                        <option value="empleo">Mejorar Oportunidades de Empleo</option>
                        <option value="laborales">Mejorar Condiciones Laborales</option>
                        <option value="hijos">Ayudar a Hijos/Nietos con Tareas</option>
                    </select>
                </div>

                <div class="input_grupo">
                    <label for="programa_estudiante">Programa:</label>
                    <select id="programa_estudiante" name="programa_estudiante" required>
                        <option value="">Selecciona un programa</option> <!-- Opción por defecto -->
                    </select>
                    <span class="tooltip">Recuerda que debes registrar primero los programas:</span>
                </div>

                <button class="btn_submit" type="submit">Registrar</button>
            </form>
        </div>
    </div>

    <script src="../assets/js/sweetalert.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <script src="api/auth/login.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script src="./utilidades/coordinador_programa.js"></script>




</body>

</html>