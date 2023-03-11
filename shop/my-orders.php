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
        <li class="breadcrumb-item"><a style="text-decoration: none; color: #798384;" href="my-orders.php" class="text-uppercase">Don Hang cua toi</a></li>
      </ol>
    </nav>
  </div>
</div>

<div class="py-5">
  <div class="container">
    <div class="">
      <div class="row">
        <div class="col-md-12">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <!-- <th>ID</th> -->
                <th>Ma Don Hang</th>
                <th>Price</th>
                <th>Date</th>
                <th>View</th>
              </tr>
            </thead>
            <tbody>

              <?php
              $orders = getOrders();

              if (mysqli_num_rows($orders) > 0) {
                foreach ($orders as $item) {
              ?>
                  <tr>
                    <!-- <td> <?= $item['id']; ?> </td> -->
                    <td> <?= $item['tracking_no']; ?> </td>
                    <!-- <td><?= $item['phone']; ?></td> -->
                    <td> <?= $item['total_price']; ?> </td>
                    <td> <?= $item['created_at']; ?> </td>
                    <td>
                      <a href="view-order.php?t=<?= $item['tracking_no']; ?>" class="btn btn-primary">View Detials</a>
                    </td>
                  </tr>
                <?php
                }
              } else {
                ?>
                <tr>
                  <td colspan="5"> Khong tim thay don hang !!!</td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>


<?php include('includes/footer.php') ?>