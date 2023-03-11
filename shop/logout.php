<?php
session_start();
if (isset($_SESSION['auth'])) {
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);
    $_SESSION['message'] = "DĂNG XUẤT thang cong";
}

header('Location: index.php');