<!DOCTYPE HTML>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">

	<title>Página Principal</title>

	<!-- bootstrap - link cdn -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script>
		function requisitarPagina(url) {
			if(!document.getElementById('carregando')) {
				document.getElementById('conteudo').innerHTML = '' // substitui o conteudo atual por nada --> ''
				let imgCarregando = document.createElement('img')
				imgCarregando.id = 'carregando'
				imgCarregando.src = 'loading.gif'
				imgCarregando.className = 'rounded mx-auto d-block'
				document.getElementById('conteudo').appendChild(imgCarregando) //inclui o gif no id 'conteudo'.
			}
			
			let ajax = new XMLHttpRequest();

			//requisição não iniciada, state = 0
			// console.log(ajax.readyState)

			ajax.open('GET', url)

			//conexão estabelecida com o servidor, state = 1
			// console.log(ajax.readyState)


			//de alguma lógica que fique olhando para o progresso da req

			ajax.onreadystatechange = () => {
				if(ajax.readyState == 4 && ajax.status == 200){
					document.getElementById('conteudo').innerHTML = 'Requisição concluido com sucesso'
					document.getElementById('conteudo').innerHTML = ajax.responseText
					console.log('Requisição finalizada com Sucesso')
					//--------------------------------------------------//
					// document.getElementById('carregando').remove() // Desnecessário o '.remove()', pois o 'innerHTML' já exclui o conteudo 'appendChild(imgCarregando)' e inclui o conteudo 'ajax.responseText'. 
				}
			}
			ajax.send()

			
		}
	</script>
</head>

<body>

	<!-- Static navbar -->
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
				<a href="#" onclick="requisitarPagina('pagina_1_conteudo.php')" class="btn btn-primary">Página 1</a>
				<a href="#" onclick="requisitarPagina('pagina_2_conteudo.php')" class="btn btn-primary">Página 2</a>
				<a href="#" onclick="requisitarPagina('pagina_3_conteudo.php')" class="btn btn-primary">Página 3</a>
			</div>
			<div class="col-md-4 center"></div>
		</div>

		<div class="row">
			<div class="col-md-1">

			</div>

			<div class="col-md-10" id="conteudo">

			</div>

			<div class="col-md-1"></div>
		</div>

	</div>
</body>

</html>