 
 <?php
  require_once('query/config.php');
?>
 <!-- ======= Hero Slider Section ======= -->
 <section id="hero-slider" class="hero-slider">
      <div class="container-md" data-aos="fade-in">
        <div class="row">
          <div class="col-12">
            <div class="swiper sliderFeaturedPosts">
              <div class="swiper-wrapper">
              <?php
                  $result = Carousel();
                  $datos = Array();
                  while($row = mysqli_fetch_array($result)){
                      $datos[]=$row;
                  }
                  foreach($datos as $producto){
                      $ID = $producto['ID_Nota'];
                      $titulo = $producto['Titulo'];
                      $pie = $producto['PieFoto'];
                      $categoria = $producto['Categoria'];
                      $texto = $producto['TextoNota'];
                      $autor = $producto['Autor'];
                      $fecha = $producto['Fecha'];
                      $imagen = $producto['NombreImagen'];
                      $Intro = $producto['Introduccion'];
                  
                  ?>
                <div class="swiper-slide">
                  <a href="plantilla_nota.php?id=<?php echo $producto['ID_Nota']?>&token=<?php echo hash_hmac('sha1',$producto['ID_Nota'], KEY_TOKEN);?>" class="img-bg d-flex align-items-end"
                    style="background-image: url('assets/img/Fotos Edicion 4/r4.8.2.png');">
                    <div class="img-bg-inner">
                      <h2><?php echo $titulo?></h2>
                      <p><?php echo $Intro ?></p>
                    </div>
                  </a>
                </div>
                <?php
                  }
                ?>

               <!--  <div class="swiper-slide">
                  <a href="r4.12.html" class="img-bg d-flex align-items-end"
                    style="background-image: url('assets/img/Fotos Edicion 4/12.jpg');">
                    <div class="img-bg-inner">
                      <h2>Falsificación de escrituras, una práctica común</h2>
                      <p>Es importante incluir a un notario cuando adquieres una vivienda, ya que permite tener certeza jurídica de que lo que compras está libre de gravámenes, deudas y problemas.</p>
                    </div>
                  </a>
                </div> -->
                <!-- <div class="swiper-slide">
                  <a href="r4.14.html" class="img-bg d-flex align-items-end"
                    style="background-image: url('assets/img/Fotos Edicion 4/14.jpg');">
                    <div class="img-bg-inner">
                      <h2>Menor murió por desnutrición tras ocho días de abandono de la madre</h2>
                      <p>La mujer fue condenada por el delito de homicidio doloso en agravio de su hijo y violencia familiar hacia sus hijas, pero después se reclasificó a culposo.</p>
                    </div>
                  </a>
                </div> -->

              </div>
              <div class="custom-swiper-button-next">
                <span class="bi-chevron-right"></span>
              </div>
              <div class="custom-swiper-button-prev">
                <span class="bi-chevron-left"></span>
              </div>

              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Hero Slider Section -->