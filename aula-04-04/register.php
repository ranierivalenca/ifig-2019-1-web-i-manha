<?php

sleep(2);

include 'init.php';

$nome = post('nome');
$sobrenome = post('sobrenome');
$email = post('email');
$senha = post('senha');
$senha2 = post('senha2');

if ($senha != $senha2) {
    redirect('index.php?error=Senhas não conferem');
}

    $data = juntar([$nome, $sobrenome, $email, md5($senha)]) . "\n";

    // salva o dado no arquivo csv
    $handle = fopen('users.csv', 'a');
    fwrite($handle, $data);

    redirect('index.php?message=Usuário cadastrado');
?>

