<?php

include 'secure-init.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h2>Bem vindo, <?= userName() ?></h2>
    <a href="myProducts.php">Meus pedidos</a>
    <a href="products.php">Todos os pedidos</a>
    <a href="logout.php">Sair</a>
</body>
</html>