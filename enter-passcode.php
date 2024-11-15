<?php
include 'private/config/autoload.php';
spl_autoload_register(function ($class) {
    include_once CLASSES . $class . '.php';
});
$forgot_password = new ForgotPasswordClass();
$forgot_password->send_passcode();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sto. Rosario National High School</title>
    <link rel="shortcut icon" href="<?= ASSET . 'img/logo.jpeg'; ?>" type="image/x-icon">

    <link rel="stylesheet" href="https://cdn.lineicons.com/5.0/lineicons.css" />
    <link href="<?= ASSET . 'fontawesome/css/all.min.css'; ?>" rel="stylesheet">
    <link href="<?= ASSET . 'bootstrap/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <link href="<?= ASSET . 'css/style.css'; ?>" rel="stylesheet">

</head>

<body>
    <?php include ASSET . 'include/main-nav.php'; ?>

    <div class="container">

        <div class="row justify-content-center d-flex mt-5 mb-5">
            <?php include ALERT; ?>
            <div class="col-sm-5  mt-2">
                <div class="card  bg-light">
                    <div class="card-header">
                        Please enter your PASSCODE.
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="input-group mb-3 mt-3">
                                <span class="input-group-text">#</span>
                                <input required type="number" class="form-control" name="passcode" placeholder="Enter Pass Code">
                            </div>

                            <div class="mb-3">
                                <button name="submit" class="btn btn-blue">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src="<?= ASSET . 'bootstrap/js/bootstrap.min.js'; ?>"></script>
</body>

</html>