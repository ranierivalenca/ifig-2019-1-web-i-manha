<?php

include 'conf/init.php';

if (!is_logged()) {
    redirect('index.php');
}

// foreach($_POST as $idx => $val) {
//     $$idx = $val;
// }
$title = $_POST['title'];
$description = $_POST['description'];

$description = nl2br($description);
$description = str_replace("\n", '', $description);

addRegister([user_email(), $title, $description], ITEMS_FILE);

$rows = file(ITEMS_FILE); // array com as linhas do arquivo 'ITEMS_FILE'
$num_rows = sizeof($rows);
$itemId = $num_rows - 1;

// redirect('index.php');

$user_email = user_email();
include 'item.php';

?>
