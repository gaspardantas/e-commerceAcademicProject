<?php
include('connect.php');
//need products to display them
$sql = "SELECT * FROM product ORDER BY product_id";
$result = mysqli_query($con, $sql);

//if button is clicked - remove button
if (isset($_POST['remove'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    //delete the product with the id pressed
    $sql = "DELETE FROM product WHERE product_id = $id";
    if (mysqli_query($con, $sql)) {
        //success removing from database

        //remove file from images
        $imageName = $_POST['image'];
        $file = "../images/$imageName";
        if (file_exists($file)) {
            if (unlink($file)) {
                //success removing file
                echo "<script>alert('Product has been removed')</script>";
            } else {
                //unable to delete
            }
        } else {
            //file not found
        }
        //refresh
        echo '<script>window.location.href = window.location.href;</script>';
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

<body>
    <!--display admin Navigation bar-->
    <?php include '../include/navbar_admin.php'; ?>
    <div class="container-fluid mt-3">
        <h1 class="text-center">Remove Products</h1>
        <div class="row justify-content-center">
            <!--Table-->
            <table b-5>
                <tr>
                    <th class="p-3 bg-success text-center text-light">Product Image</th>
                    <th class="p-3 bg-dark text-center text-light">Product Name</th>
                    <th class="p-3 bg-info text-center text-light">Product Price</th>
                    <th class="p-3 bg-warning text-center text-light">Action</th>
                </tr>
                <!--While loop to put products into the table-->
                <?php while ($row = mysqli_fetch_assoc($result)) {
                    //put product info
                ?>
                    <tr>
                        <td class="p-3 bg-light text-center border">
                            <img src="../images/<?php echo $row['product_image'] ?>" alt="image of product" style="height: 150px;">
                        </td>
                        <td class="p-3 bg-light text-center border">
                            <div><?php echo $row['product_name'] ?> </div>
                        </td>
                        <td class="p-3 bg-light text-center border">
                            <div><?php echo "$".$row['product_price'] ?> </div>
                        </td>
                        <td class="p-3 bg-light text-center border">
                            <form action="remove_product.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['product_id'] ?>">
                                <input type="hidden" name="image" value="<?php echo $row['product_image'] ?>">
                                <input type="hidden" name="name" value="<?php echo $row['product_name'] ?>">
                                <button type="submit" class="btn btn-danger mx-2" name="remove">Remove this product</button>
                            </form>
                        </td>
                    </tr>
                <?php //end loop
                }
                ?>
            </table>
        </div>
    </div>
    <!--Display footer-->
    <?php include './footer.php'; ?>              
</body>

</html>