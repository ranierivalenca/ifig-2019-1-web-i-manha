<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <!-- <pre> -->
    <?php
        $herois = file("herois.csv");

        for ($i = 0; $i < sizeof($herois); $i++) {
            $herois[$i] = explode(",", $herois[$i]);
        }
        // var_dump($herois);
    ?>
    <!-- </pre> -->
    <table>
        <tr>
            <th>Heroi</th>
            <th>De Onde</th>
            <th>Poder</th>
        </tr>
        <?php foreach ($herois as $heroi): ?>
            <tr>
                <!-- <td><?= $heroi[0]; ?></td> -->
                <!-- <td><?= $heroi[1]; ?></td> -->
                <!-- <td><?= $heroi[2]; ?></td> -->
                <?php foreach ($heroi as $dado): ?>
                    <td><?= $dado; ?></td>
                <?php endforeach ?>
            </tr>
        <?php endforeach ?>
    </table>
    <form action="adicionar.php">
        Heroi: <input type="text" name="Heroi">
        <br>
        De onde:
        <select name="where" id="">
            <option value="" disabled>Escolha um</option>
            <option value="Dragon Ball">Dragon Ball</option>
            <option value="Marvel">Marvel</option>
            <option value="DC">DC</option>
            <option value="Cavaleiros do Zodíaco">Cavaleiros do Zodíaco</option>
        </select>
        <br>
        Poder: <input type="text" name="poder">
        <br>
        <input type="submit">
    </form>
</body>
</html>