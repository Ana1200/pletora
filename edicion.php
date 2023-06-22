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
                <h3>Edición Digital</h3>
                <div class="container">
                    <table class="table">
                        <thead class="table-danger">
                            <tr>
                                <th scope="col">Titulo</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $result = edicion();
                                $datos = Array();
                                while($row = mysqli_fetch_array($result)){
                                    $datos[]=$row;
                                }
                                $total=0;
                                foreach($datos as $producto){
                                    $ID = $producto['ID'];
                                    $categoria = $producto['Titulo'];
                                    $status = $producto['status'];
                                    $isChecked = $status == 1 ? 'checked' : '';
                                ?>
                            <tr>
                                <td>
                                    <?php
                                        echo $categoria;
                                    ?>
                                </td>
                                <td>
                                    <!-- Default switch -->
                                    <div class="form-check form-switch form-switch-sm">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"data-id="<?php echo $ID;?>"data-status="<?php echo $status;?>"  onchange="toggleActivationed(this)" <?php echo $isChecked; ?>>
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Activar/Desactivar</label>
                                    </div>
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