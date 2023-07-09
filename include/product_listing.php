<!-- Products -->
<?php
session_start();
include('connect.php');
?>
<div class="row">
  <!-- fetching products order by rand()-->
  <?php
  $select_query = "Select *from `product` order by product_name limit 0,6";
  $result_query = mysqli_query($con, $select_query);
  while ($row = mysqli_fetch_assoc($result_query)) {
    $product_id = $row['product_id'];
    $product_title = $row['product_name'];
    $product_price = $row['product_price'];
    $product_image = $row['product_image'];
    echo "<div class='col-md-4 '>
    <div class='card mt-2 mb-2'>
      <img class='card-img-top' src='./images/$product_image' alt='Card image'>
      <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-price'>$ $product_price</p>
        <a href='index.php?add_to_cart=$product_id' class='btn btn-secondary'>Add to Cart</a>
      </div>
    </div>
  </div> ";
  }
  ?>
  <!-- row end -->
</div>
