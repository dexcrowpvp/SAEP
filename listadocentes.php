<?php
session_start();
?>

<?php  

$db = new PDO('mysql:host=localhost;dbname=saep;charset=utf8', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$rut = $_POST['rut'];

try {
	$stmt = $db->prepare("SELECT * FROM docente WHERE rut=:dato");
	$stmt->execute( array(':dato' => $rut) );
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $ex) {
    echo "Ocurrió un error<br>";
    echo $ex->getMessage();
    exit;
}

echo '<ul>';
foreach ($rows as $row) {
	echo '<li>'.$row['rut'].' : '.$row['nombre'].' '.$row['apellido'].' '.$row['cargo'].'</li>';
}
echo '</ul>';

?>