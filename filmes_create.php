<?php 
	if ($_SERVER['REQUEST_METHOD'] == "POST") 
	{
		$titulo = "";
		$sinopse = "";
		$idioma = "";
		$data_lancamento = "";
		$quantidade = 0;

		if (isset($_POST['titulo'])) {
			$titulo = $_POST['titulo'];
		}
		else {
			echo '<script> alert("É obrigatorio o preenchimento do título.");</script>';
		}
		if (isset($_POST['sinopse'])) {
			$sinopse = $_POST['sinopse'];
		}
		if (isset($_POST['quantidade']) && is_numeric($_POST['quantidade'])) {
			$quantidade = $_POST['quantidade'];
		}
		if (isset($_POST['idioma'])) {
			$idioma = $_POST['idioma'];
		}
		if (isset($_POST['data_lancamento'])) {
			$data_lancamento = $_POST['data_lancamento'];
		}
		$con = new mysqli("localhost", "root", "", "filmes");

		if($con -> connect_errno != 0){
			echo 'Ocorreu um erro no acesso à base de dados. <br>'.$con->connect_error;
			exit();
		}
		else {
			$sql = 'insert into filmes (titulo, sinopse, idioma, quantidade, data_lancamento) values (?,?,?,?,?)';
			$stm = $con -> prepare($sql);
			if ($stm != false) {
				$stm-> bind_param('sssis', $titulo, $sinopse, $idioma, $quantidade, $data_lancamento);
				$stm-> execute();
				$stm-> close();
				header("refresh:5; url=index.php");

				echo '<script>alert("Livro adicionado com sucesso");</script>';
				echo 'Aguarde um momento. A reencaminhar página';
				header("refresh:5; url=index.php");
			}
		}
	}
	else { // 
?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Adicionar filmes</title>
	</head>
	<body>
		<h1>Adicionar filmes</h1>
		<i class="bi bi-file-font"></i>
		<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4 0h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H4z"/>
  <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z"/>
</svg>
</svg>
		<form action="filmes_create.php" method="post">
			<label>Título</label><input type="text" name="titulo" required><br><br>
			<label>Sínopse</label><input type="text" name="sinopse"><br><br>
			<label>Quantidade</label><input type="text" name="quantidade"><br><br>
			<label>Idioma</label><input type="text" name="idioma"><br><br>
			<label>Data Lançamento</label><input type="text" name="data_lancamento"><br><br>
			<input type="submit" name="enviar"><br>
		</form>
	</body>
	</html>

	<?php 
		}
	?>