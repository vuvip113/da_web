<?php

session_start();
include('config/dbcon.php');

function getAllActive($table)
{
  global $con;
  $query = "select * from $table where status='0'";
  return $query_run = mysqli_query($con, $query);
}

function getAllTrending()
{
  global $con;
  $query = "select * from products where trending='1'";
  return $query_run = mysqli_query($con, $query);
}

function getAllProduct()
{
  global $con;
  $query = "select * from products";
  return $query_run = mysqli_query($con, $query);
}

function getSanpham_1()
{
  global $con;
  $query = "select * from products where status='0' and original_price != '0'";
  return $query_run = mysqli_query($con, $query);
}

function getIDActive($table, $id)
{
  global $con;
  $query = "select * from $table where id='$id' and status='0'";
  return $query_run = mysqli_query($con, $query);
}

function getSlugActive($table, $slug)
{
  global $con;
  $query = "select * from $table where slug='$slug' and status='0' LIMIT 1";
  return $query_run = mysqli_query($con, $query);
}

function getProdByCategory($category_id)
{
  global $con;
  $query = "select * from products where category_id='$category_id' and status='0'";
  return $query_run = mysqli_query($con, $query);
}

function getCartItems()
{
  global $con;
  $userId = $_SESSION['auth_user']['user_id']; //authcode
  $query = "select c.id as cid, c.prod_id, c.prod_qty, p.id as pid, p.name, p.image, p.selling_price from carts c, products p where c.prod_id = p.id and c.user_id='$userId' order by c.id desc";
  return $query_run = mysqli_query($con, $query);
}

function getOrders()
{
  global $con;
  $userId = $_SESSION['auth_user']['user_id']; //authcode
  $query = "select * from orders where user_id = '$userId' order by id desc";
  return  $query_run = mysqli_query($con, $query);
}

function redirect($url, $message)
{
  $_SESSION['message'] = $message;
  header('Location: ' . $url);
  exit();
}

function checkTrackingNovalid($trackingNo)
{
  global $con;
  $userId = $_SESSION['auth_user']['user_id']; //authcode

  $query = "select * from orders where tracking_no='$trackingNo' and user_id='$userId'";
  return mysqli_query($con, $query);
}
