<?php
    include('header.php');
    $result = revistas();
    
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<main id="main">
    <div class="container-fluid p-5">
        <div class="col-auto text-center mx-auto">
            <h1>Edición Digital</h1>
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
                            $Nombre = $producto['Titulo'];
                            $NombreImagen = $producto['NombreImagen'];
                            $URL = $producto['URL'];
                    ?>
                    <div class="col-lg-2 col-md-4 mb-3">
                        <div class="card">
                            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" -mdb-ripple-color="light">
                                <a href="<?php echo $URL?>" target="_blank" data-id="<?php echo $ID;?>" data-nombre="<?php echo $Nombre;?>" class="text-dark text-decoration-none">
                                    <img src="assets/img/Img_Edicion/<?php echo $NombreImagen ?>" class="w-100" style="height:300px;" alt="<?php $NombreImagen?>" />
                                    <div class="mask"></div>
                                    <div class="hover-overlay">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                    </div>
                                </a>
                            </div>
                            <a href="<?php echo $URL?>" data-id="<?php echo $ID;?>" target="_blank"class="text-dark text-decoration-none">
                                <h3 class="col-auto text-center mx-auto">
                                    <b><?php echo $Nombre?></b>
                                </h3>
                            </a>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div> 
    </div>
</main>

<script src="./script/login.js"></script>

<?php 
    include('footer.php');
?>
