<!-- Where it starts -->
<!DOCTYPE html>
<html>
<!--Head-->

<head>
  <title>GameSpark</title>
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
  <!--Nav -bar-->
  <?php
  session_start();
  //If not logged in, show nav-bar for log in
  if (!isset($_SESSION['user_name'])) {
    include './include/navbar_lin.php';
    //Else, show nav-bar for log out
  } else {
    include './include/navbar_lout.php';
  }
  ?>
  <!--Welcome line <footer class="mt-5 p-3 text-center bg-light"> -->
  <div class="d-flex bg-warning text-light justify-content-center align-items-center p-2 shadow-lg">
    <div class="row">
      <h5>
        <?PHP
        session_start();
        if (!isset($_SESSION['user_name'])) {
          echo "<span style='color:gray;'>Welcome Guest</span>";
          //echo "Welcome Guest";
          // echo "Welcome Guest, when you're ready:&nbsp;&nbsp;&nbsp;&nbsp;" . "<a href='" . $link_url1 . "' style='color: orange;text-decoration:underline;'><i class='fas fa-arrow-right'></i>" . $link_text1 . "</a>" . "&nbsp;&nbsp;&nbsp;&nbsp;or&nbsp;&nbsp;&nbsp;&nbsp;" . "<a href='" . $link_url3 . "' style='color: yellow;text-decoration: underline;'><i class='fas fa-user-plus'></i>" . $link_text3 . "</a>";
        } else {
          echo "<span style='color: gray;'>Welcome " . $_SESSION['user_name'] . "&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;" . $_SESSION['user_email'] . "</span>";
          //echo "Welcome " . $_SESSION['user_name'];
        }
        ?>
      </h5>
    </div>
  </div>
  <!--Side-bar and list of cards-->
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