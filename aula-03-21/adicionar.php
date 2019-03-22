<!DOCTYPE html>
<html lang="en">
<?php include 'head.html'; ?>
<body>

<h1>Adicionado com sucesso</h1>
<!-- <pre> -->
<?php
    $novaLinha = $_POST['pokemon'] . "," . $_POST['tipo'] . "," . $_POST['poder'] . "\n";
    $handler = fopen("pokemons.csv", "a");
    fwrite($handler, $novaLinha);
    fclose($handler);
?>
<!-- </pre> -->
<p>
    pokemon: <strong><?= $_POST['pokemon']; ?></strong>
    <br>
    tipo: <strong><?= $_POST['tipo']; ?></strong>
    <br>
    poder: <strong><?= $_POST['poder']; ?></strong>
</p>
<p>
    <a href="tabela.php">Voltar</a>
</p>


</body>
</html>
