<?php

$inputs = [
    'nome' => 'text',
    'sobrenome' => 'text',
    'email' => 'text',
    'senha' => 'password',
    'senha2' => 'password'
];

$usuariosFile = file('users.csv');
$usuarios = [];
foreach ($usuariosFile as $usuario) {
    $usuarioData = explode(',', $usuario);
    $nome = $usuarioData[0];
    $usuarios[] = $nome; // adiciona o elemento $nome ao final do array $usuarios
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="register.php" method="POST">
        <?php foreach ($inputs as $name => $type): ?>
            <input type="<?= $type ?>" name="<?= $name ?>" placeholder="<?= $name ?>">
        <?php endforeach ?>
        <input type="submit" value="Enviar">
    </form>
    <div class="users">
        <h1>Livros dos usuários</h1>
        <ul>
            <?php foreach ($usuarios as $nome): ?>
                <li><a href="livros.php?usuario=<?= $nome ?>"><?= $nome ?></a></li>
            <?php endforeach ?>
        </ul>
    </div>
</body>
</html>