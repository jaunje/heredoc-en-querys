<?php
require("db.inc.php");
$db = mysql_connect(HOST, USER, PASS) or die('No ha sido posible la conexion');

mysql_select_db(DB, $db) or die(mysql_error($db));
$id = $_GET['id'];
$query =
<<<SQL
SELECT *
  FROM datos
  WHERE id = "$id"
SQL;

$result = mysql_query($query, $db);

while ($row = mysql_fetch_array($result)) {
    echo 'hola ' . $row['nombre'] . ', bienvenido. Tienes la id ' .$row['id'] . ' <a href="index.php">Volver</a>';
}
