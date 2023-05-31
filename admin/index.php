<!-- Where it starts -->
<!DOCTYPE html>
<html>
<!--Head-->

<head>
    <title>GameSpark</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!--Style -->

</head>

<!--Body-->

<body>
    <?php include '../include/navbar_admin.php'; ?>

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-3 bg-light">
                <!--2 columns space for Categories-->
                <?php include 'sidebar.php'; ?>
            </div>
            <div class="col-md-9">
                <!--10 columns space for products-->
                <?php include 'product_listing.php'; ?>
            </div>
        </div>
    </div>

    <?php include '../footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>