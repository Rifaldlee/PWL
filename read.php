<?php
    session_start();

    if(!isset($_SESSION['username'])){
        $_SESSION['msg']='anda harus login untuk mengakses halaman ini';
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Uts pemograman web lanjut</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
        <div align="center">
            <h3><b>Uts pemograman web lanjut</b></h3>
        <div class="row" >
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading" ><b>Pencarian</b></div>
                    <div class="panel-body">
                        <form class="form-inline">
                            <div class="form-group">
                                <select class="form-control" id="Kolom" name="Kolom" required="">
                                    <?php
                                    $kolom = (isset($_GET['Kolom'])) ? $_GET['Kolom'] : "";
                                    ?>
                                    <option value="name" <?php if ($kolom == "name") {
                                                                echo "selected";
                                                            } ?>>Nama</option>
                                    <option value="id" <?php if ($kolom == "Id") {
                                                                echo "selected";
                                                            } ?>>Id Pembeli</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="KataKunci" name="KataKunci" placeholder="Kata kunci.." required="" value="<?php if (isset($_GET['KataKunci']))  echo $_GET['KataKunci']; ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Cari</button>
                            <a href="create.php" class="btn btn-success pull-right">Tambah data</a>
                            <a href="logout.php" class="btn btn-danger pull-right">Log Out</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama </th>
                    <th>Merk</th>
                    <th>price</th>
                    <th>Tanggal Release</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody  >
                <?php
                include "config.php";
                $page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
                $kolomCari = (isset($_GET['Kolom'])) ? $_GET['Kolom'] : "";
                $kolomKataKunci = (isset($_GET['KataKunci'])) ? $_GET['KataKunci'] : "";
                $limit = 5;
                $limitStart = ($page - 1) * $limit;
                if ($kolomCari == "" && $kolomKataKunci == "") {
                    $SqlQuery = mysqli_query($conn, "SELECT * FROM products LIMIT " . $limitStart . "," . $limit);
                } else {
                    $SqlQuery = mysqli_query($conn, "SELECT * FROM products WHERE $kolomCari LIKE '%$kolomKataKunci%' LIMIT " . $limitStart . "," . $limit);
                }
                $no = $limitStart + 1;

                while ($row = mysqli_fetch_array($SqlQuery)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['merk'] . "</td>";
                    echo "<td>" . $row['product_type'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['release_date'] . "</td>";
                    echo "<td><a href='update.php?id=". $row['id'] ."' class='btn btn-warning pull-right'>Edit</a></td>";
                    echo "<td><a href='delete.php?id=". $row['id'] ."' class='btn btn-danger pull-right'>Hapus</a></td>";
                    echo "</tr>";
                    $no++;
                }
                ?>                 
                <?php
                if (mysqli_num_rows($SqlQuery) == 0) {
                    echo "<tr><td colspan='4'>Data tidak ditemukan</td></tr>";
                }
                ?>
            </tbody>
        </table>

    <!-- edit function -->
    <!-- <script>
        $(document).ready(function() {
            $('.editButton').on('click', function() {
                $('#editModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#edit_id').val(data[0]);
                // gak dipake, karena cuma increment number
                // $('#no').val(data[1]);
                $('#edit_nama').val(data[2]);
                $('#edit_Pmasuk').val(data[3]);
                $('#jenis_barang').val(data[4]);
                // jenis kelamin checked
                if (data[4] == "pisang") {
                    $("#pisang").prop("checked", true);
                } else {
                    $("#mangga").prop("checked", true);
                }

                $('#edit_harga').val(data[5]);
                $('#edit_tgl_masuk').val(data[6]);
            });
        });
    </script> -->


        <div align="left">
            <ul class="pagination">
                <?php
                if ($page == 1) {
                ?>
                    <li class="disabled"><a href="#">Previous</a></li>
                    <?php
                } else {
                    $LinkPrev = ($page > 1) ? $page - 1 : 1;

                    if ($kolomCari == "" && $kolomKataKunci == "") {
                    ?>
                        <li><a href="read.php?page=<?php echo $LinkPrev; ?>">Previous</a></li>
                    <?php
                    } else {
                    ?>
                        <li><a href="read.php?Kolom=<?php echo $kolomCari; ?>&KataKunci=<?php echo $kolomKataKunci; ?>&page=<?php echo $LinkPrev; ?>">Previous</a></li>
                <?php
                    }
                }
                ?>

                <?php
                if ($kolomCari == "" && $kolomKataKunci == "") {
                    $SqlQuery = mysqli_query($conn, "SELECT * FROM products");
                } else {
                    $SqlQuery = mysqli_query($conn, "SELECT * FROM products WHERE $kolomCari LIKE '%$kolomKataKunci%'");
                }
                $JumlahData = mysqli_num_rows($SqlQuery);
                $jumlahPage = ceil($JumlahData / $limit);
                $jumlahNumber = 1;
                $startNumber = ($page > $jumlahNumber) ? $page - $jumlahNumber : 1;
                $endNumber = ($page < ($jumlahPage - $jumlahNumber)) ? $page + $jumlahNumber : $jumlahPage;

                for ($i = $startNumber; $i <= $endNumber; $i++) {
                    $linkActive = ($page == $i) ? ' class="active"' : '';
                    if ($kolomCari == "" && $kolomKataKunci == "") {
                ?>
                        <li<?php echo $linkActive; ?>><a href="read.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php
                    } else {
                        ?>
                            <li<?php echo $linkActive; ?>><a href="read.php?Kolom=<?php echo $kolomCari; ?>&KataKunci=<?php echo $kolomKataKunci; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php
                    }
                }
                        ?>
                        <?php
                        if ($page == $jumlahPage) {
                        ?>
                            <li class="disabled"><a href="#">Next</a></li>
                            <?php
                        } else {
                            $linkNext = ($page < $jumlahPage) ? $page + 1 : $jumlahPage;
                            if ($kolomCari == "" && $kolomKataKunci == "") {
                            ?>
                                <li><a href="read.php?page=<?php echo $linkNext; ?>">Next</a></li>
                            <?php
                            } else {
                            ?>
                                <li><a href="read.php?Kolom=<?php echo $kolomCari; ?>&KataKunci=<?php echo $kolomKataKunci; ?>&page=<?php echo $linkNext; ?>">Next</a></li>
                        <?php
                            }
                        }
                        ?>
            </ul>
        </div>
    </div>
</body>