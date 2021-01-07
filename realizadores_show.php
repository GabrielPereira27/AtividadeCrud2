<?php 
	if ($_SERVER['REQUEST_METHOD'] == "GET") {
		
		if (!isset($_GET['realizador']) || !is_numeric($_GET['realizador'])) {
			echo '<script>alert("Erro ao abrir realizador");</script>';
			echo 'Aguarde um momento. A reencaminhar página';
			header("refresh:5; url=index.php");
			exit();
		}
		$idRealizador = $_GET['realizador'];
		$con = new mysqli("localhost", "root", "", "filmes");

		if ($con->connect_errno != 0) 
		{
		echo "Ocorreu um erro no acesso à base de dados ".$con->connect_error;
		exit;
		}
		else{
			$sql = 'select * from realizadores where id_realizador = ?';
			$stm = $con->prepare($sql);
			if ($stm != false) {
				$stm -> bind_param('i', $idRealizador);
				$stm -> execute();
				$res = $stm->get_result();
				$realizador = $res->fetch_assoc();
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
		<h1>Detalhes do realizador</h1>
		<?php 
			if (isset($realizador)) 
			{
				echo '<br>';
				echo utf8_encode($realizador['Nome']);
				echo '<br>';
				echo $realizador['Nacionalidade'];
				echo '<br>';
				echo $realizador['Data_nascimento'];
				echo '<br>';
			}
			else{
					echo '<h2>Parece que o realizador selecionado não existe. <br> Confirme sua seleção. </h2>';
				}
		?>
	</body>
	</html>