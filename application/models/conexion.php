<?php
$conexion=(mysqli_connect("localhost","root","cosiita"));
mysqli_select_db($conexion,'hospital') or die ("no se encuentra la bd");
mysqli_set_charset($conexion,"utf8");
?>
