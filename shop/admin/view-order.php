<?php

include('../middleware/adminMiddleware.php');
include('includes/header.php');

if (isset($_GET['t'])) {
  $tracking_no = $_GET['t'];

  $orderData = checkTrackingNovalid($tracking_no);
  if (mysqli_num_rows($orderData) < 0) {
?>
    <h4>kHONG CO THONG TIN CHO DON HANG <?php $tracking_no ?>
    </h4>
  <?php
    die();
  }
} else {
  ?>
  <h4>kHONG CO THONG TIN CHO DON HANG <?php $tracking_no ?>
  </h4>
<?php
  die();
}
$data = mysqli_fetch_array($orderData);
?>


<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header bg-dark navbar-dark shadow ">
          <span class="fs-4 text-white">Xem Don Hang</span>
          <a href="orders.php" class="btn btn-warning float-end">
            <i class="fa fa-reply-all"></i>
            Back
          </a>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <h5>Chi Tiet Gui Hang</h5>
              <hr>
              <tbody>
                <div class="row">
                  <class="col-md-12 mb-3">
                    <label class="fw-bold">Name</label>
                    <div class="border p-1">
                      <?= $data['name']; ?>
                    </div>
                    <div class="col-md-12 mb-3">
                      <label class="fw-bold">Email</label>
                      <div class="border p-1">
                        <?= $data['email']; ?>
                      </div>
                    </div>
                    <div class="col-md-12 mb-3">
                      <label class="fw-bold">Phone</label>
                      <div class="border p-1">
                        <?= $data['phone']; ?>
                      </div>
                    </div>
                    <div class="col-md-12 mb-3">
                      <label class="fw-bold">Tracking no.</label>
                      <div class="border p-1">
                        <?= $data['tracking_no']; ?>
                      </div>
                    </div>
                    <div class="col-md-12 mb-3">
                      <label class="fw-bold">Dia Chi</label>
                      <div class="border p-1">
                        <?= $data['address']; ?>
                      </div>
                    </div>
                    <div class="col-md-12 mb-3">
                      <label class="fw-bold">Pin Code</label>
                      <div class="border p-1">
                        <?= $data['pincode']; ?>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
              <h5>Chi tiet don hang</h5>
              <hr>
              <table class="table">
                <thead>
                  <tr>
                    <th>San Pham</th>
                    <th>Gia tien</th>
                    <th>So luong</th>
                  </tr>
                </thead>
                <?php
                $order_query = "select o.id as oid, o.tracking_no, o.user_id, oi.*,oi.qty as orderqty,p.* from orders o, order_items oi, products p where oi.order_id=o.id and p.id=oi.prod_id and o.tracking_no = '$tracking_no'";
                $order_query_run = mysqli_query($con, $order_query);
                if (mysqli_num_rows($order_query_run) > 0) {
                  foreach ($order_query_run as $item) {
                ?>
                    <tr>
                      <td class="align-middle">
                        <img src="../uploads/<?= $item['image']; ?>" width="50px" height="70px" alt="<?= $item['name']; ?>">
                        <?= $item['name']; ?>
                        </td">
                      <td class="align-middle"><?= $item['price']; ?></td>
                      <td class="align-middle"><?= $item['orderqty']; ?></td>
                    </tr>
                <?php
                  }
                }
                ?>
                </tbody>
              </table>
              <hr>
              <h4>Tong Tien: <span class="float-end fw-bold"><?= $data['total_price']; ?></span></h4>
              <hr>
              <div class="border p-1 mb-3">
                <label class="fw-bold">Payment Mode</label>
                <?= $data['payment_mode'] ?>
              </div>
              <label class="fw-bold">Trang thai</label>
              <div class="mb-3">
                <form action="code.php" method="POST">
                  <input type="hidden" name="tracking_no" value="<?= $data['tracking_no'] ?>">
                  <select name="order_status" id="" class="form-select">
                    <option value="0" <?= $data['status'] == 0 ? "selected" : "" ?>>Dang tien hanh</option>
                    <option value="1" <?= $data['status'] == 1 ? "selected" : "" ?>>Thanh toan thanh cong</option>
                    <option value="2" <?= $data['status'] == 2 ? "selected" : "" ?>>Don hang bi huy</option>
                  </select>
                  <button type="submit" name="update_order_btn" class="btn btn-primary mt-2">Update Order</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<?php include('includes/footer.php') ?>