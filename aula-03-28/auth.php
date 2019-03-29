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
<?php if (is_logged()): ?>
    <a href="livros.php">Você está logado</a>
<?php else: ?>
    <a href="login.php">Tente novamente</a>
<?php endif ?>