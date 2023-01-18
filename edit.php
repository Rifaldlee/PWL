<?php
include("./config.php");

// cek apa tombol daftar udah di klik blom
if (isset($_POST['edit_data'])) {
    // ambil data dari form
    $id = $row["id"];
    $name = $_POST['name'];
    $merk = $_POST['merk'];
    $product_type = $_POST['product_type'];
    $price = $_POST['price'];
    $release_date = $_POST['release_date'];



    // query
    $sql = "UPDATE barang SET name='$name', merk='$merk', product_type='$product_type',price='$price', release_date='$release_date' WHERE id= '$id'";
    $query = mysqli_query($db, $sql);

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./read.php?update=sukses');
    else
        header('Location: ./read.php?update=gagal');
} else
    die("Akses dilarang...");
