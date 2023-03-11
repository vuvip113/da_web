<?php
$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);
?>

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-non" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" target="_blank">
            <img src="assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Vfashx</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link <?= $page == "index.php" ? 'active bg-white border-radius-md shadow ' : ''; ?> " href="index.php">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-house-door-fill" style="font-size: 1rem; color: #abd0bc;"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item mt-1">
                <h5 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Users -</h5>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $page == "users.php" ? 'active bg-white border-radius-md shadow' : ''; ?> " href="users.php">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-people" style="font-size: 1rem; color: #abd0bc;"></i>
                    </div>
                    <span class="nav-link-text ms-1">Quan Ly Users</span>
                </a>
            </li>

            <li class="nav-item mt-1">
                <h5 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Category -</h5>
            </li>
            <li class="nav-item">
                <a class="nav-link  <?= $page == "category.php" ? 'active bg-white border-radius-md shadow' : ''; ?> " href="category.php">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-tags" style="font-size: 1rem; color: #abd0bc;"></i>
                    </div>
                    <span class="nav-link-text ms-1">Tat ca Category </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  <?= $page == "add-category.php" ? 'active bg-white border-radius-md shadow' : ''; ?>  " href="add-category.php">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-plus" style="font-size: 1rem; color: #abd0bc;"></i>
                    </div>
                    <span class="nav-link-text ms-1">Them Categories</span>
                </a>
            </li>
            <li class="nav-item mt-1">
                <h5 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Product -</h5>
            </li>
            <li class="nav-item">
                <a class="nav-link  <?= $page == "products.php" ? 'active bg-white border-radius-md shadow' : ''; ?>  " href="products.php">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-box-seam" style="font-size: 1rem; color: #abd0bc;"></i>
                    </div>
                    <span class="nav-link-text ms-1">Tat ca CAC SAN PHAM </span>
                </a>
            </li>
            <li class="nav-item mt-1">
                <a class="nav-link  <?= $page == "add-product.php" ? 'active bg-white border-radius-md shadow' : ''; ?>  " href="add-product.php">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-plus" style="font-size: 1rem; color: #abd0bc;"></i>
                    </div>
                    <span class="nav-link-text ms-1">Them San Pham</span>
                </a>
            </li>
            <li class="nav-item mt-1">
                <h5 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Orders -</h5>
            </li>
            <li class="nav-item">
                <a class="nav-link  <?= $page == "orders.php" ? 'active bg-white border-radius-md shadow' : ''; ?>  " href="orders.php">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="bi bi-card-checklist" style="font-size: 1rem; color: #abd0bc;"></i>
                    </div>
                    <span class="nav-link-text ms-1">Danh sach nguoi mua</span>
                </a>
            </li>
        </ul>
        <!-- <div class="sidenav-footer position-absolute w-auto bottom-0 ">
            
            <a class="btn bg-gradient-info mt-4 w-100" href="../index.php" type="button">Trang Chu</a>
            <a class="btn bg-warning bg-gradient mt-4 w-100" href="../logout.php" type="button">Dang Xuat</a>
        </div> -->

    </div>
    <div class="sidenav-footer mx-3">
        <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
            <div class="full-background" style="
              background-image: url('assets/img/curved-images/white-curved.jpg');
            "></div>
            <div class="card-body text-start p-3 w-100">
                <div class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
                    <i class="bi bi-balloon-heart" style="font-size: 1rem; color: #abd0bc;"></i>
                </div>
                <div class="docs-info">
                    <h6 class="text-white up mb-0">Need help?</h6>
                    <p class="text-xs font-weight-bold">Please check our docs</p>
                    <a href="../index.php" target="_blank" class="btn btn-white btn-sm w-100 mb-0">Trang Chu</a>
                </div>
            </div>
        </div>
        <a class="btn bg-gradient-primary mt-3 w-100" href="../logout.php">Dang Xuat</a>
    </div>
</aside>