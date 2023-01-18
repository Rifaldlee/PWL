<?php require "config.php" ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet"/>
        <script src="js/bootstrap.bundle.js"></script>  
        <title>Produk</title>
    </head>
    <body>
        <div class="container">
            <div style="color:red;">
                <?php
                if(isset($_POST['submit'])){              
                    $id_pembeli = $_POST['id_pembeli'];
                    $nama = $_POST['nama'];
                    $HP = $_POST['HP'];
                    $jenis_barang = $_POST['jenis_barang'];
                    $nama_barang = $_POST['nama_barang'];
                    $jumlah = $_POST['jumlah'];
                    $harga = $_POST['harga'];
                    $tgl_transaksi = $_POST['tgl_transaksi'];
                    $alamat = $_POST['alamat'];
                    
                    $script = "INSERT INTO products SET id_pembeli='$id_pembeli',nama='$nama',HP='$HP',jenis_barang='$jenis_barang',nama_barang='$nama_barang',
                    jumlah='$jumlah',harga='$harga',tgl_transaksi='$tgl_transaksi',alamat='$alamat'";
                    $query = mysqli_query($conn,$script);
                    if($query){
                        header("location:read.php");
                    } else{
                        echo "gagal mengupload data";
                    }                    
                }
                ?>
                <br>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group mt-3">
                    <label>id</label>
                    <input type="number" class="form-control" name="id_pembeli">
                </div>
                <div class="form-group mt-3">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="form-group mt-3">
                    <label>hp</label>
                    <input type="text" class="form-control" name="HP">
                </div>
                <div class="form-group mt-3">
                    <label>jenis</label>
                    <select name="jenis_barang" class="form-control">
                        <option>Pilih jenis</option>
                        <option value="laptop">laptop</option>
                        <option value="handphone">handphone</option>
                        <option value="monitor">monitor</option>
                        <option value="keyboard">keyboard</option>
                        <option value="mouse">mouse</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama_barang">
                </div>
                <div class="form-group mt-3">
                    <label>jumlah</label>
                    <input type="number" class="form-control" name="jumlah">
                </div>
                <div class="form-group mt-3">
                    <label>Harga</label>
                    <input type="number" class="form-control" name="harga">
                </div>
                <div class="form-group mt-3">
                    <label>tanggal</label>
                    <input type="text" class="form-control" name="tgl_transaksi">
                </div>
                <div class="form-group mt-3">
                    <label>alamat</label>
                    <input type="text" class="form-control" name="alamat">
                </div>
                <div class="mt-5">
                    <input type="submit" class="btn btn-primary" name="submit" value="Upload"> 
                </div>
            </form>
            <br><br><br>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
<html>