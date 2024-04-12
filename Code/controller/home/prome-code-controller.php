<?php
    session_start();
    require '../database/config.php';
    require '../../model/model-query.php';

    $user = $_SESSION['user']['id'];
    $preco_total_compra = $_SESSION['purchase']['total_price'];
    $desconto = 10.00;
    $code = $conn -> real_escape_string($_POST['prome-code']);

    var_dump($desconto);

    if($code === "pedroegay") {
        $_SESSION['purchase']['total_price'] = $total_price - $desconto;

        $update_preco = "UPDATE purchase SET preco_total_purchase = '$preco_total_compra' - '$desconto' WHERE fk_user = '$user'";
        $result_update_preco = mysqli_query($conn, $update_preco);
    }

    header('Location: ../../pages/cart.php');
?>