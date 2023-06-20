<?php
include('connect.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <!--Navigation Bar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" p-0>
    <!--Logo-->
    <img src="../images/logo.png" height="40" width="40">
    <a class="navbar-brand" href="#">GameSpark</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="../index.php"><i class="fas fa-home"></i>Home</a>
            </li>
        </ul>
    </div>
    <!-- The form  -->    
    </nav>
    <div class="container-fluid">
        <h2 class="text-center my-3">User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center py-2">
            <!-- The form will be inside a column -->
            <div class="col-lg-12 col-xl-5">
                <form action="" method="post">
                    <div class="form-outline">
                        <!-- User name field -->
                        <label for="username" class="form-label py-3">User Name:</label>
                        <input type="text" id="username" class="form-control" placeholder="Please enter your username" autocomplete="off" required="required" name="username">
                        <!-- User address field -->
                        <label for="user_address" class="form-label py-3">Address:</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Please enter your address" autocomplete="off" required="required" name="user_address">
                        <!-- User email field -->
                        <label for="user_email" class="form-label py-3">Email:</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Please enter your email" autocomplete="off" required="required" name="user_email">
                        <!-- User password field -->
                        <label for="user_password" class="form-label py-3">Password:</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Please enter your password" autocomplete="off" required="required" name="user_password">
                        <!-- Hide/show password checkbox -->
                        <label for="showPassword">
                            <input type="checkbox" id="showPassword"> Show Password
                        </label>

                    </div>
                    <div class="text-center py-3">
                        <input type="submit" value="Register" class="bg-info py-2 px-2 border-0" name="user_register">
                        <p class="small fw-bold mt-2 pt-2">If you have an account, click -> <a href="user_login.php">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<!-- Javascript code to change input type from text/password to show/hide password -->
<script>
    const passwordInput = document.getElementById('user_password');
    const showPasswordCheckbox = document.getElementById('showPassword');

    showPasswordCheckbox.addEventListener('change', function() {
        if (showPasswordCheckbox.checked) {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });
</script>

<?php
if (isset($_POST['user_register'])) {
    $username = $_POST['username'];
    $user_address = $_POST['user_address'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    //hashing the password for security
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    // Check if user email is in the database
    $select_query = "Select * from `user` where user_email='$user_email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
        echo "<script>alert('This email was registered before, please Log in')</script>";
    } else {
        // Insert info into the database
        $insert_user = "INSERT INTO `user` (user_name, user_address, user_email, user_password) VALUES ('$username', '$user_address', '$user_email', '$hash_password')";
        $result_query = mysqli_query($con, $insert_user);
        if ($result_query) {
            echo "<script>alert('User added successfully')</script>";
        } else {
            die(mysqli_error($con));
        }
    }
}
?>