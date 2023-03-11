<footer class="footer-bs">
    <div class="row">
        <div class="col-md-3 footer-brand animated fadeInLeft">
            <h2>Vfashx</h2>
            <p>Suspendisse hendrerit tellus laoreet luctus pharetra. Aliquam porttitor vitae orci nec ultricies.
                Curabitur vehicula, libero eget faucibus faucibus, purus erat eleifend enim, porta pellentesque ex mi ut
                sem.</p>
            <p>© 2045 Bootstrap, All rights reserved</p>
        </div>
        <div class="col-md-3 footer-nav animated fadeInUp">
            <h4>Menu —</h4>
            <div class="col-md-12">
                <ul class="list">
                    <li><a style="text-decoration: none;" href="#">About Us</a></li>
                    <li><a style="text-decoration: none;" href="#">Contacts</a></li>
                    <li><a style="text-decoration: none;" href="#">Terms & Condition</a></li>
                    <li><a style="text-decoration: none;" href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-3 footer-social animated fadeInDown">
            <h4>Follow Us</h4>
            <ul>
                <li><a style="text-decoration: none;" href="#">Facebook</a></li>
                <li><a style="text-decoration: none;" href="#">Twitter</a></li>
                <li><a style="text-decoration: none;" href="#">Instagram</a></li>
                <li><a style="text-decoration: none;" href="#">RSS</a></li>
            </ul>
        </div>
        <div class="col-md-3 footer-ns animated fadeInRight">
            <h4>Newsletter</h4>
            <p>A rover wearing a fuzzy suit doesn’t alarm the real penguins</p>
            <p>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><i style="font-size: 15px;" class="bi bi-envelope-open-fill"></i>
                    </button>
                </span>
            </div><!-- /input-group -->
            </p>
            <!-- <div class="col-md-12"><iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1192.2346024816466!2d105.78517656446603!3d21.046036360500533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abb158a2305d%3A0x5c357d21c785ea3d!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyDEkGnhu4duIEzhu7Fj!5e0!3m2!1svi!2s!4v1670973352809!5m2!1svi!2s"
                    class="w-100" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe></div> -->
        </div>
    </div>
</footer>



<footer class="credit">
    <div class="py-2 bg-danger">
        <div class="text-center">
            <p class="mb-0 text-white">All rights reserved. Copyright @ Vanitas - <?= date('Y') ?></p>
        </div>
    </div>
</footer>


<script src="assets/js/jquery-3.6.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/custom.js"></script>

<script src="assets/js/aos.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>

<!-- alterify -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
    alertify.set('notifier', 'position', 'top-right');
    <?php if (isset($_SESSION['message'])) { ?>
        alertify.success('<?= $_SESSION['message']; ?>');
    <?php
        unset($_SESSION['message']);
    }

    ?>
</script>

<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>

</body>

</html>