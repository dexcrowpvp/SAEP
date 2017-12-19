<?php
session_start();
?>

<<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body class="margenhorario">

<?php  

$db = new PDO('mysql:host=localhost;dbname=saep;charset=utf8', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$rut = $_POST['rut'];

try {
	$stmt = $db->prepare("SELECT * FROM alumno a 
		JOIN clase c on a.cClase = c.codigo 
		JOIN clase_socente cs on c.codigo = cs.codigo
		JOIN docente d on cs.rutDocente = d.rut
		WHERE a.rut=:dato");

	$stmt->execute( array(':dato' => $rut) );
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $ex) {
    echo "Ocurrió un error<br>";
    echo $ex->getMessage();
    exit;
}

echo '<ul>';

	echo "<table border='3' style=width:100%>";
	echo "<tr>";
	echo "<th>Rut de profesor</th>";
	echo "<th>Nombre del profesor</th>";
	echo "<th>Apellido del profesor</th>";
	echo "<th>codigo de clase</th>";
	echo "<th>grado del alumno</th>";
	echo "<th>Antecedentes</th>";
	echo "<th>Horario 1</th>";
	echo "<th>Horario 2</th>";
	echo "<th>Horario 3</th>";
	echo "<th>Horario 4</th>";
	echo "<th>Horario 5</th>";
	echo "</tr>";

foreach ($rows as $row) {

	echo "<tr>";
	echo "<td>".$row['rut']."</td>";
	echo "<td>".$row['nombre']."</td>";
	echo "<td>".$row['apellido']."</td>";
	echo "<td>".$row['codigo']."</td>";
	echo "<td>".$row['grado']."</td>";
	echo "<td>".$row['experiencia']."</td>";
	echo "<td><a href=verhorarios.html class=btn btn-common>Horario 001</a></td>";
	echo "<td><a href=verhorarios2.html class=btn btn-common>Horario 002</a></td>";
	echo "<td><a href=verhorarios3.html class=btn btn-common>Horario 003</a></td>";
	echo "<td><a href=verhorarios4.html class=btn btn-common>Horario 004</a></td>";
	echo "<td><a href=verhorarios5.html class=btn btn-common>Horario 005</a></td>";
	echo "</tr>";
	echo "</table>";

	echo "<br>";
	echo "<a href=login.html class=botonn>Volver</a>";
}
echo '</ul>';

?>

</body>
</html>
