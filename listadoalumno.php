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
<body class="margenhorario2">

<?php  

$db = new PDO('mysql:host=localhost;dbname=saep;charset=utf8', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$rut = $_POST['rut'];

try {
	$stmt = $db->prepare("SELECT * FROM alumno WHERE rut=:dato");
	$stmt->execute( array(':dato' => $rut) );
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $ex) {
    echo "Ocurrió un error<br>";
    echo $ex->getMessage();
    exit;
}

echo '<ul>';

	echo "<table border='3' style=width:60%>";
	echo "<tr>";
	echo "<th>Rut de Alumno</th>";
	echo "<th>Nombre</th>";
	echo "<th>Apellido</th>";
	echo "<th>Edad</th>";
	echo "</tr>";

foreach ($rows as $row) {

	echo "<tr>";
	echo "<td>".$row['rut']."</td>";
	echo "<td>".$row['nombre']."</td>";
	echo "<td>".$row['apellido']."</td>";
	echo "<td>".$row['edad']."</td>";
	echo "</tr>";
	echo "</table>";
	echo "<br>";
	echo "<a href=index.html class=botonn>Volver</a>";

	/* echo '<li>'.$row['rut'].' : '.$row['nombre'].' '.$row['apellido'].' '.$row['edad'].'</li>'; */
}

echo '</ul>';

?>

</body>
</html>

