<?php
$mbd = new PDO("mysql:host=localhost;dbname=modelshirts","root","");
// Utilizar la conexión aquí
$sth = $mbd->query('SELECT * FROM productos');
//$sth->fetch();

while($registro = $sth->fetch()) {
    echo "NOMBRE: " . $registro['nombre'] . ", DNI: " . $registro['categoria'] . "<br>";
}
?>