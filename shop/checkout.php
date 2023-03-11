<?php

include('funtions/userfunctions.php');
include('includes/header.php');
include('authenticate.php');

$cartItems = getCartItems();
if (mysqli_num_rows($cartItems) == 0) {
    header('Location: index.php');
}
?>

<div class="py-3 bg-bl">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-caret ">
                <li class="breadcrumb-item"><a style="text-decoration: none; color: #798384;" href="index.php" class="text-uppercase">Home</a></li>
                <li class="breadcrumb-item"><a style="text-decoration: none; color: #798384;" href="checkout.php" class="text-uppercase">Thanh Toan</a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body shadow">
                <form action="funtions/placeorder.php" method="POST">
                    <div class="row">
                        <div class="col-md-7">
                            <h5>Chi tiet Nguoi Mua</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Ten</label>
                                    <input type="text" required name="name" id="name" placeholder="Nhap nhap dau du ten" class="form-control">
                                    <small class="text-danger name"></small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">E-mail</label>
                                    <input type="email" name="email" id="email" placeholder="Nhap email vao day" class="form-control">
                                    <small class="text-danger email"></small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">So dien thoai</label>
                                    <input type="number" name="phone" id="phone" placeholder="Nhap so dien thoai." class="form-control">
                                    <small class="text-danger phone"></small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Ma Pin</label>
                                    <input type="text" name="pincode" id="pincode" placeholder="Nhap ma pin." class="form-control">
                                    <small class="text-danger pincode"></small>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Dia chi</label>
                                    <textarea name="address" id="address" class="form-control" rows="3"></textarea>
                                    <small class="text-danger address"></small>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <h5>Chi tiet Don Hang</h5>
                            <br>
                            <?php
                            $items = getCartItems();
                            $totalPrice = 0;
                            foreach ($items as $citem) {
                            ?>
                                <div class="mb-1 border">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <img src="uploads/<?= $citem['image'] ?>" alt="anh" width="70px">
                                        </div>
                                        <div class="col-md-5">
                                            <label><?= $citem['name'] ?></label>
                                        </div>
                                        <div class="col-md-3">
                                            <label><?= $citem['selling_price'] ?></label>
                                        </div>
                                        <div class="col-md-2">
                                            <label>x <?= $citem['prod_qty'] ?></label>
                                        </div>
                                    </div>
                                </div>

                            <?php
                                $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
                            }
                            ?><br>
                            <h5 style="color: red;font-weight: bold;">TONG GIA: <span class="float-end fw-bold"><?= $totalPrice ?></span></h5>
                            <div class="">
                                <input type="hidden" name="payment_mode" value="COD">
                                <!-- <input type="hidden" name="payment_id" value=""> -->

                                <button type="submit" name="placeOrderBtn" class="btn btn-primary w-100">Xac Nhan Va
                                    Thanh Toan </button>
                                <div> <a class="btn bg-primary w-100 text-white mt-3" href="vnpay_php">Thanh toan
                                        VNPAY</a>
                                </div>
                                <div id="paypal-button-container" class="mt-3"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php') ?>

<!-- Replace "test" with your own sandbox Business account app client ID -->
<script src="https://www.paypal.com/sdk/js?client-id=AdYocPdY2eg6Yn4Rt8b9inhYi8BKB-GWiO3ucPwosL7iSFQUFsqEEYw18XyI5RqsEMCx9m-VSvCBYOTM&currency=USD">
</script>
<script>
    paypal.Buttons({
        onClick() {
            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var pincode = $('#pincode').val();
            var address = $('#address').val();
            if (name.length == 0) {
                $('.name').text("*Dien thong tin !!!");
            } else {
                $('.name').text("");
            }
            if (email.length == 0) {
                $('.email').text("*Dien thong tin !!!");
            } else {
                $('.email').text("");
            }
            if (phone.length == 0) {
                $('.phone').text("*Dien thong tin !!!");
            } else {
                $('.phone').text("");
            }
            if (pincode.length == 0) {
                $('.pincode').text("*Dien thong tin !!!");
            } else {
                $('.pincode').text("");
            }
            if (address.length == 0) {
                $('.address').text("*Dien thong tin !!!");
            } else {
                $('.address').text("");
            }

            if (name.length == 0 || email.length == 0 || phone.length == 0 || pincode.length == 0 || address
                .length == 0) {
                return false;
            }
        },
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?= $totalPrice ?>' //Can also reference a variable or function
                    }
                }]
            });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {

                const transaction = orderData.purchase_units[0].payments.captures[0];

                var name = $('#name').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var pincode = $('#pincode').val();
                var address = $('#address').val();

                var date = {
                    'name': name,
                    'email': email,
                    'phone': phone,
                    'pincode': pincode,
                    'address': address,
                    'payment_mode': "Paid by PayPal",
                    'payment_id': transaction.id,
                    'placeOrderBtn': true
                };

                $.ajax({
                    method: "POST",
                    url: "funtions/placeorder.php",
                    data: data,
                    success: function(response) {
                        if (response == 201) {
                            alertify.success("Thanh Toan Thanh Cong");
                            //actions.redirect('my-orders.php');
                            window.location.href = 'my-orders.php';
                        }
                    }
                })
                // When ready to go live, remove the alert and show a success message within this page. For example:
                // const element = document.getElementById('paypal-button-container');
                // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                // Or go to another URL:  actions.redirect('thank_you.html');
            });
        }
    }).render('#paypal-button-container');
</script>