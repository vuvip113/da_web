<?php


include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Nguoi Dung</h4>
                </div>
                <div class="card-body" id="users_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Password</th>
                                <th>Phan Quyen</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $users = getAll("users");
                            if (mysqli_num_rows($users) > 0) {
                                foreach ($users as $item) {
                            ?>
                            <tr>
                                <td><?= $item['id']; ?></td>
                                <td><?= $item['name']; ?></td>
                                <td><?= $item['email']; ?></td>
                                <td><?= $item['phone']; ?></td>
                                <td><?= $item['password']; ?></td>
                                <td><?= $item['role_as'] == '0' ? "Nguoi mua" : "Admin"  ?></td>
                                <td>
                                    <a href="edit-users.php?id=<?= $item['id']; ?>" class="btn btn-primary">Edit</a>
                                </td>
                            </tr>

                            <?php
                                }
                            } else {
                                echo "Khong tim thay";
                            }
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>