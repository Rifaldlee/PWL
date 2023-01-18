<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta Tags-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        crossorigin="anonymous">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
        // menyertakan file program koneksi.php pada register
        require('config.php');

        //inisialisasi session
        session_start();

        $error = '';
        $validate = '';
        if( isset($_SESSION['user']) ) header('Location: login.php');
        // mengecek apakah data username yang diinputkan user kosong atau tidak
        if( isset($_POST['submit']) ){            
            // mengilangkan backshlases
            $username = stripslashes($_POST['username']);
            // cara sederhana mengamankan dari SQL injection
            $username = mysqli_real_escape_string($conn, $username);
            $name     = stripslashes($_POST['name']);
            $name     = mysqli_real_escape_string($conn, $name);
            $email    = stripslashes($_POST['email']);
            $email    = mysqli_real_escape_string($conn, $email);
            $password = stripslashes($_POST['password']);
            $password = mysqli_real_escape_string($conn, $password);
            $repass   = stripslashes($_POST['repassword']);
            $repass   = mysqli_real_escape_string($conn, $repass);

            // cek apakah nilai yang diinputkan pada form ada yang kosong atau tidak
            if(!empty(trim($name)) && !empty(trim($username)) && !empty(trim($email)) && !empty(trim($password)) && !empty(trim($repass))){
                // mengecek apakah password yang diinputkan sama dengan re-password yang diinput kembali
                if($password == $repass){
                    // memanggil method cek_nama untuk mengecek apakah user sudah terdaftar atau belum
                    if(cek_nama($name, $conn) == 0){
                        // hashing password sebelum disimpan di database
                        $pass = password_hash($password, PASSWORD_DEFAULT);
                        // insert data ke database
                        $query = "INSERT INTO users (username, name, email, password) VALUES ('$username', '$name', '$email', '$pass')";
                        $result = mysqli_query($conn, $query);
                        // jika insert data berhasil maka akan redirect ke halaman login.php serta menyimpan data username ke session
                        if ($result){
                            $_SESSSION['username'] = $username;
                            header('Location: login.php');

                        // jika gagal maka akan menampilkan pesan error
                        }else{
                            $error = 'Register user gagal!';
                        }
                    }else{
                        $error = 'Username sudah terdaftar!';
                    }
                }else{
                    $validate = 'Password tidak sama!';
                }
            }else{
                $error = 'Data tidak boleh kosong!';
            }
        }

        // fungsi untuk mengecek username apakah sudah terdaftar atau belum
        function cek_nama($username, $conn){
            $nama = mysqli_real_escape_string($conn, $username);
            $query = "SELECT * FROM users WHERE username = '$nama'";
            if($result = mysqli_query($conn, $query)) return mysqli_num_rows($result);
        }
        ?>
        <section class="container-fluid mb-4">
            <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
            <section class="row justify-content-center">
                <section class="col-12 col-sm-6 col-md-4">
                    <form class="form-container" action="register.php" method="POST">
                    <br></br><br></br>
                        <h4 class="text-center font-weight-bold">Sign-Up</h4>
                        <?php if($error != ''){ ?>
                            <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                        <?php } ?>

                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama">
                        </div>
                        <div class="form-group">
                            <label for="InputEmail">Alamat Email</label>
                            <input type="email" class="form-control" id="InputEmail" name="email" aria-describeby="emailHelp" placeholder="Masukkan email">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan user">
                        </div>
                        <div class="form-group">
                            <label for="InputPassword">Password</label>
                            <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Password">
                            <?php if($validate !=''){ ?>
                                <p class="text-danger"><?= $validate; ?></p>
                            <?php } ?>
                        </div>
                        <div class="form-group">
                            <label for="InputPassword">Re-Password</label>
                            <input type="password" class="form-control" id="InputRePassword" name="repassword" placeholder="Re-Password">
                            <?php if($validate !=''){ ?>
                                <p class="text-danger"><?= $validate; ?></p>
                            <?php } ?>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                        <div class="form-footer mt-2">
                            <p>Sudah punya account? <a href="login.php">Login</a></p>
                        </div>
                    </form>
                </section>
            </section>
        </section>

        <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, dan yang terakhir Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" crossorigin="anonymous"></script>
    </body>
</html>