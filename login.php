<?php 
    include('header.php');
?>

<main id="main">
    <div class="container">
        <div class="container mt-5 p-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title text-center">Inicio de Sesión</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="form__usuario">
                                    <label for="">Usuario</label>
                                    <input type="email" class="usuario" id="email" name="">
                                </div>
                                <div class="form__clave">
                                    <label for="">Contraseña</label>
                                    <input type="password" class="clave" id="contraseña" name="">
                                    
                                    <a id="ver" class="ver_clave" onclick="mostrar()"><i id="icono" class="fas fa-eye"></i></a>
                                </div>
                                <div class="text-center p-2">
                                    <a  type="submit" class="btn btn-primary" name="ingresar" id="enviarc"  onclick="ingresar()">Ingresar</a>
                                </div>
                                <div class="text-center p-2">
                                    <a  type="submit" name="contraseñaolvidada" id="contraseñaolvidada" onclick="abrirModalRestablecer()">Olvide mi contraseña</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
<!-- MODAL PARA RECUPERAR CPONTRASEÑA -->
    <div class="modal" tabindex="-1" id="modal_restablecer_contraseña" role="dialog">
        <div class="modal-dialog modla-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Restablecer contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for=""><b>Ingrese el email registrado en el usuario para enviarle su contraseña restablecida</b></label>
                <input type="text" class="form-control"name="" id="txt_email" placeholder="Ingrese email">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="RestablecerContraseña()">Enviar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>
</main>


<!-- Librería de jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="./script/login.js"></script>

<?php include('footer.php')?>