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
                    $name = $_POST['name'];
                    $merk = $_POST['merk'];
                    $product_type = $_POST['product_type'];
                    $price = $_POST['price'];
                    $release_date = $_POST['release_date'];
                    
                    $script = "INSERT INTO products SET 
                    name='$name',merk='$merk',product_type='$product_type',price='$price',release_date='$release_date'";
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
                    <label>Nama Product</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group mt-3">
                    <label>Merk Product</label>
                    <input type="text" class="form-control" name="merk">
                </div>
                <div class="form-group mt-3">
                    <label>Jenis Product</label>
                    <select class="form-control" name="product_type">
                        <option>Pilih jenis</option>
                        <option value="laptop">Processor</option>
                        <option value="handphone">Memory</option>
                        <option value="monitor">Storage</option>
                        <option value="keyboard">Power Supply</option>
                        <option value="mouse">Graphic Card</option>
                        <option value="mouse">Motherboard</option>
                        <option value="mouse">Fan</option>
                        <option value="mouse">CPU Cooler</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label>Harga</label>
                    <input type="int" class="form-control" name="price">
                </div>
                <div class="form-group mt-3">
                    <label>Tanggal Release</label>
                    <input type="date" class="form-control" name="release_date">
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