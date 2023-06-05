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
            <main class="col-md-10 ms-sm-auto col-lg-12px-md-4">
              <div class="container-fluid my-3">
                <h3>Categorias</h3>
                <table class="table">
                    <thead class="table-danger">
                        <tr>
                            <th scope="col">Categoria</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $result = categoria();
                            $datos = Array();
                            while($row = mysqli_fetch_array($result)){
                                $datos[]=$row;
                            }
                            $total=0;
                            foreach($datos as $producto){
                                $ID = $producto['id'];
                                $categoria = $producto['categoria'];
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
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"data-id="<?php echo $ID;?>"data-status="<?php echo $status;?>"  onchange="toggleActivation(this)" <?php echo $isChecked; ?>>
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
            </main>
        </div>
    </div>
    <script src="./script/login.js"></script>
</main>

<?php 
    include('footer.php');
?>