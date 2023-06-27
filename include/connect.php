<?php
$con = mysqli_connect('localhost', 'root', '', 'gamespark');
if (!$con) {
    die(mysqli_error($con));
}
?>

<!-- ******* gamespark Database *********
------------------------------
product table
- product_id: int (PK) (AI)
- product_name: varchar(255)
- product_price: decimal(10, 2)
- product_image: varchar(255) 
--------------------------------
user table
- user_id int (PK) (AI)
- user_name Varchar (255)
- user address Varchar (255)
- user_email Varchar (255)
- user_password Varchar (255)
--------------------------------
purchase table
- purchase_id (PK) (AI)
- user_id (FK)
- purchase_total decimal (10,2)
- purchase_date (timestamp)
--------------------------------
cart table
- product_id: int (PK)
- product_quantity: int
- ip_address Varchar (255)
****************************************
-->