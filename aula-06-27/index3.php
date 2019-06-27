<!-- Construído por Lucas Felinto (github@lucasfelinto) -->
<!-- Construído por Ranieri (github@ranierivalenca) -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>
<body>
  <div id="app">

    <input type="text" v-model="cepNumber">
    <input type="button" v-on:click="getCep" value="Dados">

    <!-- <pre>
      {{result}}
    </pre> -->
    <table>
      <tr>
          <th>Cep</th>
          <td>{{cep}}</td>
      </tr>
      <tr>
          <th>Logradouro</th>
          <td>{{logradouro}}</td>
      </tr>
      <tr>
          <th>Complemento</th>
          <td>{{complemento}}</td>
      </tr>
      <tr>
          <th>Bairro</th>
          <td>{{bairro}}</td>
      </tr>
      <tr>
          <th>Cidade</th>
          <td>{{localidade}}</td>
      </tr>
      <tr>
          <th>Estado</th>
          <td>{{uf}}</td>
      </tr>
  </table>

  </div>

  <script>
    const vm = new Vue({
      el: "#app",
      data: {
        cepNumber: '',
        cep: '',
        logradouro: '',
        complemento: '',
        bairro: '',
        localidade: '',
        uf: ''
      },

      methods: {
        async getCep() {
          let cep = this.cepNumber;
          const get = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
          const json = await get.json();
          this.cep = json.cep;
          this.logradouro = json.logradouro;
          this.complemento = json.complemento;
          this.bairro = json.bairro;
          this.localidade = json.localidade;
          this.uf = json.uf;
        }
      }
    });
  </script>
</body>
</html>