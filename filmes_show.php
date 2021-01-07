<?php 
	if ($_SERVER['REQUEST_METHOD'] == "GET") {
		
		if (!isset($_GET['filme']) || !is_numeric($_GET['filme'])) {
			echo '<script>alert("Erro ao abrir filme");</script>';
			echo 'Aguarde um momento. A reencaminhar página';
			header("refresh:5; url=index.php");
			exit();
		}
		$idFilme = $_GET['filme'];
		$con = new mysqli("localhost", "root", "", "filmes");

		if ($con->connect_errno != 0) 
		{
		echo "Ocorreu um erro no acesso à base de dados ".$con->connect_error;
		exit;
		}
		else{
			$sql = 'select * from filmes where id_filme = ?';
			$stm = $con->prepare($sql);
			if ($stm != false) {
				$stm -> bind_param('i', $idFilme);
				$stm -> execute();
				$res = $stm->get_result();
				$livro = $res->fetch_assoc();
				$stm -> close();
			}
			else{
				echo '<br>';
				echo ($con->error);
				echo '<br>';
				echo "Aguarde um momento. A reencaminhar página";
				echo '<br>';
				header("refresh:5; url=index.php");
				exit();
			}
		}
	}
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title>Detalhes</title>
	</head>
	<body>	
		<h1>Detalhes do filme</h1>
		<i class="bi bi-chevron-down"></i>
		<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
</svg>
		<?php 
			if (isset($livro)) 
			{
				echo '<br>';
				echo utf8_encode($livro['titulo']);
				echo '<br>';
				echo utf8_encode($livro['sinopse']);
				echo '<br>';
				echo $livro['idioma'];
				echo '<br>';
				echo $livro['data_lancamento'];
				echo '<br>';
				echo $livro['quantidade'];
				echo '<br>';
			}
			else{
					echo '<h2>Parece que o filme selecionado não existe. <br> Confirme sua seleção. </h2>';
				}
		?>
	</body>
	</html>