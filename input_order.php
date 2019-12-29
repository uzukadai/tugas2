<?php
include 'koneksi.php';

if (isset($_POST['t_submit'])){

    $sql1 = "INSERT INTO customer VALUES ('', :costumer_name, :email)"; 
    $sql2 = "INSERT INTO sales_order VALUES ('', :last_id, :order_date, :order_amount)"; 
    $sql3 = "INSERT INTO sales_order_detail VALUES ('', :last_id, :produk, :order_qty, :unit_price)";
    
    $stmt1 = $koneksi->prepare($sql1);
    $stmt2 = $koneksi->prepare($sql2);
    $stmt3 = $koneksi->prepare($sql3);
    
    $stmt1->bindParam(":costumer_name", $_POST['costumer_name']);
    $stmt1->bindParam(":email", $_POST['email']);
    $stmt2->bindParam(":order_date", $_POST['order_date']);
    $stmt2->bindParam(":order_amount", $_POST['order_amount']);
    $stmt2->bindParam(":last_id", $id);
    $stmt3->bindParam(":produk", $_POST['produk']);
    $stmt3->bindParam(":order_qty", $_POST['order_qty']);
    $stmt3->bindParam(":unit_price", $_POST['unit_price']);
    $id = $koneksi->lastInsertId();
    $stmt3->bindParam(":last_id", $id);
    
    $koneksi->beginTransaction();
    $stmt1->execute();
    $stmt2->execute();
    $stmt3->execute();
    $koneksi->commit();
    //coba
    //$conn->beginTransaction();
    // our SQL statements
    // $conn->exec("INSERT INTO MyGuests (firstname, lastname, email)
    // VALUES ('John', 'Doe', 'john@example.com')");
    // $conn->exec("INSERT INTO MyGuests (firstname, lastname, email)
    // VALUES ('Mary', 'Moe', 'mary@example.com')");
    // $conn->exec("INSERT INTO MyGuests (firstname, lastname, email)
    // VALUES ('Julie', 'Dooley', 'julie@example.com')");

    // // commit the transaction
    // $conn->commit();
}

$sql_produk = "SELECT * FROM product";

$stmt_produk=$koneksi->prepare($sql_produk);
$stmt_produk->execute();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <div class="form-group">
                <label for="costumer_name">Nama Costumer</label>
                <input class="form-control" type="text" id="costumer_name" name="costumer_name">
            </div>
            <div class="form-group">
                <label for="email">Email Costumer</label>
                <input class="form-control" type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="order_date">Tanggal</label>
                <input class="form-control" type="date" id="order_date" name="email">
            </div>
            <div class="form-group">
                <label for="order_amount">Order Amount</label>
                <input class="form-control" type="number" id="order_amount" name="order_amount">
            </div>
            <div class="form-group">
                <label for="produk">Produk</label>
                <select class="form-control" name="produk" id="produk">
                <?php while ($row = $stmt_produk->fetch()){ ?>
                    <option value="<?php echo $row['product_id'];?>"><?php echo $row['product_name'];?></option>
                <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="order_qty">Jumlah produk</label>
                <input class="form-control" type="number" id="order_qty" name="order_qty">
            </div>
            <div class="form-group">
                <label for="unit_price">Harga satuan</label>
                <input class="form-control" type="number" id="unit_price" name="unit_price">
            </div>
            <input type="submit" class="btn btn-primary" name="t_submit">
        </form>
    </div>    


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>