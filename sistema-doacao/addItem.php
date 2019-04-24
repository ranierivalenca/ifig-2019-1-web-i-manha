<?php

include 'conf/init.php';

if (!is_logged()) {
    redirect('index.php');
}

foreach($_POST as $idx => $val) {
    $$idx = $val;
}

$description = nl2br($description);
$description = str_replace("\n", '', $description);

addRegister([user_email(), $title, $description], ITEMS_FILE);

redirect('index.php');

?>;