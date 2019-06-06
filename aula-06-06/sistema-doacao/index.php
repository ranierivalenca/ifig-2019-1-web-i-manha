<?php

include 'conf/init.php';

$items = getItems();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= TITLE ?></title>
    <link rel="stylesheet" href="assets/styles.css">
    <script src="jquery-3.4.1.js"></script>
    <script>
        $.ready(function() {

        });
    </script>
</head>
<body>
    <h1>Sistema de doação</h1>
    <h3>Itens a serem doados</h3>
    <table id="items">
        <tr>
            <th>Item</th>
            <th>Descrição</th>
            <?php if (is_logged()): ?>
                <th>Autor</th>
                <th>Ações</th>
            <?php endif ?>
        </tr>
        <?php foreach ($items as $itemId => $item): ?>
            <tr class="item<?= $itemId ?>">
                <td><?= $item['titulo'] ?></td>
                <td><?= $item['desc'] ?></td>
                <?php if (is_logged()): ?>
                    <td>
                        <?php
                            $author = user_info($item['email']);
                        ?>
                        <?= $author['nome'] ?>
                    </td>
                    <td>
                        <a href="itemInfo.php?id=<?= $itemId ?>">Mais informações</a>
                        <?php if ($item['email'] == user_email()): ?>
                            <br>
                            <a href="delItem.php?id=<?= $itemId ?>" class="remover">Remover</a>
                        <?php endif ?>
                    </td>
                <?php endif ?>
            </tr>
        <?php endforeach ?>
    </table>
    <script>
        $('#items').on(
            'click',
            '.remover', // apenas clicks em filhos que possuem a classe 'remover'
            function(event) {
                event.preventDefault();
                var el = $(this);
                $.ajax({
                    url: el.attr('href'),
                    success: function() {
                        // $('.item<?= $itemId ?>').remove();
                        el.parent().parent().remove();
                    }
                });
            }
        );
    </script>
    <?php if (is_logged()): ?>
        <form action="addItem.php" method="POST" id="add-item">
            <fieldset>
                <legend>Novo item</legend>
                <input type="text" name="title" placeholder="Título">
                <textarea name="description" rows="6" placeholder="Descrição"></textarea>
                <input type="submit">
                <!-- <input type="reset"> -->
            </fieldset>
        </form>
        <h3>
            <a href="logout.php">Logout</a>
        </h3>
        <script>
            // Exemplo de request assíncrono com POST
            $('#add-item').on('submit', function(evento) {
                // 'this' se refere ao elemento que está sofrendo o evento
                evento.preventDefault(); // cancelo o envio padrão
                var dados = $(this).serialize();
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: dados,
                    success: function(response) {
                        // inserir uma linha na tabela
                        // console.log(response);
                        $('#items').append(response);
                        $('#add-item').trigger('reset'); // dispara o evento 'reset'
                    }
                });
            });
        </script>
    <?php else: ?>
        <h3><a href="reg_login.php">Registro / login</a></h3>
    <?php endif ?>
</body>
</html>