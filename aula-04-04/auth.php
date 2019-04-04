<?php

include 'init.php';

$email = post('email');
$senha = post('senha');

$usuarios = file('users.csv');
foreach($usuarios as $usuario) {
    $usuarioData = explode(',', $usuario);
    if ($usuarioData[2] == $email && trim($usuarioData[3]) == md5($senha)) {
        login($usuarioData[0], $usuarioData[2]);
        break;
    }
}

if (is_logged()) {
    redirect('livros.php');
} else {
    redirect('login.php?error=e-mail ou senha incorretos');
}

?>