<?php

include('funtions/userfunctions.php');
include('includes/header.php');
include('authenticate.php');
?>

<div class="py-3 bg-bl">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-caret ">
        <li class="breadcrumb-item"><a style="text-decoration: none; color: #798384;" href="index.php" class="text-uppercase">Home</a></li>
        <li class="breadcrumb-item"><a style="text-decoration: none; color: #798384;" href="cart.php" class="text-uppercase">Cart</a></li>
      </ol>
    </nav>
  </div>
</div>

<div class="py-5">
  <div class="container">
    <div class="">
      <div class="row">
        <div class="col-md-12">
          <div id="mycart">
            <?php $items = getCartItems();
            if (mysqli_num_rows($items) > 0) {
            ?>
              <div class="row align-items-center">
                <div class="col-md-5">
                  <h6>San Pham</h6>
                </div>
                <div class="col-md-3">
                  <h6>Gia</h6>
                </div>
                <div class="col-md-2">
                  <h6>So luong</h6>
                </div>
                <div class="col-md-2">
                  <h6>Xoa</h6>
                </div>
              </div>
              <div id="">
                <?php
                foreach ($items as $citem) {
                ?>
                  <div class="card product_data shadow-sm mb-3 border border-1">
                    <div class="row align-items-center ">
                      <div class="col-md-2"><img src="uploads/<?= $citem['image'] ?>" alt="anh" width="80px"></div>
                      <div class="col-md-3">
                        <h5><?= $citem['name'] ?></h5>
                      </div>
                      <div class="col-md-3">
                        <h5><?= $citem['selling_price'] ?> d</h5>
                      </div>
                      <div class="col-md-2">
                        <input type="hidden" class="prodId" value="<?= $citem['prod_id'] ?>">
                        <div class="input-group mb-3" style="width: 120px;">
                          <button class="input-group-text decrement-btn updateQty">-</button>
                          <input type="text" class="form-control text-center input-qty bg-white" value="<?= $citem['prod_qty'] ?>" disabled">
                          <button class="input-group-text increment-btn updateQty">+</button>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <button class="btn btn-danger deleteItem" value="<?= $citem['cid'] ?>">
                          <i class="fa fa-trash me-2"></i>
                          Xoa
                        </button>
                      </div>
                    </div>
                  </div>

                <?php
                }

                ?>
              </div>
              <!-- <div class="float-end"><a href="checkout.php" class="btn btn-outline-primary">Thanh Toan</a></div> -->
              <div class="float-end"><button type="button" class="btn btn-outline-secondary" data-mdb-ripple-color="dark"><a href="checkout.php">Thanh Toan</a></button></div>
            <?php
            } else {
            ?>
              <div class="card card-body shadow text-center">
                <h4 class="py-3">Gio Hang Trong</h4>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include('includes/footer.php') ?>