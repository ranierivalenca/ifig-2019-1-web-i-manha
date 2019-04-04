<?php

include 'init.php';

if(!is_logged()) {
    include 'forbidden.html';
    exit();
}

$nome = post('nome');
$autor = post('autor');
$usuarioEmail = currentUserEmail();

$data = juntar([$usuarioEmail, $nome, $autor]) . "\n";

$handle = fopen('livros.csv', 'a');
fwrite($handle, $data);

redirect('livros.php');

?>
