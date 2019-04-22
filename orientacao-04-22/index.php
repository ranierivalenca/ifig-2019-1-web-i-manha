<?php

include 'init.php';

$filmes = [];
if (file_exists('filmes.csv')) {
    $filmes = file('filmes.csv');
    $filmes = array_map(function($el) {
        $parts = array_map('trim', explode('///', $el));
        return $parts;
    }, $filmes);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <nav>
        <?php if (isLogged()): ?>
            <div class="user"><?= currentUser() ?> <a href="logout.php">sair</a></div>
        <?php else: ?>
            <div class="login">
                <a href="reg_login.php">Login / Registrar</a>
            </div>
        <?php endif ?>
    </nav>
    <?php foreach ($filmes as $id => $filme): ?>
        <?php list($nome, $nota, $descricao) = $filme ?>
        <div class="filme">
            <h3><?= $nome ?> <span>(<?= $nota ?>)</span></h3>
            <p><?= $descricao ?></p>
            <a href="editFilme.php?id=<?= $id ?>">Editar</a>
            <a href="delFilme.php?id=<?= $id ?>">Remover</a>
        </div>
    <?php endforeach ?>
    <?php if (isLogged()): ?>
        <form action="addFilme.php" method="POST">
            <fieldset>
                <legend>Adicionar filme</legend>
                <input type="text" name="name" placeholder="Nome do filme">
                <textarea name="description" cols="30" rows="10"></textarea>
                <input type="number" name="grade" placeholder="nota">
                <input type="submit">
            </fieldset>
        </form>
    <?php endif ?>
</body>
</html>