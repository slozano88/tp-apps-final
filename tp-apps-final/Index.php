<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MilRecetas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="estilos_inicio.css">

</head>

<body>
    <?php
    session_start();


    /*     if (!isset($_SESSION['id'])) {
        echo "Inicia sesion";
    } else {
        echo "Bienvenido, usuario con ID: " . $_SESSION['id'];
    } */
    include 'conexion_db.php';
    $sql = "SELECT nombre, descripcion,nombre_img FROM recetas";
    $result = $conex->query($sql)
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
                <li class="marca"><a href="#">MilRecetas</a></li>
                <!-- <li class="hideOnMobile"><a href="mis_recetas.php">Mis recetas</a></li> -->
                <?php
                if (!isset($_SESSION['id'])) {
                    echo '<li class="hideOnMobile"><a href="#" onclick="mostrarAlerta(event)">Mis recetas</a></li>';
                } else {
                    echo '<li><a href="mis_recetas.php">Mis recetas</a></li>';
                }

                ?>
                <!-- <li class="hideOnMobile"><a href="mi_inventario.php">Mi inventario</a></li> -->
                <?php
                if (!isset($_SESSION['id'])) {
                    echo '<li class="hideOnMobile"><a href="#" onclick="mostrarAlerta(event)">Mi inventario</a></li>';
                } else {
                    echo '<li><a href="mi_inventario.php">Mi inventario</a></li>';
                }

                ?>
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
    <div class="banner d-flex">
        <div class="banner-izq d-flex align-items-center justify-content-center">
            <h2>Subí tus recetas y guarda tus ingredientes</h2>
        </div>
        <div class="banner-der">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="3000">
                        <img src="img-banner/slider1.jpg" class="d-block w-100" alt="Imagen 1">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="img-banner/slider2.jpg" class="d-block w-100" alt="Imagen 2">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="img-banner/slider3.jpg" class="d-block w-100" alt="Imagen 3">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="titulo">
        <h2>Recetas</h2>
    </div>
    <div class="container mt-5">
        <div class="row g-4">
            <?php
            $sql = "SELECT nombre, descripcion, nombre_img, id_receta FROM recetas";
            $result = $conex->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 mb-4 d-flex align-items-stretch">';
                    echo '<div class="card bg-dark text-light" style="height: 100%; border-radius: 10px;">';
                    echo '<img src="img_recetas/' . htmlspecialchars($row["nombre_img"]) . '" class="card-img-top" alt="' . htmlspecialchars($row["nombre_img"]) . '" style="border-radius: 10px 10px 0 0;">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . htmlspecialchars($row["nombre"]) . '</h5>';
                    echo '<p class="card-text">' . htmlspecialchars($row["descripcion"]) . '</p>';
                    echo "<a href='receta.php?id={$row['id_receta']}' class='btn btn-secondary'>Ver detalles</a>";
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>No hay resultados</p>";
            }
            $conex->close();
            ?>
        </div>
    </div>








    <script>
        function showSidebar() {
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display = 'flex'
        }

        function hideSidebar() {
            const sidebar = document.querySelector('.sidebar')
            sidebar.style.display = 'none'
        }
    </script>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>