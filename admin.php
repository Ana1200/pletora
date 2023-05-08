<?php
    include('datos_admin.php');
    include('header.php');
    
?>

<main id="main">
    <div class="container-fluid">
        <div class="row">
            <?php 
                include('headeradmin.php');
            ?>
            <main class="col-md-9 ms-sm-auto col-lg-12px-md-4">
                <div class="container">
                    <h1>Bienvenido al panel de administración</h1>
                    <p>Contenido de la página aquí.</p>
                    <div class="container">
                        <div class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
                            <div class="border border-danger box-solid" style="width:100%">
                                <div class="box-header bg-danger with-border">
                                    <h3 class="box-title">Historial de notas</h3>
                                </div>
                                <div class="box-body">
                                    <div class="row">
                                        <form action="">
                                            <div class="row text-center">
                                                <div class="col">
                                                    <label for="fecha_inicio">Fecha de inicio:</label>
                                                    <input type="date" id="fecha_inicio" name="fecha_inicio" value="2023-04-19">
                                                </div>
                                                <!-- <div class="col">
                                                    <label for="">&nbsp;</label><br>
                                                    <button class="btn btn-success">
                                                        <i class="fa fa-search"></i>Buscar
                                                    </button>
                                                </div> -->
                                            </div>
                                        </form>
                                        <div class="col text-center">
                                            <label for="">&nbsp;</label><br>
                                            <div class="box-header with-border">
                                                <h5 class="box-title">Notas 
                                                    <a class="btn btn-primary" id="btnagregar" href="SubirNota.php">
                                                        <i class="fa fa-plus-circle"></i> Agregar
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid">
                                    <div class="panel-body table-responsive" id="listadoregistros">
                                            <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                                            <thead>
                                                <th>Id</th>
                                                <th>Titulo</th>
                                                <th>Categoría</th>
                                                <th>Texto</th>
                                                <th>Autor</th>
                                                <th>Fecha</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $result = nota();
                                                    $datos = Array();
                                                    while($row = mysqli_fetch_array($result)){
                                                        $datos[]=$row;
                                                    }
                                                    $total=0;
                                                    foreach($datos as $producto){
                                                        $ID = $producto['ID_Nota'];
                                                        $titulo = $producto['Titulo'];
                                                        $categoria = $producto['Categoria'];
                                                        $texto = $producto['TextoNota'];
                                                        $autor = $producto['Autor'];
                                                        $fecha = $producto['Fecha'];
                                                    ?>
                                                    <tr>
                                                        <th>
                                                            <?php echo $ID;?>
                                                        </th>
                                                        <td>
                                                            <?php echo $titulo; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $categoria;?>
                                                        </td>
                                                        <td>
                                                            <?php echo $texto; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $autor; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $fecha; ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>                          
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- AQUI QUEDE -->
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</main>

<?php 
    include('footer.php');
?>