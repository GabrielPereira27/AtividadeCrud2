<?php 
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$nome = "";
		$nacionalidade = "";
		$data_nascimento = "";

		if (isset($_POST['Nome'])) {
			$nome = $_POST['Nome'];
		}
		else {
			echo '<script> alert("É obrigatorio o preenchimento do nome do realizador.");</script>';
		}
		if (isset($_POST['Nacionalidade'])) {
			$nacionalidade = $_POST['Nacionalidade'];
		}
		if (isset($_POST['Data_nascimento'])) {
			$data_nascimento = $_POST['Data_nascimento'];
		}

		$con = new mysqli("localhost", "root", "", "filmes");

		if($con -> connect_errno != 0){
			echo 'Ocorreu um erro no acesso à base de dados. <br>'.$con->connect_error;
			exit();
		}
		else {
			$sql = 'update realizadores set (nome, nacionalidade, data_nascimento) values (?,?,?)';
			$stm = $con -> prepare($sql);

			if ($stm != false) {
				$stm -> bind_param("sss", $nome, $nacionalidade, $data_nascimento);
				$stm -> execute();
				$stm -> close();

				echo '<script>alert("Ator alterado com sucesso!");</script';
				echo "Aguarde um momento. A reencaminhar página";
				header("refresh:5; url=index.php");
			}
			else {

			}
		}
	}
	else {
		echo ('<h1>Houve um erro ao processar o seu pedido! <br> Dentro de segundos será reencaminhado!</h1>');
				header("ref