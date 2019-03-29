<?php

include 'init.php';

// $usuario = get('usuario');
if (!isset($_SESSION['usuario'])) {
    exit();
}
$usuario = $_SESSION['usuario'];

$livrosFile = [];
if (file_exists('livros.csv')) {
    $livrosFile = file('livros.csv');
}
$livros = [];
foreach($livrosFile as $i => $livro) {
    $livroData = explode(',', $livro);
    $livros[$i] = [
        'usuario' => $livroData[0],
        'nome' => $livroData[1],
        'autor' => $livroData[2]
    ];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Livros</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 class="title">Livros de <?= $usuario ?></h1>
    <table>
        <tr>
            <th>Livro</th>
            <th>Autor</th>
            <th>ações</th>
        </tr>
        <?php foreach ($livros as $id => $livro): ?>
            <?php if ($livro['usuario'] == $usuario): ?>
                <tr>
                    <td><?= $livro['nome'] ?></td>
                    <td><?= $livro['autor'] ?></td>
                    <td>
                        <a href="delLivro.php?id=<?= $id ?>">Remover</a>
                    </td>
                </tr>
            <?php endif ?>
        <?php endforeach ?>
    </table>
    <form action="addLivro.php" method="POST">
        <input type="text" name="nome" placeholder="nome">
        <input type="text" name="autor" placeholder="autor">
        <input type="hidden" name="usuario" value="<?= $usuario ?>">
        <input type="submit" value="Adicionar">
    </form>
    <div class="back">
        <a href="index.php">Voltar</a>
    </div>
</body>
</html>