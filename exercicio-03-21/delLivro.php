<?php

include 'init.php';

$id = get('id');

$livros = file('livros.csv');
unset($livros[$id]);

$data = '';
foreach($livros as $livro) {
    $data = $data . $livro;
}
$handle = fopen('livros.csv', 'w');
fwrite($handle, $data);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="message">
        <h1>Livro removido</h1>
        <a href="livros.php">Voltar</a>
    </div>
</body>
</html>