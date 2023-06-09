<?php
    include('header.php');
    $result = revistas();
    
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<main id="main">
    <div class="container-fluid p-5">
        <div class="col-auto text-center mx-auto">
            <h1 class="p-3">Sobre Nosotros</h1>
        </div>
        <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <img src="assets/img/LOGOTIPO.png" alt="" class="img-fluid">
                    </div>
                    <div class="col">
                        <h3>Entender las leyes, tarea de todos</h3>
                        <p>
                        Plétora Lex surge como medio de consulta para estudiosos del derecho, trabajadores de los tres poderes, con temas periodísticos abordados desde la perspectiva jurídica, pero también para orientar al ciudadano sobre cómo entender la legislación y utilizarla ante ilícitos.
                        <br>
                        Entender las leyes no debería ser exclusivo de los abogados, sino de la mayoría de personas, ya que ninguno está exento de participar en un hecho jurídico como una compra de terreno, un accidente de tránsito o del requerimiento de la autoridad por algún malentendido.
                        <br>
                        En 2020, la Encuesta Nacional de Educación Cívica de INEGI reveló que más del 87 por ciento de sondeados se siente orgulloso de ser mexicano; sin embargo, sólo 55 de cada cien se interesan en los asuntos públicos del país.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>
                        Entre los seis principales problemas a resolver se encuentran la corrupción, pobreza, inseguridad, desempleo, desempeño del gobierno y la mala aplicación de la ley.
                        <br>
                        Para atacar estos asuntos, los menores niveles de confianza de la ciudadanía en las instituciones los concentran diputados locales, senadores y congresistas federales; la policía y los jueces. Quizá, en parte, esto se deba que se desconoce cómo trabaja un representante popular, las facultades de cada nivel de gobierno, además de los vicios en los procesos legales.
                        <br>
                        Incrementar la participación ciudadana y devolver la dignidad al ejercicio público no es una tarea exclusiva de los servidores, como medios tenemos la responsabilidad de ofrecer información útil para que nuestros lectores se sientan seguros de que siempre hay una salida a los conflictos del lugar en donde viven.
                        </p>
                    </div>
                    <div class="col">
                        <img src="assets/img/balanza-mazo-documento.jpg" alt="" class="img-fluid">
                    </div>
                </div>
            </div> 
    </div>
</main>

<script src="./script/login.js"></script>

<?php 
    include('footer.php');
?>
