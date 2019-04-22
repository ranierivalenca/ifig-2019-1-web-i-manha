<?php

include 'init.php';
if (!isLogged()) {
    redirect();
}

$name = $_POST['name'];
$description = $_POST['description'];
$grade = $_POST['grade'];

$description = str_replace("\r", "", $description);
$description = str_replace("\n", "<br>", $description);

$data = implode('///', [$name, $grade, $description]);
file_put_contents('filmes.csv', $data . "\n", FILE_APPEND);

redirect();

?>
