<?php include("conexion_db.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos_inicio.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <script type="text/javascript" src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
</head>

<body>
    <header>
        <nav>
            <ul class="sidebar">
                <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26">
                            <path d="m249 849-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z" />
                        </svg></a></li>
                <li><a href="mis_recetas.php">Mis recetas</a></li>
                <li><a href="mi_inventario.php">Mi inventario</a></li>
                <li><a href="registro.php">Registrate</a></li>
                <?php
                if (isset($_SESSION['id'])) {
                    echo '<li><a href="logout.php">Cerrar Sesión</a></li>';
                } else {
                    echo '<li><a href="f_login.php">Iniciar sesión</a></li>';
                }
                ?>
            </ul>
            <ul>
                <li class="marca"><a href="Index.php">MilRecetas</a></li>
                <li class="hideOnMobile"><a href="mis_recetas.php">Mis recetas</a></li>
                <li class="hideOnMobile"><a href="mi_inventario.php">Mi inventario</a></li>
                <li class="hideOnMobile"><a href="registro.php">Registrarse</a></li>
                <?php
                if (isset($_SESSION['id'])) {
                    echo '<li class="hideOnMobile"><a href="logout.php">Cerrar Sesión</a></li>';
                } else {
                    echo '<li><a href="f_login.php">Iniciar sesión</a></li>';
                }

                ?>
                <li class="menu-button" onclick=showSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26">
                            <path d="M120 816v-60h720v60H120Zm0-210v-60h720v60H120Zm0-210v-60h720v60H120Z" />
                        </svg></a></li>
            </ul>
        </nav>
    </header>

    <div class="row">
        <div class="col-md-6">
            <?php
            $id_receta = $_GET['id'];
            $query = "SELECT * FROM recetas WHERE id_receta = '$id_receta'";
            $resultado = mysqli_query($conex, $query);
            $row = mysqli_fetch_array($resultado);
            ?>

            <div class="card-header text-center mt-1">
                <strong>
                    <h2>Formulario de Modificar Receta</h2>
                </strong>
            </div>
            <div class="p-2">
                <form class="row" action="proceso_modificar.php?id=<?php echo $row['id_receta']; ?>" method="POST" enctype="multipart/form-data">

                    <div class="col-12 p-2">
                        <label class="form-label"><strong>
                                <h5>Foto de la receta</h5>
                            </strong></label>
                        <input type="file" class="form-control bg-dark text-light border-dark" name="foto_receta" value="<?php echo $row['nombre_img']; ?>">
                        <img class="img-fluid" src="img_recetas/<?php echo $row['nombre_img']; ?>" alt="Imagen Receta">
                    </div>

                    <div class="col-12 p-2">
                        <label class="form-label"><strong>Nombre de la receta</strong></label>
                        <input type="text" REQUIRED autocomplete="off" class="form-control bg-dark text-light border-dark" name="nombre_receta" value="<?php echo $row['nombre']; ?>">
                    </div>

                    <div class="col-12 p-2">
                        <label class="form-label"><strong>Descripción</strong></label>
                        <textarea class="form-control bg-dark text-light border-dark" name="descripcion_receta" rows="4"><?php echo $row['descripcion']; ?></textarea>
                    </div>
                    
                    <div class="col-12 p-2">
                        <label class="form-label"><strong>Preparación</strong></label>
                        <textarea class="form-control bg-dark text-light border-dark" name="preparacion" rows="4"><?php echo $row['preparacion']; ?></textarea>
                    </div>

                    <div class="d-grid gap-2 p-2" >
                        <button type="submit" class="btn btn-secondary" name="modificar_receta">Modificar Receta</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card-header text-center mt-5">
                <strong>
                    <h2>Listado de Recetas</h2>
                </strong>
            </div>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Imagen</th>
                        <th colspan="2" class="text-center">Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM recetas";
                    $resultado = mysqli_query($conex, $query);
                    while ($row = mysqli_fetch_array($resultado)) {
                    ?>
                        <tr>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $row['descripcion']; ?></td>
                            <td><img height="70px" width="60px" src="img_recetas/<?php echo $row['nombre_img']; ?>"></td>
                            <td><a class="btn btn-warning" href="modificar.php?id=<?php echo $row['id_receta']; ?>">Modificar</a></td>
                            <td><a class="btn btn-danger" href="eliminar.php?id_receta=<?php echo $row['id_receta']; ?>">Eliminar</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>




</body>

</html>