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
        //nombre de la imagen subida de foto
        if (isset($_FILES['imagen'])) {
            // Obtener información del archivo
            $nombre_archivo = $_FILES['imagen']['name'];
            $ubicacion = "C:/xampp/htdocs/Pletora php/assets/img/Img_Nota/";
            $ubicacion_temporal = $_FILES['imagen']['tmp_name'];
            move_uploaded_file($ubicacion_temporal, $ubicacion . $nombre_archivo);
        } else {
            $nombre_archivo = "no";
        }
        //ID_NOTA
        $ID_Nota =  getGUID();
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