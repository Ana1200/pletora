<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/PHPMailer/src/Exception.php';
require '../PHPMailer/PHPMailer/src/PHPMailer.php';
require '../PHPMailer/PHPMailer/src/SMTP.php';

require '../modelo/Login.php';

 $login = new Login();

 $email = isset($_POST['email']);
 $contraseña = isset($_POST['contraseña']);

 switch ($_GET["op"]){
    case 'verificarlogin':
        $email = $_POST['email'];
        $contraseña = $_POST['contraseña'];
        

        $rspta = $login->verificar($email,$contraseña);
        $fetch = $rspta->fetch_object();

        $rspta = $login->verificar($email,$contraseña);
        if ($rspta !== null) {
            $fetch = $rspta->fetch_object();
            if(isset($fetch)){
                $id_usuario = $fetch->id_usuario;
                session_start();
                // Almacenar el nombre de usuario en la sesión
                $_SESSION['id'] = $id_usuario;
                echo $_SESSION['id'];  
            }else{
                echo "ERROR";
            }

        } else {
            echo "ERROR";
        }

    break;
    case 'verificarcorreo':
        $email = $_POST['email'];

        $rspta = $login->correoExistente($email);
        $fetch = $rspta->fetch_object();
        if ($fetch) {
            echo "existe";
        } else {
            echo "ok";
        }
    
    break;
    case 'registrar':
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $contraseña = $_POST['contraseña'];
        $contraseñaconfirm = $_POST['contraseñaconfirm'];

        if($contraseña == $contraseñaconfirm){
            $rspta = $login->registrar($nombre, $apellido, $email, $contraseña,$contraseñaconfirm);
            if ($rspta !== null) {
                $fetch = $rspta->fetch_object();
                echo json_encode($fetch);
            } else {
                echo json_encode(null);
            }
        }else{
            
        }

    break;
    
    case 'recuperar_contrasena':
        $email = $_POST['email'];
        $contrasena = $_POST['contrasena'];

        $restablecercontra= $login->Restablecercontra($email,$contrasena);

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
            );
            $mail->SMTPDebug = 0;
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp-mail.outlook.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'prueba1_789@outlook.com';  /* prueba1_789@outlook.com  */        //SMTP username
            $mail->Password   = 'prueba1.123';  /*Outlook: prueba1.123 */                             //SMTP password
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('prueba1_789@outlook.com', 'Pletora');
            $mail->addAddress($email);

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Restablecer contrasena';
            $mail->Body    = 'Tu contraseña fue restablecida <br> 
                                Nueva contraseña: <b> '.$contrasena;
            $mail->send();
            echo "Correo enviadooooo";
        } catch (Exception $e) {
            echo "0";
        }

    break;
    case 'eliminarnota':
        $id = $_POST['id'];

        $eliminar = $login->eliminarnota($id);
    break;
    case 'vernota':
        $id = $_POST['id'];

        $rspta = $login->vernota($id);
        $fetch = $rspta->fetch_object();

        $rspta = $login->vernota($id);
        if ($rspta !== null) {
            $fetch = $rspta->fetch_object();
            if(isset($fetch)){
                $ID_Nota = $fetch->ID_Nota;
                session_start();
                // Almacenar el ID
                $_SESSION['id_nota'] = $ID_Nota;
            }
            echo $_SESSION['id_nota'];

        } else {
            echo "error";
        }
    break;
    case 'editarnota':
        $id = $_POST['id'];
        $id = $_POST['id'];

        $rspta = $login->vernota($id);
        $fetch = $rspta->fetch_object();

        $rspta = $login->vernota($id);
        if ($rspta !== null) {
            $fetch = $rspta->fetch_object();
            if(isset($fetch)){
                $ID_Nota = $fetch->ID_Nota;
                session_start();
                // Almacenar el ID
                $_SESSION['id_nota_editar'] = $ID_Nota;
            }
            echo $_SESSION['id_nota_editar'];

        } else {
            echo "error";
        }
    break;
    case 'update_activation':
        $id = $_POST['id'];
        $status = $_POST['status'];
        $table = $_POST['table'];

        // Actualizar el estado en la base de datos según tus necesidades
        // Aquí debes agregar tu código para realizar la actualización en la base de datos

        if ($status == 0) {
            // Código para activar el elemento en la base de datos
            echo "El elemento ha sido activado en la base de datos.";
            $rspta = $login->activar($id,$table);
        } else {
            // Código para desactivar el elemento en la base de datos
            echo "El elemento NO ha sido desactivado en la base de datos.";
            $rspta = $login->desactivar($id,$table);
        }
    break;
 }
?>