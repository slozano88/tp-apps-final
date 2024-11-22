<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo_inventario.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <script type="text/javascript" src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#tabla').dataTable();
        });
    </script>
</head>

<body>
    <?php
    session_start();
    include("conexion_db.php");


/*     if (!isset($_SESSION['id'])) {
        echo "Inicia sesion";
    } else {
        echo "Bienvenido, usuario con ID: " . $_SESSION['id'];
    } */
    $id_usuario = $_SESSION['id'];
    ?>
    <header>
        <nav>
            <ul class="sidebar">
                <li onclick=hideSidebar()><a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 96 960 960" width="26">
                            <path d="m249 849-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z" />
                        </svg></a></li>
                <li><a href="mis_recetas">Mis recetas</a></li>
                <li><a href="mi_inventario">Mi inventario</a></li>
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

    <div class="container mt-5">
        <div class="f_inventario">
            <form action="guardar_inv.php" method="POST" class="p-4 border rounded shadow-sm border-dark bg-dark text-light">
                <h1 class="text-center mb-4">Guarda tu inventario</h1>
                <div class="mb-3">
                    <label for="ingrediente" class="form-label">Nombre del ingrediente</label>
                    <input type="text" class="form-control bg-dark text-light" name="ingrediente" id="ingrediente" placeholder="Ingrese el nombre..." required="required">
                </div>
                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="text" class="form-control bg-dark text-light" name="cantidad" id="cantidad" placeholder="Ingrese una cantidad..." required="required">
                </div>
                <div class="mb-3">
                    <label for="categoria" class="form-label">Categoría</label>
                    <select class="form-select bg-dark text-light" name="categoria" id="categoria" required>
                        <option selected>Elegir...</option>
                        <?php
                        $query = "SELECT * FROM categorias";
                        $resultado = mysqli_query($conex, $query);
                        while ($row = mysqli_fetch_array($resultado)) { ?>
                            <option value="<?php echo $row['nombre_cat']; ?>"><?php echo $row['nombre_cat']; ?></option>
                        <?php } ?>
                    </select>
                    <div class="d-flex justify-content-center">
                        <button type="submit" name="cargar" class="btn btn-secondary btn-lg p-4 mt-5">Guardar Inventario</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<div class="tabla-ingredientes">
    <table id="tabla" class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Ingrediente</th>
                <th>Fecha agregado</th>
                <th>Cantidad</th>
                <th>Categoria</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM ingredientes INNER JOIN datos_usuarios on ingredientes.id_usuario = datos_usuarios.id WHERE ingredientes.id_usuario = '$id_usuario'";
            $resultado = mysqli_query($conex, $query);


            while ($row = mysqli_fetch_array($resultado)) { ?>
                <tr>
                    <td><?php echo $row['nombre_ingrediente']; ?></td>
                    <td><?php echo $row['fecha_agregado']; ?></td>
                    <td><?php echo $row['cantidad']; ?></td>
                    <td><?php echo $row['categoria']; ?></td>
                    <td><a class="btn btn-danger" href="eliminar.php?id_ingrediente=<?php echo $row['id_ingrediente']; ?>">Eliminar</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
    <?php
    include("guardar_inv.php");
    ?>
    <script>
        function mostrarAlerta(event) {
            event.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Error de credenciales...',
                text: 'Por favor inicie sesión para acceder a esta sección',
                confirmButtonText: 'Iniciar sesión'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'f_login.php';
                }
            });
        }
    </script>
</body>


</html>