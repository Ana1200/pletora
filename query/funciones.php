<?php
function setq($sql,$die = false){  //Realizar una consulta a BD en primer nivel
  $dbuser = "root"; // El usuario
  $dbpass = ""; // El Pass
  $dbhost = "localhost"; // El host
  $db = "pletora"; // Nombre de la base
  
  $mysqli = new mysqli($dbhost, $dbuser,$dbpass, $db);
  $mysqli->query("SET CHARACTER SET utf8");
  $mysqli->query("SET NAMES utf8");
 
  if($die) die($sql);
  $result = $mysqli->query($sql);
  $mysqli->close();
 
  return($result);
 
 }
 
 function colaboradores(){
  $sql = 'SELECT * FROM colaboradores ';
   $result = setq($sql);

   return($result);
 }
 function subircolaboradores($nombre,$nombre_archivo,$semblanza){
  $sql = 'INSERT INTO colaboradores SET 
  Nombre = "'.$nombre.'",
  NombreImagen = "'.$nombre_archivo.'",
  Semblanza = "'.$semblanza.'",
  status = 1';
  $result = setq($sql);

  return($result);
 }
 function ediciones(){
  $sql = 'SELECT * FROM edicion WHERE status = 1';
   $result = setq($sql);

   return($result);
 }
 function edicion(){
  $sql = 'SELECT * FROM edicion ';
   $result = setq($sql);

   return($result);
 }
 function subiredicion($titulo,$nombre_archivo,$url){
  $sql = 'INSERT INTO edicion SET 
  Titulo = "'.$titulo.'",
  NombreImagen = "'.$nombre_archivo.'",
  URL = "'.$url.'",
  status = 1';
  $result = setq($sql);

  return($result);
 }
 function Seccion($categoria){
  $sql = 'SELECT * FROM nota WHERE Categoria = "'.$categoria.'" ORDER BY fecha DESC LIMIT 1';
  $result = setq($sql);

  return($result);
 }
 function Secciones($categoria) {
  $sql = 'SELECT * FROM nota WHERE Categoria = "'.$categoria.'"  ORDER BY fecha DESC LIMIT 3';
  $result = setq($sql);

  return $result;
}
 function Carousel(){
  $sql = 'SELECT * FROM nota WHERE Carrusel = "1"';
  $result = setq($sql);

  return($result);
 } 
 function logout(){
    session_start();
    session_destroy();

    header("Location: ../login.php");
 }
 function categorian(){
  $sql = 'SELECT * FROM categorias WHERE status = 1';
   $result = setq($sql);

   return($result);
 }
 function autoresn(){
  $sql = 'SELECT * FROM colaboradores WHERE status = 1';
   $result = setq($sql);

   return($result);
 }
 function categoria(){
   $sql = 'SELECT * FROM categorias';
   $result = setq($sql);

   return($result);
 }
 function status($status){
   if ($status == 1) {
      // El estado es 1, por lo tanto, el objeto está activo.
      echo '<span style="color:green">Activo</span>';
    } else {
      // El estado no es 1, por lo tanto, el objeto está suspendido.
      echo '<span style="color:orange">Inactivo</span>';
    }
 }
 function nota(){
   $sql = 'SELECT * FROM nota';
   $result = setq($sql);

   return($result);
 }
 function perfil($email){
  $sql = 'SELECT * FROM usuario WHERE email = "'.$email.'"';
  $result = setq($sql);

  return($result);
 }
 function subir($ID_Nota,$Cabeza,$PieFoto,$Categoria,$Descripcion,$Autor,$Fecha,$nombre_archivo,$Intro,$Carrusel,$fecha_actual){
  $sql = 'INSERT INTO Nota SET 
          ID_Nota = "'.$ID_Nota.'",
          Titulo = "'.$Cabeza.'",
          PieFoto = "'.$PieFoto.'",
          Categoria = "'.$Categoria.'",
          TextoNota = "'.$Descripcion.'",
          Autor = "'.$Autor.'",
          Fecha = "'.$Fecha.'",
          NombreImagen = "'.$nombre_archivo.'",
          Introduccion = "'.$Intro.'",
          Carrusel = "'.$Carrusel.'",
          Fecha_Carga = "'.$fecha_actual.'"';
  $result = setq($sql);

  return($result);
 }
 function editar_nota($ID_Nota,$Cabeza,$PieFoto,$Categoria,$Descripcion,$Autor,$Fecha,$nombre_archivo,$Intro,$Carrusel,$fecha_actual){
  $sql = 'UPDATE Nota SET 
          Titulo = "'.$Cabeza.'",
          PieFoto = "'.$PieFoto.'",
          Categoria = "'.$Categoria.'",
          TextoNota = "'.$Descripcion.'",
          Autor = "'.$Autor.'",
          Fecha = "'.$Fecha.'",
          Introduccion = "'.$Intro.'",
          Carrusel = "'.$Carrusel.'",
          Fecha_Carga = "'.$fecha_actual.'"
          WHERE ID_Nota = "'.$ID_Nota.'"';
  $result = setq($sql);

  return($result);
 }
 function vercategoria($Categoria){
  $sql = 'SELECT categoria FROM categorias WHERE id = "'.$Categoria.'"';
  $result = setq($sql);

  return($result);
 }
 function usuario($id_usuario){
  $sql = 'SELECT * FROM usuario WHERE id_usuario = "'.$id_usuario.'"';
  $result = setq($sql);

  return($result);
 }
 function editar($id_editar){
  $sql = 'SELECT*FROM nota WHERE ID_Nota = "'.$id_editar.'"';
  $result = setq($sql);

  return($result);
 }
?>