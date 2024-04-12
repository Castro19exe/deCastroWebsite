<header class="menu" id="Menu">
    <?php
        if(empty($_SESSION['user']['id'])) { ?>
            <a href="/DeCastro/index.php" class="logo"> <img src="/DeCastro/public/img/logo2.png" alt=""> </a>
        <?php
        }
        else { ?>
            <a href="/DeCastro/pages/home-log.php" class="logo"> <img src="/DeCastro/public/img/logo2.png" alt=""> </a>
        <?php
        }
    ?>
    <ul>
        <?php
            if(empty($_SESSION['user']['id'])) { ?>
                <li> <a class="special" href="/DeCastro/pages/products.php"> Todos os Produtos </a> </li>
                <li> <a class="categoria" href="/DeCastro/pages/news.php"> Novidades </a> </li>
                <li> <a class="categoria" href="/DeCastro/pages/men.php"> Homem </a> </li>
                <li> <a class="categoria" href="/DeCastro/pages/women.php"> Mulher </a> </li>
                <li> <a class="categoria" href="/DeCastro/pages/junior.php"> Júnior </a> </li>
                <li> <a class="promotion" href="/DeCastro/pages/sales.php"> Promoções </a> </li>
            <?php
            }
            else { ?>
                <li> <a class="special" href="/DeCastro/pages/products-log.php"> Todos os Produtos </a> </li>
                <li> <a class="categoria" href="/DeCastro/pages/news-log.php"> Novidades </a> </li>
                <li> <a class="categoria" href="/DeCastro/pages/men-log.php"> Homem </a> </li>
                <li> <a class="categoria" href="/DeCastro/pages/women-log.php"> Mulher </a> </li>
                <li> <a class="categoria" href="/DeCastro/pages/junior-log.php"> Júnior </a> </li>
                <li> <a class="promotion" href="/DeCastro/pages/sales-log.php"> Promoções </a> </li>
            <?php
            }
        ?>
        <li>
            <a class="shop-icon-responsive" href=""> <p class="notification-icon-responsive-text"> Carrinho </p> <p class="notification-icon-responsive-number"> 0 </p> </a>
        </li>
        <li href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"> </i>
        </li>
    </ul>

    <?php
        if(empty($_SESSION['user']['id'])) { ?>
            <div class="shop-icon">
                <a class="link-number" href="/DeCastro/pages/login.php">
                    <label class="notification-number"> 0 </label>
                </a>
            </div>
        <?php
        }
        else { ?>
            <div class="shop-icon">
                <a class="link-number" href="cart.php">
                    <label class="notification-number"> 
                        <?php
                            $user = $_SESSION['user']['id'];
                            $insert = "SELECT * FROM purchase_product INNER JOIN purchase ON purchase_product.fk_purchase = purchase.id_purchase WHERE fk_user = '$user'";
                            $result = mysqli_query($conn, $insert);
            
                            $count = mysqli_num_rows($result);
                
                            echo $count;
                        ?>
                    </label>
                </a>
            </div>
        <?php
        }
    ?>

    <?php if(empty($_SESSION['user']['id'])) { ?>
        <div>
            <a class="login" class="" href="/DeCastro/pages/login.php"> INICIAR SESSÃO </a>
        </div>
    <?php
    }
    else { ?>
        <div class="drop-login">
            <div class="img-support">
                <img onclick="contezt()" class="img-account" src="/DeCastro/public/img/<?php echo $_SESSION['user']['image'] ?>">
            </div>
            <div id="login-contentz" class="login-content">
                <?php if($_SESSION['user']['rank']) { ?>
                    <a href="/DeCastro/pages/admin/password.php"> Administrador </a>
                <?php } ?>
                <a href="/DeCastro/pages/edit-account.php"> Conta </a>
                <a href="/DeCastro/pages/log-out.php"> Terminar Sessão </a>
            </div>
        </div>
    <?php
    }
    ?>
</header>