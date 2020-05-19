<?php
session_start();
$_SESSION['numpage'] = $_SESSION['numpage'] + 1;
header('Location: http://127.0.0.1/Amarelo/activites.php');
?>