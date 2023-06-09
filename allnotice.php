
<?php
session_start(); 
include('header.php');

$id= isset($_GET['id']) ? $_GET['id'] : NULL;
$token= isset($_GET['token']) ? $_GET['token'] :NULL;

if($id == '' || $token ==''){
  echo ' Error al procesar la peticion';
  exit;
}else{
  $token_tmp = hash_hmac('sha1',$id, KEY_TOKEN);
    if($token == $token_tmp){
      $sql = 'SELECT count(ID_Nota) FROM nota WHERE ID_Nota = "'.$id.'"';
      $sql = setq($sql);
      $row = mysqli_fetch_row($sql);

      // Obtener el valor del contador
      $contador = $row[0];
      if($contador>0){
        $sql = 'SELECT * FROM nota WHERE ID_Nota = "'.$id.'"';
        $result = setq($sql);
        $datos = Array();
        while($row = mysqli_fetch_array($result)){
            $datos[]=$row;
        }
          foreach($datos as $producto){
            $ID_Nota = $producto['ID_Nota'];
            $Titulo = $producto['Titulo'];
            $PieFoto = $producto['PieFoto'];
            $Categoria = $producto['Categoria'];
            $TextoNota = $producto['TextoNota'];
            $Autor = $producto['Autor'];
            $Fecha = $producto['Fecha'];
            $NombreImagen = $producto['NombreImagen'];
            $Introduccion = $producto['Introduccion'];
            $Carrusel = $producto['Carrusel'];
            $Fecha_Carga = $producto['Fecha_Carga'];
          }
          $parrafos = explode("\n", $TextoNota);

          $vercategoria = vercategoria($Categoria);
          $datos = mysqli_fetch_assoc($vercategoria);
          $VerCategoria = $datos['categoria'];
      }
    }else{
      echo ' Error al procesar la peticion';
      exit;
    }     
  }   
  $result = vercategoria($id);
     while ($row = mysqli_fetch_array($result)) {
         $categoriasProducto[] = $row['categoria'];
         // Acciones específicas para cada producto de la categoría
     }
     foreach ($categoriasProducto as $categoriaN) {
    }
    $result =allnotice($id);
    $data = Array();
    while($row = mysqli_fetch_array($result)){
        $data[]=$row;
    }
    
    
?>

  <main id="main">
    <section class="single-post-content">
      <div class="container">
        <div class="row">
          <div class="col-md-9 post-content" >
            <h3>Categoria: <?php echo $categoriaN ?></h3>
            <div class="auto">
            <?php
            if (mysqli_num_rows($result) > 0) {
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
            ?>
                <div class="row" style="height: 200px;">
                    <div class="col">
                        <img src="assets/img/Img_Nota/<?php echo $imagen ?>" alt="" class="img-fluid">
                    </div>
                    <div class="col">
                        <div class="post-meta"><span class="date"><?php echo $categoriaN;?></span> <span class="mx-1">&bullet;</span>
                            <span><?php echo $fechaFormateada; ?></span>
                        </div>
                        <h3><a href="plantilla_nota.php?id=<?php echo $producto['ID_Nota']?>&token=<?php echo hash_hmac('sha1', $producto['ID_Nota'], KEY_TOKEN);?>" class="text-dark text-decoration-none"><?php echo $titulo?></a></h3>
                        <p><?php echo $Intro ?></p>
                        <div class="d-flex align-items-center author">
                        <div class="photo"><img src="assets/img/logo.png" alt="" class="img-fluid"></div>
                        <div class="name">
                            <h3><a href="autor.html"><?php echo $autor?></a></h3>
                        </div>
                        </div>
                    </div>
                </div>
            <?php
                }
              }else{
                ?>
                <div class="row" style="height: 200px;">
                    <div class="col">
                        <h5>LO SENTIMOS NO SE TIENEN NOTICIAS REFERENTE A ESTA CATEGORIA</h5>
                    </div>
                </div>
              <?php
              }
            ?>
            </div>
          </div>
          <div class="col-md-3">
          <h3 class="aside-title">Tags</h3>
            <div class="aside-block">
                <ul class="aside-tags list-unstyled">
                  <li><a href=""><?php echo $categoriaN ?> </a></li>
                </ul>
              </div>
            <!-- ======= Sidebar ======= -->
            <div class="aside-block">
              <p></p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <script src="./script/login.js"></script>
  <?php
  include('footer.php')
  ?>

  
 