<?php

include 'init.php';

$id = get('id');

if (!is_logged()) {
    include 'forbidden.html';
    exit();
}

$livros = file('livros.csv');
$livroData = explode(',', $livros[$id]);
if ($livroData[0] == currentUserEmail()) {
    unset($livros[$id]);
}

$data = '';
foreach($livros as $livro) {
    $data = $data . $livro;
}
$handle = fopen('livros.csv', 'w');
fwrite($handle, $data);

redirect('livros.php');

?>
