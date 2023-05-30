<!-- Where it starts -->
<!DOCTYPE html>
<html>
<!--Head-->

<head>
  <title>GameSpark</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<!--Body-->

<body>
  <?php include 'navbar.php'; ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <!--2 columns space for Categories-->
        <?php include 'sidebar.php'; ?>
      </div>
      <div class="col-md-10">
        <!--10 columns space for products-->
        <?php include 'product_listing.php'; ?>
      </div>
    </div>
  </div>

  <?php include 'footer.php'; ?>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>