<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MilRecetas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="estilos_inicio.css">
    <style>
        .receta-container {
            background-image: radial-gradient(circle at center right, rgb(240, 101, 23),rgb(242, 194, 28));
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            width: 90%;
            padding: 30px;
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .receta-img {
            border-radius: 10px;
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .receta-title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .receta-description {
            font-size: 1.2rem;
            color: black;
            margin-bottom: 20px;
        }

        .receta-content {
            font-size: 1rem;
            text-align: justify;
        }
    </style>

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

    <?php
    $id_receta = $_GET['id'];
    $query = "SELECT * FROM recetas WHERE id_receta = '$id_receta'";
    $resultado = mysqli_query($conex, $query);
    $row = mysqli_fetch_array($resultado);
    ?>
    <div class="receta-container">
        <?php
        $id_receta = $_GET['id'];
        $query = "SELECT * FROM recetas WHERE id_receta = '$id_receta'";
        $resultado = mysqli_query($conex, $query);
        $row = mysqli_fetch_array($resultado);
        ?>

        <img src="img_recetas/<?php echo htmlspecialchars($row['nombre_img']); ?>" alt="<?php echo htmlspecialchars($row['nombre']); ?>" class="receta-img">
        <h1 class="receta-title"><?php echo htmlspecialchars($row['nombre']); ?></h1>
        <p class="receta-description"><?php echo htmlspecialchars($row['descripcion']); ?></p>
        <div class="receta-content">
            <h4>Preparación:</h4>
            <p><?php echo nl2br(htmlspecialchars($row['preparacion'])); ?></p>
        </div>
    </div>








</body>