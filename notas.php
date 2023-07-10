<?php
    include('sesion.php');
    include('header.php');
    include('datos_admin.php');
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<main id="main">
    <div class="container-fluid">
        <div class="row">
            <?php 
                include('headeradmin.php');
            ?>
            <main class="col-md-10 ms-sm-auto col-lg-12px-md-4">
              <div class="container-fluid my-3">
                <h3>Notas</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-danger">
                                <tr>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Introducción</th>
                                    <th scope="col">Autor</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $result = nota();
                                    $datos = Array();
                                    while($row = mysqli_fetch_array($result)){
                                        $datos[]=$row;
                                    }
                                    foreach($datos as $producto){
                                        $ID = $producto['ID_Nota'];
                                        $titulo = $producto['Titulo'];
                                        $pie = $producto['PieFoto'];
                                        $categoria = $producto['Categoria'];
                                        $texto = $producto['TextoNota'];
                                        $autor = $producto['Autor'];
                                        $fecha = $producto['Fecha'];
                                        $imagen = $producto['NombreImagen'];
                                        $Introduccion = $producto['Introduccion'];
                                    ?>
                                <tr>
                                    <!-- <th>
                                        <?php echo $ID;?>
                                    </th> -->
                                    <td>
                                        <?php echo $titulo; ?>
                                    </td>
                                    <td>
                                        <?php echo $Introduccion;?>
                                    </td>
                                    <td>
                                        <?php echo $autor; ?>
                                    </td>
                                    <td>
                                        <?php echo $fecha; ?>
                                    </td>
                                    <td>
                                        <a href="plantilla_nota.php?id=<?php echo $ID?>&token=<?php echo hash_hmac('sha1',$ID, KEY_TOKEN);?>">
                                            <button class="btn btn-primary">Ver<i class="fas fa-eye"></i> </button>
                                        </a>
                                        <a href="EditarNota.php?id=<?php echo $ID?>&token=<?php echo hash_hmac('sha1',$ID, KEY_TOKEN);?>">
                                            <button class="btn btn-warning">Editar<i class="fas fa-edit"></i></button> 
                                        </a>
                                        <a class="btnEliminar W-3" id="eliminar"  data-id="<?php echo $ID;?>"
                                            data-bs-toggle="modal" data-bs-target="#eliminaModal">
                                            <button class="btn btn-danger">Eliminar<i class="fa fa-trash"></i></button>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
              </div> 
            </main>
        </div>
    </div>
</main>
<div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="eliminarModalLabel">Eliminar</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
          ¿Desea eliminar la nota?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button id="eliminaModal" type="submit" class="btn btn-danger eliminar" data-bs-dismiss="modal">Eliminar</button>
        </div>
      </div>
    </div>
</div>

<script src="./script/login.js"></script>
<?php 
    include('footer.php');
?>