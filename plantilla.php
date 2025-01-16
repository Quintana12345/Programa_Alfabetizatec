<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinador General</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            height: 100vh; /* Asegura que el cuerpo ocupe toda la altura de la ventana */
            background-image: url('logos/Tec.1-removebg-preview.png'); /* Ruta de la imagen */
            background-size: 70%; /* Aquí ajustamos el tamaño de la imagen de fondo */
            background-position: center; /* Centra la imagen */
            background-repeat: no-repeat; /* Evita que la imagen se repita */
            background-attachment: fixed; /* Mantiene la imagen fija mientras haces scroll */
            overflow: hidden; /* Desactiva el desplazamiento */
        }
        header {
            background-color: #007BFF;
            color: white;
            text-align: center;
            padding: 20px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            width: 100%;
            z-index: 1000; /* Asegura que el header quede sobre el contenido */
        }
        footer {
            background-color: #007BFF;
            color: white;
            text-align: center;
            padding: 10px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 1;
            padding: 20px;
            padding-top: 90px; /* Asegura que el contenido no quede oculto debajo del header */
            box-sizing: border-box;
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.9); /* Fondo blanco semi-transparente */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1000px;
            box-sizing: border-box;
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
        }
        .form-box {
            width: 48%;
        }
        .form-container h2 {
            font-size: 1.8em;
            margin-bottom: 30px; /* Ajuste el espacio debajo del título */
            color: #007BFF;
            text-align: center; /* Centrar el texto dentro del formulario */
            width: 100%;
        }
        table {
            width: 100%;
            margin-bottom: 20px;
            border-spacing: 0;
        }
        td {
            padding: 10px;
            vertical-align: middle;
        }
        td input, td select {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        td input:focus, td select:focus {
            border-color: #007BFF;
            outline: none;
        }
        .form-group {
            margin-bottom: 15px;
            width: 100%;
        }
        .form-group button {
            background-color: #007BFF;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1em;
            width: 50%;
            margin: 20px auto; /* Centra el botón */
            display: block;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <header>
        <h1>Coordinador Tecnológico</h1>
    </header>

    <div class="content">
        <!-- Aquí iría el contenido principal de tu página -->
    </div>

    <footer>
        <p>&copy; 2024 Coordinador General. Todos los derechos reservados.</p>
    </footer>

</body>
</html>
