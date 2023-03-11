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
                $users = getByID("users", $id);
                if (mysqli_num_rows($users) > 0) {
                    $data = mysqli_fetch_array($users)
            ?>
            <div class="card">
                <div class="card-header">
                    <h4>Quan Ly Nguoi Dung
                        <a href="users.php" class="btn btn-warning float-end">
                            <i class="fa fa-reply-all"></i>
                            Back
                        </a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5">
                                <input type="hidden" name="users_id" value="<?= $data['id'] ?>">
                                <label style="color: black; font-size: large;" for="">Name</label>
                                <input type="text" name="name" value="<?= $data['name'] ?>" placeholder="Nhap day"
                                    class="form-control">
                            </div>
                            <div class="col-md-5">
                                <label style="color: black; font-size: large;" for="">Email</label>
                                <input type="text" name="email" value="<?= $data['email'] ?>" placeholder="Nhap day"
                                    class="form-control">
                            </div>
                            <div class="col-md-5 mt-3">
                                <label style="color: black; font-size: large;" for="">Phone</label>
                                <input type="text" name="phone" value="<?= $data['phone'] ?>" placeholder="Nhap day"
                                    class="form-control">
                            </div>
                            <div class="col-md-5 mt-3">
                                <label style="color: black; font-size: large;" for="">Password</label>
                                <input type="text" name="password" value="<?= $data['password'] ?>"
                                    placeholder="Nhap day" class="form-control">
                            </div>
                            <div class="col-md-5 mt-3">
                                <label style="color: black; font-size: large;" for="">Phan Quyen Admin</label>
                                <input type="checkbox" <?= $data['role_as'] == '0' ? '' : 'checked' ?> name="role_as">
                            </div>
                            <div class="col-md-12"><button type="submit" class="btn btn-primary"
                                    name="update_users_btn">Cap Nhap</button></div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
                } else {
                    echo "KHONG TIM THAY CATEGORY";
                }
            } else {
                echo "Loi ID roi ";
            }
            ?>

        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>
}