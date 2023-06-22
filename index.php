<?php
session_start();
?>
<!-- Where it starts -->
<!DOCTYPE html>
<html>
<!--Head-->

<head>
  <title>GameSpark - User</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!--Style for the page-->
  <style>
    /*product image attribute*/
    .card-img-top {
      width: 100%;
      height: 300px;
      object-fit: contain;
    }

    /*Animation for sidebar*/
    @keyframes updown {
      0% {
        transform: translateY(0);
      }

      50% {
        transform: translateY(910px);
      }

      100% {
        transform: translateY(0);
      }
    }

    /*Animation speed*/
    .animated-text {
      animation: updown 7s infinite;
    }
  </style>
</head>
<!--Body-->

<body>
  <!--define the navbar based on user privileges-->
  <?php
  //If not logged in, show nav-bar for log in
  if (!isset($_SESSION['user_name'])) {
    include './include/navbar_lin.php';
    //Else, show nav-bar for log out
  } else {
    include './include/navbar_lout.php';
  }
  ?>
  <!--Welcome message-->
  <?php include 'include/greeting.php'; ?>
  <!--Side-bar and list of products-->
  <div class="container-fluid mt-3">
    <div class="row">
      <div class="col-md-3 bg-light">
        <!--2 columns space for Categories-->
        <?php include './include/sidebar.php'; ?>
      </div>
      <div class="col-md-9">
        <!--10 columns space for products-->
        <?php include './include/product_listing.php'; ?>
      </div>
    </div>
  </div>
  <!--Display footer-->
  <?php include './include/footer.php'; ?>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>