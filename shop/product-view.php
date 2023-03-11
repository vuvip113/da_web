<?php

include('funtions/userfunctions.php');
include('includes/header.php');

if (isset($_GET['product'])) {
    $product_slug = $_GET['product'];
    $product_data = getSlugActive("products", $product_slug);
    $product = mysqli_fetch_array($product_data);
    if ($product) {
?>
        <div class="py-3 bg-bl">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-caret">
                        <li class="breadcrumb-item"><a style="text-decoration: none; color: #798384;" href="index.php" class="text-uppercase">Home</a></li>
                        <li class="breadcrumb-item"><a style="text-decoration: none; color: #798384;" href="categories.php" class="text-uppercase">Colections</a></li>
                        <li aria-current="page" class="breadcrumb-item active text-uppercase"><?= $product['name']; ?></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="bg-light py-4">
            <div class="container product_data mt-3">
                <div class="row">
                    <div class="col-md-4">
                        <div class="shadow">
                            <img src="uploads/<?= $product['image']; ?>" alt="Anh San Pham" class="w-100" height="400">
                        </div>
                    </div> 
                    <div class="col-md-8">
                        <h3 class="fw-bold text-dark" style="font-size: 30px;letter-spacing: 5px;"><?= $product['name']; ?>
                            <h5><span class="float-end text-danger"><?php if ($product['trending']) {
                                                                        echo "Trending";
                                                                    } ?></span></h5>
                        </h3>
                        <hr>
                        <p style="font-size: 18px;"><?= $product['small_description']; ?></p>
                        <div class="row">
                            <div class="col-md-4">
                                <h4><span class="text-success fw-bold"><?= $product['selling_price']; ?></span><span style=" font-size: 17px;vertical-align: top;">₫</span></h4>
                            </div>
                            <?php if ($product['original_price'] != 0) {
                            ?><div class="col-md-4" style="position: relative;">
                                    <h4>
                                        <s class="text-decoration-line-through text-danger" class="text-danger"><?= $product['original_price']; ?> <span style="font-size: 17px;vertical-align: top;">₫</span></s>
                                    </h4>
                                </div><?php
                                    } ?>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="input-group mb-3" style="width: 120px;">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" class="form-control text-center input-qty bg-white" value="1" disabled">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-danger px-1"> <i class="fa fa-heart me-2"></i>Add to
                                    wishlist</button>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-5">
                                <button class="btn btn-outline-info px-4 addToCardBtn" value="<?= $product['id']; ?>"> <i class="fa fa-shopping-cart me-2"></i>Add to cart</button>
                            </div>
                            <div class="col-md-5">
                                <a href="cart.php">
                                    <button class="btn btn-outline-dark px-4"><i class="fa fa-shopping-bag"></i> Buy Now</button>
                                </a>
                            </div>

                        </div>
                        <hr>
                        <section class="border-b-4 pb-4 border-b-gray-300 ">
                            <div class="flex flex-col border-top border-2 ">
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 ">
                                    <div class="inline-block min-w-full sm:px-6 lg:px-8 ">
                                        <div class="overflow-hidden ">
                                            <table class="border min-w-full text-left ">
                                                <thead class="border-b bg-white-800">
                                                    <tr>
                                                        <th scope="col" colspan="2" class="px-2 text-lg font-extrabold text-gray-900 py-4">
                                                            Thong tin San Pham </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="bg-white border-b border-top border-1">
                                                        <td colspan="2" class="text-sm text-gray-900 font-light px-2 py-2 whitespace-normal border-r align-top">
                                                            <div><?= $product['description']; ?></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="border-b-4 pb-4 border-b-gray-300 border-top border-2">
                            <div class="flex flex-col">
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="overflow-hidden">
                                            <table class="border min-w-full text-left">
                                                <thead class="border-b bg-white-800">
                                                    <tr>
                                                        <th scope="col" colspan="2" class="px-2 text-lg font-extrabold text-gray-900 py-4">
                                                            Delivery Information
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="bg-white border-b border-top border-1">
                                                        <td colspan="2" class="text-sm text-gray-900 font-light px-2 py-2 whitespace-normal border-r align-top">
                                                            <div>Products are generally dispatched in 3-21 days depending upon the product you have ordered. But we guarantee that our products are worth the wait!. You will surely be amazed by the quality and the design that we offer at our price.</div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="border-b-4 pb-4 border-b-gray-300 ">
                            <div class="flex flex-col ">
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="overflow-hidden">
                                            <table class="border min-w-full text-left border-top border-2">
                                                <thead class="border-b bg-white-800">
                                                    <tr>
                                                        <th scope="col" colspan="2" class="px-2 text-lg font-extrabold text-gray-900 py-4 border-top border-2">
                                                            Returns
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="bg-white border-b border-top border-1">
                                                        <td colspan="2" class="text-sm text-gray-900 font-light px-2 py-2 whitespace-normal border-r align-top">
                                                            <div><a style="text-decoration: none; color: #000000;" href="">Please click here to know about our returns policy.</a></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
            </div>
        </div>

<?php
    } else {
        echo "Khong tim thay du lieu cho san pham";
    }
} else {
    echo "Loi duong kink";
}

include('includes/footer.php');
