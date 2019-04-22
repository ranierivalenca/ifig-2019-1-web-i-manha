<?php
    include 'init.php';
    $login = $_POST['login'] ?? false;
    $register = $_POST['register'] ?? false;

    $registerMessage = false;
    $loginMessage = false;

    if ($register !== false) {
        $fields = ['username', 'password', 'name'];
        foreach($fields as $field) {
            $$field = $_POST[$field];
        }
        file_put_contents(
            'users.csv',
            join(',', [$username, sha1($password), $name]) . "\n",
            FILE_APPEND
        );
        $registerMessage = 'Usuário registrado';
    } else if ($login !== false) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = sha1($password);
        if (login($username, $password)) {
            redirect();
        } else {
            $loginMessage = 'Usuário ou senha incorreto';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <fieldset>
            <legend>Registrar</legend>
            <?php if ($registerMessage !== false): ?>
                <div class="message"><?= $registerMessage ?></div>
            <?php endif ?>

            <input type="text" name="username" placeholder="nome de usuario">
            <input type="password" name="password" placeholder="senha">
            <input type="text" name="name" placeholder="nome">
            <input type="hidden" name="register" value="1">
            <input type="submit">
        </fieldset>
    </form>
    <hr>
    <form action="" method="POST">
        <input type="hidden" name="login" value="1">
        <fieldset>
            <legend>Login</legend>
            <?php if ($loginMessage !== false): ?>
                <div class="message"><?= $loginMessage ?></div>
            <?php endif ?>
            <input type="text" name="username" placeholder="nome de usuario">
            <input type="password" name="password" placeholder="senha">
            <input type="submit">
        </fieldset>
    </form>
</body>
</html>