<?php
    session_start();
    require '../database/config.php';
    require '../../model/model-query.php';

    $id = $_SESSION['user']['id'];
    $nome = $conn -> real_escape_string($_POST['edit_username']);

    if(empty($nome)) {
        $_SESSION['error_message'] = "Erro1";
        header("Location: ../../pages/edit-account.php");
    }
    elseif(preg_match("/[\[^\'£$%^&*()}{@:\'#~?><>,;@\|\-=\-_+\-¬\`\]]/", $nome)) {
        $_SESSION['error_message'] = "Apenas pode usar letras e números!";
        header("Location: ../../pages/edit-account.php");
    }
    else {
        $update = "UPDATE user SET nome_user = '$nome', email_user = '$email' WHERE id_user = '$id'";
        $result = mysqli_query($conn, $update);
        $_SESSION['user']['name'] = $nome;
        $_SESSION['success_message'] = "Dados atualizados!";
        header("Location: ../../pages/edit-account.php");
    }

    $conn->close();
?>