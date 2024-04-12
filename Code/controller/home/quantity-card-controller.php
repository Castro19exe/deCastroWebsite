<?php
    session_start();
    require '../database/config.php';
    require '../../model/model-query.php';

    $user = $_SESSION['user']['id'];
    $id_compra = $conn -> real_escape_string($_POST['purchase']);
    $id_produto = $conn -> real_escape_string($_POST['product']);
    $preco_produto = $conn -> real_escape_string($_POST['price']);
    $preco_total_compra = $_SESSION['purchase']['total_price'];
    $quantidade_produto = $conn -> real_escape_string($_POST['quantity']);
    $btn = $conn -> real_escape_string($_POST['btn']);

    if($btn == "plus") {
        $update_quantidade = "UPDATE purchase_product SET quantidade_purchase_product = '$quantidade_produto' + 1 WHERE fk_purchase = '$id_compra' AND fk_product = '$id_produto'";
        $result_update_quantidade = mysqli_query($conn, $update_quantidade);

        $update_preco = "UPDATE purchase SET preco_total_purchase = '$preco_total_compra' + '$preco_produto' WHERE fk_user = '$user'";
        $result_update_preco = mysqli_query($conn, $update_preco);

        $_SESSION['purchase']['total_price'] = $preco_total_compra;

        header('Location: ../../pages/cart.php');
    }
    elseif($btn == "minus") {
        if($quantidade_produto == 1) {

            $delete = "DELETE FROM purchase_product WHERE fk_purchase = '$id_compra' AND fk_product = '$id_produto'";
            $result = mysqli_query($conn, $delete);
        
            $verification = "SELECT id_purchase, preco_total_purchase FROM purchase WHERE fk_status_purchase = 1 AND fk_user = '$user'";
            $result_verification = mysqli_query($conn, $verification);
            while($row = mysqli_fetch_assoc($result_verification)) {
                $id_compra = $row['id_purchase'];
                $preco_total_compra = $row['preco_total_purchase'];
            }
        
            $update_preco = "UPDATE purchase SET preco_total_purchase = '$preco_total_compra' - '$preco_produto' WHERE fk_user = '$user'";
            $result_update_preco = mysqli_query($conn, $update_preco);
        
            $_SESSION['purchase']['total_price'] = $preco_total_compra - $preco_produto;

            header('Location: ../../pages/cart.php');
        }
        else {
            $update_quantidade = "UPDATE purchase_product SET quantidade_purchase_product = '$quantidade_produto' - 1 WHERE fk_purchase = '$id_compra' AND fk_product = '$id_produto'";
            $result_update_quantidade = mysqli_query($conn, $update_quantidade);

            $update_preco = "UPDATE purchase SET preco_total_purchase = '$preco_total_compra' - '$preco_produto' WHERE fk_user = '$user'";
            $result_update_preco = mysqli_query($conn, $update_preco);

            $_SESSION['purchase']['total_price'] = $preco_total_compra;

            header('Location: ../../pages/cart.php');
        }
    }
    else {
        echo "ERRO";
    }
?>