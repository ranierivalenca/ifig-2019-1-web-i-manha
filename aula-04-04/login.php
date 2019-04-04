<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sistema de livros - Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php if (isset($_GET['error'])): ?>
        <div class="error"><?= $_GET['error'] ?></div>
    <?php endif ?>
    <form action="auth.php" method="POST">
        <input type="text" name="email" placeholder="email">
        <input type="password" name="senha" placeholder="senha">
        <input type="submit" value="Entrar">
    </form>
</body>
</html>