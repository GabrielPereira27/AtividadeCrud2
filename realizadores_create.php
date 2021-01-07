<?php 
	if ($_SERVER['REQUEST_METHOD'] == "POST") 
	{
		$nome = "";
		$data_nascimento = "";
		$nacionalidade = "";

		if (isset($_POST['Nome'])) {
			$nome = $_POST['Nome'];
		}
		else {
			echo '<script> alert("É obrigatorio o preenchimento do nome do ator.");</script>';
		}
		if (isset($_POST['Nacionalidade'])) {
			$nacionalidade = $_POST['Nacionalidade'];
		}
		if (isset($_POST['Data_nascimento'])) {
			$data_nascimento = $_POST['Data_nascimento'];
		}
		$con = new mysqli("localhost", "root", "", "filmes");

		if($con -> connect_errno != 0){
			echo 'Ocorreu um erro no acesso à base de dados. <br>'.$con ->connect_error;
			exit();
		}
	else {
			$sql = 'insert into realizadores (Nome, Data_nascimento, Nacionalidade) values (?,?,?)';
			$stm = $con -> prepare($sql);
		}
			if ($stm != false) {
				$stm-> bind_param('sss', $nome, $data_nascimento, $nacionalidade);
				$stm-> execute();
				$stm-> close();
				header("refresh:5; url=index.php");

				echo '<script>alert("Realizador adicionado com sucesso!");</script>';
				echo 'Aguarde um momento. A reencaminhar página';
				header("refresh:5; url=index.php");
			}
		}
	else { // 
?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Adicionar Realizadores</title>
	</head>
	<body>
		<h1>Adicionar realizadores</h1>
		<i class="bi bi-file-plus"></i>
		<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4 0h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H4z"/>
  <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z"/>
</svg>
		<form action="realizadores_create.php" method="post">
			<label>Nome</label><input type="text" name="Nome" required><br><br>
			<label>Nacionalidade</label><input type="text" name="Nacionalidade"><br><br>
			<label>Data Nascimento</label><input type="date" name="Data_nascimento"><br><br>
			<input type="submit" name="enviar"><br>
		</form>
	</body>
		<script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
	</html>

	<?php 
		}
	?>