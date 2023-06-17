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
    <div class="container-fluid">
        <h2 class="text-center my-3">User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center py-2">
            <!-- The form will be inside a column -->
            <div class="col-lg-12 col-xl-5">
                <form action="" method="post">
                    <div class="form-outline">
                        <!-- User name field -->
                        <label for="user_name" class="form-label py-3">Username:</label>
                        <input type="text" id="user_name" class="form-control" placeholder="Please enter your username" autocomplete="off" required="required" name="user_name">
                        <!-- User address field -->
                        <label for="user_address" class="form-label py-3">Address:</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Please enter your address" autocomplete="off" required="required" name="user_address">
                        <!-- User email field -->
                        <label for="user_email" class="form-label py-3">Email:</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Please enter your email" autocomplete="off" required="required" name="user_email">
                        <!-- User password field -->
                        <label for="user_password" class="form-label py-3">Password:</label>
                        <input type="text" id="user_password" class="form-control" placeholder="Please enter your password" autocomplete="off" required="required" name="user_password">
                        <!-- Confirm password field -->
                        <label for="conf_user_password" class="form-label py-3">Confirm Password:</label>
                        <input type="text" id="conf_user_password" class="form-control" placeholder="Confirm your password" autocomplete="off" required="required" name="conf_user_password">
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