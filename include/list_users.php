<?php
include('connect.php');
//checking the database for all users
$sql = "SELECT * FROM user ORDER BY user_id";
$result = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html>
<!--Head-->
<head>
    <title>GameSpark - List of Users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <!--display admin Navigation bar-->
    <?php include '../include/navbar_admin.php'; ?>
    <div class="container-fluid mt-3">
        <h1 class="text-center">List of Users</h1>
        <div class="row justify-content-center">
            <!--Table-->
            <table b-5>
                <tr>
                    <th class="p-3 bg-success text-center text-light">User Name</th>
                    <th class="p-3 bg-dark text-center text-light">User Address</th>
                    <th class="p-3 bg-info text-center text-light">User Email</th>
                    <th class="p-3 bg-danger text-center text-light">User Password</th>
                </tr>
                <!--While loop to display the user table-->
                <?php while ($row = mysqli_fetch_assoc($result)) {
                    //display name/address/email
                ?>
                    <tr>
                        <td class="p-3 bg-light text-center border">
                            <div><?php echo $row['user_name'] ?> </div>
                        </td>
                        <td class="p-3 bg-light text-center border">
                            <div><?php echo $row['user_address'] ?> </div>
                        </td>
                        <td class="p-3 bg-light text-center border">
                            <div><?php echo $row['user_email'] ?> </div>
                        </td>
                        <td class="p-3 bg-light text-center border">
                            <div><?php echo $row['user_password'] ?> </div>
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