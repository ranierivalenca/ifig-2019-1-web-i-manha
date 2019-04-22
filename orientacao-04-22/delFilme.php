<?php

include 'init.php';

if (!isLogged()) {
    redirect();
}

$id = $_GET['id'];

$data = file('filmes.csv');
unset($data[$id]);

file_put_contents('filmes.csv', implode('', $data));

redirect();

?>