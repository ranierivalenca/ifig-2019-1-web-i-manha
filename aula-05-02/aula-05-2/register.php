<?php include 'init.php'; ?>
<?php

$message = '';

function register() {
    $nome = $_POST['nome'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senha2 = $_POST['senha2'];
    $telefone = $_POST['telefone'];
    $estado = $_POST['estado'];
    $pais = $_POST['pais'];

    if ($senha != $senha2) {
        return 'Senhas não conferem';
    }
    if ($senha == '') {
        return 'Senha não pode ser vazia';
    }
    addUser($nome, $username, $email, $senha, $telefone, $estado, $pais);
    return 'Usuário adicionado com sucesso';
}

if (isset($_POST['nome'])) {
    $message = register();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <span class="message"><?= $message ?></span>
    <form action="register.php" method="POST">
        <input type="text" name="nome" placeholder="nome" value="<?= $_POST['nome'] ?? '' ?>">
        <input type="text" name="username" placeholder="username" value="<?= $_POST['username'] ?? '' ?>">
        <input type="text" name="email" placeholder="email" value="<?= $_POST['email'] ?? '' ?>">
        <input type="password" name="senha" placeholder="senha" value="">
        <input type="password" name="senha2" placeholder="senha2" value="">
        <input type="text" name="telefone" placeholder="telefone" value="<?= $_POST['telefone'] ?? '' ?>">
        <input type="text" name="estado" placeholder="estado" value="<?= $_POST['estado'] ?? '' ?>">
        <input type="text" name="pais" placeholder="pais" value="<?= $_POST['pais'] ?? '' ?>">
        <input type="submit" value="Cadastrar">
    </form>
    <a href="index.php">Voltar</a>
</body>
</html>