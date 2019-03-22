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
<h1>Removido</h1>
<a href="tabela.php">Voltar</a>