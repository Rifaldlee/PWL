<?php
include("./config.php");

// cek apa tombol daftar udah di klik blom
if (isset($_POST['edit_data'])) {
    // ambil data dari form
    $id = $_POST['edit_id'];
    $nama = $_POST['edit_nama'];
    $Pmasuk = $_POST['edit_Pmasuk'];
    $jenis_barang = $_POST['edit_jenis_barang'];
    $harga = $_POST['edit_harga'];
    $tgl_masuk = $_POST['edit_tgl_masuk'];



    // query
    $sql = "UPDATE barang SET nama='$nama', Pmasuk='$Pmasuk', jenis_barang='$jenis_barang', harga='$harga', tgl_masuk='$tgl_masuk' WHERE id = '$id'";
    $query = mysqli_query($db, $sql);

    // cek apa query berhasil disimpan?
    if ($query)
        header('Location: ./index.php?update=sukses');
    else
        header('Location: ./index.php?update=gagal');
} else
    die("Akses dilarang...");
