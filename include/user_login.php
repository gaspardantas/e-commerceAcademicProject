<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div class="container-fluid">
        <h2 class="text-center my-3">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center py-2">
            <!-- The form will be inside a column -->
            <div class="col-lg-12 col-xl-5">
                <form action="" method="post">
                    <div class="form-outline">
                        <!-- User name field -->
                        <label for="user_name" class="form-label py-3">User email:</label>
                        <input type="text" id="user_name" class="form-control" placeholder="Please enter your username" autocomplete="off" required="required" name="user_name">
                        <!-- User password field -->
                        <label for="user_password" class="form-label py-3">Password:</label>
                        <input type="text" id="user_password" class="form-control" placeholder="Please enter your password" autocomplete="off" required="required" name="user_password">
                    </div>
                    <div class="text-center py-3">
                        <input type="submit" value="Login" class="bg-info py-2 px-2 border-0" name="user_login">
                        <p class="small fw-bold mt-2 pt-2">Not registered, click -> <a href="user_registration.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>