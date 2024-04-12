<?php
    if(empty($_SESSION['user']['id'])) {
        header("location: /DeCastro/index.php");
    }
?>