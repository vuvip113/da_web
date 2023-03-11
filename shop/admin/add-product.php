<?php


include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Them San Pham</h4>
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
                                    <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                    <?php
                                        }
                                    } else {
                                        echo "khong co Category nao het";
                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Name</label>
                                <input type="text" name="name" placeholder="Nhap day" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Slug</label>
                                <input type="text" name="slug" placeholder="Nhap day" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Small Description</label>
                                <textarea rows="3" name="small_description" placeholder="Nhap vao day"
                                    class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Description</label>
                                <textarea rows="3" name="description" placeholder="Nhap day"
                                    class="form-control"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Gia ban</label>
                                <input type="text" name="original_price" placeholder="Nhap gia ban"
                                    class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Giam gia</label>
                                <input type="text" name="selling_price" placeholder="Nhap gia giam gia"
                                    class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Upload Image</label>
                                <input type="file" name="image" class="form-control mb-2">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mb-0">Quantity</label>
                                    <input type="number" name="qty" placeholder="Nhap bao nhieu cai"
                                        class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <br><label class="mb-0">Status</label>
                                    <input type="checkbox" name="status">
                                </div>
                                <div class="col-md-3">
                                    <br><label class="mb-0">Trending</label>
                                    <input type="checkbox" name="trending">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta Title</label>
                                <input type="text" name="meta_title" placeholder="Nhap day" class="form-control mb-2">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta Description</label>
                                <textarea rows="3" name="meta_description" placeholder="Nhap day"
                                    class="form-control"></textarea>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label class="mb-0">Meta Keywords</label>
                                <textarea rows="3" name="meta_keywords" placeholder="Nhap day"
                                    class="form-control"></textarea>
                            </div>

                            <div class="col-md-12 mb-4"><button type="submit" class="btn btn-primary"
                                    name="add_product_btn">Save</button></div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>