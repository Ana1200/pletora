 <?php
 $result = categoriasd();
 $datos = Array();
 $categoriasProducto = Array();
 
 while ($row = mysqli_fetch_array($result)) {
     $datos[] = $row['Categoria'];
 }
 
 // Acciones adicionales con todas las categorías
 foreach ($datos as $categoria) {
     $result = vercategoria($categoria);
     while ($row = mysqli_fetch_array($result)) {
         $categoriasProducto[] = $row['categoria'];
         // Acciones específicas para cada producto de la categoría
     }
     
     foreach ($categoriasProducto as $categoriaN) {
     }
 
     // Limpiar el arreglo $categoriasProducto para la siguiente categoría
     $categoriasProducto = array();

?>
<!-- ======= Entrevista Category Section ======= -->
<section class="category-section">
      <div class="container" data-aos="fade-up">
        
        <div class="section-header d-flex justify-content-between align-items-center mb-5">
          <h2><?php echo $categoriaN;?></h2>
          <div><a href="allnotice.php?id=<?php echo $categoria?>&token=<?php echo hash_hmac('sha1',$categoria, KEY_TOKEN);?>" class="more">Mira todas las Entrevista</a></div>
        </div>

        <div class="row">
          <div class="col-md-9">
            <div class="d-lg-flex post-entry-2">
            <?php 
                  $result =Seccion($categoria);
                  $data = Array();
                  while($row = mysqli_fetch_array($result)){
                      $data[]=$row;
                  }
                  foreach($data as $producto){
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
              <a href="plantilla_nota.php?id=<?php echo $producto['ID_Nota']?>&token=<?php echo hash_hmac('sha1',$producto['ID_Nota'], KEY_TOKEN);?>" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
                <img src="assets/img/Img_Nota/<?php echo $imagen ?>" alt="" class="img-fluid">
              </a>
              <div>
                <div class="post-meta"><span class="date"><?php echo $categoriaN;?></span> <span class="mx-1">&bullet;</span>
                  <span><?php echo $fechaFormateada; ?></span>
                </div>
                <h3><a href="plantilla_nota.php?id=<?php echo $producto['ID_Nota']?>&token=<?php echo hash_hmac('sha1',$producto['ID_Nota'], KEY_TOKEN);?>"><?php echo $Intro?></a></h3>
                <p></p>
                <div class="d-flex align-items-center author">
                  <div class="photo"><img src="assets/img/logo.png" alt="" class="img-fluid"></div>
                  <div class="name">
                    <h3><a href="colaboradorespletora.php" class="text-dark text-decoration-none"><?php echo $autor?></a></h3>
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
                        <h2 class="mb-2"><a href="plantilla_nota.php?id=<?php echo $producto['ID_Nota']?>&token=<?php echo hash_hmac('sha1',$producto['ID_Nota'], KEY_TOKEN);?>"><?php echo $Intro?></a></a></h2>
                        <span class="author mb-3 d-block"><?php echo $autor ?></span>
                    </div>
                    <?php
                }
            }
            ?>
          </div>
        </div>
      </div>
    </section>
    <?php
 }
 ?><!-- End Culture Category Section -->
