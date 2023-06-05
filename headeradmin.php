
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar1 navbar-dark bg-dark">
                <div class="container-fluid d-lg-none d-md-none d-xl-none">
                    <div class="row">
                        <div class="col">
                            <a class="navbar-brand text-white" ><h4><b><?php echo $nombre?></b></h4></a>
                        </div>
                        <div class="col">
                            <a class="navbar-brand text-white" href="./query/logout.php"><b>Cerrar sesión</b>
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <a class="navbar-brand text-white" href="perfil.php">
                        <i class="fa fa-user" aria-hidden="true"></i><b>Ver perfil</b>
                    </a>
                    <a class="navbar-brand text-white" href="notas.php">
                        <i class="fa fa-sticky-note-o" aria-hidden="true"></i>    
                        <b>Notas</b>
                    </a>
                    <a class="navbar-brand text-white" href="categoria.php">
                        <b>Categorias</b>
                    </a>
                    <a class="navbar-brand text-white" href="edicion.php">
                        <b>Edición Digital</b>
                    </a>
                    <a class="navbar-brand text-white" href="Colaboradores.php">
                        <b>Colaboradores</b>
                    </a>
                    <a class="navbar-brand text-white" href="SubirNota.php">
                        <b>Subir Nota</b>
                    </a>
                    <a class="navbar-brand text-white" href="Subiredicion.php">
                        <b>Subir Edición Digital</b>
                    </a>
                    <a class="navbar-brand text-white" href="SubirColaboradores.php">
                        <b>Subir Colaboradores</b>
                    </a>
                </div>
            </nav>
            <nav class="navbar1 navbar-dark bg-dark d-none d-md-block d-lg-block">
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-10">
                            <a class="navbar-brand text-white" ><h4><b><?php echo $nombre?></b></h4></a>
                        </div>
                        <div class="col-2">
                            <a class="nav-link text-white" href="./query/logout.php"><b>Cerrar sesión
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                            </b></a>
                        </div>
                    </div>
                </div>
            </nav>
            <nav class="col-md-2 bg-dark sidebar1 d-none d-md-block">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="perfil.php">
                                <i class="fa fa-user" aria-hidden="true"></i>    
                                <b>Ver perfil</b>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="notas.php">
                                <i class="fa fa-sticky-note-o" aria-hidden="true"></i>
                                <b>Notas</b>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="categoria.php">
                                <b>Categorias</b>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="edicion.php">
                                <b>Edición Digital</b>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="Colaboradores.php">
                                <b>Colaboradores</b>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="SubirNota.php">
                                <b>Subir nota</b>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="Subiredicion.php">
                                <b>Subir Edición Digital</b>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="SubirColaboradores.php">
                                <b>Subir Colaboradores</b>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
    
</body>
</html>