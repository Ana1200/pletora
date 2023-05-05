<?php
include("../query/funciones.php");

Class Login{
    public function _construct(){

    }
    public function verificar($email,$contraseña){
        $sql = 'SELECT * FROM usuario
            WHERE email = "'.$email.'" AND contraseña = "'.$contraseña.'"';
        $result = setq($sql);
        return($result);
        
    }
    public function registrar($nombre, $apellido, $email, $contraseña,$contraseñaconfirm){
        $sql = 'INSERT INTO usuario SET
                    nombre = "'.$nombre.'",
                    apellidos = "'.$apellido.'",
                    email = "'.$email.'",
                    contraseña = "'.$contraseña.'"';
        $result = setq($sql);
        return($result);        
    }
    public function correoExistente($email){
        $sql = 'SELECT*FROM usuario WHERE email = "'.$email.'"';
        $result = setq($sql);
        return($result);
    }
    public function Restablecercontra($email,$contrasena){
        $sql = 'UPDATE usuario SET
                    contraseña = "'.$contrasena.'"
                    WHERE email = "'.$email.'"';
        $result = setq($sql);
        return($result);
    }
    public function eliminarnota($id){
        $sql = 'DELETE FROM nota WHERE ID_Nota = "'.$id.'"';
        $result = setq($sql);
    }
    public function vernota($id){
        $sql = 'SELECT * FROM nota WHERE ID_Nota = "'.$id.'"';
        $result = setq($sql);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        $json_data = json_encode($rows);
        echo $json_data;
    }
    
}