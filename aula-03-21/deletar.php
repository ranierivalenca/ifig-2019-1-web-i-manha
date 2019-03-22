<?php

$pokemons = file('pokemons.csv');

$id = $_GET['id'];
unset($pokemons[$id]);

$str = "";
foreach($pokemons as $pokemon) {
    $str = $str . $pokemon;
}
// echo $str;
$handle = fopen("pokemons.csv", "w");
fwrite($handle, $str);



?>
<!DOCTYPE html>
<html lang="en">
<?php include 'head.html'; ?>
<body>
    <h1>Removido</h1>
    <a href="tabela.php">Voltar</a>
</body>
</html>