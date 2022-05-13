<!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <title>JavaScript</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script>
      function exibirArtigo(id, callbackSucesso, callbackErro) {
        if (true) {
          callbackSucesso('Funções de callback em JS', 'Retorno do servidor...')
        } else {
          callbackErro('Erro ao recuperar os dados')
        }
      }

      var callbackSucesso = function(titulo, descricao) {
        document.getElementById('conteudo1').innerHTML = '<h1>' + titulo + '</h1>';
        document.getElementById('conteudo2').innerHTML = '<h4>' + descricao + '</h4>';
      }
      
      var callbackErro = function(erro) {
        document.write('<p><b>Erro:</br>' + erro + '</p>')
      }
    </script>
  </head>
  <body style="margin: 10px;">
    <input type="button"  class="btn btn-primary" style="margin: 10px;" value="callback"
  onclick="exibirArtigo(1, callbackSucesso, callbackErro)">
    <div id='conteudo1'></div>
    <div id='conteudo2'></div>
  </body>

</html>