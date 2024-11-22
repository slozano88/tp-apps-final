<?php
include('conexion_db.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$response = ["success" => false, "message" => ""];

if (isset($_POST['nombre_receta']) && isset($_POST['descripcion'])) {
    $target_dir = "img_recetas/";
    $file_name = basename($_FILES["imagen"]["name"]);
    $target_file = $target_dir . $file_name;
    $nombre_receta = $_POST['nombre_receta'];
    $descripcion_receta = $_POST['descripcion'];
    $preparacion = $_POST['preparacion'];
    $id_usuario = $_SESSION['id'];

    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO recetas (id_usuario, nombre, descripcion, preparacion, nombre_img) VALUES ('$id_usuario','$nombre_receta', '$descripcion_receta','$preparacion', '$file_name')";

        if (mysqli_query($conex, $sql)) {
            $response["success"] = true;
            $response["message"] = "Receta guardada con éxito.";
        } else {
            $response["message"] = "Error al guardar la receta: " . mysqli_error($conex);
        }
    } else {
        $response["message"] = "Error al subir la imagen.";
    }
} else {
    $response["message"] = "Datos incompletos.";
}

header('Content-Type: application/json');
echo json_encode($response);
?>