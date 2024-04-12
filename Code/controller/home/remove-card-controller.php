<?php
    session_start();
    require '../database/config.php';
    require '../../model/model-query.php';

    $user = $_SESSION['user']['id'];
    $id_compra = $conn -> real_escape_string($_POST['purchase']);
    $id_produto = $conn -> real_escape_string($_POST['product']);
    $quantidade_produto = $conn -> real_escape_string($_POST['quantity']);
    $preco_produto = $conn -> real_escape_string($_POST['price']);

    $delete = "DELETE FROM purchase_product WHERE fk_purchase = '$id_compra' AND fk_product = '$id_produto'";
    $result = mysqli_query($conn, $delete);

    $verification = "SELECT id_purchase, preco_total_purchase FROM purchase WHERE fk_status_purchase = 1 AND fk_user = '$user'";
    $result_verification = mysqli_query($conn, $verification);
    while($row = mysqli_fetch_assoc($result_verification)) {
        $id_compra = $row['id_purchase'];
        $preco_total_compra = $row['preco_total_purchase'];
    }

    $update_preco = "UPDATE purchase SET preco_total_purchase = '$preco_total_compra' - ('$preco_produto' * '$quantidade_produto')  WHERE fk_user = '$user'";
    $result_update_preco = mysqli_query($conn, $update_preco);

    $_SESSION['purchase']['total_price'] = $preco_total_compra - ($preco_produto * $quantidade_produto);

    header('Location: ../../pages/cart.php');
?>