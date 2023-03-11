<?php

include('../middleware/adminMiddleware.php');
include('includes/header.php');
?>


<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Orders
            <a href="order-history.php" class="btn btn-warning float-end">Order History</a>
          </h4>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>User</th>
                <th>Tracking</th>
                <th>Price</th>
                <th>Date</th>
                <th>View</th>
              </tr>
            </thead>
            <tbody>

              <?php
              $orders = getAllOrders();

              if (mysqli_num_rows($orders) > 0) {
                foreach ($orders as $item) {
              ?>
                  <tr>
                    <td> <?= $item['id']; ?> </td>
                    <td> <?= $item['name']; ?> </td>
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