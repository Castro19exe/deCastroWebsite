<?php
    session_start();
    require '../../controller/database/config.php';
    include '../../model/model-query.php';
    include '../../controller/guard/verification.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../public/css/estiloAdmin.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/media.css">
    <link rel="icon" href="../../public/img/logo.png">
    <!-- Fonto Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <title> Admin LogIn </title>
</head>
<body>
    <div class="structure">
        <div class="login-form">
            <form action="../../controller/auth/admin/login-admin-controller.php" method="POST">
                <div> <p> Código de Acesso </p> <input type="password" name="code" class="dados" autocomplete="off" autofocus> </div>
                <div> <button type="submit" class="submit"> CONECTAR </button> </div>
            </form>
        </div>

        <div class="form-group 
            <?php 
                if(empty($_SESSION['error_message']))
                    echo("hide");
            ?>
            ">
            <span class="erro">
                <?php if(!empty($_SESSION['error_message']))
                    echo $_SESSION['error_message'];
                    unset($_SESSION['error_message']);
                ?>
            </span>
        </div>
    </div>
</body>
</html>