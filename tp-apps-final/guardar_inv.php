<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include("conexion_db.php");
if (isset($_POST['cargar'])) {
    if (strlen($_POST['ingrediente']) >= 1 && strlen($_POST['cantidad']) >= 1) {
        $ingrediente = trim($_POST['ingrediente']);
        $cant = trim($_POST['cantidad']);
        $fechareg = date("d/m/y");
        $id_ingrediente = $_SESSION['id'];
        $categoria = $_POST['categoria'];
        $stmt = $conex->prepare("INSERT INTO `ingredientes` (nombre_ingrediente, cantidad, fecha_agregado, id_usuario, categoria) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssis", $ingrediente, $cant, $fechareg, $id_ingrediente, $categoria);
        if ($stmt->execute()) {
            echo "<script type='text/javascript'>
            setTimeout(function() {
            location.href='mi_inventario.php';
            }, 15);
            </script>";
            exit();
        } else {
            echo "Error al agregar el ingrediente.";
        }
        $stmt->close();
    } else {
        echo "Por favor, completa todos los campos.";
    }
}

$conex->close();
?>