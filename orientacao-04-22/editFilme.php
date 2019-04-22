<?php

include 'init.php';

if (!isLogged()) {
    redirect();
}

$id = $_GET['id'];
$filme = file('filmes.csv')[$id] ?? false;
if ($filme === false) {
    redirect();
}
list($nome, $nota, $descricao) = explode('///', $filme);
$descricao = str_replace('<br>', "\n", $descricao);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="updateFilme.php" method="POST">
        <fieldset>
            <legend>Atualizar filme</legend>
            <input type="text" name="name" placeholder="Nome do filme" value="<?= $nome ?>">
            <textarea name="description" cols="30" rows="10"><?= $descricao ?></textarea>
            <input type="number" name="grade" placeholder="nota" value="<?= $nota ?>">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="submit">
        </fieldset>
    </form>
</body>
</html>