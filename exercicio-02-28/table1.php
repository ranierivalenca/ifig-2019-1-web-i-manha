<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        table, td, th, tr {
            border: 1px solid gray;
            border-collapse: collapse;
            padding: 3px;
        }
        table {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php
        $notas = [
            "Tony Stark" => 9,
            "Bruce Banner" => 10,
            "Natasha Romanoff" => 6,
            "Clint Barton" => 7,
            "Steve Rogers" => 5
        ];
    ?>
    <table>
        <tr>
            <th>Estudante</th>
            <th>Nota</th>
        </tr>
        <?php foreach ($notas as $estudante => $nota): ?>
            <tr>
                <td><?= $estudante ?></td>
                <td><?= $nota ?></td>
            </tr>
        <?php endforeach ?>
    </table>

    <?php
        $notas = [
            "Tony Stark" => [10, 10, "3 ~ 8"],
            "Bruce Banner" => [10, 10, "3 ~ 10"],
            "Natasha Romanoff" => [6, 5, 9],
            "Clint Barton" => [6, 9, 8],
            "Steve Rogers" => [5, 5, 10]
        ];
    ?>
    <table>
        <tr>
            <th>Estudante</th>
            <th>Ciências</th>
            <th>Matemática</th>
            <th>Habilidade de Combate</th>
        </tr>
        <?php foreach ($notas as $student => $notas1): ?>
            <tr>
                <td><?= $student ?></td>
                <?php foreach ($notas1 as $nota): ?>
                    <td><?= $nota ?></td>
                <?php endforeach ?>
            </tr>
        <?php endforeach ?>
    </table>
</body>
</html>