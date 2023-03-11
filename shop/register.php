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
                            <input type="text" class="input" name="name" class="form-control" required autocomplete="off">
                            <label for="text">Name</label>
                            <!-- <input required type="text" name="name" class="form-control" placeholder="Enter your name"> -->
                        </div>
                        <div class="input-field">
                            <input type="number" class="input" name="phone" class="form-control" required>
                            <label for="phone">Phone</label>
                            <!-- <input required type="number" name="phone" class="form-control" placeholder="Enter your phone number"> -->
                        </div>
                        <div class="input-field">
                            <input type="email" name="email" class="input" required id="exampleInputEmail1" aria-describedby="emailHelp">
                            <label for="exampleInputEmail1">Email</label>
                            <!-- <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input required type="email" name="email" class="form-control" placeholder="Enter your email" id="exampleInputEmail1" aria-describedby="emailHelp"> -->

                        </div>
                        <div class="input-field">
                            <input type="password" class="input" name="password" class="form-control" required id="exampleInputPassword1">
                            <label for="exampleInputPassword1">Password</label>
                            <!-- <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input required type="password" name="password" class="form-control" placeholder="Enter password" id="exampleInputPassword1"> -->

                        </div>
                        <div class="input-field">
                            <input type="password" class="input" name="cpassword" class="form-control" required>
                            <label>Confirm Password</label>
                            <!-- <label class="form-label">Confirm Password</label>
                            <input required type="password" name="cpassword" class="form-control" placeholder="Confirm password"> -->
                        </div>



                        <div class="input-field">
                            <input type="submit" name="register_btn" class="submit" value="Register">
                            <!-- <button type="submit" name="register_btn" class="btn btn-primary" style=" color: white;background-color: #1c1c1e;border: none;outline: none;border-radius: 2px;font-size: 20px;padding: 5px 12px;font-weight: 500;">Submit</button> -->
                        </div>
                        <div class="signin">
                            <span>Already have an account? <a href="login.php">Login in here</a></span>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>





<?php include('includes/footer.php') ?>