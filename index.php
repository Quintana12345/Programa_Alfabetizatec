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
                    <button id="convocatoria">Descárga la convocatoria </button>
                    <button id="acceso">Acceso</button>
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
                <h4>Avances Educativos en TecNM Minatitlán</h4>
                <span>Con la colaboración del IVEA, el TecNM Minatitlán ha dado un paso importante en la acreditación de conocimientos, beneficiando a 19 personas con certificados de educación básica.</span>
                <div class="cta"><button type="button">Explorar</button></div>
            </div>

            <div class="card_landing">
                <img src="./assets/img/carousel_principal/tec1.png" alt="Noticia tec">
                <h4>IVEA y TecNM: Uniendo Fuerzas</h4>
                <span>Gracias al trabajo conjunto del TecNM y el IVEA, más adultos tienen la oportunidad de certificar sus estudios de primaria y secundaria, reduciendo el rezago educativo en Veracruz.</span>
                <div class="cta"><button type="button">Explorar</button></div>
            </div>

            <div class="card_landing">
                <img src="./assets/img/carousel_principal/tec1.png" alt="Noticia tec">
                <h4>Certificados Que Transforman Vidas</h4>
                <span>El TecNM Minatitlán aplicó exámenes de acreditación, permitiendo que 19 participantes cumplan sus metas educativas y mejoren sus oportunidades laborales.</span>
                <div class="cta"><button type="button">Explorar</button></div>
            </div>

            <div class="card_landing">
                <img src="./assets/img/carousel_principal/tec1.png" alt="Noticia tec">
                <h4>Impulso a la Educación Básica</h4>
                <span>Con acciones concretas como estas, el TecNM e IVEA refuerzan su compromiso con la educación, ofreciendo herramientas esenciales para el desarrollo personal y profesional.</span>
                <div class="cta"><button type="button">Explorar</button></div>
            </div>
        </div>




    </main>

    <footer>
        <?php include('./src/layout/footer.php') ?>
    </footer>

    <!-- Include Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Seleccionar el botón por su ID
        const accesoButton = document.getElementById('acceso');

        // Agregar un evento al hacer clic
        accesoButton.addEventListener('click', () => {
            // Redirigir al archivo login.php
            window.location.href = './src/login.php';
        });



        // Seleccionamos el botón por su ID
        const button = document.getElementById('convocatoria');

        // Añadimos un evento de clic al botón
        button.addEventListener('click', () => {
            // Redirigimos al archivo PDF
            window.location.href = 'assets/pdf/Convocatoria_Alfabetiza_TEC_2023.pdf';
        });
    </script>
</body>

</html>