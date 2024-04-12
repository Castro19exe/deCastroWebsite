<?php
    session_start();
    require '../database/config.php';
    require '../../model/model-query.php';

    $nome = $conn -> real_escape_string($_POST['username']);
    $email = $conn -> real_escape_string($_POST['email']);
    $password = $conn -> real_escape_string($_POST['password']);
    $con_password = $conn -> real_escape_string($_POST['con-password']);
    
    if(empty($nome) || empty($email) || empty($password) || empty($con_password))  {
        $_SESSION['error_message'] = "Todos os campos têm de estar preenchidos!";
        header("Location: ../../pages/register.php");
    }
    elseif(preg_match("/[\[^\'£$%^&*()}{@:\'#~?><>,;@\|\-=\-_+\-¬\`\]]/", $nome)) {
        $_SESSION['error_message'] = "Apenas pode usar letras e números";
        header("Location: ../../pages/register.php");
    }
    elseif($password != $con_password) {
		$_SESSION['error_message'] = "A Palavra-Chave é difirente da sua Confirmação!";
		header("Location: ../../pages/register.php");
	}
    elseif(strlen($password) <= 5 ) {
		$_SESSION['error_message'] = "Password tem de ter mais de 5 caracteres!";
		header("Location: ../../pages/register.php");
	}
    elseif(!preg_match("#[0-9]+#", $password)) {
		$_SESSION['error_message'] = "Password tem de ter pelo menos um número!";
		header("Location: ../../pages/register.php");
	}
	elseif(!preg_match("#[a-z]+#", $password)) {
		$_SESSION['error_message'] = "Password tem de ter pelo menos um caracter minúsculo e maiúsculo!";
		header("Location: ../../pages/register.php");
	}
    elseif(!preg_match("#[A-Z]+#", $password)) {
		$_SESSION['error_message'] = "Password tem de ter pelo menos um caracter minúsculo e maiúsculo!";
		header("Location: ../../pages/register.php");
	}
    elseif(verficationUserExist($nome) >= 1) {
        $_SESSION['error_message'] = "Este nome de utilizador já existe!";
		header("Location: ../../pages/register.php");
    }
    elseif(verficationEmailExist($email) >= 1) {
        $_SESSION['error_message'] = "Este email de utilizador já existe!";
		header("Location: ../../pages/register.php");
        exit;
    }
    else {
        insertUser($nome, $email, $password);
        header('Location: ../../pages/login.php');
        $_SESSION['success_message'] = "Utilizador criado com sucesso!";
    }

    $conn->close();
?>