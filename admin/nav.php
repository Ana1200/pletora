<?php 
    include('../query/loginProceso.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/03a89292db.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid ">
        <a class="navbar-brand" href="#"><?php echo $_SESSION['nombreUsuario']; ?></a>
        <button class="navbar-toggler d-none  d-sm-block d-xs-block d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Ver perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Notas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../query/logout.php">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main class="main">
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 bg-light sidebar d-none d-md-block">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Ver perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Notas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../query/logout.php">Cerrar sesión</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-12px-md-4">
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
                                            <div class="col">
                                                <label for="">&nbsp;</label><br>
                                                <button class="btn btn-success">
                                                    <i class="fa fa-search"></i>Buscar
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="col text-center">
                                        <label for="">&nbsp;</label><br>
                                        <div class="box-header with-border">
                                            <h5 class="box-title">Notas 
                                                <button class="btn btn-primary" id="btnagregar" onclick="mostrarform(true)">
                                                    <i class="fa fa-plus-circle"></i> Agregar
                                                </button>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
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
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- AQUI QUEDE -->
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
