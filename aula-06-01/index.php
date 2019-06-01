<?php

$sabado = new PDO('mysql:host=localhost;dbname=web20191_reserves', 'web20191', 'web20191');

if (isset($_POST['inserir'])) {
    $nome = $_POST['name'];
    $desc = $_POST['description'];

    $statement = $sabado->prepare('insert into spaces (name, description) values (:name, :description)');
    $statement->bindParam(':name', $nome);
    $statement->bindParam(':description', $desc);
    $statement->execute();
    header('location: index.php');
}

if (isset($_GET['del'])) {
    $id = $_GET['del'];

    $stmt = $sabado->prepare('delete from spaces where id = ?'); //ao invés de :id e usar bindParam, usamos '?' e passamos os valores no execute
    $stmt->execute([$id]); // valores que serão atribuídos às interrogações
    header('location: index.php');
}

$stmt = $sabado->prepare("SELECT * FROM spaces ORDER BY name");
$stmt->execute();

// echo '<pre>';
$rows = $stmt->fetchAll();
  // while ($row = $stmt->fetch()) {
    // print_r($row);
  // }
// print_r($rows);
// echo '</pre>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="name" placeholder="name">
        <input type="text" name="description" placeholder="description">
        <input type="hidden" name="inserir" value="true">
        <input type="submit">
    </form>
    <table>
        <?php foreach ($rows as $row): ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['description'] ?></td>
                <td>
                    <a href="index.php?del=<?= $row['id'] ?>">remover</a>
                </td>
                <!-- <td>
                    <a href="index.php?edit=<?= $row ?>">editar</a>
                </td> -->
            </tr>
        <?php endforeach ?>
    </table>
</body>
</html>