<?php

session_start();
include('../config/dbcon.php');

if (isset($_SESSION['auth'])) {
  if (isset($_POST['placeOrderBtn'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $pincode = mysqli_real_escape_string($con, $_POST['pincode']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $payment_mode = mysqli_real_escape_string($con, $_POST['payment_mode']);
    $payment_id = mysqli_real_escape_string($con, $_POST['payment_id']);

    if ($name == "" || $email == "" || $phone == "" || $pincode == "" || $address == "") {
      $_SESSION['message'] = "Bat buoc phai nhap vao cho trong";
      header('Location: ../checkout.php');
      exit(0);
    }
    $userId = $_SESSION['auth_user']['user_id']; //authcode
    $query = "select c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price from carts c, products p where c.prod_id = p.id and c.user_id='$userId' order by c.id desc";
    $query_run = mysqli_query($con, $query);

    $totalPrice = 0;
    foreach ($query_run  as $citem) {
      $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
    }

    //echo $totalPrice;
    $tracking_no = "vu" . rand(1111, 9999) . substr($phone, 2);
    $insert_query = "Insert into orders (tracking_no,	user_id,	name,	email,	phone,	address,	pincode,	total_price,	payment_mode,	payment_id) values ('$tracking_no','$userId', '$name', '$email', '$phone', '$address', '$pincode', '$totalPrice', '$payment_mode', '$payment_id')";
    $insert_query_run = mysqli_query($con, $insert_query);

    if ($insert_query_run) {
      $order_id = mysqli_insert_id($con);
      foreach ($query_run as $citem) {
        $prod_id = $citem['prod_id'];
        $prod_qty = $citem['prod_qty'];
        $price = $citem['selling_price'];
        $insert_items_query = "insert into order_items (order_id,	prod_id,	qty,	price) values ('$order_id','$prod_id','$prod_qty','$price')";
        $insert_items_query_run = mysqli_query($con, $insert_items_query);

        //xoa bot so luong
        $product_query = "select * from products where id= '$prod_id' LIMIT 1 ";
        $product_query_run = mysqli_query($con, $product_query);

        $productData = mysqli_fetch_array($product_query_run);
        $current_qty = $productData['qty'];

        $new_qty = $current_qty - $prod_qty;
        $updateQty_query = "update products set qty = '$new_qty' where id='$prod_id'";
        $updateQty_query_run = mysqli_query($con, $updateQty_query);
      }

      //thanhcong thi xoa gia hang nguoi do
      $deleteCartQuery = "delete from carts where user_id='$userId'";
      $deleteCartQuery_run = mysqli_query($con, $deleteCartQuery);

      if ($payment_mode == "COD") {
        $_SESSION['message'] = "Dat Hang Thanh Cong";
        header('Location: ../my-orders.php');
        die();
      } else {
        echo 201;
      }
    }
  }
} else {
  header('Location: ../index.php');
}