<?php
require("db.inc.php");
$db = mysql_connect(HOST, USER, PASS) or die('No ha sido posible la conexion');

mysql_select_db(DB, $db) or die(mysql_error($db));

$query =
<<<SQLT
CREATE TABLE IF NOT EXISTS `datos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `apellidos` varchar(25) NOT NULL,
  `edad` int(3) NOT NULL,
  PRIMARY KEY (`id`)
)
SQLT;
mysql_query($query, $db);

$query =
<<<SQL
  select *
  from datos
SQL;

$result = mysql_query($query, $db);
echo '<table>';
echo '<tr><th>nombre</th><th>apellido</th><th>edad</th><th>ver</th><th>borrar</th><th>editar</th></tr>';
while ($row = mysql_fetch_array($result)) {
    echo "<tr><td> " . $row['nombre'] . " </td><td>" . $row['apellidos'] . "</td><td>" . $row['edad'] . '</td><td> <a href="persona.php?id=' . $row['id']. '">ver</a>'. '</td><td> <a href="borrar.php?id=' . $row['id']. '">borrar</a>'. '</td><td> <a href="editar.php?id=' . $row['id']. '">editar</a>'. '</td></tr>';
}
echo '</table>';
echo "<a href='anadid.php'>add</a>";
