<?php
    session_start();
    require '../controller/database/config.php';
    include '../model/model-query.php';
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
    <title>  Mulher | De Castro </title>
</head>
<body>
    <button onclick="topFunction()" id="backTop" title="Go to the top"> <i class="fa fa-arrow-up"> </i> </button>

    <?php include 'shared/header.php'; ?>
    
    <h2 class="h2-special"> Mulher: </h2>

    <section class="produtos">
        <?php
            foreach(selectWomenProducts() as $dados) { ?>
                <div class="produto">
                    <img class="img1" src="../public/img/<?php echo $dados['img1_product'] ?>" alt="">
                    <img class="img2" src="../public/img/<?php echo $dados['img2_product'] ?>" alt="">
                    <p class="nome"> <?php echo $dados['nome_product'] ?> </p>
                    <input type="hidden" name="<?php echo $dados['id_product'] ?>">
                    <?php if($dados['preco_desc_product'] > 1) { ?>
                        <div style="display: flex; justify-content: left;">
                            <p class="precoAntigo"> <?php echo $dados['preco_product'] ?>€ </p>
                            <p class="precoDesconto"> <?php echo $dados['preco_desc_product'] ?>€ </p>
                        </div>
                        <div> <p class="desconto"> DESCONTO % </p> </div>
                    <?php
                    }
                    else { ?> <p class="preco"> <?php echo $dados['preco_product'] ?>€ </p> <?php }
                    ?>
                    <?php if($dados['novo_product']) { ?>
                        <div> <p class="novidade"> NOVIDADE </p> </div>
                    <?php
                    }
                    else { }
                    ?>
                </div>
            <?php
            }
        ?>
    </section>

    <?php include 'shared/footer.html'; ?>

    <script src="/DeCastro/public/js/scripts.js"> </script>
</body>
</html>