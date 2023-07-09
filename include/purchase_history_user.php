<?php
session_start();
include('connect.php');
//checking the database for all users
$sql = "SELECT * FROM purchase WHERE user_id = " . $_SESSION['user_id'];
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
    <?php include 'navbar_home.php'; ?>
    <div class="container-fluid mt-3">
        <h1 class="text-center">List of Users</h1>
        <div class="row justify-content-center">
            <!--Table-->
            <table b-5>
                <tr>
                    <th class="p-3 bg-dark text-center text-light">Purchase Total</th>
                    <th class="p-3 bg-info text-center text-light">Purchase Date</th>
                </tr>
                <!--While loop to display the user table-->
                <?php while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td class="p-3 bg-light text-center border">
                            <div><?php echo $row['purchase_total'] ?> </div>
                        </td>
                        <td class="p-3 bg-light text-center border">
                            <div><?php echo $row['purchase_date'] ?> </div>
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