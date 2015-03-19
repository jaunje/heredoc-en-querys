<?php
require("db.inc.php");
$db = mysql_connect(HOST, USER, PASS) or die('No ha sido posible la conexion');

mysql_select_db(DB, $db) or die(mysql_error($db));
$id = $_GET['id'];
$query =
<<<SQL
select *
  from datos
  where id = "$id"
SQL;

$result = mysql_query($query, $db);

while ($row = mysql_fetch_array($result)) {
    $nombre = $row['nombre'];
    $apellido = $row['apellidos'];
    $edad = $row['edad'];
    $id= $row['id'];
}

echo <<< EOD
<form name="form" method="post" action="editarprocess.php" >
Nombre <input type="text" name="nombre" value="$nombre"/></br>
Apellido <input type"text" name="apellido" value="$apellido"/></br>
Edad <input type"text" name="edad" value="$edad"/></br>
<input type="hidden" name="id" value="$id">
<input type="submit" value="enviar"/>
</form>
EOD;
