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

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="message">
        <h1>Livro cadastrado</h1>
        <a href="livros.php">Voltar</a>
    </div>
</body>
</html>

