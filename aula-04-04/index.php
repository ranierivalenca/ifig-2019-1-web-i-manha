<?php

$inputs = [
    'nome' => 'text',
    'sobrenome' => 'text',
    'email' => 'text',
    'senha' => 'password',
    'senha2' => 'password'
];
// echo "<pre>";
$usuariosFile = file('users.csv');
// print_r($usuariosFile);
// $usuarios = [];
// print_r($usuarios);
// echo "\n";
foreach ($usuariosFile as $usuario) {
    // print_r($usuario);
    $usuarioData = explode(',', $usuario);
    // print_r($usuarioData);
    $nome = $usuarioData[0];
    $usuarios[] = $nome; // adiciona o elemento $nome ao final do array $usuarios
    // print_r($usuarios);
    // echo "\n";
}

// echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php if (isset($_GET['message'])): ?>
        <div class="message"><?= $_GET['message'] ?></div>
    <?php endif ?>
    <?php if (isset($_GET['error'])): ?>
        <div class="error"><?= $_GET['error'] ?></div>
    <?php endif ?>
    <form action="register.php" method="POST">
        <?php foreach ($inputs as $name => $type): ?>
            <input type="<?= $type ?>" name="<?= $name ?>" placeholder="<?= $name ?>">
        <?php endforeach ?>
        <input type="submit" value="Enviar">
    </form>
    <div class="users">
        <a href="login.php"><h1>Livros dos usuários</h1></a>
    </div>
</body>
</html>