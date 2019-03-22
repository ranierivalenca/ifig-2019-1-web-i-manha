<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Meu primeiro PHP</title>
</head>
<body>
    <h1>
        <?php
            echo "Hello World";
        ?>
    </h1>
    <ul>
        <?php
            for ($i = 0; $i < 10; $i++) {
                echo "<li>$i</li>";
            }
        ?>
    </ul>
    <ul>
        <?php for ($i = 0; $i < 10; $i++): ?>
            <li>
                <?php echo $i; ?>
            </li>
        <?php endfor; ?>
    </ul>
    <ul>
        <?php for ($i = 0; $i < 10; $i++): ?>
            <li>
                <?= $i; ?>
            </li>
        <?php endfor; ?>
    </ul>

    <?php

        $alunos1 = ["vinicius", "lucas", "tamires"];
        $alunos2 = array("ricardo", "a.beatriz", "gerald");
        $alunos3 = ["jhon", "pedro", "wanilson"];

    ?>
    <ul>
        <?php for ($i = 0; $i < sizeof($alunos1); $i++): ?>
            <?php if ($i %2 == 0): ?>
                <li>
                    <?= $alunos1[$i]; ?>
                </li>
            <?php endif; ?>
        <?php endfor; ?>

        <?php for($i = 0; $i < sizeof($alunos2); $i++): ?>
            <?php $aluno = $alunos2[$i]; ?>
            <li><?= $aluno ?></li>
        <?php endfor; ?>

        <?php foreach ($alunos3 as $aluno): ?>
            <li>
                <?= $aluno; ?>
            </li>
        <?php endforeach ?>
    </ul>

    <table>
        <?php for ($i = 0; $i < 10; $i++): ?>
            <tr>
                <?php for ($j = 0; $j < 4; $j++): ?>
                    <td><?= "$i-$j"; ?></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
    <?php

        $frutas = [
            "ranieri" => "kiwi",
            "gabriel" => "alface",
            "marcela" => "tomate",
            "marcos" => "morango",
            "robson" => "coentro"
        ];

    ?>
    <ul>
        <?php foreach ($frutas as $pessoa => $fruta): ?>
            <li>
                <?= $fruta; ?> (responsável: <strong><?= $pessoa; ?></strong>)
            </li>
        <?php endforeach ?>
    </ul>
</body>
</html>