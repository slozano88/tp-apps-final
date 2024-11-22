<?php

include('conexion_db.php');

if (isset($_GET['id'])) {
    $id_receta = $_GET['id'];

    if (isset($_POST['modificar_receta'])) {

        $nombre_receta = mysqli_real_escape_string($conex, $_POST['nombre_receta']);
        $descripcion_receta = mysqli_real_escape_string($conex, $_POST['descripcion_receta']);
        $preparacion =  mysqli_real_escape_string($conex, $_POST['preparacion']);

        if ($_FILES['foto_receta']['error'] === UPLOAD_ERR_OK) {
            $foto_tmp = $_FILES['foto_receta']['tmp_name'];
            $foto_nombre = $_FILES['foto_receta']['name'];
            $foto_destino = "img_recetas/" . $foto_nombre;

            if (move_uploaded_file($foto_tmp, $foto_destino)) {

                $update_query = "UPDATE recetas
                                SET nombre = '$nombre_receta',
                                    descripcion = '$descripcion_receta',
                                    preparacion = '$preparacion';
                                    nombre_img = '$foto_nombre'
                                WHERE id_receta = '$id_receta'";
            } else {

                echo "Error al subir la imagen. Inténtalo nuevamente.";
                exit();
            }
        } else {

            $update_query = "UPDATE recetas
                            SET nombre = '$nombre_receta',
                                descripcion = '$descripcion_receta',
                                preparacion = '$preparacion'
                            WHERE id_receta = '$id_receta'";
        }

        if (mysqli_query($conex, $update_query)) {

            echo "Receta modificada con éxito.";
            header("Location: mis_recetas.php");
            exit();
        } else {

            echo "Error al modificar la receta: " . mysqli_error($conex);
        }
    }
} else {

    echo "ID de receta no válido.";
}
