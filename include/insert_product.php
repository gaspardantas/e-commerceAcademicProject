<?php
include('connect.php');
//if button is clicked - insert button
if (isset($_POST['insert_product'])) {
    $product_name = $_POST['product_title'];
    $product_price = $_POST['product_price'];

    //image name/file
    $product_image = $_FILES['product_image']['name'];
    $temp_image = $_FILES['product_image']['tmp_name'];
    $product_error = $_FILES['product_image']['error'];

    //Checking empty condition
    if ($product_name == '' or $product_price == '' or $product_image == '') {
        echo "<script>alert('Please complete all fields')</script>";
        exit();
    } else {
        if (move_uploaded_file($temp_image, "../images/$product_image")) {
            //success moving file
        } else {
            //error moving file
            //echo 'Error message: ' . error_get_last()['message'];
        }
        //Query
        $insert_products = "insert into `product` (product_name,product_price,product_image) values ('$product_name','$product_price','$product_image')";
        $result_query = mysqli_query($con, $insert_products);
        if ($result_query) {
            echo "<script>alert('Product added to the database')</script>";
            echo "<script>window.location.href = '../admin/index.php'</script>";
        }
    }
}
?>
<!-- Where it starts -->
<!DOCTYPE html>
<html>
<!--Head-->

<head>
    <title>GameSpark</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body class="bg-light">
    <!--display admin Navigation bar-->
    <?php include '../include/navbar_admin.php'; ?>
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
    </div>
    <!--Form-->

    <form action="" method="post" enctype="multipart/form-data">
        <!--Title ninput name used in isset above-->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
        </div>
        <!--Image-->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image" class="form-label mt-3">Product Image</label>
            <input type="file" name="product_image" id="product_image" class="form-control" required="required">
        </div>
        <!--Price-->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label mt-3">Product Price</label>
            <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
        </div>
        <!--Insert button input name used in isset above-->
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="insert_product" class="btn btn-success mb-3 mt-3 px-3" value="Insert product">
        </div>
    </form>
    <!--Display footer-->
    <?php include './footer.php'; ?>
</body>

</html>