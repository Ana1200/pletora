
<?php
session_start(); 
require_once ('query/config.php');
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
?>
  <title>Plétora</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- <meta property="og:url" content="https://www.pletorahidalgo.com/Fidel_Arce_segunda_entrega.html" /> -->
  <meta property="og:type" content="article" />
  <meta property="og:title" content="<?php echo $Titulo ?>" /><!-- TITULO NOTICIA -->
  
                                                
  <meta property="og:description" content="<?php echo $Introduccion ?>"/> <!-- DESCRIPCION NOTICIA  -->
  <meta property="og:image" content="<?php echo $NombreImagen ?>" /> <!-- URL DE LA IMAGEN  -->

     <!-- Load Facebook SDK for JavaScript -->
     <div id="fb-root"></div>
     <script>(function (d, s, id) {
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) return;
         js = d.createElement(s); js.id = id;
         js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));</script>

  </header><!-- End Header -->

  <main id="main">
    <section class="single-post-content">
      <div class="container">
        <div class="row">
          <div class="col-md-9 post-content" >
            <!-- ======= Single Post Content ======= -->
            <div class="single-post">
              <div class="post-meta"><span class="date"></span> <span class="mx-1">
                </span> <span></span>
              </div>
              <h1 class="mb-5"><?php echo $Titulo ?></h1> <!-- ======= Titulo ======= -->
              <p><span class="firstcharacter"><?php echo $parrafos[0];?></span></p> <!-- ======= PRIMER PARRAFO ======= -->
              <figure class="my-4">
                <img src="assets/img/Img_Nota/<?php echo $NombreImagen ?>" alt="" class="img-fluid">
                <figcaption><?php echo $PieFoto ?></figcaption>   <!-- ======= PIE DE IMAGEN ======= -->
              </figure>

              
              <?php
              foreach ($parrafos as $index => $parrafo) {
                if ($index != 0) {
                  echo "<p>" . $parrafo . "</p>";
                }
              }
              ?>
              
              <!-- Empieza AUTOR -->
              <div class="post-meta">
                <a class="text-md-start" href="autor.html">Redacción Plétora Lex</a> 
              </div>

              <!--Empieza Compartir en Facebook -->
              <!--va el link de la pagina -->
              <div class="fb-share-button" data-href="" data-layout="box_count" data-size="large">
                <a target="_blank"
                  href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fpletorahidalgo.com%2F&amp;src=sdkpreparse"
                  class="fb-xfbml-parse-ignore">Compartir
                </a>
              </div>
              <!--Termina Compartir en Facebook -->

              <!-- Empieza tags -->
              <div class="aside-block">
                <ul class="aside-tags list-unstyled">
                  <h3><a class="aside-title" href="resultados_categorias.html">Tags</a></h3>
                  <li><a href=""><?php echo $VerCategoria ?> </a></li>
                  <li><a href=""> </a></li>
                  <li><a href=""> </a></li>
                </ul>
              </div><!-- End Single Post Content -->
            </div>
          </div>
          <div class="col-md-3">
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

  
 