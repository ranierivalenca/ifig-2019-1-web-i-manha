<?php include 'secure-init.php'; ?>
<?php

$id = $_GET['id'] ?? false;
if ($id === false) {
    redirect('home.php');
}
$products = getProducts();
$product = $products[$id];
$user = getUser($product[0]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h2>Informações do produto</h2>
    <table>
        <tr>
            <th>Nome do produto</th>
            <td><?= $product[1] ?></td>
        </tr>
        <tr>
            <th>Url do produto</th>
            <td><?= $product[2] ?></td>
        </tr>
        <tr>
            <th>Tipo do produto</th>
            <td><?= $product[3] ?></td>
        </tr>
        <tr>
            <th>Descrição</th>
            <td><?= $product[4] ?></td>
        </tr>
        <tr>
            <th>Nome do usuário</th>
            <td><?= $user[0] ?></td>
        </tr>
        <tr>
            <th>E-mail do usuário</th>
            <td><?= $user[2] ?></td>
        </tr>
        <tr>
            <th>Telefone do usuário</th>
            <td><?= $user[4] ?></td>
        </tr>
        <tr>
            <th>Estado do usuário</th>
            <td><?= $user[5] ?></td>
        </tr>
        <tr>
            <th>País do usuário</th>
            <td><?= $user[6] ?></td>
        </tr>
    </table>
    <a href="#" onclick="history.back()">Voltar</a>
</body>
</html>