<?php
require("db.inc.php");
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$apellido = $_POST['apellido'];

$db = mysql_connect(HOST, USER, PASS) or die('No ha sido posible la conexion');

mysql_select_db(DB, $db) or die(mysql_error($db));

$query =
<<<SQL
INSERT INTO datos (id, nombre, apellidos, edad)
VALUES (NULL,"$nombre", "$apellido", $edad)
SQL;
mysql_query($query, $db);
header("Location:index.php");
