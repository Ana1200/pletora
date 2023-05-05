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
                <h3>Categorias</h3>
                <table class="table">
                    <thead class="table-danger">
                        <tr>
                            <th scope="col">ID</th>
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
                            ?>
                        <tr>
                            <th>
                                <?php
                                    echo $ID;
                                ?>
                            </th>
                            <td>
                                <?php
                                    echo $categoria;
                                ?>
                            </td>
                            <td>
                                <?php
                                    status($status)
                                ?>
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
</main>

<?php 
    include('footer.php');
?>