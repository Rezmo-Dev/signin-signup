<?php
    $dataBase = mysqli_connect("localhost", "root", "", "shop_db");
    $charSetQuery = "SET CHARACTER SET UTF8";
    mysqli_query($dataBase, $charSetQuery);
    if (mysqli_connect_errno()) {
        exit("<p class='error'>Can't Connect to DataBase. error => ".mysqli_connect_error()."</p>");
    }
?>