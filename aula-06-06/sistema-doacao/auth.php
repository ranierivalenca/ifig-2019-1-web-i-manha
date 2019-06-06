<?php

include 'conf/init.php';

foreach($_POST as $idx => $val) {
    $$idx = $val;
}

login($email, $pw);
if (is_logged()) {
    redirect('index.php');
}
$vars = '';
foreach($_POST as $idx => $val) {
    if (in_array($idx, ['pw'])) continue;
    $vars .= "&$idx=$val";
}
redirect('reg_login.php?ml=E-mail ou senha incorreto' . $vars);

?>