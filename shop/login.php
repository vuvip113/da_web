<?php
session_start();

if (isset($_SESSION['auth'])) {
    $_SESSION['message'] = "Ban da dang nhap";
    header('location:index.php');
    exit();
}


include('includes/header.php') ?>


<div class="py-1 wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?= $_SESSION['message']; ?>.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php unset($_SESSION['message']);
                } ?>
            </div>
        </div>
    </div>
</div>
<div class="wrapper">
    <div class="container main">
        <div class="row row123">
            <div class="col-md-6 side-image">
                <!-------Image-------->
                <div class="img1"><img src="images/white.png" alt=""></div>
                <div class="text">
                    <p>Join the community of developers <i>- ludiflex</i></p>
                </div>
            </div>
            <div class="col-md-6 right">
                <div class="input-box">
                    <header>Login</header>
                    <form action="funtions/authcode.php" method="POST">
                        <div class="input-field">
                            <!-- <input type="text" class="input" id="email" required autocomplete="off"> -->
                            <input type="email" class="input" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required autocomplete="off">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field">
                            <!-- <input type="password" class="input" id="password" required> -->
                            <input type="password" class="input" name="password" class="form-control" required id="exampleInputPassword1">
                            <label for="password">Password</label>
                        </div>
                        <div class="input-field">
                            <input type="submit" name="login_btn" class="submit" value="Login Up">

                        </div>
                        <div class="signin">
                            <span>Don't have an account? <a href="register.php">Register in here</a></span>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php') ?>