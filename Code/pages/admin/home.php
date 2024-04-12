<?php
    session_start();
    require '../../controller/database/config.php';
    include '../../model/model-query.php';
    include '../../controller/guard/verification.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/estiloAdmin.css">
    <link rel="icon" href="../../public/img/logo.png">
    <!-- Font Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <title> Painel Admin </title>
    <style>
        table {
            width: 100%;
            font-family: 'Poppins';
            font-size: 17px;
            border-collapse: collapse;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>
<body>
    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'Utilizadores')" id="defaultOpen"> Utilizadores </button>
        <button class="tablinks" onclick="openCity(event, 'Produtos')"> Produtos </button>
    </div>

    <div id="Utilizadores" class="tabcontent">
        <?php
            foreach(selectAllUsers() as $dados) { ?>
                <div class="div-img"> <img src="../../public/img/<?php echo $dados['imagem_user'] ?>"> 
                <p> <?php echo $dados['nome_user'] ?> </p>
                <p> <?php echo $dados['email_user'] ?> </p>
                <p> <?php echo $dados['cargo_user'] ?> </p>
                <p> <?php echo $dados['estado_user'] ?> </p>
            </div>
        <?php
            }
        ?>
    </div>

    <div id="Produtos" class="tabcontent">
        <button class="btn-add-product" onclick="openCity(event, 'Add-Produto')"> Novo <i class="fa fa-plus"> </i> </button>
        <table>
            <tr>
                <th> Imagem </th>
                <th> Nome </th>
                <th> Género </th>
                <th> Género </th>
                <th> Tipo </th>
                <th> Preço </th>
            </tr>
            <?php foreach(selectAllProducts() as $dados) { ?>
            <tr>
                <td> <img src="../../public/img/<?php echo $dados['img1_product'] ?>" style="width: 15%;"> </td>
                <td> <?php echo $dados['nome_product'] ?> </td>
                <td> <?php echo $dados['genero_product'] ?> </td>
                <td> <?php echo $dados['fk_type_product'] ?> </td>
                <td> <?php echo $dados['nome_product'] ?> </td>
                <td> <?php echo $dados['nome_product'] ?> </td>
            </tr>
        <?php
        }
        ?>
        </table>
    </div>

    <div id="Add-Produto" class="tabcontent">
        <div class="structure">
            <div class="login-form">
                <h1 class="tit"> Adicionar um novo produto </h1>
                <form action="../controller/auth/login-controller.php" method="POST">
                    <div> <input type="text" name="name" class="" placeholder="Nome do Produto" autocomplete="off"> </div>
                    <select name="gender">
                        <option value="man"> Man </option>
                        <option value="woman"> Woman </option>
                        <option value="woman"> Junior </option>
                    </select>
                    <div> <input type="number" name="price" class="" placeholder="Preço"> </div>
                    <div> <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"> </div>
                    <div> <button type="submit" class="submit"> Adicionar </button> </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
        }
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>
</body>
</html> 
