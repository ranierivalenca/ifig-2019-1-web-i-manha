<?php

$cep = $_POST['cep'];
$data_str = file_get_contents("https://viacep.com.br/ws/$cep/json/");

$data = json_decode($data_str, true);

?>
<table>
    <tr>
        <th>Cep</th>
        <td><?= $data['cep']; ?></td>
    </tr>
    <tr>
        <th>Logradouro</th>
        <td><?= $data['logradouro'] ?></td>
    </tr>
    <tr>
        <th>Complemento</th>
        <td><?= $data['complemento'] ?></td>
    </tr>
    <tr>
        <th>Bairro</th>
        <td><?= $data['bairro'] ?></td>
    </tr>
    <tr>
        <th>Cidade</th>
        <td><?= $data['localidade'] ?></td>
    </tr>
    <tr>
        <th>Estado</th>
        <td><?= $data['uf'] ?></td>
    </tr>
</table>