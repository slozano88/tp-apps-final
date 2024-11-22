<?php
$conex = mysqli_connect("localhost", "root", "", "usuarios");

if (!$conex) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>