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
    <title>Datos del Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px
        }

        .card {
            margin-top: 50px;
        }
    </style>
</head>

    <main id="main">
    
        <div class="container-fluid">
            <div class="row">
    
                <?php include('datos_admin.php');
                include('headeradmin.php');
                ?>
                <main class="col-md-9 ms-sm-auto col-lg-12px-md-4">
                    
                    <div class="card">
                        <div class="card-header bg-danger">
                           <b> Editar Nota</b>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="mb-3 row">
                                    <input type="hidden" name="id_nota" value="<?php echo $ID ?>">
                                    <label for="Fecha" class="col-sm-2 col-form-label">Fecha</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="Fecha" value="<?php echo $fecha; ?>" required pattern="\d{4}-\d{2}-\d{2}">
                                        <span class="validity"></span>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="Cabeza" class="col-sm-2 col-form-label">Cabeza</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Cabeza" name="Cabeza" value="<?php echo $Titulo ?>" required>
                                        <span class="validity"></span>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="Intro" class="col-sm-2 col-form-label">Intro</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Intro" name="Intro" value="<?php echo $Introduccion ?>" required>
                                        <span class="validity"></span>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="PieFoto" class="col-sm-2 col-form-label">Pie de foto</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="PieFoto" name="PieFoto" value="<?php echo $PieFoto ?>" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="Autor" class="col-sm-2 col-form-label">Autor</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Autor" name="Autor" value="<?php echo $Autor ?>">
                                        <span class="validity"></span>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="categoria" class="col-sm-2 col-form-label">Categoría</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="categoria" id="categoria">
                                            <?php
                                            $result = categoria();
                                            $datos = Array();
                                            while($row = mysqli_fetch_array($result)){
                                                $datos[]=$row;
                                            }
                                            $total=0;
                                            foreach($datos as $producto){
                                                $ID = $producto['id'];
                                                $categoria = $producto['categoria'];
                                            ?>
                                            <option value="<?php echo $ID ?>" <?php if ($Categoria == $ID) echo "selected" ?>><?php echo $categoria ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="Descripcion" class="col-sm-2 col-form-label">Descripción</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" value="<?php echo $Descripcion ?>"> <?php echo $TextoNota ?> </textarea>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="Carrusel" class="col-sm-2 col-form-label">Carrusel</label>
                                    <div class="col-sm-10">
                                        <input type="checkbox" name="campoCheckbox" value="un_valor">
                                    </div>
                                </div>
                                <div class="container d-flex justify-content-center align-items-center">
                                    <div class="justify-content-center">
                                        <input type="submit" name="subir" value="Guardar" class="btn btn-primary" onclick="return confirm('¿Estás seguro de guardar los cambios?');" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </main>



        <script src="https://cdn.tiny.cloud/1/t2537jv6fs00yo0ry56l6ry7mb53wmv1bydm5ruxsslormaa/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

        <script>
            tinymce.init({
                selector: 'textarea#descripcion',
                plugins: 'image code',
                toolbar: 'undo redo | link image | code',
                /* enable title field in the Image dialog*/
                image_title: true,
                /* enable automatic uploads of images represented by blob or data URIs*/
                automatic_uploads: true,
                /*
                  URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
                  images_upload_url: 'postAcceptor.php',
                  here we add custom filepicker only to Image dialog
                */
                file_picker_types: 'image',
                /* and here's our custom image picker*/
                file_picker_callback: (cb, value, meta) => {
                    const input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');

                    input.addEventListener('change', (e) => {
                        const file = e.target.files[0];

                        const reader = new FileReader();
                        reader.addEventListener('load', () => {
                            /*
                              Note: Now we need to register the blob in TinyMCEs image blob
                              registry. In the next release this part hopefully won't be
                              necessary, as we are looking to handle it internally.
                            */
                            const id = 'blobid' + (new Date()).getTime();
                            const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                            const base64 = reader.result.split(',')[1];
                            const blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);

                            /* call the callback and populate the Title field with the file name */
                            cb(blobInfo.blobUri(), {
                                title: file.name
                            });
                        });
                        reader.readAsDataURL(file);
                    });

                    input.click();
                },
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
            });
        </script>

</html>
<?php
require './query/editarnota.php';
include('footer.php');