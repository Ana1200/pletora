<?php
    include('header.php');
    $result = colaboradores();
    if(isset($_POST) && isset($_POST['btnSubmit'])){
        // Código a ejecutar cuando se cumpla la condición
        echo "<pre>";
        print_r ($_POST); 
        echo "</pre>";

    }
    
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<main id="main">
    <div class="container-fluid p-5">
        <div class="col-auto text-center mx-auto">
            <h1>Contáctanos</h1>
        </div>
        <div class="col-auto text-center mx-auto">
            <div class="col-8 col-auto text-center mx-auto ">
                <form  method="POST">
                    <input type="hidden" id="token" name="token">
                    <div class="form-group">
                        <label for="nombre">Nombre Completo:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono:</label>
                        <input type="number" class="form-control" id="telefono" name="telefono" >
                    </div>
                    <div class="form-group">
                        <label for="asunto">Asunto:</label>
                        <input type="text" class="form-control" id="asunto" name="asunto" required>
                    </div>
                    <button type="button" name="btnSubmit" id="entrar" class="btn btn-primary">Enviar</button>
                    <!-- <div class="text-center p-2">
                        <button type="button" class="btn btn-primary" id="contacta" name="contacta" >Enviar</button>
                    </div> -->
                </form>
            </div> 
        </div>
    </div>
    <div class="container P-3" >
        <div class="row gy-4">
          <div class="col-md-4 col-auto text-center mx-auto">
            <div class="info-item">
              <i class="bi bi-geo-alt" style="font-size:48px"></i>
              <h3>Dirección</h3>
              <address class="col-auto text-center mx-auto">Plétora Lex, carretera Pachuca-Sahagún KM 3.5 interior 200, CP.
                42185, Colonia Las Águilas, Mineral de la Reforma, Hidalgo</address>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-4 col-auto text-center mx-auto">
            <div class="info-item info-item-borders">
              <i class="bi bi-phone" style="font-size:48px"></i>
              <h3 class="col-auto text-center mx-auto">Número telefónico</h3>
              <p><a href="tel:+155895548855" class="text-dark text-decoration-none">7711791173</a></p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-4 col-auto text-center mx-auto">
            <div class="info-item">
              <i class="bi bi-envelope" style="font-size:48px"></i>
              <h3>Email</h3>
              <p class="col-auto text-center mx-auto"><a href="mailto:info@example.com" target="_blank" class="text-dark text-decoration-none">revistapletora@gmail.com</a></p>
            </div>
          </div><!-- End Info Item -->
        </div>
        </div><!-- End Contact Form -->
      </div>
</main>

<script src="./script/login.js"></script>

<?php 
    include('footer.php');
?>
