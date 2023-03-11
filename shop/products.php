<?php

include('funtions/userfunctions.php');
include('includes/header.php');

if (isset($_GET['category'])) {


  $category_slug = $_GET['category'];
  $category_data = getSlugActive("categories", $category_slug);
  $category = mysqli_fetch_array($category_data);
  if ($category) {
    $cid = $category['id'];
?>

    <div class="py-3 bg-bl">
      <div class="container">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-caret">
            <li class="breadcrumb-item"><a style="text-decoration: none; color: #798384;" href="index.php" class="text-uppercase">Home</a></li>
            <li class="breadcrumb-item"><a style="text-decoration: none; color: #798384;" href="categories.php" class="text-uppercase">Colections</a></li>
            <li aria-current="page" class="breadcrumb-item active text-uppercase"><?= $category['name']; ?></li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1><?= $category['name']; ?></h1>
            <hr>
            <div class="row">
              <?php
              $products = getProdByCategory($cid);
              if (mysqli_num_rows($products) > 0) {
                foreach ($products as $item) {
              ?> <div class="col-md-4 mb-2">
                    <a href="product-view.php?product=<?= $item['slug'] ?>">
                      <div class="card shadow">
                        <div class="card-body"><img src="uploads/<?= $item['image'] ?>" alt="Ảnh San Pham" class="w-100" height="400">
                          <h4 class="text-center"><?= $item['name'] ?></h4>
                        </div>
                      </div>
                    </a>
                  </div>
              <?php
                }
              } else {
                echo "KHONG TIM THAY du lieu";
              }
              ?>
            </div>
            <hr>
          </div>
        </div>
      </div>
    </div>

<?php
  } else {
    echo "Khong tim thay du lieu";
  }
} else {
  echo "Khong tim thay du lieu trong categories";
}

include('includes/footer.php') ?>