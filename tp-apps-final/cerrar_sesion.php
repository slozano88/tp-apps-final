<?php
session_start();
session_unset();
session_destroy();
header("Location: f_login.php");
exit();
?>