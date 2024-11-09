<?php
include '../private/config/autoload.php';

spl_autoload_register(function ($class) {
    include_once ADMIN_CLASSES . $class . '.php';
});

$account = new AccountClass;
$account->index();
$account->update_account();
$new_students = $account->new_student();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sto. Rosario National High School</title>
    <link rel="shortcut icon" href="<?= ADMIN_ASSET . 'img/logo.jpeg'; ?>" type="image/x-icon">

    <link href="<?= ADMIN_ASSET . 'fontawesome/css/all.min.css'; ?>" rel="stylesheet">
    <link href="<?= ADMIN_ASSET . 'bootstrap/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <link href="<?= ADMIN_ASSET . 'css/style.css'; ?>" rel="stylesheet">

</head>

<body>


    <div class="d-flex">
        <!-- Sidebar -->
        <?php include_once ADMIN_ASSET . 'include/sidebar.php'; ?>


        <div class="main">
            <!-- Navbar -->
            <?php include_once ADMIN_ASSET . 'include/navbar.php'; ?>

            <!-- Main Content-->
            <main class="p-3">
                <div class="container-fluid">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Account</li>
                        </ol>
                    </nav>

                    <div class="row mt-5 justify-content-center">
                        <div class="col-sm-8">
                            <div class="card shadow border-0 p-3 bg-light">
                                <div class="card-header">
                                    Update Credentials
                                </div>
                                <div class="card-body">
                                    <?php include ADMIN_ALERT; ?>
                                    <form action="" method="post">
                                        <div class="mb-3 mt-3 row">
                                            <label class="col-sm-4 col-form-label">Username :</label>
                                            <div class="col-sm-8">
                                                <input type="hidden" name="user_id" class="form-control" value="<?= Session::get('admin_id'); ?>">
                                                <input type="text" name="username" class="form-control" value="<?= Session::get('admin_username'); ?>">
                                            </div>
                                        </div>
                                        <div class="mb-5 row">
                                            <label class="col-sm-4 col-form-label">Email Address :</label>
                                            <div class="col-sm-8">
                                                <input type="text" disabled class="form-control" value="<?= Session::get('admin_email'); ?>">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-4 col-form-label">Change Password :</label>
                                            <div class="col-sm-8">
                                                <input type="password" name="password" class="form-control" placeholder="Change Password">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-4 col-form-label">Confirm Password :</label>
                                            <div class="col-sm-8">
                                                <input type="password" name="c_password" class="form-control" placeholder="Confirm Password">
                                            </div>
                                        </div>


                                        <div class="mb-3">
                                            <button name="update" class="btn btn-blue">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </main>
        </div>


    </div>

    <script src="<?= ADMIN_ASSET . 'bootstrap/js/bootstrap.min.js'; ?>"></script>
    <script src="<?= ADMIN_ASSET . 'js/jquery.js'; ?>"></script>
    <script src="<?= ADMIN_ASSET . 'js/sidebar-toggle.js'; ?>"></script>
</body>

</html>