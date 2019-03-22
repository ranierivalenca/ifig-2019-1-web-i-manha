


<h1>Adicionado com sucesso</h1>
<!-- <pre> -->
<?php
    $novaLinha = $_GET['pokemon'] . "," . $_GET['tipo'] . "," . $_GET['poder'] . "\n";
    $handler = fopen("pokemons.csv", "a");
    fwrite($handler, $novaLinha);
    fclose($handler);
?>
<!-- </pre> -->
<p>
    pokemon: <strong><?= $_GET['pokemon']; ?></strong>
    <br>
    tipo: <strong><?= $_GET['tipo']; ?></strong>
    <br>
    poder: <strong><?= $_GET['poder']; ?></strong>
</p>
<p>
    <a href="tabela.php">Voltar</a>
</p>
