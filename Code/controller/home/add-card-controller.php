<?php
    session_start();
    require '../database/config.php';
    require '../../model/model-query.php';

    $user = $_SESSION['user']['id'];
    $id_produto = $conn -> real_escape_string($_POST['id']);
    $tipo = $conn -> real_escape_string($_POST['type']);
    $preco = $conn -> real_escape_string($_POST['price']);
    $data = date('Y-m-d H:i:s');

    $verification = "SELECT id_purchase, preco_total_purchase, COUNT(id_purchase) AS count FROM purchase WHERE fk_status_purchase = 1 AND fk_user = '$user'";
    $result_verification = mysqli_query($conn, $verification);
    while($row = mysqli_fetch_assoc($result_verification)) {
        $count = $row['count'];
        $id_compra = $row['id_purchase'];
        $preco_total_compra = $row['preco_total_purchase'];
    }

    if($count >= 1) {
        if($tipo == 1) {
            $insert_carrinho = "INSERT INTO purchase_product (fk_purchase, fk_product, fk_size_product, quantidade_purchase_product, data_atualizada_purchase_product) VALUES ('$id_compra', '$id_produto', 'L', 1, '$data')";
            $result_insert_carrinho = mysqli_query($conn, $insert_carrinho);
    
            $update_preco = "UPDATE purchase SET preco_total_purchase = '$preco_total_compra' + '$preco' WHERE fk_user = '$user'";
            $result_update_preco = mysqli_query($conn, $update_preco);
    
            $_SESSION['purchase']['total_price'] = $preco_total_compra + $preco;
    
            header('Location: ../../pages/cart.php');
        }
        else {
            $insert_carrinho = "INSERT INTO purchase_product (fk_purchase, fk_product, fk_size_product, quantidade_purchase_product, data_atualizada_purchase_product) VALUES ('$id_compra', '$id_produto', '38', 1, '$data')";
            $result_insert_carrinho = mysqli_query($conn, $insert_carrinho);
    
            $update_preco = "UPDATE purchase SET preco_total_purchase = '$preco_total_compra' + '$preco' WHERE fk_user = '$user'";
            $result_update_preco = mysqli_query($conn, $update_preco);
    
            $_SESSION['purchase']['total_price'] = $preco_total_compra + $preco;
    
            header('Location: ../../pages/cart.php');
        }
    }
    else {
        if($tipo == 1) {
            $create_carrinho = "INSERT INTO purchase (preco_total_purchase, data_purchase, fk_status_purchase, fk_user) VALUES ('$preco', '$data', 1, '$user')";
            $result_create_carrinho = mysqli_query($conn, $create_carrinho);
        
            $verification = "SELECT id_purchase, preco_total_purchase, COUNT(id_purchase) AS count FROM purchase WHERE fk_status_purchase = 1 AND fk_user = '$user'";
            $result_verification = mysqli_query($conn, $verification);
            while($row = mysqli_fetch_assoc($result_verification)) {
                $id_compra2 = $row['id_purchase'];
            }
        
            $insertD = "INSERT INTO purchase_product (fk_purchase, fk_product, fk_size_product, quantidade_purchase_product, data_atualizada_purchase_product) VALUES ('$id_compra2', '$id_produto', 'L', 1, '$data')";
            $resultD = mysqli_query($conn, $insertD);
        
            $_SESSION['purchase']['total_price'] = $preco_total_compra + $preco;
        
            header('Location: ../../pages/cart.php');
        }
        else {
            $create_carrinho = "INSERT INTO purchase (preco_total_purchase, data_purchase, fk_status_purchase, fk_user) VALUES ('$preco', '$data', 1, '$user')";
            $result_create_carrinho = mysqli_query($conn, $create_carrinho);
        
            $verification = "SELECT id_purchase, preco_total_purchase, COUNT(id_purchase) AS count FROM purchase WHERE fk_status_purchase = 1 AND fk_user = '$user'";
            $result_verification = mysqli_query($conn, $verification);
            while($row = mysqli_fetch_assoc($result_verification)) {
                $id_compra2 = $row['id_purchase'];
            }
        
            $insertD = "INSERT INTO purchase_product (fk_purchase, fk_product, fk_size_product, quantidade_purchase_product, data_atualizada_purchase_product) VALUES ('$id_compra2', '$id_produto', '40', 1, '$data')";
            $resultD = mysqli_query($conn, $insertD);
        
            $_SESSION['purchase']['total_price'] = $preco_total_compra + $preco;
        
            header('Location: ../../pages/cart.php');
        }
    }
?>