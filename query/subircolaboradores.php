<?php
include_once('funciones.php');

//Definición de variables
//Titulo 
$nombre = "";
//URL
$semblanza = "";

$exito    = "";
$error      = "";


    if (isset($_POST['subir'])) {
        //Titulo
        $nombre = $_POST['name'];
        //URL
        $semblanza = $_POST['semblanza'];
        
        //nombre de la imagen subida de foto
        if (isset($_FILES['imagen'])) {
            // Obtener información del archivo
            $nombre_archivo = $_FILES['imagen']['name'];
            // Obtener información del archivo
            $fileName = $_FILES['imagen']['name'];
            $fileTmp = $_FILES['imagen']['tmp_name'];
            $fileSize = $_FILES['imagen']['size'];
            $fileError = $_FILES['imagen']['error'];
            // Obtener la extensión del archivo
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            // Extensiones de archivo permitidas
            $allowedExtensions = array('jpg', 'jpeg', 'png');

            // Verificar si la extensión del archivo es válida
            if (in_array($fileExt, $allowedExtensions)) {
                // Verificar si no hay errores en la carga del archivo
                if ($fileError === 0) {
                    // Ruta donde se guardará la imagen 
                    $ubicacion = "C:/xampp/htdocs/pletora/assets/img/Img_Colaboradores/";
                    // Generar un nombre único para la imagen usando $ID_Nota
                    $nombre_archivo = $nombre_archivo;
                     // Ruta completa del archivo
                    $fileNameNew = $ubicacion . $nombre_archivo;
                    // Mover el archivo a la ubicación deseada
                    move_uploaded_file($fileTmp, $fileNameNew);

                    /* $ubicacion_temporal = $_FILES['imagen']['tmp_name'];
                    move_uploaded_file($ubicacion_temporal, $ubicacion . $nombre_archivo); */
                    echo "La imagen se ha subido correctamente.";
                } else {
                    echo "Error en la carga de la imagen.";
                }
            }  else {
                echo "La extensión del archivo no está permitida. Por favor, selecciona una imagen JPEG o PNG.";
            }
        }

        /* $sqlInsert   = "INSERT INTO Nota (ID_Nota, Titulo, PieFoto, Categoria, TextoNota, Autor, Fecha, NombreImagen, Introduccion, Carrusel, Fecha_Carga) 
         values ('$ID_Nota','$Cabeza','$PieFoto','$Categoria','$Descripcion','$Autor','$Fecha','$nombre_archivo ','$Intro','$Carrusel',' $fecha_actual')"; */

         $result = subircolaboradores($nombre,$nombre_archivo,$semblanza);
        /* $q1     = mysqli_query($Conect, $sqlInsert); */
        if ($result) {
            $exito    = "Datos ingresados correctamente";
        } else {
            $error      = "Error al ingresar datos";
        }
    }

    if ($exito) {
?>
        <div class="alert alert-success" role="alert">
            <?php echo $exito ?>
        </div>
<?php
        header("refresh:2;url=Colaboradores.php");
    }

?>