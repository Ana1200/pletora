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
                if(data){
                    //console.log(data);
                    if (data === "ERROR") {
                        alert("usuario y/o contraseña incorrectos.");
                      } else {
                        location.href ='./notas.php';
                      }                      
                    /* var usuario = JSON.parse(data);
                    if(usuario.id_usuario){
                        location.href ='./notas.php';
                    } */
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
                            location.href ='./notas.php';
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
function ver(element) {
    var id = element.getAttribute('data-id');
    console.log(id);
    $.post("./ajax/login.php?op=vernota",{
          "id":id
      },function(data){
       location.href ='./plantilla_nota.php';
    });
  }
  function editar(element){
    var id = element.getAttribute('data-id');
    $.post("./ajax/login.php?op=editarnota",{
          "id":id
      },function(data){
        location.href ='./EditarNota.php';
    });
  }
  function toggleActivation(element) {
    var isChecked = document.getElementById("flexSwitchCheckDefault").checked;
    var id = element.getAttribute('data-id');
    var status = element.getAttribute('data-status');
    var table = 'categorias';
        console.log(status);
        console.log(id);
        console.log(table);
    // Crear un objeto FormData para enviar los datos
    var formData = new FormData();
    formData.append('id', id);
    formData.append('status', status);
    formData.append('table', table);

    // Enviar la solicitud a PHP para actualizar la base de datos
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./ajax/login.php?op=update_activation", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            location.reload();
            //console.log(xhr.responseText);
        }
    };
    xhr.send(formData);
    }
    function toggleActivationed(element) {
        var isChecked = document.getElementById("flexSwitchCheckDefault").checked;
        var id = element.getAttribute('data-id');
        var status = element.getAttribute('data-status');
        var table = 'edicion';
        console.log(status);
        console.log(id);
        console.log(table);
        // Crear un objeto FormData para enviar los datos
        var formData = new FormData();
        formData.append('id', id);
        formData.append('status', status);
        formData.append('table', table);
    
        // Enviar la solicitud a PHP para actualizar la base de datos
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "./ajax/login.php?op=update_activation", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                //console.log(xhr.responseText);
                location.reload();
            }
        };
        xhr.send(formData);
    }
    function agregado(){
        Swal.fire({
            title: 'Error!',
            text: 'Do you want to continue',
            icon: 'error',
            confirmButtonText: 'Cool'
          })
    }
    function toggleActivationCola(element) {
        var isChecked = document.getElementById("flexSwitchCheckDefault").checked;
        var id = element.getAttribute('data-id');
        var status = element.getAttribute('data-status');
        var table = 'colaboradores';
        console.log(status);
        console.log(id);
        console.log(table);
        // Crear un objeto FormData para enviar los datos
        var formData = new FormData();
        formData.append('id', id);
        formData.append('status', status);
        formData.append('table', table);
    
        // Enviar la solicitud a PHP para actualizar la base de datos
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "./ajax/login.php?op=update_activation", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                //console.log(xhr.responseText);
                location.reload();
            }
        };
        xhr.send(formData);
    }
	$(document).ready(function() {
		$('#entrar').click(function() {
			grecaptcha.ready(function() {
                grecaptcha.execute('6LfQN3omAAAAALwZTp4MtKWbt9K6Tc83DWd57gsD', {
                    action: 'validarUsuario'
                }).then(function(token) {
                    console.log(token);
                    document.getElementById("token").value = token;
                });
			});
		});
	});
    $(document).ready(function() {
        $('#verColaborador').on('show.bs.modal', function(e) {
            var id = $(e.relatedTarget).data('id');
            var nombre = $(e.relatedTarget).data('nombre');
            var semblanza = $(e.relatedTarget).data('sem');
    
            // Actualizar el título del modal
            $('#modalTitle').text(nombre);
    
            // Actualizar el contenido del modal
            $('#modalContent').text(semblanza);
        });
    });    
  $(document).ready(function(){
    var idEliminar = -1;
    var fila;
      $(".btnEliminar").click(function(){
        idEliminar = ($(this).data('id'));
        fila=($(this).parent('td').parent('tr'));
      });
      $(".eliminar").click(function(){
        $.ajax({
          url: "ajax/login.php?op=eliminarnota",
          method: 'POST',
          data:{
            id:idEliminar
          }
        }).done(function(res){
          location.href = './notas.php';
        })
      });
    });


