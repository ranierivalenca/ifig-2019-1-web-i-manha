<?php include 'init.php'; ?>
<?php

$message = '';

if (isset($_POST['user'])) {
    $user = $_POST['user'];
    $senha = $_POST['senha'];
    if (login($user, $senha)) {
        redirect('home.php');
    }
    $message = 'Usuário ou senha incorreto';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <div class="message"><?= $message ?></div>
    <form action="" method="POST">
        <input type="text" name="user" placeholder="username ou e-mail">
        <input type="password" name="senha">
        <input type="submit" value="login">
    </form>
</body>
</html>