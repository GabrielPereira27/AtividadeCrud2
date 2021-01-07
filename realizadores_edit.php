<?php
	if ($_SERVER['REQUEST_METHOD'] == "GET") {
		if (isset($_GET['realizador']) && is_numeric($_GET['realizador'])) {
			$idRealizador = $_GET['realizador'];
			$con = new mysqli("localhost", "root", "", "filmes");

			if ($con ->connect_errno != 0) {
				echo "<h1>Ocorreu um erro no acesso à base de dados. <br>".$con->connect_error. "</h1>";
				exit();
			}
			$sql = "Select * from realizadores where id_realizador=?";
			$stm = $con -> prepare($sql);
			if ($stm != false) {
			$stm -> bind_param("i", $idRealizador);
			$stm -> execute();
			$res = $stm -> get_result();
			$realizador = $res -> fetch_assoc();
			$stm -> close();
			}
		?>

		<!DOCTYPE html>
		<html>
		<head>
			<meta charset="ISO-8859-1">
			<title>Editar Realizadores</title>
		</head>
		<body>
			<h1>Editar realizador</h1>
			<i class="bi bi-pencil-fill"></i>
			<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
</svg>
			<form action="realizadores_update.php" method="post">
				<label>Nome</label><input type="text" name="nome" required value="<?php echo $realizador['Nome']; ?>"><br>
				<label>Nacionalidade</label><input type="text" name="Nacionalidade" value="<?php echo $realizador['Nacionalidade'] ?>">"><br>
				<label>Data Nascimento</label><input type="text" name="sinopse" value="<?php echo $realizador['Data_nascimento'] ?>"><br>
				<input type="submit" name="enviar"><br>
			</form>
		</body>
		<?php 
			}
			else {
				echo ('<h1>Houve um erro ao processar o seu pedido. <br> Dentro de segundos será reencaminhado!</h1>');
				header("refresh:5; url=index.php");
			}
		?>
		</html>
		<?php 
	}
		?>
