<?php
session_start();
include('connect.php');

// Handle form for +/- submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $query = "SELECT * FROM cart WHERE product_id = $product_id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    if (isset($_POST['add'])) {
        $new_quantity = $row['product_quantity'] + 1;
        $update_query = "UPDATE cart SET product_quantity = $new_quantity WHERE product_id = $product_id";
        mysqli_query($con, $update_query);
    } elseif (isset($_POST['subtract'])) {
        $new_quantity = $row['product_quantity'] - 1;
        if ($new_quantity > 0) {
            $update_query = "UPDATE cart SET product_quantity = $new_quantity WHERE product_id = $product_id";
            mysqli_query($con, $update_query);
        } else {
            //delete the product with the id pressed
            $delete_query = "DELETE FROM cart WHERE product_id = $product_id";
            mysqli_query($con, $delete_query);
        }
    } elseif (isset($_POST['purchase'])) {
        // Check if cart is empty
        $query = "SELECT COUNT(*) as count FROM cart";
        $result_test = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result_test);
        $count = $row['count'];
        if (!isset($_SESSION['user_name'])) {
            echo "<script>alert('Please login before making a purchase')</script>";
            echo "<script>window.location.href = 'user_login.php';</script>";
        } else {
            if ($count == 0) {
                echo "<script>alert('Cart empty, continue shopping')</script>";
                echo "<script>window.location.href = '../index.php';</script>";
            } else {
                $ip = $_SESSION['ip'];

                $user_id = $_SESSION['user_id'];

                $grand_total = $_SESSION['grand_total'];
                //Insert the purchase data into the purchase table
                $insert_query = "INSERT INTO purchase (user_id, purchase_total) VALUES ($user_id, $grand_total)";
                mysqli_query($con, $insert_query);
                // Clear the cart after the purchase
                $clear_cart_query = "DELETE FROM cart WHERE ip_address='$ip'";
                mysqli_query($con, $clear_cart_query);
                echo "<script>alert('Purchase Successful')</script>";
                //echo $timestamp;
                echo "<script>window.location.href = '../index.php';</script>";
            }
        }
    }
}

//checking the database for cart details - while loop below
$sql = "SELECT * FROM cart ORDER BY product_id";
$result_cart = mysqli_query($con, $sql);

?>
<!DOCTYPE html>
<html>
<!--Head-->

<head>
    <title>GameSpark - Cart details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <?php include 'navbar_home.php'; ?>
    <!--display admin Navigation bar-->
    <div class="container-fluid mt-3">
        <h1 class="text-center">Cart details</h1>
        <div class="row justify-content-center">
            <!--Table-->
            <table b-5>
                <tr>
                    <th class="p-3 bg-success text-center text-light">Product Name</th>
                    <th class="p-3 bg-dark text-center text-light">Product Price</th>
                    <th class="p-3 bg-info text-center text-light">Product Quantity</th>
                    <th class="p-3 bg-primary text-center text-light">Total</th>
                    <th class="p-3 bg-warning text-center text-light">Action</th>
                </tr>
                <!--While loop to display the user table-->
                <?php
                $grand_total = 0;
                while ($row = mysqli_fetch_assoc($result_cart)) {
                    // Step 2: Construct the SQL query
                    $product_quantity = $row['product_quantity'];
                    $product_id = $row['product_id'];
                    $query = "SELECT * FROM product WHERE product_id = $product_id";

                    // Step 3: Execute the query
                    $result_product = mysqli_query($con, $query);

                    // Step 4: Fetch and display the data
                    $row = mysqli_fetch_assoc($result_product);
                    $product_name = $row['product_name'];
                    $product_price = $row['product_price'];
                    $total = $product_price * $product_quantity;
                    $grand_total += $total;
                    $_SESSION['grand_total'] = $grand_total;
                ?>
                    <tr>
                        <td class="p-3 bg-light text-center border">
                            <div><?php echo $product_name ?> </div>
                        </td>
                        <td class="p-3 bg-light text-center border">
                            <div><?php echo "$" . $product_price ?> </div>
                        </td>
                        <td class="p-3 bg-light text-center border">
                            <div><?php echo $product_quantity ?> </div>
                        </td>
                        <td class="p-3 bg-light text-center border">
                            <div><?php echo "$" . $total ?> </div>
                        </td>
                        <td class="p-3 bg-light text-center border">
                            <!-- Add/Subtract buttons -->
                            <form action="" method="POST">
                                <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
                                <button type="submit" class="btn btn-success m-2" name="add">+</button>
                            </form>

                            <!-- Subtract button -->
                            <form action="" method="POST">
                                <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
                                <button type="submit" class="btn btn-danger m-2" name="subtract">-</button>
                            </form>
                        </td>
                    </tr>
                <?php //end loop
                }
                ?>
                <!-- Display the grand total outside the loop -->
                <tr>
                    <td class="p-3 bg-dark text-light text-center " colspan="3">
                        <div><?php echo "Grand Total" ?></div>
                    </td>
                    <td class="p-3 bg-dark text-light text-center " colspan="2">
                        <div><?php echo "$" . $grand_total ?> </div>
                    </td>
                </tr>
                <tr>
                    <td class="p-3 bg-light text-center border" colspan="5">
                        <form method="POST" action="">
                            <input type="hidden" name="product_id" value="<?php echo 0 ?>">
                            <button type="submit" class="btn btn-primary mx-2" name="purchase">Complete Purchase</button>
                        </form>
                    </td>
                </tr>
 <!--                <tr>
                    <td class="p-3 bg-light text-center border" colspan="5">
                        <form method="post" action="../index.php">
                            <button type="submit" class="btn btn-success mx-2" name="home">Continue Shopping</button>
                        </form>
                    </td>
                </tr> -->
                <!-- Purchase button -->
            </table>
        </div>
    </div>

    <!--Display footer-->
    <?php include './footer.php'; ?>




</body>

</html>