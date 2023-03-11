<?php
//ketnoidatabase
session_start();
include('../config/dbcon.php');

if (isset($_SESSION['auth'])) {
  if (isset($_POST['scope'])) {
    $scope = $_POST['scope'];
    switch ($scope) {
      case "add":
        $prod_id = $_POST['prod_id'];
        $prod_qty = $_POST['prod_qty'];

        $user_id = $_SESSION['auth_user']['user_id'];

        //kiemtra co bi trung ko
        $chk_existing_cart = "Select * from carts where prod_id = '$prod_id' and user_id='$user_id' ";
        $chk_existing_cart_run = mysqli_query($con, $chk_existing_cart);

        if (mysqli_num_rows($chk_existing_cart_run) > 0) {
          echo "existing";
        } else {
          $insert_query = "Insert into carts (user_id, prod_id, prod_qty) values ('$user_id', '$prod_id', '$prod_qty')";
          $insert_query_run = mysqli_query($con, $insert_query);

          if ($insert_query_run) {
            echo 201;
          } else {
            echo 500;
          }
        }
        break;
      case "update":
        $prod_id = $_POST['prod_id'];
        $prod_qty = $_POST['prod_qty'];

        $user_id = $_SESSION['auth_user']['user_id'];

        $chk_existing_cart = "Select * from carts where prod_id = '$prod_id' and user_id='$user_id' ";
        $chk_existing_cart_run = mysqli_query($con, $chk_existing_cart);

        if (mysqli_num_rows($chk_existing_cart_run) > 0) {
          $update_query = "UPDATE carts set prod_qty = '$prod_qty' where prod_id='$prod_id' and user_id='$user_id'";
          $update_query_run = mysqli_query($con, $update_query);
          if ($update_query_run) {
            echo 200;
          } else {
            echo 500;
          }
        } else {
          echo "Loi roi ";
        }
        break;
      case "delete":
        $cart_id = $_POST['cart_id'];

        $user_id = $_SESSION['auth_user']['user_id'];

        $chk_existing_cart = "Select * from carts where id='$cart_id' and user_id='$user_id' ";
        $chk_existing_cart_run = mysqli_query($con, $chk_existing_cart);

        if (mysqli_num_rows($chk_existing_cart_run) > 0) {
          $delete_query = "delete from carts where id='$cart_id' and user_id='$user_id'";
          $delete_query_run = mysqli_query($con, $delete_query);
          if ($delete_query_run) {
            echo 200;
          } else {
            echo "Loi roi ";
          }
        } else {
          echo "Loi roi ";
        }
        break;

      default:
        echo 500;
    }
  }
} else {
  echo 401;
}
