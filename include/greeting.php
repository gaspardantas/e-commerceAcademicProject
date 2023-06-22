 <!-- Guest Greeting -->
 <div class="d-flex justify-content-center align-items-center">
     <?php
        if (!isset($_SESSION['user_name'])) {
            echo '<img src="./images/guest0.png" height="70" width="70" alt="Admin Image">';
        } else {
            echo '<img src="./images/guest.png" height="70" width="70" alt="Admin Image">';
        }
        ?>
 </div>
 <!--Welcome line -->
 <div class="d-flex bg-light text-light justify-content-center align-items-center p-2 shadow-lg">
     <div class="row">
         <h5>
             <?PHP
                if (!isset($_SESSION['user_name'])) {
                    echo "<span style='color:gray;'>Welcome, Guest!</span>";
                    //echo "Welcome, Guest!";
                    // echo "Welcome Guest, when you're ready:&nbsp;&nbsp;&nbsp;&nbsp;" . "<a href='" . $link_url1 . "' style='color: orange;text-decoration:underline;'><i class='fas fa-arrow-right'></i>" . $link_text1 . "</a>" . "&nbsp;&nbsp;&nbsp;&nbsp;or&nbsp;&nbsp;&nbsp;&nbsp;" . "<a href='" . $link_url3 . "' style='color: yellow;text-decoration: underline;'><i class='fas fa-user-plus'></i>" . $link_text3 . "</a>";
                } else {
                    echo "<span style='color: gray;'>Welcome, " . $_SESSION['user_name'] . "!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your e-mail is&nbsp;" . $_SESSION['user_email'] . "</span>";
                    //echo "Welcome " . $_SESSION['user_name'];
                }
                ?>
         </h5>
     </div>
 </div>