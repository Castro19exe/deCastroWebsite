<?php 
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/estiloRegister.css">
    <link rel="stylesheet" type="text/css" href="../public/css/media.css">
    <link rel="icon" href="../public/img/logo.png">
    <!-- Fonto Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<title> Criar Conta | De Castro </title>
</head>
<body>
    <div class="structure">
        <div class="register-form">
            <h1 class="tit"> CRIAR CONTA </h1>
            <form action="../controller/auth/register-controller.php" method="POST">
                <div class="form-group">
                    <input type="text" name="username" class="dados" placeholder="Nome do Utilizador" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="dados" placeholder="E-mail" autocomplete="off">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="dados" placeholder="Palavra-Chave">
                </div>
                <div class="form-group">
                    <input type="password" name="con-password" class="dados" placeholder="Confirmar Palavra-Chave">
                </div>
                <div class="form-group">
                    <button type="submit" class="submit"> CONECTAR </button>
                </div>
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