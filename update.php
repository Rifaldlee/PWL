<?php
//include config.php
require_once "config.php";

//define variables and initialize with empty values
$id = $name = $merk = $product_type = $price = $release_date ="";
$id_err  = $name_err = $merk_err = $product_type_err = $price_err = $release_date_err = "";

//processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST ["id"])){
    //get hidden input value
    $id = $_POST["id"];


    //validate nama
    $input_id = trim($_POST["id"]);
    if(empty($input_id)){
        $id_err = "Silahkan input ID Pembeli";
    } else{
        $id = $input_id;
    }

    $input_name = trim($_POST["name"]);
    var_dump($input_name);
    if(empty($input_name)){
        $name_err = "Silahkan input nama";
    } elseif(!filter_var($input_nama, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+/")))){
        $name_err = "Tolong input nama yang benar";
    } else{
        $name = $input_name;
    }

    $input_merk = trim($_POST["merk"]);
    if(empty($input_merk)){
        $merk_err = "Silahkan input merk";
    } else{
        $merk = $input_merk;
    }

    $input_product_type = trim($_POST["Product Type"]);
    if(empty($input_product_type)){
        $product_type_err = "Silahkan input No. Handphone";
    } else{
        $product_type = $input_product_type;
    }

    $input_price = trim($_POST["Price"]);
    if(empty($input_price)){
        $price_err = "Silahkan input Tanggal price";
    } else{
        $price = $input_price;
    }

    $input_release_date = trim($_POST["release_date"]);
    if(empty($input_release_date)){
        $release_date_err = "Silahkan input Release date";
    } else{
        $release_date = $input_release_date;
    }
   

    //check input errors before inserting in database
    if(empty($id_err) && empty($name_err) && empty($merk_err) && empty($product_type_err)&& empty($price_err) && empty($release_date_err)){
        // Prepare an insert statement
        $sql = "UPDATE products SET id=?, name=?, merk=?, product_type=?, price=?, release_date=?)";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "issssssii", $param_id, $param_name, $param_merk, $param_product_type, $param_price, $param_release_date,);

           // Set paramaters
           $param_id = $id;
           $param_name = $name;             
           $param_merk = $merk; 
           $param_product_type = $product_type; 
           $param_price = $price; 
           $param_release_date = $release_date; 
           
            //attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                //records updated successfully. redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        //close statement
        mysqli_stmt_close($stmt);
    }

    //close connection
    mysqli_close($conn);
} else{
    //check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        //get URL parameter
        $id =  trim($_GET["id"]);

        //prepare a select statement
        $sql = "SELECT * FROM products WHERE id = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            //bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            //set parameters
            $param_id = $id;

            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
                
                if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array.	Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $id = $row["id"];
                $name = $row["name"];
                $merk = $row["merk"];
                $price = $row ["price"];
                $release_date = $row ["release_date"];
                
                } else{
                // URL doesn't contain valid id. Redirect to error page
                header("location: error.php");
                exit();
                }
                
                }else{
                echo "Oops!	Something went wrong.	Please try again later.";
                }
                }
                
                // Close statement
                mysqli_stmt_close ($stmt) ;
                
                // Close connection
                mysqli_close($conn);
            }	else{
                // URL doesn't contain id parameter.	Redirect to error page
                header("location: error.php");
                exit();
            }	
        }		
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Tambah Data Pelanggan</h2>
                    </div>
                    <p>Silahkan isi form di bawah ini kemudian submit untuk menambahkan data pelanggan ke dalam database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($id_err)) ? 'has-error' : ''; ?>">
                            <label>ID Barang</label>
                            <input type="text" name="id" class="form-control" value="<?php echo $id; ?>">                          
                            <span class="help-block"><?php echo $id_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Nama</label>
                            <input type="text"name="nama" class="form-control" value="<?php echo $name; ?>">                            
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($merk_err)) ? 'has-error' : ''; ?>">
                            <label>Merk</label>
                            <input type="text" name="Merk" class="form-control" value="<?php echo $merk; ?>">
                            <span class="help-block"><?php echo $merk_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($product_type_err)) ? 'has-error' : ''; ?>">
                            <label>Price</label>
                            <input type="text" name="Product_type" class="form-control" value="<?php echo $product_type; ?>">
                            <span class="help-block"><?php echo $product_type_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($release_date_err)) ? 'has-error' : ''; ?>">
                            <label>Product Type</label>
                            <input type="text" name="Jenis_Barang" class="form-control" value="<?php echo $release_date; ?>">                         
                            <span class="help-block"><?php echo $release_date_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                            <label>Tanggal rilis</label>
                            <input type="date" name="Tgl_Transaksi" class="form-control" value="<?php echo $price; ?>">
                            <span class="help-block"><?php echo $price_err;?></span>
                        </div>
                        
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>