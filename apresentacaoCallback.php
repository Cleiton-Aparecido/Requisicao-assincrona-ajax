<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página Principal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script>
        function requisitarPagina(url, callbackSolicite, callbackErro) {
            let ajax = new XMLHttpRequest();
            document.getElementById('retorno').innerHTML = ''
            ajax.open('GET', url)
            ajax.onreadystatechange = () => {

                if (ajax.readyState == 4 && ajax.status == 200) {

                    document.getElementById('conteudo').innerHTML = ajax.responseText

                    callbackSolicite();
                } else if (ajax.readyState == 4 && ajax.status == 404) {
                    callbackErro();
                }
            }
            ajax.send()
            document.getElementById('conteudo').innerHTML = 'aguardando resposta do servidor'

        }
        var callbackSolicite = function() {
            document.getElementById('retorno').innerHTML = 'Conexão realizada com sucesso'
        }
        var callbackErro = function() {
            document.getElementById('conteudo').innerHTML = 'A requisição realizada não foi encontrada no servidor. <br> <strong> Erro: 404'
        }

        requisitarPagina('pagina_1_conteudo.php',callbackSolicite,callbackErro)
    </script>
</head>

<body>
    <nav class="navbar navbar-light bg-light mb-4">
        <div class="container">
            <div class="navbar-brand mb-0 h1">
                <h3>Requisições síncronas e assíncronas</h3>
            </div>
        </div>
        <div id="retorno"></div>
    </nav>
    <div class="container">
        <div class="row mb-2">
            <div class="col-md-4 center"></div>
            <div class="col-md-4 center">
                <a href="#" onclick="requisitarPagina('pagina_1_conteudo.php',callbackSolicite,callbackErro)" class="btn btn-primary">Página 1</a>
                <a href="#" onclick="requisitarPagina('pagina_2_conteudo.php',callbackSolicite,callbackErro)" class="btn btn-primary">Página 2</a>
                <a href="#" onclick="requisitarPagina('pagina_3_conteudo.php',callbackSolicite,callbackErro)" class="btn btn-primary">Página 3</a>
                <a href="#" onclick="requisitarPagina('pagina_4_conteudo.php',callbackSolicite,callbackErro)" class="btn btn-primary">Página 4</a>
            </div>
            <div class="col-md-4 center"></div>
        </div>

        <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-10" id="conteudo">
            </div>

            <div id="retorno"></div>
        </div>

    </div>
</body>

</html>