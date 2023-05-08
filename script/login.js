function abrirModalRestablecer() {
    $("#contraseñaolvidada").prop('disabled', true);
    $("#modal_restablecer_contraseña").modal({
        backdrop: 'static',
        keyboard: false
    });
    $("#modal_restablecer_contraseña").modal('show');
}
function RestablecerContraseña(){
    var email = document.getElementById("txt_email").value;
    /* if(email.length==0){
        /* return Swal.fire("Mensaje de advertencia","Llene los capos en blanco","warning"); 
        
    } */
    if (email !== "" && /^\S+@\S+\.\S+$/.test(email)) {
        var caracteres = "abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ123456789";
        var contrasena = "";

        for(var i=0;i<6;i++){
            contrasena += caracteres.charAt(Math.floor(Math.random()*caracteres.length))
        }
        $.post("./ajax/login.php?op=verificarcorreo",{
            "email":email
        }, function(data){
            console.log(data);
            if(data == "existe"){
                $.ajax({
                    url: "./ajax/login.php?op=recuperar_contrasena",
                    type: "POST",
                    data:{
                        email:email,
                        contrasena:contrasena
                    }
                }).done(function(resp){
                    location.reload();
                })
            }else{
                alert("Ingrese una cuenta de correo que este registrada");
            }
            
        })
    } else {
        alert("Por favor ingrese un email válido");
    }
}


function ingresar(){
    document.getElementById("enviarc").disabled = true;
    
    email = $("#email").val();
    contraseña = $("#contraseña").val();

    if(email && contraseña){
        $.post("./ajax/login.php?op=verificarlogin",{
            "email":email,
            "contraseña":contraseña
        }, function(data){
            if(data !="null"){
                console.log(data);
                if(data){
                    console.log("NO-QUIERO");
                        location.href ='./notas.php';
                    var usuario = JSON.parse(data);
                    if(usuario.id_usuario){
                        console.log("usuario.id_usuario");
                        console.log("NO-QUIERO");
                        location.href ='./notas.php';
                    }
                }
            }else{
                alert("usuario y/o contraseña incorrectos");
            }
        });
    }else {
        alert("Por favor, complete todos los campos.");
        document.getElementById("enviarc").disabled = false;
    }
}
function registro() {
    document.getElementById("registro").disabled = true;

    nombre = $("#nombre").val();
    apellido = $("#apellido").val();
    email = $("#email").val();
    contraseña = $("#contraseña").val();
    contraseñaconfirm = $("#contraseñaconfirm").val();

    if (nombre && apellido && email && contraseña && contraseñaconfirm) {
        // Validar si el correo ya existe
        $.post("./ajax/login.php?op=verificarcorreo",{
            "email":email
        }, function(data){
            if(data == "existe"){
                alert("El correo ya está registrado.");
                document.getElementById("registro").disabled = false;
            }else{
                if(contraseña == contraseñaconfirm){
                    $.post("./ajax/login.php?op=registrar",{
                        "nombre":nombre,
                        "apellido":apellido,
                        "email":email,
                        "contraseña":contraseña,
                        "contraseñaconfirm" : contraseñaconfirm
                    }, function(data){
                        if(data !="null"){
                            location.href ='../notas.php';
                        }else{
                            alert("usuario y/o contraseña incorrectos");
                        }
                    });
                } else {
                    alert("Verifica que las contraseñas sean iguales");
                    document.getElementById("registro").disabled = false;
                }
            }
        });
    } else {
        alert("Por favor, complete todos los campos.");
        document.getElementById("registro").disabled = false;
    }
    
}
function mostrar(){
    var tipo = document.getElementById("contraseña");

    if(tipo.type == 'password'){
        tipo.type = 'text';
    }else{
        tipo.type = 'password';
    }
}
function ver() {
    a = document.getElementById('ver');
    var id = a.getAttribute('data-id');
    console.log(id);
    $.post("./ajax/login.php?op=vernota",{
          "id":id
      },function(data){
       var datos = JSON.parse(data);
       console.log(datos);
       $('#titulo').val(datos.titulo);
  $('#pie_foto').val(datos.pie_foto);
    });
  }
  function editar(){
    a = document.getElementById('editar');
    var id = a.getAttribute('data-id');
    console.log(id);
    $.post("./ajax/login.php?op=vernota",{
          "id":id
      },function(data){
       var datos = JSON.parse(data);
       console.log(datos);
       
    });
  }
  $(document).ready(function(){
    var idEliminar = -1;
    var fila;
      $(".btnEliminar").click(function(){
        idEliminar = ($(this).data('id'));
        fila=($(this).parent('td').parent('tr'));
      });
      $(".eliminar").click(function(){
          alert(idEliminar);
          alert("funcion eliminar");
        $.ajax({
          url: "ajax/login.php?op=eliminarnota",
          method: 'POST',
          data:{
            id:idEliminar
          }
        }).done(function(res){
          console.log(res);
        })
      });
    });


