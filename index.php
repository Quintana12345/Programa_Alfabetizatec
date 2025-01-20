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
        <div class="hero">
            <div class="content">
                <h1>¡Bienvenido al arranque del programa AlfabetizaTEC! </h1>
                <p>Una iniciativa del TecNM y el INEA, que busca transformar vidas mediante la alfabetización y la conclusión de estudios básicos para personas mayores de 15 años.</p>

                <div class="cta">
                    <button>Descárga la convocatoria </button>
                    <button>Acceso </button>
                </div>
            </div>
        </div>

        <section>
            <h3>
                Programa Nacional AlfabetizaTEC
                “Brigadas TecNM en Movimiento Nacional por la Alfabetización
            </h3>

            <div class="row">
                <div class="izq">
                    <img src="./assets/img/carousel_principal/ensenansa.png" alt="Enseñanza imagen">
                </div>
                <p>
                    El programa Alfabetizatec del TecNM busca combatir el rezago educativo en México al brindar educación básica a personas que no saben leer ni escribir.
                    En esencia, su objetivo principal es erradicar el analfabetismo en el país a través de la participación activa de los estudiantes de los Institutos Tecnológicos Federales como voluntarios en la enseñanza de habilidades fundamentales como la lectura, escritura y aritmética.
                </p>
            </div>
        </section>

        <div class="home_cards">
            <div class="card_landing">
                <img src="./assets/img/carousel_principal/tec1.png" alt="Noticia tec">
                <h4>Comienzan los primeros resultados</h4>
                <span> Hoy, el Tecnológico Nacional de México (TecNM) Minatitlán, en colaboración con el Instituto Veracruzano para la Educación para Adultos (IVEA), llevó a cabo la aplicación de 19 exámenes de acreditación de conocimientos para obtener certificados de primaria y secundaria.</span>
                <div class="cta"><button type="button">Explorar</button></div>
            </div>

            <div class="card_landing">
                <img src="./assets/img/carousel_principal/tec1.png" alt="Noticia tec">
                <h4>Comienzan los primeros resultados</h4>
                <span> Hoy, el Tecnológico Nacional de México (TecNM) Minatitlán, en colaboración con el Instituto Veracruzano para la Educación para Adultos (IVEA), llevó a cabo la aplicación de 19 exámenes de acreditación de conocimientos para obtener certificados de primaria y secundaria.</span>
                <div class="cta"><button type="button">Explorar</button></div>
            </div>

            <div class="card_landing">
                <img src="./assets/img/carousel_principal/tec1.png" alt="Noticia tec">
                <h4>Comienzan los primeros resultados</h4>
                <span> Hoy, el Tecnológico Nacional de México (TecNM) Minatitlán, en colaboración con el Instituto Veracruzano para la Educación para Adultos (IVEA), llevó a cabo la aplicación de 19 exámenes de acreditación de conocimientos para obtener certificados de primaria y secundaria.</span>
                <div class="cta"><button type="button">Explorar</button></div>
            </div>

            <div class="card_landing">
                <img src="./assets/img/carousel_principal/tec1.png" alt="Noticia tec">
                <h4>Comienzan los primeros resultados</h4>
                <span> Hoy, el Tecnológico Nacional de México (TecNM) Minatitlán, en colaboración con el Instituto Veracruzano para la Educación para Adultos (IVEA), llevó a cabo la aplicación de 19 exámenes de acreditación de conocimientos para obtener certificados de primaria y secundaria.</span>
                <div class="cta"><button type="button">Explorar</button></div>
            </div>
            
        </div>



    </main>

    <footer>
        <?php  include('./src/layout/footer.php') ?>
    </footer>

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