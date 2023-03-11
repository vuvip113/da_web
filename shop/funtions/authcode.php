<?php

session_start();
include('../config/dbcon.php');

if (isset($_POST['register_btn'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    //check email;
    $check_email_query = "SELECT email FROM users where email='$email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);
    if (mysqli_num_rows($check_email_query_run) > 0) {
        $_SESSION['message'] = "Email da co san! Vui long nhap Email khac.";
        header('Location: ../register.php');
    } else {
        if ($password == $cpassword) {
            //insert
            $insert_query = "INSERT INTO users(name,email,phone,password) VALUES('$name','$email','$phone','$password')";
            $insert_query_run = mysqli_query($con, $insert_query);

            if ($insert_query_run) {
                $_SESSION['message'] = "DANG KY THANG CONG";
                header('Location: ../login.php');
            } else {
                $_SESSION['message'] = "LOI DANG KY THANG KHONG CONG! Vui long nhap lai.";
                header('Location: ../register.php');
            }
        } else {
            $_SESSION['message'] = "Mat khau khong khop! Vui long nhap lai.";
            header('Location: ../register.php');
        }
    }
} else if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "select * from users where email='$email' and password='$password'";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $userid = $userdata['id'];
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $roloe_as = $userdata['role_as'];

        $_SESSION['auth_user'] = [
            'user_id' => $userid,
            'name' => $username,
            'email' => $useremail
        ];

        $_SESSION['role_as'] =  $roloe_as;
        if ($roloe_as == 1) {
            $_SESSION['message'] = "Welcome ADMIN";
            header('Location: ../admin/index.php');
        } else {
            $_SESSION['message'] = "Dang Nhap Thanh Cong";
            header('Location: ../index.php');
        }
    } else {
        $_SESSION['message'] = "Loi DANG nHAP";
        header('Location: ../login.php');
    }
}
