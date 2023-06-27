<!-- functions -->
<?php
include('connect.php');
//Cart function
function cart(){
    global $con;
    session_start();
    if (isset($_GET['add_to_cart'])) {
        global $con;
        if (!isset($_SESSION['user_name'])) {
            $user_name = $_SESSION['user_name'];
        }
        $ip = get_ip_address();
        $_SESSION['ip'] = $ip;
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "Select *from `cart` where ip_address='$ip' and product_id=$get_product_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('This product was previously added to the cart')</script>";
            echo "<script>windows.open('index.php','_self)</script>";
        } else {
            $insert_products = "insert into `cart` (product_id,product_quantity,ip_address) values ('$get_product_id',1,'$ip')";
            $result_query = mysqli_query($con, $insert_products);
            echo "<script>alert('This product was successfully added to the cart')</script>";
            echo "<script>windows.open('index.php','_self)</script>";
        }
    }
}
//Cart count function
function cart_count(){
    global $con;
    $ip = get_ip_address();
    $select_query = "Select * from `cart` where ip_address='$ip'";
    $result_query = mysqli_query($con, $select_query);
    $num_of_items = mysqli_num_rows($result_query);
    echo $num_of_items;
}

//Get IP adddress function
function get_ip_address(){
    global $con;
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        // Check if IP is from shared internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // Check if IP is passed from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        // IP address from the remote address
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    // Remove any potential comma and extra white spaces
    //$ip = trim($ip, ', ');
    return $ip;
}
// Usage example
//$ipAddress = get_ip_address();
//echo "Your IP address is now: " . $ipAddress;
?>
<?php
cart();
?>
<!--Navigation Bar to logout-->
<nav class="navbar navbar-expand-lg navbar-light bg-light" p-0>
    <!--Logo-->
    <img src="./images/logo.png" height="40" width="40">
    <a class="navbar-brand" href="#">GameSpark</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="./index.php"><i class="fas fa-home"></i>Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="include/cart.php"><i class="fas fa-shopping-cart"></i> Cart<sup><?PHP echo cart_count(); ?></sup></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="include/purchase_history_user.php"><i class="fas fa-history"></i>Purchase History</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="./include/user_login.php"><i class="fas fa-sign-in-alt"></i>Login</a>
                <php cart_count();?>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="./include/logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
            </li>
             <!--<li class="nav-item">
                <a class="nav-link" href="./include/user_registration.php"><i class="fas fa-user-plus"></i>Sign Up</a>
            </li> -->
        </ul>
    </div>
</nav>