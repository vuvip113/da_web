<?php
$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);
?>

<nav class="py-3 navbar navbar-expand-sm bg-light sticky-topp navbar-light">
    <div class="container">
        <a style="font-size: 45px; font-style: italic; font-weight: bold;" class="navbar-brand text-dark" href="index.php">Vfashx</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item ">
                    <a class="nav-link  a<?= $page == "index.php" ? 'active text-dark border-bottom border-1 ' : ''; ?>" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  <?= $page == "categories.php" ? 'active text-dark border-bottom border-1' : ''; ?>" href="categories.php">Colections</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  <?= $page == "aboutus.php" ? 'active text-dark border-bottom border-1' : ''; ?>" aria-current="page" href="aboutus.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  <?= $page == "cart.php " ? 'active bg-dark' : ''; ?>" href="cart.php"><i class="fa fa-shopping-cart me-2"></i></a>
                </li>
                <?php
                if (isset($_SESSION['auth'])) {
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['auth_user']['name']; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item " href="my-orders.php"><i class="fas fa-check-double"></i> Xem Gio
                                    Hang</a></li>

                            <?php
                            if ($_SESSION['role_as'] == '1') {
                            ?>
                                <li><a class="dropdown-item " href="admin"><i class="fas fa-check-double"></i> Admin</a></li>
                            <?php
                            } else {
                            ?>
                                <li><a class="dropdown-item " href="">Hallo</a></li>
                            <?php
                            }
                            ?>


                            <li><a class="dropdown-item " href="my-orders.php"><i class="fas fa-shopping-bag"></i> Xem Gio hang</a></li>

                            <li><a class="dropdown-item " href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>

                <?php
                }
                ?>

            </ul>
        </div>
    </div>
</nav>