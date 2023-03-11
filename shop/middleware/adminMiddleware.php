<?php

include('../funtions/myfunctions.php');

if (isset($_SESSION['auth'])) {

    if ($_SESSION['role_as'] != 1) {
        redirect("../index.php", "Ban khong co quyen vao trang nay");
    }
} else {
    redirect("../login.php", "Chua Dang Nhap ma doi vao");
}