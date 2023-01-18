<?php
    $db_host = 'localhost'; //server
    $db_user = 'root'; //username
    $db_pass = ''; //password
    $db_name = 'icehardwaredb'; //nama db
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name); //perintah untuk melakukan connect ke database sql

    if (!$conn) {
        die ('Gagal terhubung dengan database MySQL : ' . mysqli_connect_error());
    }
?>