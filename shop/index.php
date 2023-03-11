<?php
include('funtions/userfunctions.php');
include('includes/header.php');
include('includes/slider.php');
?>

<div class="py-5" style="background-image:url('images/img/banner1.png'); width: 100%; height:100%px;">
    <div class="container1">
        <div data-aos="zoom-in-up" class="top-title"><span><img src="images/img/small-logos/title.svg" alt=""></span>
            <h3>Our Top Categories</h3>
        </div>
        <div class="container">
            <div class="row">
                <?php
                $categories = getAllActive("categories");
                if (mysqli_num_rows($categories) > 0) {
                    foreach ($categories as $item) {
                ?> <div data-aos="fade-up" class="col-md-4 mb-2">
                            <a style="text-decoration: none;" href="products.php?category=<?= $item['slug'] ?>">
                                <div class="card shadow ">
                                    <div class="card-body"><img src="uploads/<?= $item['image'] ?>" alt="Ảnh Categories" class="w-70" height="350">
                                        <h4 class="text-center" style="color: black ; font-weight: bold;"><?= $item['name'] ?>
                                        </h4>
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
        </div>
    </div>
</div>

<div id="xuong"></div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 data-aos="fade-down">Deal Of The days</h2>
                <div class="owl-carousel animate__animated animate__fadeInUp">
                    <?php
                    $trendingProducts = getAllTrending();
                    if (mysqli_num_rows($trendingProducts) > 0) {
                        foreach ($trendingProducts as $item) {
                    ?> <div class="item">
                                <a style="text-decoration: none;" href="product-view.php?product=<?= $item['slug'] ?>">
                                    <div class="card shadow">
                                        <div class="card-body"><img src="uploads/<?= $item['image'] ?>" alt="Ảnh San Pham" class="w-100" height="250">
                                            <h6 class="text-center"><?= $item['name'] ?></h6>
                                            <h5 class="text-center"><?= $item['selling_price'] ?>₫</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="py-1">
                    <div class="mx-auto">
                        <div class="rounded bg-gradient-1 text-dark p-5 text-center shadow">
                            <h2 class="mb-4 font-weight-bold text-uppercase">SALES Of The days </h2>
                            <!-- <div id="clock-b" class="text-dark countdown-circles  text-dark d-flex flex-wrap justify-content-center pt-4"></div> -->
                            <div id="time" class="text-dark countdown-circles  text-dark d-flex flex-wrap justify-content-center pt-4">
                                <div id="days" class="css_countdown">00</div>
                                <div id="hours" class="css_countdown">00</div>
                                <div id="minutes" class="css_countdown">00</div>
                                <div id="seconds" class="css_countdown">00</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row animate__animated animate__fadeInUp">
                <?php
                $trendingProducts = getSanpham_1();
                if (mysqli_num_rows($trendingProducts) > 0) {
                    foreach ($trendingProducts as $item) {
                ?> <div class="col-md-3 md-2 mt-3">
                            <a style="text-decoration: none;" href="product-view.php?product=<?= $item['slug'] ?>">
                                <div class="card shadow">
                                    <div class="card-body"><img src="uploads/<?= $item['image'] ?>" alt="Ảnh San Pham" class="w-100" height="250">
                                        <h6 class="text-center"><?= $item['name'] ?></h6>

                                        <div class="row">
                                            <h5 class="text-center"><?= $item['selling_price'] ?>₫

                                                <?php if ($item['original_price'] != 0) {
                                                ?>

                                                    <s class="text-decoration-line-through text-danger" class="text-danger"><?= $item['original_price'] ?>₫ </s>

                                                <?php
                                                } ?>

                                            </h5>
                                        </div>
                                        <div class="text-center"><button type="button" class="btn btn-outline-primary">Primary</button></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>

<div class="py-5" style="background-image:url('images/img/background.png'); width: 100%; height:100%px;margin-bottom: 50px;">
    <div class="nd_video">
        <div class="nd_video1">
            <h5>New Arrivals</h5>
            <h2>Browse Style 50% Off Our New Product</h2>
            <button type="button" class="btn mb-2 mb-md-0 btn-primary btn-sm">Shop Now <i class="icon-effect ion-ios-arrow-round-forward"></i></button>
        </div>
        <div class="nd_video2">
            <iframe width="700" height="400" src="https://www.youtube.com/embed/2iidlwQ-NfU?start=3" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
</div>

<div class="py-5 bg-f2f2f2 background-color: antiquewhite;">
    <div class="container">
        <div class="row" style="text-align: center;">
            <div class=" col-md-12">
                <div class="animate__animated animate__fadeInUp">-- WOW --</div>
                <h4 data-aos=" fade-down" style="text-transform: uppercase;">Free shipping for orders over 150d</h4>
            </div>
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 data-aos="fade-down">Sản Phảm Yêu Thích</h2>
                <div class="owl-carousel">
                    <?php
                    $trendingProducts = getAllTrending();
                    if (mysqli_num_rows($trendingProducts) > 0) {
                        foreach ($trendingProducts as $item) {
                    ?> <div class="item">
                                <a style="text-decoration: none;" href="product-view.php?product=<?= $item['slug'] ?>">
                                    <div class="card shadow">
                                        <div class="card-body"><img src="uploads/<?= $item['image'] ?>" alt="Ảnh San Pham" class="w-100" height="250">
                                            <h6 class="text-center"><?= $item['name'] ?></h6>
                                            <h5 class="text-center"><?= $item['selling_price'] ?>₫</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-f2f2f2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 data-aos="fade-down">— CUSTOMER TESTIMONIAL</h4>
                <p style="font-size: 40px;">“A million thanks again for what you are doing - your work has been
                    incredibly helpful to me, and I
                    am getting lots of compliments on my style. And this is from someone who used to feel defeated
                    standing in front of my wardrobe every morning. ”</p>
                <p class="animate__animated animate__jello" style="font-size: 20px;">
                    <a href="" style="text-decoration: none;text-transform: uppercase;background-color: cyan;padding: 10px 30px;display: inline-block;color: black;margin-top: 15px;">Read
                        more</a>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="py-5 mt-5" style="background-color: antiquewhite;">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="text-align: center;">
                <h4 data-aos="fade-down" style="font-size: 50px;">Not Sure Where To Begin?</h4>
                <p class="animate__animated animate__shakeX" style="font-size: 20px;">
                    <a href="" style="text-decoration: none;text-transform: uppercase;background-color: white;padding: 10px 30px;display: inline-block;color: black;margin-top: 15px;">START
                        HERE</a>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 data-aos="fade-down">Sản Phảm Yêu Thích</h4>
                <hr>
                <div class="owl-carousel owl-carousel1">
                    <?php
                    $trendingProducts = getAllProduct();
                    if (mysqli_num_rows($trendingProducts) > 0) {
                        foreach ($trendingProducts as $item) {
                    ?> <div class="item">
                                <a style="text-decoration: none;" href="product-view.php?product=<?= $item['slug'] ?>">
                                    <div class="card shadow">
                                        <div class="card-body"><img src="uploads/<?= $item['image'] ?>" alt="Ảnh San Pham" class="w-100" height="250">
                                            <h6 class="text-center"><?= $item['name'] ?></h6>
                                            <h5 class="text-center"><?= $item['selling_price'] ?>₫</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php') ?>
<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                    // de 5 thi hien ra 5 san phma
                }
            },
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
        })
    });

    $(document).ready(function() {
        $('.owl-carousel1').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 6
                    // de 5 thi hien ra 5 san phma
                }
            },
        })
    });
</script>

<script>
    let days = document.getElementById('days');
    let hours = document.getElementById('hours');
    let minutes = document.getElementById('minutes');
    let seconds = document.getElementById('seconds');

    let endDate = '01/01/2024 00:00:00';

    let x = setInterval(function() {
        let now = new Date(endDate).getTime();
        let countDown = new Date().getTime();
        let distance = now - countDown;

        let d = Math.floor(distance / (1000 * 60 * 60 * 24));
        let h = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let m = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let x = Math.floor((distance % (1000 * 60)) / (1000));

        days.innerHTML = d + "<br><span>Days<span>";
        hours.innerHTML = h + "<br><span>hours<span>";
        minutes.innerHTML = m + "<br><span>minutes<span>";
        seconds.innerHTML = x + "<br><span>seconds<seconds>";

    })
</script>