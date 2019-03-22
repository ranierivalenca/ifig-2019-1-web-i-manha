<?php


session_start();
$_SESSION['nome'] = $_GET['nome'];

?>
<a href="tabela.php">Tabela</a>