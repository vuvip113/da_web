<?php


include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $product = getByID("products", $id);
        if (mysqli_num_rows($product) > 0) {
          $data = mysqli_fetch_array($product);
      ?>
            <div class="card">
                <div class="card-header">
                    <h4>Chinh Sua San Pham
                        <a href="products.php" class="btn btn-primary float-end">Tro Lai</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="mb-0">Chon Categories</label>
                                <select name="category_id" class="form-select mb-2">
                                    <option selected>Chon Loai</option>
                                    <?php
                      $categories = getAll("categories");
                      if (mysqli_num_rows($categories) > 0) {
                        foreach ($categories as $item) {
                      ?>
                                    <option value="<?= $item['id']; ?>"
                                        <?= $data['category_id'] ==  $item['id'] ? 'selected' : '' ?>>
                                        <?= $item['name']; ?></option>
                                    <?php
                        }
                      } else {
                        echo "khong co Category nao het";
                      }
                      ?>
                                </select>
                            </div>
                            <input type="hidden" name="product_id" value="<?= $data['id']; ?>">
                            <div class="col-md-6">
                                <label class="mb-0">Name</label>
                                <input type="text" required name="name" value="<?= $data['name']; ?>"
                                    placeholder="Nhap day" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Slug</label>
                                <input type="text" required name="slug" value="<?= $data['slug']; ?>"
                                    placeholder="Nhap day" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Small Description</label>
                                <textarea rows="3" required name="small_description" placeholder="Nhap vao day"
                                    class="form-control"><?= $data['small_description']; ?></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Description</label>
                                <textarea rows="3" required name="description" placeholder="Nhap day"
                                    class="form-control"><?= $data['description']; ?></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Gia ban</label>
                                <input type="text" name="original_price" value="<?= $data['original_price']; ?>"
                                    placeholder="Nhap gia ban" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Giam gia</label>
                                <input type="text" name="selling_price" value="<?= $data['selling_price']; ?>"
                                    placeholder="Nhap gia giam gia" class="form-control mb-2">
                            </div>

                            <div class="col-md-12">
                                <label class="mb-0">Upload Image</label>
                                <input type="hidden" name="old_image" value="<?= $data['image']; ?> ">
                                <input type="file" name="image" class="form-control mb-2">
                                <label class="mb-0">Anh San Pham</label>
                                <img src="../uploads/<?= $data['image']; ?>" alt="Product Image" height="100px"
                                    width="100px">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mb-0">Quantity</label>
                                    <input type="number" required name="qty" value="<?= $data['qty']; ?>"
                                        placeholder="Nhap bao nhieu cai" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <br><label class="mb-0">Status</label>
                                    <input type="checkbox" <?= $data['status'] == '0' ? '' : 'checked' ?> name="status">
                                </div>
                                <div class="col-md-3">
                                    <br><label class="mb-0">Trending</label>
                                    <input type="checkbox" <?= $data['trending'] ? "checked" : "" ?> name="trending">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta Title</label>
                                <input type="text" required name="meta_title" value="<?= $data['meta_title']; ?>"
                                    placeholder="Nhap day" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta Description</label>
                                <textarea rows="3" required name="meta_description" placeholder="Nhap day"
                                    class="form-control"><?= $data['meta_description']; ?></textarea>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label class="mb-0">Meta Keywords</label>
                                <textarea rows="3" required name="meta_keywords" placeholder="Nhap day"
                                    class="form-control"><?= $data['meta_keywords']; ?></textarea>
                            </div>
                            <div class="col-md-12"><button type="submit" class="btn btn-primary"
                                    name="update_product_btn">Update</button></div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
        } else {
          echo "Khong tim thay thong tin";
        }
      } else {
        echo "Khong tim thay id";
      }
      ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>