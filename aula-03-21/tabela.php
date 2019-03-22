<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php include_once 'head.html'; ?>
<body>
    <h1>Seja bem vindo, <?= $_SESSION['nome'] ?></h1>
    <?php
        include_once 'init.php';
        include_once 'init2.php';

        $pokemons = file($filename);

        for ($i = 0; $i < sizeof($pokemons); $i++) {
            $pokemons[$i] = explode(",", $pokemons[$i]);
        }
    ?>
    <!-- <pre> -->

<?php //var_dump($pokemons) ?>
    <!-- </pre> -->
    <table>
        <tr>
            <th>Pokemon</th>
            <th>Tipo</th>
        </tr>
        <?php foreach ($pokemons as $i => $pokemon): ?>
            <tr>
                <?php foreach ($pokemon as $dado): ?>
                    <td><?= $dado; ?></td>
                <?php endforeach ?>
                <td><a href="deletar.php?id=<?= $i ?>">Deletar</a></td>
            </tr>
        <?php endforeach ?>
    </table>
    <form action="adicionar.php" method="POST">
        Pokemon: <input type="text" name="pokemon">
        <br>
        Tipo:
        <select name="tipo" id="">
            <option value="Fogo">Fogo</option>
            <option value="Água">Água</option>
            <option value="Terra">Terra</option>
            <option value="Vento">Vento</option>
            <option value="Fantasma">Fantasma</option>
        </select>
        <br>
        Poder: <input type="number" min="0" max="9999" step="10" name="poder">
        <br>
        <input type="submit">
    </form>
</body>
</html>