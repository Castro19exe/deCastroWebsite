<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "decastro";

	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	mysqli_set_charset($conn,"utf8");
	if(!$conn) {
		die("Falha na conexão: " . mysqli_connect_error());
	}
    else {

	}	
?>