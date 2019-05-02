<?php

include 'secure-init.php';

$id = $_GET['id'] ?? false;
if ($id === false) {
    redirect('home.php');
}

$products = getProducts();
if ($products[$id][0] != userId()) {
    redirect('home.php');
}

$products = file('products.csv');
unset($products[$id]); // remove elemento de um array
file_put_contents('products.csv', implode('', $products));

redirect('myProducts.php');


?>