<?php

include 'conf/init.php';

if (!is_logged()) {
    redirect('index.php');
}

$id = $_GET['id'] ?? false;
if ($id === false) {
    redirect('index.php');
}

$item = item_info(file(ITEMS_FILE)[$id]);
$user = user_info($item['email']);

$dataItem = [
    'Item' => 'titulo',
    'Descrição' => 'desc',
];
$dataUser = [
    'Nome do doador' => 'nome',
    'Email do doador' => 'email',
    'Telefone' => 'fone',
    'Cidade' => 'cidade',
    'Bairro' => 'bairro'
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= TITLE ?></title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <h1>Detalhes do item</h1>
    <h3><?= $item['titulo'] ?></h3>
    <table>
        <?php foreach ($dataItem as $title => $key): ?>
            <tr>
                <th><?= $title ?></th>
                <td><?= $item[$key] ?></td>
            </tr>
        <?php endforeach ?>
        <?php foreach ($dataUser as $title => $key): ?>
            <tr>
                <th><?= $title ?></th>
                <td><?= $user[$key] ?></td>
            </tr>
        <?php endforeach ?>
    </table>
    <h3>
        <a href="index.php">Voltar</a>
    </h3>
</body>
</html>