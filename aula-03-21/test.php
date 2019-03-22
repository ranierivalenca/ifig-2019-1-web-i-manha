<?php

// $numeros = [10, 12, 17, 90];

// $soma = 0;
// foreach($numeros as $numero) {
//     $soma = $soma + $numero;
// }
// echo $soma;

// $nomes = ["geraldo\n", "rebeishon\n", "gui\n", "torre\n", "renecrocante\n"];
$nomes = file('nomes.csv');

unset($nomes[0]);

$str = "";
foreach($nomes as $nome) {
    $str = $str . $nome;
}
// echo $str;
$handle = fopen("nomes.csv", "w");
fwrite($handle, $str);



?>