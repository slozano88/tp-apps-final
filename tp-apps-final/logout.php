<?php

session_start();
session_destroy();
clearstatcache();
header('Location: Index.php');
exit()


?>