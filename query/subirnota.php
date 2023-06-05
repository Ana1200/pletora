<?php
include('funciones.php');

//Definición de variables
//Titulo de nota
$Cabeza = "";
//Descripcipn
$Intro = "";
//Pie de foto
$PieFoto = "";
//Categoría
$Categoria = "";
//Texto de nota
$Descripcion = "";
//Autor
$Autor = "";
//Fecha de nota
$Fecha = "";
//nombre de la imagen subida de foto
$imagen = "";
//ID_NOTA
$ID_Nota = "";
//Carrusel
$Carrusel = "";
$exito    = "";
$error      = "";


    if (isset($_POST['subir'])) {

        function getGUID()
        {
            if (function_exists('com_create_guid')) {
                return com_create_guid();
            } else {
                mt_srand((float)microtime() * 10000); //optional for php 4.2.0 and up.
                $charid = strtoupper(md5(uniqid(rand(), true)));
                $hyphen = chr(45); // "-"

                $uuid = substr($charid, 0, 8) . $hyphen
                    . substr($charid, 8, 4) . $hyphen
                    . substr($charid, 12, 4) . $hyphen
                    . substr($charid, 16, 4) . $hyphen
                    . substr($charid, 20, 12); // "}"
                return $uuid;
            }
        }

        //Titulo de nota
        $Cabeza        = $_POST['Cabeza'];
        //Descripcipn
        $Intro       = $_POST['Intro'];
        //Pie de foto
        $PieFoto     = $_POST['PieFoto'];
        //Categoría
        $Categoria   = $_POST['categoria'];
        //Texto de nota
        $Descripcion   = $_POST['descripcion'];
        //Autor
        $Autor   = $_POST['Autor'];
        //Fecha de nota
        $Fecha   = $_POST['Fecha'];
        //ID_NOTA
        $ID_Nota =  getGUID();
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
                    $ubicacion = "C:/xampp/htdocs/pletora/assets/img/Img_Nota/";
                    // Generar un nombre único para la imagen usando $ID_Nota
                    $nombre_archivo = $ID_Nota . '.' . $fileExt;
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
        //Fecha de carga      
        $fecha_actual = date('Y-m-d H:i:s');
        //Carrusel

        if (isset($_POST["campoCheckbox"])) {
            $Carrusel = true;
            // echo "Campo de checkbox enviado: ".$_POST["campoCheckbox"]."<br/>";
        } else {
            $Carrusel = false;
        }

        /* $sqlInsert   = "INSERT INTO Nota (ID_Nota, Titulo, PieFoto, Categoria, TextoNota, Autor, Fecha, NombreImagen, Introduccion, Carrusel, Fecha_Carga) 
         values ('$ID_Nota','$Cabeza','$PieFoto','$Categoria','$Descripcion','$Autor','$Fecha','$nombre_archivo ','$Intro','$Carrusel',' $fecha_actual')"; */

         $result = subir($ID_Nota,$Cabeza,$PieFoto,$Categoria,$Descripcion,$Autor,$Fecha,$nombre_archivo,$Intro,$Carrusel,$fecha_actual);
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
        header("refresh:2;url=Notas.php");
    }

?>