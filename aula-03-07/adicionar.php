


<h1>Adicionado com sucesso</h1>
<!-- <pre> -->
<?php
    $novaLinha = "\n" . $_GET['Heroi'] . "," . $_GET['where'] . "," . $_GET['poder'];
    $handler = fopen("herois.csv", "a");
    fwrite($handler, $novaLinha);
    fclose($handler);
?>
<!-- </pre> -->
<p>
    Heroi: <strong><?= $_GET['Heroi']; ?></strong>
    <br>
    De onde: <strong><?= $_GET['where']; ?></strong>
    <br>
    Poder: <strong><?= $_GET['poder']; ?></strong>
</p>
<p>
    <a href="tabela.php">Voltar</a>
</p>
