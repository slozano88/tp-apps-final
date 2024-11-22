<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo_registro.css">
</head>
<body>
<div class="f_inicio">
    <form method="post">
        <h1>Registrar</h1>
        <h2>Usuario</h2><input type="text" name="nombre" placeholder="Nombre de usuario" required="required">
        <h2>Contraseña</h2><input type="password" name="contrasenia" placeholder="Contraseña" required="required">
        <input type="submit" name="registra">
        <div class="redireccion_registro"><a href="f_login.php" class="boton">¿Ya tenes cuenta? Inicia sesión</a></div>
        <div class="redireccion_inicio" onclick="window.location.href='Index.php'" style="cursor: pointer;"><a href="Index.php" class="boton">Salir</a></div>
    </form>
</div>

    <?php
    include ("registrar.php");
    ?>

</body>
</html>