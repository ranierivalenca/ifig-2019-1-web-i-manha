<?php

function quadrado($n) {
    return $n * $n;
}

$numbers = $_POST['numbers'] ?? [];
if ($numbers != []) {
    $numbers = explode(',', $numbers);
}

/* @CALLFUNCTION */
$squares = [];
foreach ($numbers as $number) {
    $squares[$number] = quadrado($number);
}
/* ENDCALL */

/* @CALLFUNCTION */
$numbers_str = '';
for($i = 0; $i < sizeof($numbers); $i++) {
    $numbers_str .= $numbers[$i];
    if ($i < sizeof($numbers) - 1) {
        $numbers_str .= ',';
    }
}
/* ENDCALL */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quadrado</title>
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
        h3, span, input, table {
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
    <h3>Quadrados</h3>
    <form action="" method="POST">
        <span>Preencha o campo abaixo com uma sequência de números separados por vírgula</span>
        <input type="text" name="numbers" placeholder="Ex: 1,2,3,5" value="<?= $numbers_str ?>">
        <input type="submit">
    </form>
    <hr>
    <h3>Quadrados</h3>
    <table>
        <tr>
            <th>Número</th>
            <th>Quadrado</th>
        </tr>
        <?php foreach ($squares as $number => $square): ?>
            <tr>
                <td><?= $number ?></td>
                <td><?= $square ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</body>
</html>