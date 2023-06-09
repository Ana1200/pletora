<?php
    include('header.php');
    $result = colaboradores();
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<main id="main">
    <div class="container-fluid p-5">
        <div class="row">
            <div class="col-auto text-center mx-auto">
                <h3>Colaboradores</h3>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <?php 
                        $datos = Array();
                        while($row = mysqli_fetch_array($result)){
                            $datos[]=$row;
                        }
                        $total=0;
                        foreach($datos as $producto){
                            $ID = $producto['ID'];
                            $Nombre = $producto['Nombre'];
                            $NombreImagen = $producto['NombreImagen'];
                            $Semblanza = $producto['Semblanza'];
                    ?>
                    <div class="col-lg-2 col-md-4 mb-3">
                        <div class="card">
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" -mdb-ripple-color="light">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#verColaborador" data-id="<?php echo $ID;?>" data-nombre="<?php echo $Nombre;?>" data-sem="<?php echo $Semblanza;?>">
                                    <img src="assets/img/Img_Colaboradores/<?php echo $NombreImagen ?>" class="w-100" style="height:300px;" alt="<?php $NombreImagen?>" />
                                    <div class="mask"></div>
                                    <div class="hover-overlay">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-auto text-center mx-auto">
                                <h3>
                                    <b><?php echo $Nombre?></b>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div> 
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="verColaborador" tabindex="-1" aria-labelledby="verModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verModalLabel"><span id="modalTitle"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="modalContent"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<script src="./script/login.js"></script>

<?php 
    include('footer.php');
?>
