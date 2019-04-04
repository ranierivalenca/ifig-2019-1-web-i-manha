<?php

session_start();
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
}
$_SESSION['contador'] = $_SESSION['contador'] + 1;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    Esta é a vez número <?= $_SESSION['contador'] ?> que vc entra aqui.
</body>
</html>