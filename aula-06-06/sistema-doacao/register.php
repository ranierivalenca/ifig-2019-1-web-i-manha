<?php

include 'conf/init.php';

foreach($_POST as $index => $data) {
    $$index = $data;
}

$vars = '';
foreach($_POST as $idx => $val) {
    if (in_array($idx, ['pw', 'pw2'])) continue;
    $vars .= "&$idx=$val";
}

if ($pw != $pw2) {
    redirect('reg_login.php?mr=Senhas não conferem' . $vars);
}
if ($pw == '') {
    redirect('reg_login.php?mr=Senha não pode estar em branco' . $vars);
}
if (email_exists($email)) {
    redirect('reg_login.php?mr=E-mail já registrado' . $vars);
}

addRegister([$email, md5($pw), $name, $phone, $city, $district], USERS_FILE);


redirect('reg_login.php?mr=Usuário registrado');

?>