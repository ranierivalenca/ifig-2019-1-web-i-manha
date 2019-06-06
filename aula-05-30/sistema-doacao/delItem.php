<?php

include 'conf/init.php';

$id = $_GET['id'] ?? false;
if ($id === false) {
    redirect('index.php');
}

$items = file(ITEMS_FILE);
$item = $items[$id];
list($itemUser) = explode(SEPARATOR, $item);
if ($itemUser != user_email()) {
    // redirect('index.php');
    http_response_code(403);
    die();
}

$items[$id] = "\n";
file_put_contents(ITEMS_FILE, implode('', $items));
redirect('index.php');
exit();

?>