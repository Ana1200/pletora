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

        //ID nota
        $id_nota = $_POST['id_nota'];
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
        
        //ID_NOTA
        $ID_Nota =  $id_nota;
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

         $result = editar_nota($ID_Nota,$Cabeza,$PieFoto,$Categoria,$Descripcion,$Autor,$Fecha,$Intro,$Carrusel,$fecha_actual);
        /* $q1     = mysqli_query($Conect, $sqlInsert); */
        if ($result) {
            $exito    = "Datos actualizados correctamente";
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