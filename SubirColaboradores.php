<?php
    include('sesion.php');
    include('header.php');
    include('datos_admin.php');
    include('query/subircolaboradores.php');
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
                <h3>Subir Colaboradores</h3>
              </div> 
              <div class="container">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="cols-sm-10 control-label"><b>Nombre</b></label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Nombre"
                                         required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-sm-10">
                                <label for="imagen1" class="col-sm-2 col-form-label">Imagen</label>
                                    <div class="col-sm-10">
                                        <input name="imagen" id="imagen" type="file" accept=".jpg, .jpeg, .png" />
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="semblanza" class="cols-sm-10 control-label"><b>Semblanza</b></label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="semblanza" id="semblanza" placeholder="Nombre"
                                         required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="contaier p-5">
                        <div class="container d-flex justify-content-center align-items-center">
                            <div class="justify-content-center">
                                <input type="submit" name="subir" value="Guardar" class="btn btn-primary" />
                            </div>
                        </div>
                    </div>
                </form>
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