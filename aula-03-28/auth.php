<?php

include 'init.php';

$email = post('email');
$senha = post('senha');

$usuarios = file('users.csv');
foreach($usuarios as $usuario) {
    $usuarioData = explode(',', $usuario);
    if ($usuarioData[2] == $email && trim($usuarioData[3]) == md5($senha)) {
        login($usuarioData[0]);
        break;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php if (is_logged()): ?>
        <h1>Login ok</h1>
        <a href="livros.php">Clique para ver os livros</a>
    <?php else: ?>
        <h1>E-mail ou senha incorretos</h1>
        <a href="login.php">Tente novamente</a>
    <?php endif ?>
</body>
</html>