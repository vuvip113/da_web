<?php
//session_start();
include('../config/dbcon.php');
include('../funtions/myfunctions.php');

if (isset($_POST['add_category_btn'])) {
  $name = $_POST['name'];
  $slug = $_POST['slug'];
  $description = $_POST['description'];
  $meta_title = $_POST['meta_title'];
  $meta_description = $_POST['meta_description'];
  $meta_keywords = $_POST['meta_keywords'];
  $status = isset($_POST['status']) ? '1' : '0';
  $popular = isset($_POST['popular']) ? '1' : '0';

  $image = $_FILES['image']['name'];

  $path = "../uploads";

  $image_ext = pathinfo($image, PATHINFO_EXTENSION);
  $filename = time() . '.' . $image_ext;

  $cate_query = "insert into categories (name,slug,description,meta_title,meta_description,meta_keywords,status,popular,image) Values ('$name','$slug', '$description', '$meta_title','$meta_description', '$meta_keywords', '$status', '$popular','$filename' )";

  $cate_query_run = mysqli_query($con, $cate_query);
  if ($cate_query_run) {
    move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
    //var_dump($path . '/' . $filename);
    redirect("add-category.php", "Category them thang cong");
  } else {
    redirect("add-category.php", "Loi Roi");
  }
} else if (isset($_POST['update_category_btn'])) {

  $category_id = $_POST['category_id'];
  $name = $_POST['name'];
  $slug = $_POST['slug'];
  $description = $_POST['description'];
  $meta_title = $_POST['meta_title'];
  $meta_description = $_POST['meta_description'];
  $meta_keywords = $_POST['meta_keywords'];
  $status = isset($_POST['status']) ? '1' : '0';
  $popular = isset($_POST['popular']) ? '1' : '0';

  $new_image = $_FILES['image']['name'];
  $old_image = $_POST['old_image'];

  if ($new_image != "") {
    // $update_filename = $new_image;
    $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
    $update_filename = time() . '.' . $image_ext;
  } else {
    $update_filename = $old_image;
  }
  $path = "../uploads";

  $update_query = "update categories set name='$name', slug='$slug', description='$description', meta_title='$meta_title', meta_description='$meta_description',meta_keywords='$meta_keywords',status='$status', popular='$popular',image = '$update_filename' where id='$category_id'";

  $update_query_run = mysqli_query($con, $update_query);
  if ($update_query_run) {
    if ($_FILES['image']['name'] != "") {
      move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
      if (file_exists("../uploads/" . $old_image)) {
        unlink("../uploads/" . $old_image);
      }
    }
    redirect("edit-category.php?id=$category_id", "CAP NHAP THANH CONG");
  } else {
    redirect("edit-category.php?id=$category_id", "CAP NHAP BI LOI");
  }
} else if (isset($_POST['delete_category_btn'])) {
  $category_id = mysqli_real_escape_string($con, $_POST['category_id']);

  $category_query = "Select * from categories where id ='$category_id'";
  $category_query_run = mysqli_query($con, $category_query);
  $category_data = mysqli_fetch_array($category_query_run);
  $image = $category_data['image'];

  $delete_query = "delete from categories where id='$category_id'";
  $delete_query_run = mysqli_query($con, $delete_query);

  if ($delete_query_run) {
    if (file_exists("../uploads/" . $image)) {
      unlink("../uploads/" . $image);
    }
    // redirect("category.php", "Xoa Thanh Cong");
    echo 200;
  } else {
    // redirect("category.php", "Loi Xoa!!!");
    echo 500;
  }
} else if (isset($_POST['add_product_btn'])) {
  $category_id = $_POST['category_id'];
  $name = $_POST['name'];
  $slug = $_POST['slug'];
  $small_description = $_POST['small_description'];
  $description = $_POST['description'];
  $original_price = $_POST['original_price'];
  $selling_price = $_POST['selling_price'];
  $qty = $_POST['qty'];
  $meta_title = $_POST['meta_title'];
  $meta_description = $_POST['meta_description'];
  $meta_keywords = $_POST['meta_keywords'];
  $status = isset($_POST['status']) ? '1' : '0';
  $trending = isset($_POST['trending']) ? '1' : '0';

  $image = $_FILES['image']['name'];

  $path = "../uploads";

  $image_ext = pathinfo($image, PATHINFO_EXTENSION);
  $filename = time() . '.' . $image_ext;

  if ($name != "" && $slug != "" && $description != "") {
    $product_query = "insert into products (category_id,name,slug,small_description,description,original_price,selling_price,qty,meta_title,meta_description,meta_keywords,status,trending,image) values ('$category_id','$name','$slug','$small_description','$description','$original_price','$selling_price','$qty','$meta_title','$meta_description', '$meta_keywords','$status','$trending','$filename')";
    $product_query_run = mysqli_query($con, $product_query);

    if ($product_query_run) {
      move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
      //var_dump($path . '/' . $filename);
      redirect("add-product.php", "Them San Pham Thanh Cong");
    } else {
      // var_dump($product_query);
      redirect("add-product.php", "Loi Roi!!!");
    }
  } else {
    redirect("add-product.php", "Vui Long Nhap Thong tin");
  }
} else if (isset($_POST['update_product_btn'])) {
  $product_id = $_POST['product_id'];
  $category_id = $_POST['category_id'];
  $name = $_POST['name'];
  $slug = $_POST['slug'];
  $small_description = $_POST['small_description'];
  $description = $_POST['description'];
  $original_price = $_POST['original_price'];
  $selling_price = $_POST['selling_price'];
  $qty = $_POST['qty'];
  $meta_title = $_POST['meta_title'];
  $meta_description = $_POST['meta_description'];
  $meta_keywords = $_POST['meta_keywords'];
  $status = isset($_POST['status']) ? '1' : '0';
  $trending = isset($_POST['trending']) ? '1' : '0';


  $new_image = $_FILES['image']['name'];
  $old_image = $_POST['old_image'];

  $path = "../uploads";
  if ($new_image != "") {
    // $update_filename = $new_image;
    $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
    $update_filename = time() . '.' . $image_ext;
  } else {
    $update_filename = $old_image;
  }


  $update_product_query = "update products set category_id='$category_id',name='$name',slug='$slug',small_description='$small_description',description='$description',original_price='$original_price',selling_price='$selling_price',qty='$qty',meta_title='$meta_title',meta_description='$meta_description', meta_keywords='$meta_keywords',status='$status',trending='$trending',image='$update_filename' where id='$product_id'";
  $update_product_query_run = mysqli_query($con, $update_product_query);

  if ($update_product_query_run) {
    if ($_FILES['image']['name'] != "") {
      move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
      if (file_exists("../uploads/" . $old_image)) {
        unlink("../uploads/" . $old_image);
      }
    }
    redirect("edit-product.php?id=$product_id", "CAP NHAP THANH CONG san pham");
  } else {
    redirect("edit-product.php?id=$product_id", "CAP NHAP BI LOI san pham");
  }
} else if (isset($_POST['delete_product_btn'])) {
  $product_id = mysqli_real_escape_string($con, $_POST['product_id']);

  $product_query = "Select * from products where id ='$product_id'";
  $product_query_run = mysqli_query($con, $product_query);
  $product_data = mysqli_fetch_array($product_query_run);
  $image = $product_data['image'];

  $delete_query = "delete from products where id='$product_id'";
  $delete_query_run = mysqli_query($con, $delete_query);

  if ($delete_query_run) {
    if (file_exists("../uploads/" . $image)) {
      unlink("../uploads/" . $image);
    }
    // redirect("category.php", "Xoa Thanh Cong");
    echo 200;
  } else {
    // redirect("category.php", "Loi Xoa!!!");
    echo 500;
  }
} else if (isset($_POST['update_order_btn'])) {
  $track_no = $_POST['tracking_no'];
  $order_status = $_POST['order_status'];
  $updateOrder_query = "update orders set status='$order_status' where tracking_no='$track_no'";
  $updateOrder_query_run = mysqli_query($con, $updateOrder_query);
  redirect("view-order.php?t=$track_no", "Cap Nhap thanh cong phan order");
} else if (isset($_POST['update_users_btn'])) {
  $users_id = $_POST['users_id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $role_as = isset($_POST['role_as']) ? '1' : '0';

  $update_query = "update users set name='$name', email='$email', phone='$phone', password='$password',role_as='$role_as' where id='$users_id'";

  $update_query_run = mysqli_query($con, $update_query);
  if ($update_query_run) {
    redirect("edit-users.php?id=$users_id", "CAP NHAP THANH CONG");
  } else {
    redirect("edit-users.php?id=$users_id", "CAP NHAP BI LOI");
  }
} else {
  header('Location: ../index.php');
}