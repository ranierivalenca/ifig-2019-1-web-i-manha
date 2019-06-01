<?php

$sabado = new PDO('mysql:host=localhost;dbname=web20191_reserves', 'web20191', 'web20191');

$stmt = $sabado->prepare('SELECT * FROM spaces ORDER BY name');
$stmt->execute();
$spaces = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="type" placeholder="type">
        <input type="text" name="code" placeholder="code">
        <select name="space" id="">
            <?php foreach ($spaces as $space): ?>
                <option value="<?= $space['id'] ?>"><?= $space['name'] ?></option>
            <?php endforeach ?>
        </select>
    </form>
</body>
</html>