                
<!-- ======= Entrevista Category Section ======= -->
<section class="category-section">
      <div class="container" data-aos="fade-up">
        <?php
        $categoria = 9;
        $result = vercategoria($categoria);
        $datos = Array();
        while($row = mysqli_fetch_array($result)){
          $datos[]=$row;
        }
        foreach($datos as $producto){
          $categoriaN = $producto['categoria'];
        }
        ?>
        <div class="section-header d-flex justify-content-between align-items-center mb-5">
          <h2><?php echo $categoriaN;?></h2>
          <div><a href="category.html" class="more">Mira todas las Entrevista</a></div>
        </div>

        <div class="row">
          <div class="col-md-9">
            <div class="d-lg-flex post-entry-2">
              <a href="r4.8.html" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
                <img src="/assets/img/Fotos Edicion 4/r4.8.2.png" alt="" class="img-fluid">
              </a>
              <div>
                <?php
                  $result =Seccion($categoria);
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
                    $fechaFormateada = date("M-Y", strtotime($fecha));
                  }
                ?>
                <div class="post-meta"><span class="date"><?php echo $categoriaN;?></span> <span class="mx-1">&bullet;</span>
                  <span><?php echo $fechaFormateada; ?></span>
                </div>
                <h3><a href="Corrupcion_Hidalgo.html"><?php echo $Intro?></a></h3>
                <p></p>
                <div class="d-flex align-items-center author">
                  <div class="photo"><img src="assets/img/logo.png" alt="" class="img-fluid"></div>
                  <div class="name">
                    <h3><a href="autor.html"><?php echo $autor?></a></h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- =================================================================================== -->
          <div class="col-md-3">
            <?php
            $result = Secciones($categoria);
            $datos = array();
            while ($row = mysqli_fetch_array($result)) {
                $datos[] = $row;
            }

            foreach ($datos as $producto) {
                $currentID = $producto['ID_Nota'];

                if ($currentID != $ID) {
                    $titulo = $producto['Titulo'];
                    $pie = $producto['PieFoto'];
                    $categoria = $producto['Categoria'];
                    $texto = $producto['TextoNota'];
                    $autor = $producto['Autor'];
                    $fecha = $producto['Fecha'];
                    $imagen = $producto['NombreImagen'];
                    $Intro = $producto['Introduccion'];
                    $fechaFormateada = date("M-Y", strtotime($fecha));
                    ?>
                    <div class="post-entry-1 border-bottom">
                        <div class="post-meta">
                            <span class="date"><?php echo $categoriaN;?></span>
                            <span class="mx-1">&bullet;</span>
                            <span><?php echo $fechaFormateada; ?></span>
                        </div>
                        <h2 class="mb-2"><a href="r4.9.html"><?php echo $Intro ?></a></h2>
                        <span class="author mb-3 d-block"><?php echo $autor ?></span>
                    </div>
                    <?php
                }
            }
            ?>
          </div>
        </div>
      </div>
    </section><!-- End Culture Category Section -->