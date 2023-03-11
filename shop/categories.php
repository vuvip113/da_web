<?php

include('funtions/userfunctions.php');
include('includes/header.php');
?>
<div class="py-3 bg-bl">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-caret ">
        <li class="breadcrumb-item"><a style="text-decoration: none; color: #798384;" href="index.php" class="text-uppercase">Home</a></li>
        <li class="breadcrumb-item"><a style="text-decoration: none; color: #798384;" href="categories.php" class="text-uppercase">Colections</a></li>
      </ol>
    </nav>
  </div>
</div>

<div class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 data-aos="fade-down">Our Colections</h1>
        <hr>
        <div class="container">
          <div class="row justify-content-center">
            <?php
            $categories = getAllActive("categories");
            if (mysqli_num_rows($categories) > 0) {
              foreach ($categories as $item) {
            ?> <div data-aos="fade-up" class="col-12 col-lg-4">
                  <div class="card box-shadow mx-auto my-5" style="width: 18rem">
                    <img src="uploads/<?= $item['image'] ?>" alt="Ảnh Categories" class="card-img-top" alt="..." />
                    <div class="card-body">
                      <h5 style="font-weight:bold; color:#2b2b2b;" class="card-title"><?= $item['name'] ?></h5>
                      <hr />
                      <p class="card-text"><?= $item['meta_title'] ?></p>
                    </div>
                    <a href="products.php?category=<?= $item['slug'] ?>"><i class="far fa-eye css_btn"></i></a>
                  </div>
                </div>
            <?php
              }
            } else {
              echo "KHONG TIM THAY du lieu";
            }
            ?>
          </div>
        </div>
        <hr>
      </div>
    </div>
  </div>
</div>




<?php include('includes/footer.php') ?>