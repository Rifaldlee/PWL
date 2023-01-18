<?php
include("./config.php");

if (isset($_POST['deletedata'])) {
    // ambil id dari query string
    $id = $_POST['delete_id'];

    // query hapus
    $sql = "DELETE FROM products WHERE id = '$id'";
    $query = mysqli_query($conn, $sql);

    // apa query berhasil dihapus?
    if ($query) {
        header('Location: ./read.php?hapus=sukses');
    } else
        die('Location: ./read.php?hapus=gagal');
} else
    die("akses dilarang...");