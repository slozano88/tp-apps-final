<?php
include("conexion_db.php");

if (isset($_POST['registra'])) {
    if (strlen($_POST['nombre']) >= 1 && strlen($_POST['contrasenia']) >= 1) {
        $usuario = trim($_POST['nombre']);
        $contrasenia = trim($_POST['contrasenia']);
        $fechareg = date("d/m/y");

        $stmt = $conex->prepare("INSERT INTO `datos_usuarios` (usuario, contra, fecha_reg) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $usuario, $contrasenia, $fechareg);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success fixed-top text-center' role='alert'>
            Registro de usuario exitoso! Redirigiendo a la página principal...
            </div>";
            echo "<script type='text/javascript'>
            setTimeout(function() {
            location.href='Index.php';
            }, 2000);
            </script>";
            exit();
        } else {
            echo "<div class='alert alert-danger' role='alert'>
            Ha ocurrido un error en el registro de usuario...
            </div>";
            echo "<script type ='text/javascript'>
            setTimeout(function() {
            location.href='registrar.php';
            }, 2000);
            </script>";
        }
        $stmt->close();
    } else {
?>
        <h3 class="bad">Complete los campos</h3>
<?php
    }
}
$conex->close();
?>