<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <!-- <pre> -->
    <?php
        $produtos = file("produtos.csv");
        // var_dump($produtos);

        for ($i = 0; $i < sizeof($produtos); $i++) {
            $produtos[$i] = explode(",", $produtos[$i]);
            // var_dump($i);
            // var_dump($produtos);
            // echo "\n\n\n";
        }
        // var_dump($produtos);
    ?>
    <!-- </pre> -->
    <ul>
        <?php foreach ($produtos as $produto_preco): ?>
            <li><?= $produto_preco[0] ?> (R$ <?= $produto_preco[1] ?>)</li>
        <?php endforeach ?>
    </ul>
</body>
</html>