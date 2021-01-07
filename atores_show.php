<?php 
	if ($_SERVER['REQUEST_METHOD'] == "GET") {
		
		if (!isset($_GET['ator']) || !is_numeric($_GET['ator'])) {
			echo '<script>alert("Erro ao abrir ator");</script>';
			echo 'Aguarde um momento. A reencaminhar página';
			header("refresh:5; url=index.php");
			exit();
		}
		$idAtor = $_GET['ator'];
		$con = new mysqli("localhost", "root", "", "filmes");

		if ($con->connect_errno != 0) 
		{
		echo "Ocorreu um erro no acesso à base de dados ".$con->connect_error;
		exit;
		}
		else{
			$sql = 'select * from atores where id_ator = ?';
			$stm = $con->prepare($sql);
			if ($stm != false) {
				$stm -> bind_param('i', $idAtor);
				$stm -> execute();
				$res = $stm->get_result();
				$ator = $res->fetch_assoc();
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
		<h1>Detalhes do ator</h1>
		<?php 
			if (isset($ator)) 
			{
				echo '<br>';
				echo utf8_encode($ator['nome']);
				echo '<br>';
				echo $ator['data_nascimento'];
				echo '<br>';
				echo $ator['nacionalidade'];
				echo '<br>';
			}
			else{
					echo '<h2>Parece que o ator selecionado não existe. <br> Confirme sua seleção. </h2>';
				}
		?>
	</body>
	</html>