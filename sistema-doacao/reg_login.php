<?php

include 'conf/init.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= TITLE ?></title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <form action="auth.php" method="POST">
        <fieldset>
            <?php if ($_GET['ml'] ?? false !== false ): ?>
                <span class="message"><?= $_GET['ml'] ?></span>
            <?php endif ?>
            <legend>Login</legend>
            <input type="email" name="email" placeholder="E-mail" value="<?= $_GET['email'] ?? '' ?>">
            <input type="password" name="pw" placeholder="Senha">
            <input type="submit" value="ok">
        </fieldset>
    </form>
    <hr>
    <form action="register.php" method="POST">
        <fieldset>
            <?php if ($_GET['mr'] ?? false !== false ): ?>
                <span class="message"><?= $_GET['mr'] ?></span>
            <?php endif ?>
            <legend>Registro</legend>
            <input type="text" placeholder="Nome" name="name" value="<?= $_GET['name'] ?? '' ?>">
            <input type="phone" placeholder="Telefone" name="phone" value="<?= $_GET['phone'] ?? '' ?>">
            <input type="text" placeholder="Cidade" name="city" value="<?= $_GET['city'] ?? '' ?>">
            <input type="text" placeholder="Bairro" name="district" value="<?= $_GET['district'] ?? '' ?>">
            <input type="email" placeholder="E-mail" name="email" value="<?= $_GET['email'] ?? '' ?>">
            <input type="password" placeholder="Senha" name="pw">
            <input type="password" placeholder="Confirme a senha" name="pw2">
            <input type="submit" name="submit" value="ok">
        </fieldset>
    </form>
    <h3><a href="index.php">Voltar</a></h3>
</body>
</html>