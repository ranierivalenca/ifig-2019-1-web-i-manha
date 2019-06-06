 <tr class="item<?= $itemId ?>">
    <td><?= $title ?></td>
    <td><?= $description ?></td>
    <?php if (is_logged()): ?>
        <td>
            <?php
                $author = user_info($user_email);
            ?>
            <?= $author['nome'] ?>
        </td>
        <td>
            <a href="itemInfo.php?id=<?= $itemId ?>">Mais informações</a>
            <?php if ($user_email == user_email()): ?>
                <br>
                <a href="delItem.php?id=<?= $itemId ?>" class="remover">Remover</a>
            <?php endif ?>
        </td>
    <?php endif ?>
</tr>