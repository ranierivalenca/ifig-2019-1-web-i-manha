<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="jquery-3.4.1.js"></script>
</head>
<body>
    <form action="#" id="consultacep">
        <input type="text" name="cep">
        <input type="submit">
    </form>
    <table>
        <tr>
            <th>Cep</th>
            <td id="cep"></td>
        </tr>
        <tr>
            <th>Logradouro</th>
            <td id="logradouro"></td>
        </tr>
        <tr>
            <th>Complemento</th>
            <td id="complemento"></td>
        </tr>
        <tr>
            <th>Bairro</th>
            <td id="bairro"></td>
        </tr>
        <tr>
            <th>Cidade</th>
            <td id="localidade"></td>
        </tr>
        <tr>
            <th>Estado</th>
            <td id="uf"></td>
        </tr>
    </table>
    <script>
        $('#consultacep').on('submit', (evt) => {
            evt.preventDefault();
            var cep = $('#consultacep > input[name=cep]').val();

            $.ajax({
                url: `https://viacep.com.br/ws/${cep}/json/`,
                success: (data) => {
                    $('#cep').html(data.cep);
                    $('#logradouro').html(data.logradouro);
                    $('#complemento').html(data.complemento);
                    $('#bairro').html(data.bairro);
                    $('#localidade').html(data.localidade);
                    $('#uf').html(data.uf);
                }
            })
        });
    </script>
</body>
</html>