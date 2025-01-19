<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALFABETIZATEC - Login</title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="../assets/css/root.css">

</head>

<body>

    <header>
        <img src="../assets/img/logotipos/sep.png" alt="Logotiopo SEP">
        <img src="../assets/img/logotipos/TecNM_Azteca.png" alt="Logotiopo TecNM">
        <img src="../assets/img/logotipos/inea_blanco.png" alt="Logotiopo Inea">
    </header>
    <main>
        <div class="decorador"></div>

        <div class="container_form">


            <div></div>
            <!-- Formulario de login -->
            <form class="form_login">
                <img src="../assets/img/logotipos/alfabetizatec_logo.png" alt="Alfabetizate logo">

                <div class="motivational_message">
                    ¡Bienvenido! "Cada día es una nueva oportunidad para aprender y crecer."
                </div>
                <div class="content_form">
                    <label  for="correo">Correo:</label>
                    <input class="input_form" type="email" id="correo" name="correo" required>

                    <label for="Contraseña">Contraseña:</label>
                    <input class="input_form" type="password" id="Contraseña" name="Contrasena" required>
                </div>


                <button class="btn_submit" type="submit">Iniciar Sesión</button>
            </form>
            <div></div>
        </div>


        <div class="decorador"></div>


    </main>
    <footer></footer>



    <footer>
        <p>&copy; 2024 ALFABETIZATEC</p>
    </footer>


        <script src="../assets/js/sweetalert.js"></script>
        <script src="../assets/js/jquery.js"></script>
        <script src="api/auth/login.js"></script>
        <!-- <script>
            Swal.fire("SweetAlert2 is working!");
        </script> -->
</body>


</html>