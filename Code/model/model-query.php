<?php
    function verficationUserExist($nome) {
        global $conn;

        try {
            $select_nome = "SELECT COUNT(id_user) AS nome_count FROM `user` WHERE `nome_user` = '$nome'";
            $result_nome = mysqli_query($conn, $select_nome);
            while($row_nome = mysqli_fetch_assoc($result_nome)) {
                $nome_count = $row_nome['nome_count'];
            }

            return $nome_count;
        }
        catch (Exception $error) {
            echo 'Caught exception: ',  $error -> getMessage();
        }
    }

    function verficationEmailExist($email) {
        global $conn;

        try {
            $select_pass = "SELECT COUNT(id_user) AS email_count FROM `user` WHERE `email_user` = '$email'";
            $result_pass = mysqli_query($conn, $select_pass);
            while($row_pass = mysqli_fetch_assoc($result_pass)) {
                $email_count = $row_pass['email_count'];
            }

            return $email_count;
        }
        catch (Exception $error) {
            echo 'Caught exception: ',  $error -> getMessage();
        }
    }

    function insertUser($nome, $email, $password) {
        global $conn;
        
        try {
            $insert = "INSERT INTO user (nome_user, email_user, pass_user) VALUES ( '$nome', '$email', SHA1('$password') )";
            $result = mysqli_query($conn, $insert);

            return;
        }
        catch (Exception $error) {
            echo 'Caught exception: ',  $error -> getMessage();
        }
    }

    function updateUser($nome, $email, $password) {
        global $conn;
        
        try {
            $update = "UPDATE user SET nome_user = '$nome', email_user = '$email' WHERE pass_user = SHA1('$password')";
            $result = mysqli_query($conn, $update);

            return;
        }
        catch (Exception $error) {
            echo 'Caught exception: ',  $error -> getMessage();
        }
    }

    function selectUser($nome, $password) {
        global $conn;

        try {
            $select = "SELECT id_user, email_user, imagem_user, cargo_user, COUNT(id_user) AS users_count FROM `user` WHERE `nome_user` = '$nome' AND `pass_user` = SHA1('$password')";
		    $result = mysqli_query($conn, $select);
            while($row = mysqli_fetch_assoc($result)) {
                $count = $row['users_count'];
                $user_id = $row['id_user'];
                $user_email = $row['email_user'];
                $user_image = $row['imagem_user'];
                $user_rank = $row['cargo_user'];
            }

            if($count != 1) {
                $_SESSION['error_message'] = "Nome do utilizador ou palavra-passe inválidas!";
                header("Location: ../../pages/login.php");
                exit;
            }
            else {
                $_SESSION['user'] = array("id" => $user_id, "name" => $nome, "email" => $user_email, "image" => $user_image, "rank" => $user_rank);

                header("Location: ../../pages/home-log.php");
            }

            return $result;
        }
        catch (Exception $error) {
            echo 'Caught exception: ',  $error -> getMessage();
        }
    }

    function selectAllUsers() {
        global $conn;

        try {
            $select = "SELECT * FROM user";
            $result = mysqli_query($conn, $select);

            return $result;
        }
        catch (Exception $error) {
            echo 'Caught exception: ',  $error -> getMessage();
        }
    }
    
    function selectAllProducts() {
        global $conn;

        try {
            $select = "SELECT * FROM product";
            $result = mysqli_query($conn, $select);

            return $result;
        }
        catch (Exception $error) {
            echo 'Caught exception: ',  $error -> getMessage();
        }
    }

    function selectMostVisitedProducts() {
        global $conn;

        try {
            $select = "SELECT * FROM product WHERE cliques_product > 0 ORDER BY cliques_product DESC LIMIT 8";
            $result = mysqli_query($conn, $select);

            return $result;
        }
        catch (Exception $error) {
            echo 'Caught exception: ',  $error -> getMessage();
        }
    }

    function selectNewProducts() {
        global $conn;

        try {
            $select = "SELECT * FROM product WHERE novo_product = 1";
            $result = mysqli_query($conn, $select);

            return $result;
        }
        catch (Exception $error) {
            echo 'Caught exception: ',  $error -> getMessage();
        }
    }

    function selectMenProducts() {
        global $conn;

        try {
            $select = "SELECT * FROM product WHERE genero_product = 'Man'";
            $result = mysqli_query($conn, $select);

            return $result;
        }
        catch (Exception $error) {
            echo 'Caught exception: ',  $error -> getMessage();
        }
    }

    function selectWomenProducts() {
        global $conn;

        try {
            $select = "SELECT * FROM product WHERE genero_product = 'Woman'";
            $result = mysqli_query($conn, $select);

            return $result;
        }
        catch (Exception $error) {
            echo 'Caught exception: ',  $error -> getMessage();
        }
    }

    function selectJuniorProducts() {
        global $conn;

        try {
            $select = "SELECT * FROM product WHERE genero_product = 'Junior'";
            $result = mysqli_query($conn, $select);

            return $result;
        }
        catch (Exception $error) {
            echo 'Caught exception: ',  $error -> getMessage();
        }
    }

    function selectSaleProducts() {
        global $conn;

        try {
            $select = "SELECT * FROM product WHERE preco_desc_product > 1";
            $result = mysqli_query($conn, $select);

            return $result;
        }
        catch (Exception $error) {
            echo 'Caught exception: ',  $error -> getMessage();
        }
    }

    function selectTypeProducts() {
        global $conn;

        try {
            $select = "SELECT id_product, fk_type_product FROM product";
            $result = mysqli_query($conn, $select);
            while($row = mysqli_fetch_assoc($result)) {
                $purchase_total_price = $row['preco_total_purchase'];
            }

            return $result;
        }
        catch (Exception $error) {
            echo 'Caught exception: ',  $error -> getMessage();
        }
    }

    function selectSizeProductsNumbers() {
        global $conn;

        try {
            $select = "SELECT id_size_product FROM size_product WHERE id_size_product NOT REGEXP '[A-Z]+' ORDER BY order_size_product";
            $result = mysqli_query($conn, $select);

            return $result;
        }
        catch (Exception $error) {
            echo 'Caught exception: ',  $error -> getMessage();
        }
    }

    function selectSizeProductsLetters() {
        global $conn;

        try {
            $select = "SELECT id_size_product FROM size_product WHERE id_size_product NOT REGEXP '[0-9]+' ORDER BY order_size_product";
            $result = mysqli_query($conn, $select);

            return $result;
        }
        catch (Exception $error) {
            echo 'Caught exception: ',  $error -> getMessage();
        }
    }

    function selectProductsInCart() {
        global $conn;

        try {
            $user = $_SESSION['user']['id'];
            
            $select = "SELECT * FROM purchase INNER JOIN purchase_product ON purchase.id_purchase = purchase_product.fk_purchase INNER JOIN size_product ON purchase_product.fk_size_product = size_product.id_size_product INNER JOIN product ON product.id_product = purchase_product.fk_product WHERE purchase.fk_user = '$user' ORDER BY data_atualizada_purchase_product";
            $result = mysqli_query($conn, $select);
            while($row = mysqli_fetch_assoc($result)) {
                $purchase_total_price = $row['preco_total_purchase'];
            }
    
            $_SESSION['purchase'] = array("total_price" => $purchase_total_price);

            return $result;
        }
        catch (Exception $error) {
            echo 'Caught exception: ',  $error -> getMessage();
        }
    }

    function teste() {
        global $conn;

        try {
            $user = $_SESSION['user']['id'];

            $insert = "SELECT * FROM purchase_product INNER JOIN purchase ON purchase_product.fk_purchase = purchase.id_purchase WHERE fk_user = '$user'";
            $result = mysqli_query($conn, $insert);
        
            $count = mysqli_num_rows($result);
        
            echo $count;

            return;
        }
        catch (Exception $error) {
            echo 'Caught exception: ',  $error -> getMessage();
        }
    }


?>