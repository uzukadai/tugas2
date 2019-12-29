<?php
    include "koneksi.php";

    $id = $_GET['id'];

    $sql2 = "DELETE FROM product WHERE product_id = :product_id";
    $stmt2 = $koneksi->prepare($sql2);
    $stmt2->bindParam(":product_id", $id);
    $stmt2->execute();

    header("location:product.php");
    ?>