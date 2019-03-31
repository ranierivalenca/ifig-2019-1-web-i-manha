<?php

function media($arr) {
    $n = sizeof($arr);

    /* @CALLFUNCTION */
    for ($i = 0; $i < $n; $i++) {
        $arr[$i] = floatval($arr[$i]);
    }
    /* ENDCALL */

    $inversos = [];
    foreach($arr as $nota) {
        $inverso = 0;
        if ($nota > 0) {
            $inverso = 1.0 / $nota;
        }
        $inversos[] = $inverso; // adiciona a variável $inverso no final do array $inversos
    }

    /* @CALLFUNCTION-2 */
    $soma = 0;
    foreach($inversos as $inverso) {
        $soma += $inverso;
    }
    /* ENDCALL */

    if ($soma == 0) {
        return 0;
    }
    return $n / $soma;
}

$notas = $_POST['notas'] ?? false;
$media = false;

if ($notas !== false) {
    $media = media($_POST['notas']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Média Harmônica</title>
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
        h2, h3, span, input, table {
            margin: 10px;
        }
        table, tr, th, td {
            border: 1px solid #CCC;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
        }
        tr:nth-child(2n) {
            background: #EEE;
        }
    </style>
</head>
<body>
    <h2>Média harmônica</h2>
    <form action="">
        <span>Quantas notas para calcular a média harmônica?</span>
        <input type="number" name="num_notas" min="1" step="1" value="<?= $_GET['num_notas'] ?? '' ?>">
        <input type="submit">
    </form>
    <?php if (isset($_GET['num_notas'])): ?>
        <h3>Médias</h3>
        <form action="" method="POST">
            <?php for ($i = 0; $i < $_GET['num_notas']; $i++): ?>
                <input type="number" name="notas[]" min="0" max="10" value="<?= $_POST['notas'][$i] ?? '' ?>">
            <?php endfor; ?>
            <input type="submit" value="Calcular média">
        </form>
    <?php endif ?>
    <?php if ($media !== false): ?>
        <?php

            /* @CALLFUNCTION */
            $mediaArrendondada = intval($media * 100);
            $mediaArrendondada = $mediaArrendondada / 100;
            /* ENDCALL */

        ?>
        <h3>Média harmônica: <?= $mediaArrendondada ?></h3>
    <?php endif ?>
</body>
</html>