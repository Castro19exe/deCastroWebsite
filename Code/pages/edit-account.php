<?php 
    session_start();
    require '../controller/database/config.php';
    include '../model/model-query.php';
    include '../controller/guard/verification.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Fonto Poppins -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src='https://kit.fontawesome.com/a076d05399.js'> </script>
        <link rel="stylesheet" href="../public/css/estiloEditAccount.css">
        <link rel="icon" href="../public/img/logo.png">
        <title> Editar Conta | De Castro </title>
    </head>
    <body>
        <div class="structure">
            <div class="login-form">
                <h1 class="tit"> Editar Conta </h1>
                <form action="../controller/home/update-user-controller.php" method="POST">
                    <img src="../public/img/<?php echo $_SESSION['user']['image'] ?>" class="account-img">
                    <div> <input type="text" name="edit_username" class="dados" placeholder="Username" value="<?php echo $_SESSION['user']['name']; ?>" autocomplete="off"> </div>
                    <div> <a href=""> Mudar de email? </a> </div>
                    <div> <a href=""> Esqueceu da palavra-chave? </a> </div>
                    <div> <input type="submit" name="btn_update" class="submit" value="Guardar Alterações"> </div>
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

            <div class="form-group 
                <?php 
                    if(empty($_SESSION['success_message']))
                        echo("hide");
                ?>
                ">
                <span class="success">
                    <?php if(!empty($_SESSION['success_message']))
                        echo $_SESSION['success_message'];
                        unset($_SESSION['success_message']);
                    ?>
                </span>
            </div>
        </div>
    </body>
</html>