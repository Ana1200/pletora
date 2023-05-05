<?php 
    include('header.php');
    include('./query/funciones.php');
?>

<main id="main">
    <div class="container-fluid">
        <div class="row">
            <?php 
                include('headeradmin.php');
            ?>
            <main class="col-md-9 ms-sm-auto col-lg-12px-md-4">
              <div class="container-fluid my-3">
                <h3>Perfil</h3>
                    <?php
                        $email= 'cruzpacana28@gmail.com';
                        $result = perfil($email);

                        $datos = Array();
                        while($row = mysqli_fetch_array($result)){
                            $datos[]=$row;
                        }
                        $total=0;
                        foreach($datos as $producto){
                            $nombre = $producto['nombre'];
                            $apellidos = $producto['apellidos'];
                            $email = $producto['email'];
                            $contraseña = $producto['contraseña'];
                    ?>
                    <div class="container">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name" class="cols-sm-10 control-label"><b>Nombre(s)</b></label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Nombre"
                                                value="<?php echo $nombre?>" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="apellidos" class="cols-sm-10 control-label"><b>Apellido(s)</b></label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="apellidos" id="apellidos"
                                                value="<?php echo $apellidos?>" placeholder="Apellidos" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="password" class="cols-sm-10 control-label"><b>Contraseña</b></label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="password" minlength="8" class="form-control" name="password" id="password"
                                                value="<?php echo $contraseña?>" placeholder="Contraseña" required /> <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="password" class="cols-sm-10 control-label"><b>Contraseña</b></label>
                                    <div class="col-sm-10">
                                        <button class="btn btn-success" type="button" id="actualizar" onclick="confirmacion()">
                                            Actualizar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <button class="btn btn-success" type="button" id="actualizar" onclick="confirmacion()">
                            Actualizar
                        </button>
                        &nbsp
                        <button class="btn btn-danger" style="margin-top: 10px;" name="cancelar" id="cancelar"
                            type="button" onclick="reload()">
                            Descartar cambios
                        </button>
                    </div> 
                    <?php
                        }
                    ?>
              </div> 
            </main>
        </div>
    </div>
</main>

<?php 
    include('footer.php');
?>