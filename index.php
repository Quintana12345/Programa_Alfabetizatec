<?php 
require_once __DIR__ . '/vendor/autoload.php'; // Asegúrate de incluir el autoload de Composer

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TecNM - INEA Alfabetizatec</title>
    <link rel="shortcut icon" href="./assets/img/favicon/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./assets/css/root.css">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>
    <header class="principal_header">
        <img src="./assets/img/logotipos/sep.png" alt="Logotipo SEP">
        <img src="./assets/img/logotipos/TecNM_Azteca.png" alt="Logotipo TECNM">
        <img src="./assets/img/logotipos/inea_blanco.png" alt="Logotipo INEA">
    </header>
    <main>
        <div class="principal">
            <div class="left">
                <h1>Alfabetizatec</h1>
                <img src="./assets/img/logotipos/alfabetizatec_icon.png" alt="logo alfabettzatec">
                <p>Programa Nacional AlfabetizaTEC
                    “Brigadas TecNM en Movimiento Nacional por la Alfabetización</p>

                <div class="actions">
                    <a href="./src/login.php" class="cta">Acceso</a>
                    <div class="cta">Conoce mas</div>
                </div>
            </div>
            <div class="right">
                <!-- Slider main container -->
                <div class="swiper-container">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide">
                            <img src="./assets/img/carousel_principal/1.jpeg" alt="imagen educandos">
                        </div>
                        <div class="swiper-slide">
                            <img src="./assets/img/carousel_principal/2.jpeg" alt="imagen educandos">
                        </div>
                        <div class="swiper-slide">
                            <img src="./assets/img/carousel_principal/3.jpeg" alt="imagen educandos">
                        </div>
                    </div>

                    <!--   <div class="swiper-pagination"></div>

                  -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>


                </div>
            </div>

        </div>
        <div class="convocatoria">
            <h2>Convocatoria</h2>
            <iframe src="assets/pdf/Convocatoria_Alfabetiza_TEC.pdf"  style="border: none;"></iframe>


        </div>
    </main>
    <footer></footer>

    <!-- Include Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper-container', {
            // Optional parameters
            direction: 'horizontal', // Cambié vertical a horizontal
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        });
    </script>
</body>

</html>