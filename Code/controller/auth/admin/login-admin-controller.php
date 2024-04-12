<?php
    session_start();
    require '../../database/config.php';
    require '../../../model/model-query.php';

    $nome = $conn -> real_escape_string($_POST['code']);

    if($nome == $_SESSION['user']['name'])  {
        header("Location: ../../../pages/admin/home.php");
    }
    elseif(empty($nome)) {
        $_SESSION['error_message'] = "Todos os campos têm de estar preenchidos!";
        header("Location: ../../../pages/admin/password.php");
    }
    elseif(preg_match("/[\[^\'£$%^&*()}{@:\'#~?><>,;@\|\-=\-_+\-¬\`\]]/", $nome)) {
        $_SESSION['error_message'] = "Apenas pode usar letras e números!";
        header("Location: ../../../pages/admin/password.php");
    }
    else {
        $_SESSION['error_message'] = "Código inválido";
        header("Location: ../../../pages/admin/password.php");
    }

    $conn->close();
?>