<?php

include 'secure-init.php';

if (isset($_POST['nome'])) {
    $nome = $_POST['nome'];
    $url = $_POST['url'];
    $tipo = $_POST['tipo'];
    $descricao = $_POST['descricao'];
    // foreach($_POST as $idx => $value) {
    //     $$idx = $value;
    // }
    addProduct($nome, $url, $tipo, $descricao);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <fieldset>
        <legend>Novo produto</legend>
        <form action="" method="POST">
            <input type="text" name="nome" placeholder="Nome do produto" required="">
            <input type="text" name="url" placeholder="URL do produto">
            <select name="tipo" id="" required="">
                <option value="" readonly>Tipo</option>
                <option value="Eletrônico">Eletrônico</option>
                <option value="Relógio">Relógio</option>
                <option value="Cosmético">Cosmético</option>
                <option value="" disabled="">--</option>
                <option value="Outros">Outros</option>
            </select>
            <textarea name="descricao" id="" cols="30" rows="10" placeholder="Descrição e observações"></textarea>
            <input type="submit">
        </form>
    </fieldset>
    <table>
        <tr>
            <th>Nomes</th>
            <th>Tipo</th>
            <th>Ações</th>
        </tr>
        <?php foreach (getProducts() as $id => $product): ?>
            <?php if ($product[0] != userId()) { continue; } ?>
            <tr>
                <td><?= $product[1] ?></td>
                <td><?= $product[3] ?></td>
                <td>
                    <a href="prodInfo.php?id=<?= $id ?>">Mais informações</a>
                    <a href="delProd.php?id=<?= $id ?>">Remover</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
    <a href="home.php">Voltar</a>
</body>
</html>