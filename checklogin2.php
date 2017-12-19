<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SAEP</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet"> 
    <link href="css/lightbox.css" rel="stylesheet"> 
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

</head>
<body class="imagenlogin">

<!-- .............................................................PHP........................................................... -->
    
<?php
$conexion = mysqli_connect('localhost','root','');
if (!$conexion){
    die('La base de datos no se pudo conectar' . mysqli_error($conexion));
}
$seleccionar_tabla = mysqli_select_db($conexion, 'saep');
if(!$seleccionar_tabla){
    die('No se encontre la base de datos' . mysqli_error($conexion));
}

session_start();

if(isset($_POST['rut']) and isset($_POST['contrasena'])){
    $rut = $_POST['rut'];
    $contrasena = $_POST['contrasena'];

    $query = 'SELECT * FROM docente WHERE rut= "'.$rut.'" and contrasena="'.$contrasena.'"';
    $resultado = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
    $contador = mysqli_num_rows($resultado);
    if($contador == 1){
        $_SESSION['loggedin'] = true;
        $_SESSION['rut'] = $rut;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
    }else{
        $msj = "Rut o Contraseña incorrecta";
    }
}
if (isset($_SESSION['rut'])){
    $_SESSION['loggedin'] = true;
    $_SESSION['rut'] = $rut;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

    echo 
        "<div class=margenlogin>
            <div> 
                <h2> Bienvenido " . $rut. " <h2>   
            </div>
        </div>";              

    echo 
        "<div class=margenlogin>
            <div>
                <h3><a href=claseD.php>Colsultar datos de la clase</a><h3>
            </div>
        </div>";

    echo 
        "<div class=margenlogin>
            <div>
                <h3><a href='cerrarsesion2.php'>Cerrar sesion</a><h3>
            </div>
        </div>";
}
else{
    echo "Error al ingresar <a href='index.html?>Volver</a>'";
}

?>

<!-- ..............................................................HTML........................................................ -->

</body>
</html>

