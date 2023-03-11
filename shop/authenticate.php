<?php
if (!isset($_SESSION['auth'])) {
  redirect("login.php", "Đăng nhập để mua hàng.");
}
