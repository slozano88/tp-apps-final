<?php


include("conexion_db.php");
include("f_login.php");

$usuario = $_POST['user'];
$clave = $_POST['pass'];

$user = mysqli_query($conex, "SELECT id,usuario,contra FROM datos_usuarios WHERE usuario = '$usuario' AND contra='$clave'");

if ($row = mysqli_fetch_assoc($user)) {
	$var_pass = $row["contra"];
	$var_usuario = $row["usuario"];
	$var_id = $row["id"];
}
if (@$var_pass == $clave and @$var_usuario == $usuario) {
	session_start();
	$_SESSION['id'] = $var_id;
	echo "<div class='alert alert-success fixed-top text-center' role='alert'>
		Inicio de sesión exitoso! Redirigiendo a la página principal...
		</div>";
	echo "<script type='text/javascript'>
		setTimeout(function() {
		location.href='Index.php';
		}, 2000);
		</script>";
} else {
	echo "<div class='alert alert-danger fixed-top text-center' role='alert'>
            Usuario Incorrecto, intentelo de nuevo...
            </div>";
	echo "<script type ='text/javascript'>
            setTimeout(function() {
            location.href='f_login.php';
            }, 1000);
            </script>";
}
mysqli_free_result($user);
mysqli_close($conex);
?>