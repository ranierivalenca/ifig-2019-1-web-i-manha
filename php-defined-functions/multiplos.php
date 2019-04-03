<?php

$multiplos = false;
$min = $_GET['min'] ?? 0;
$max = $_GET['max'] ?? 0;
$divider = $_GET['divider'] ?? 0;

if ($divider != 0) {
    /* @CALLFUNCTION */
    $numeros = [];
    for($i = $min; $i < $max; $i++) {
        $numeros[] = $i;
    }
    /* ENDCALL */

    function ehMultiplo($el) {
        global $divider;
        if ($el % $divider == 0) {
            return true;
        }
        return false;
    }

    /* @CALLFUNCTION */
    $multiplos = [];
    foreach ($numeros as $numero) {
        if (ehMultiplo($numero)) {
            $multiplos[] = $numero;
        }
    }
    /* ENDCALL */
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Múltiplos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        input {
            display: block;
            padding: 5px;
        }
        h2, h3, span, input, ul {
            margin: 10px;
        }
        li {
            list-style: none;
            display: inline-block;
            background: black;
            color: #ddd;
            padding: .1em .5em;
            border-radius: .2em;
            margin: .2em;
        }
        li:nth-child(2n) {
            color: black;
            background: #ddd;
        }
    </style>
</head>
<body>
    <h2>Múltiplos</h2>
    <form action="">
        <span>Digite o intervalo onde você quer encontrar os múltiplos</span>
        <input type="number" name="min" min="0" step="1" value="<?= $_GET['min'] ?? '' ?>" placeholder="De">
        <input type="number" name="max" step="1" value="<?= $_GET['max'] ?? '' ?>" placeholder="Até">
        <span>Você deseja encontrar os múltiplos de qual número?</span>
        <input type="number" name="divider" min="1" step="1" value="<?= $_GET['divider'] ?? '' ?>" placeholder="Divisor">
        <input type="submit">
    </form>
    <?php if ($multiplos !== false): ?>
        <?php if (empty($multiplos)): ?>
            <h3>Nenhum múltiplo de <?= $_GET['divider'] ?></h3>
        <?php else: ?>
            <h3>Múltiplos de <?= $_GET['divider'] ?>:</h3>
            <ul>
                <?php foreach ($multiplos as $multiplo): ?>
                    <li><?= $multiplo ?></li>
                <?php endforeach ?>
            </ul>
        <?php endif ?>
    <?php endif ?>
</body>
</html>