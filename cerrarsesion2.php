<?php

session_start();
unset ($SESSION['username']);
session_destroy();

header('Location: http://localhost/SAEP/ingresodocentes.html');
?>