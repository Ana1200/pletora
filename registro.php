<?php 
    include('header.php');
?>

<main id="main">
    <div class="container">
        <div class="container mt-5 p-3">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title text-center">Registro</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="form-group">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                </div>
                                <div class="form-group">
                                    <label for="apellido">Apellido:</label>
                                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" >
                                </div>
                                <div class="form-group">
                                    <label for="contraseña">Contraseña:</label>
                                    <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                                </div>
                                <div class="form-group">
                                    <label for="contraseña">Confirma contraseña:</label>
                                    <input type="password" class="form-control" id="contraseñaconfirm" name="contraseñaconfirm" required>
                                </div>
                                <div class="text-center p-2">
                                    <a type="submit" class="btn btn-primary" id="registro" name="ingresar" onclick="registro()">Registrarse</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="./script/login.js"></script>

<?php include('footer.php')?>