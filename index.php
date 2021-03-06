<?php 
	$con = new mysqli("localhost", "root", "", "filmes");

	if ($con->connect_errno != 0) {
		echo "Ocorreu um erro no acesso à base de dados ".$con->connect_error;
		exit;
	}
	else{
?>
	<!DOCTYPE html>
	<html>
	<head style="background:color:black;">
	<meta charset="ISO-8859-1">
		<title>Filmes</title>
	</head>
	<body>
	<h1>Lista de filmes</h1>
	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-bar-down" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 3.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5zM8 6a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 .708-.708L7.5 12.293V6.5A.5.5 0 0 1 8 6z"/><br>
</svg>

	<?php 
	$stm = $con->prepare('select * from filmes');
	$stm-> execute();
	$res = $stm->get_result();
	while ($resultado = $res-> fetch_assoc()) 
	{
		echo '<a href="filmes_show.php?filme='. $resultado['id_filme']. '">';
		echo $resultado['titulo'];
		echo "</a>";
		echo "<br>";
	}
	$stm->close();
	?>

	<h1>Adicionar filmes</h1>
	<i class="bi bi-bookmark-plus"></i>
	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bookmark-plus" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
  <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z"/>
</svg>

	<a  href="filmes_create.php"><b>Adicionar Filme</b></a>

	<h1>Editar filmes</h1>
	 <i class="bi bi-pencil-square"></i>
	 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
	 <a href="filmes_edit.php"><b>Editar Filme</b></a><br>

	<?php 
		$stm = $con->prepare('select * from filmes');
		$stm-> execute();
		$res = $stm->get_result();
		while ($resultado = $res-> fetch_assoc()) 
		{
		echo '<a href="filmes_edit.php?filme='. $resultado['id_filme']. '">';
		echo $resultado['titulo'];
		echo "</a>";
		echo "<br>";
	}
	$stm->close();
	?>

<br>
<br>
<br>
	</body>
	</html>
	
<?php 
	} //end if - if($con->connect_errno != 0)
?>

	<h1>Lista de atores</h1>
	<i class="bi bi-bookmark-plus"></i>
	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-bar-down" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 3.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5zM8 6a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 .708-.708L7.5 12.293V6.5A.5.5 0 0 1 8 6z"/><br>

	<?php 
	$stm = $con->prepare('select * from atores');
	$stm-> execute();
	$res = $stm->get_result();
	while ($resultado = $res-> fetch_assoc()) 
	{
		echo '<a href="atores_show.php?ator='. $resultado['id_ator']. '">';
		echo $resultado['nome'];
		echo "</a>";
		echo "<br>";
	}
	$stm->close();
	?>

	<h1>Adicionar atores</h1>
	<i class="bi bi-bookmark-plus"></i>
	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bookmark-plus" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
  <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z"/>
</svg>
	<a  href="atores_create.php"><b>Adicionar Ator</b></a>

	<h1>Editar atores</h1>
	<i class="bi bi-pencil-square"></i>
	 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>

	<?php 
		$stm = $con->prepare('select * from atores');
		$stm-> execute();
		$res = $stm->get_result();
		while ($resultado = $res-> fetch_assoc()) 
		{
		echo '<a href="atores_edit.php?ator='. $resultado['id_ator']. '">';
		echo $resultado['nome'];
		echo "</a>";
		echo "<br>";
	}
	$stm->close();
	?>
	<br>
	<br>
	<br>

	<h1>Lista de realizadores</h1>
	<i class="bi bi-bookmark-plus"></i>
	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-bar-down" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 3.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5zM8 6a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 .708-.708L7.5 12.293V6.5A.5.5 0 0 1 8 6z"/><br>

  <?php 
	$stm = $con->prepare('select * from realizadores');
	$stm-> execute();
	$res = $stm->get_result();
	while ($resultado = $res-> fetch_assoc()) 
	{
		echo '<a href="realizadores_show.php?realizador='. $resultado['Id_realizador']. '">';
		echo $resultado['Nome'];
		echo "</a>";
		echo "<br>";
	}
	$stm->close()
	?>

	<h1>Adicionar Realizadores</h1>
	<i class="bi bi-bookmark-plus"></i>
	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bookmark-plus" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
  <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z"/>
	</svg>
	<a  href="realizadores_create.php"><b>Adicionar Realizador</b></a>

	<h1>Editar realizador</h1>
	<i class="bi bi-pencil-square"></i>
	 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
	</svg>

	<?php 
		$stm = $con->prepare('select * from realizadores');
		$stm-> execute();
		$res = $stm->get_result();
		while ($resultado = $res-> fetch_assoc()) 
		{
		echo '<a href="realizadores_edit.php?realizador='. $resultado['Id_realizador']. '">';
		echo $resultado['Nome'];
		echo "</a>";
		echo "<br>";
	}
	$stm->close();
	?>