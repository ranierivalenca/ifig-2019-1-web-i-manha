<?php include 'secure-init.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h2>Lista de produtos</h2>
    <table>
        <tr>
            <th>Nomes</th>
            <th>Tipo</th>
            <th>Ações</th>
        </tr>
        <?php foreach (getProducts() as $id => $product): ?>
            <tr>
                <td><?= $product[1] ?></td>
                <td><?= $product[3] ?></td>
                <td>
                    <a href="prodInfo.php?id=<?= $id ?>">Mais informações</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <a href="home.php">Voltar</a>
</body>
</html>