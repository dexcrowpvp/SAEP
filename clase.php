<?php
    session_start();

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    } else {
        echo "Esta pagina es solo para usuarios registrados.<br>";
         "<br><a href='login.html'>Volver</a>";

    exit;
    }

    $now = time();

    if($now > $_SESSION['expire']) {
    session_destroy();

    echo "Su sesion a terminado,
        <a href='login.html'>Necesita Hacer Login</a>";
    exit;
    }
?>

<!DOCTYPE html>
<html>
<head>
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
			<div class="margenlogin">
				<div class="col-md-4 col-sm-12">
                    <div class="contact-form bottom">
                        <h2>Consulta de clases:</h2>
                        <form id="main-contact-form" name="contact-form" method="post" action="listadoclase.php">
                            <div class="form-group">
                                <input type="text" name="rut" class="form-control" required="rut" placeholder="Rut del alumno">
                            </div>                   
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-submit" value="Ingresar">
                            </div>
                        </form>
                        <form id="main-contact-form" name="contact-form" method="post" action="index.html">                   
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-submit" value="Volver a inicio">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
				

</body>
</html>