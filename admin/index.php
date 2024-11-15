<?php
include '../private/config/autoload.php';

spl_autoload_register(function ($class) {
    include_once ADMIN_CLASSES . $class . '.php';
});

$login = new LoginClass;
$login->index();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sto. Rosario National High School</title>
    <link rel="shortcut icon" href="<?= ADMIN_ASSET . 'img/logo.jpeg'; ?>" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.lineicons.com/5.0/lineicons.css" />
    <link href="<?= ADMIN_ASSET . 'bootstrap/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <link href="<?= ADMIN_ASSET . 'css/style.css'; ?>" rel="stylesheet">

</head>

<body class="admin-body">


    <div class="container">

        <div class="row mt-5 mb-5 justify-content-center ">
            <div class="col-md-5 p-5 shadow bg-light rounded">

                <?php include ADMIN_ALERT; ?>

                <form action="" method="POST">
                    <div class="login-header text-center mb-5">
                        <img src="<?= ADMIN_ASSET . 'img/logo.jpeg' ?>" width="80px" height="80px">
                        <h2>LOGIN</h2>
                    </div>


                    <div class="input-group mb-3 mt-3">
                        <span class="input-group-text"><i class="lni lni-envelope-1"></i></span>
                        <input type="email" class="form-control" name="email" placeholder="Enter email address">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="lni lni-locked-2"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                    </div>
                    <!-- <div class="mb-3">
                        <a class="text-decoration-none" style="color: #4e73df;" href="">Forgot password?</a>
                    </div> -->

                    <div class="mb-3">
                        <button class="btn btn-blue" name="login">Login</button>
                    </div>
                </form>
            </div>

        </div>

    </div>

    <script src="<?= ADMIN_ASSET . 'bootstrap/js/bootstrap.min.js'; ?>"></script>
</body>

</html>