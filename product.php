<?php
include 'koneksi.php';

if(isset($_POST['t_tambah'])){
    $sql = "INSERT INTO product VALUES ('', :product_name, :product_category_id, :list_price, :stock)";

    $stmt = $koneksi->prepare($sql);

    $stmt->bindParam(":product_name", $_POST['product_name']);
    $stmt->bindParam(":product_category_id", $_POST['product_category']);
    $stmt->bindParam(":list_price", $_POST['list_price']);
    $stmt->bindParam(":stock", $_POST['stock']);

    $stmt->execute();

    header('location:product.php');

}
$sql2 = "SELECT * FROM product";

$stmt2 = $koneksi->prepare($sql2);
$stmt2->execute();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Product</title>
</head>
<body>
<div class="container">
    <h1 class="display-4">Input data produk</h1>
    <div class="col-lg-6 mt-5">
        <form action="" method="POST">
            <div class="form-group">
                <label for="product_name">Nama Produk</label>
                <input class="form-control" type="text" id="product_name" name="product_name">
            </div>        
            <div class="form-group">
                <label for="product_category">Kategori Produk</label>
                <input class="form-control" type="number" id="product_category" name="product_category">
            </div>           
            <div class="form-group">
                <label for="list_price">Harga</label>
                <input class="form-control" type="number" id="list_price" name="list_price">
            </div>           
            <div class="form-group">
                <label for="stock">Persediaan</label>
                <input class="form-control" type="number" id="stock" name="stock">
            </div>           
                    
            <input class="btn btn-primary" type="submit" name="t_tambah" value="Tambah">
        </form>
    </div>

    <div class="tampil-produk mt-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Id Produk</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Produk Kategori</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Persediaan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = $stmt2->fetch()){ ?>
                <tr>
                    <th scope="row"><?php echo $row['product_id']; ?></th>
                    <td><?php echo $row['product_name']; ?></td>
                    <td><?php echo $row['product_category_id']; ?></td>
                    <td><?php echo $row['list_price']; ?></td>
                    <td><?php echo $row['stock']; ?></td>
                    <td>
                        <a class="btn btn-danger" href="hapus_product.php?id=<?php echo $row['product_id']; ?>">Hapus</a>
                        <a class="btn btn-warning" href="edit_product.php?id=<?php echo $row['product_id']; ?>">Edit</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>