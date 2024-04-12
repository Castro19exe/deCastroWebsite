<?php 
    session_start();
    require '../controller/database/config.php';
    include '../model/model-query.php';
    include '../controller/guard/verification.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonto Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../public/css/estilo.css">
    <link rel="icon" href="../public/img/logo.png">
    <title>  Meu Carrinho | De Castro </title>
</head>
<body>
    <?php include 'shared/header.php'; ?>

    <?php if($count >= 1) { ?>
    <h2 class="h2-cart"> Meu Carrinho (<?php teste() ?>):</h2>

    <section class="section-cart-list">
        <div class="cart-list">
            <?php foreach(selectProductsInCart() as $dados) { ?>
                <div class="cart">
                    <div class="cart-img">
                        <img src="../public/img/<?php echo $dados['img1_product'] ?>" alt="<?php echo $dados['nome_product'] ?>">
                        <form action="../controller/home/remove-card-controller.php" method="POST" style="display: block; width: 100%;">
                            <div>
                                <input type="hidden" name="purchase" value="<?php echo $dados['id_purchase'] ?>">
                                <input type="hidden" name="product" value="<?php echo $dados['id_product'] ?>">
                                <input type="hidden" name="quantity" value="<?php echo $dados['quantidade_purchase_product'] ?>">
                                <?php
                                    if($dados['preco_desc_product'] > 0) { ?>
                                        <input type="hidden" name="price" value="<?php echo $dados['preco_desc_product'] ?>">
                                    <?php
                                    }
                                    else { ?>
                                        <input type="hidden" name="price" value="<?php echo $dados['preco_product'] ?>">
                                    <?php
                                    }
                                ?>
                            </div>
                            <div style="width: 100%; padding: 5px 5px 15px 5px;">
                                <input type="submit" value="Remover" style="display: block; margin: auto; font-size: 15px;">
                            </div>
                        </form>
                    </div>
                    
                    <div style="width: 100%;">
                        <p style="margin: 0px; padding-top: 15px;"> <?php echo $dados['nome_product'] ?> </p>
                        <?php if($dados['preco_desc_product'] > 1) { ?>
                            <div class="div-preco">
                                <p class="precoAntigo"> <?php echo $dados['preco_product'] ?>€ </p>
                                <p class="precoDesconto"> <?php echo $dados['preco_desc_product'] ?>€ </p>
                            </div>
                        <?php
                        }
                        else { ?> <p style="margin: 0px; font-weight: bold;"> <?php echo $dados['preco_product'] ?>€ </p> <?php } ?>

                        <div class="div-select-size">
                            <p> Tamanho: </p>
                            <select class="select-option">
                                <?php if($dados['fk_type_product'] == 1) {
                                    foreach(selectSizeProductsLetters() as $tamanhos) { ?>
                                        <option> <?php echo $tamanhos['id_size_product'] ?> </option>
                                    <?php
                                    } 
                                }
                                elseif($dados['fk_type_product'] == 2 OR $dados['fk_type_product'] == 3) {
                                    foreach(selectSizeProductsNumbers() as $tamanhos) { ?>
                                        <option> <?php echo $tamanhos['id_size_product'] ?> </option>
                                    <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <form action="../controller/home/quantity-card-controller.php" method="POST">
                        <div class="div-quantity">
                            <div>
                                <input type="hidden" name="purchase" value="<?php echo $dados['id_purchase'] ?>">
                                <input type="hidden" name="product" value="<?php echo $dados['id_product'] ?>">
                                <?php
                                    if($dados['preco_desc_product'] > 0) { ?>
                                        <input type="hidden" name="price" value="<?php echo $dados['preco_desc_product'] ?>">
                                    <?php
                                    }
                                    else { ?>
                                        <input type="hidden" name="price" value="<?php echo $dados['preco_product'] ?>">
                                    <?php
                                    }
                                ?>
                            </div>
                            <div>
                                <button type="submit" name="btn" value="plus"> <i class="fa fa-plus"> </i> </button>
                            </div>
                            <div>
                                <input type="text" name="quantity" value="<?php echo $dados['quantidade_purchase_product'] ?>">
                            </div>
                            <div>
                                <button type="submit" name="btn" value="minus"> <i class="fa fa-minus"> </i> </button>
                            </div>
                        </div>
                    </form>
                </div>
                <?php
                } 
                ?>
        </div>

        <div class="tabcontent">
            <div class="div-total-price"> 
                <p> Total: </p>
                <p> <?php echo $_SESSION['purchase']['total_price'] ?>€ </p>
            </div>
            <form action="../controller/home/prome-code-controller.php" method="POST">
                <div class="div-prome">
                    <input type="text" name="prome-code" class="prome-code" placeholder="Código de desconto" autocomplete="off">
                    <button type="submit" class="btn-prome-code"> <i class="fa fa-check"> </i> </button>
                </div>
            </form>
            <button class="btn-check-out"> Finalizar Compra </button>
        </div>
    <?php
    }
    else { ?>
        <div style="display: flex; justify-content: center;">
            <div class="empty-cart">
                <img src="../public/img/icon-add-to-bag.svg">
                <p> O teu carrinho está vazio </p>
                <a href="../pages/products-log.php"> Começar a comprar </a>
            </div>
        </div>
    <?php
    }
    ?>
    </section>

    <?php include 'shared/footer.html'; ?>

    <script src="/DeCastro/public/js/scripts.js"> </script>
</body>
</html>