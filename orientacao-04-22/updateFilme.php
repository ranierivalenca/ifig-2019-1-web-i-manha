<?php

include 'init.php';
if (!isLogged()) {
    redirect();
}

$name = $_POST['name'];
$description = $_POST['description'];
$grade = $_POST['grade'];
$id = $_POST['id'];

$description = str_replace("\r", "", $description);
$description = str_replace("\n", "<br>", $description);

$data = implode('///', [$name, $grade, $description]) . "\n";
$filmes = file('filmes.csv');
$filmes[$id] = $data;
file_put_contents('filmes.csv', implode('', $filmes));

redirect();

?>
