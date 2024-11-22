<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MilRecetas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="estilos_inicio.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <script type="text/javascript" src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>


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
                <li><a href="mis_recetas.php">Mis recetas</a></li>
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
        <div class="f_recetas">
            <form id="form-guardar-receta" method="POST" enctype="multipart/form-data" class="p-4 border-dark rounded shadow-sm bg-dark text-light">
                <h1 class="text-center mb-4">Subí tu Receta</h1>

                <div class="mb-3">
                    <label for="nombre_receta" class="form-label">Nombre de la Receta</label>
                    <input type="text" class="form-control bg-dark text-light" name="nombre_receta" id="nombre_receta" placeholder="Ingrese el nombre de la receta..." required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción de la Receta</label>
                    <textarea class="form-control bg-dark text-light" name="descripcion" id="descripcion" rows="4" placeholder="Escribe una descripción de la receta..." required></textarea>
                </div>
                <div class="mb-3">
                    <label for="preparacion" class="form-label">Preparación</label>
                    <textarea class="form-control bg-dark text-light" name="preparacion" id="preparacion" rows="4" placeholder="Escribe la preparación de la receta..." required></textarea>
                </div>

                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen de la Receta</label>
                    <input type="file" class="form-control bg-dark text-light" name="imagen" id="imagen" accept="image/*" required>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" name="cargar" class="btn btn-secondary btn-lg">Subir Receta</button>
                </div>
            </form>
        </div>
    </div>
    <div class="tabla-contenedor">
        <table id="tabla-recetas" class="p-4 border-dark rounded shadow-sm table table-dark table-striped">
            <thead>
                <tr>
                    <th class="text-center align-middle">Receta</th>
                    <th class="text-center align-middle">Descripcion</th>
                    <th class="text-center align-middle">Imagen</th>
                    <th class="text-center align-middle">Modificar</th>
                    <th class="text-center align-middle">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM recetas INNER JOIN datos_usuarios on recetas.id_usuario = datos_usuarios.id WHERE recetas.id_usuario = '$id_usuario'";
                $resultado = mysqli_query($conex, $query);


                while ($row = mysqli_fetch_array($resultado)) { ?>
                    <tr>
                        <td class="text-center align-middle"><?php echo $row['nombre']; ?></td>
                        <td class="text-center align-middle"><?php echo $row['descripcion']; ?></td>
                        <td class="text-center align-middle"><img height="100px" width="100px" style="border-radius: 15px;" src="img_recetas/<?php echo $row['nombre_img']; ?>"></td>
                        <td class="text-center align-middle"><a class="btn btn-warning" href="modificar.php?id=<?php echo $row['id_receta']; ?>">Modificar</a></td>
                        <td class="text-center align-middle"><a class="btn btn-danger" href="eliminar.php?id_receta=<?php echo $row['id_receta']; ?>">Eliminar</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("form-guardar-receta");

            form.addEventListener("submit", function(event) {
                event.preventDefault();
                const formData = new FormData(form);

                fetch("subir_receta.php", {
                        method: "POST",
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: '¡Éxito!',
                                text: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                window.location.href = 'mis_recetas.php';
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: data.message,
                            });
                        }
                    })
                    .catch(error => {
                        console.error("Error:", error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Hubo un problema en la solicitud.',
                        });
                    });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>






</body>

</html>