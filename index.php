<?php
include 'private/config/autoload.php';
spl_autoload_register(function ($class) {
    include_once CLASSES . $class . '.php';
});
$home = new HomeClass();
$schedule = $home->fetch_schedule();
$home = $home->login();
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

        <div class="row mt-5 mb-5">
            <?php include ALERT; ?>
            <div class="col-sm-5 mt-2">
                <div class="card p-3 bg-light">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="lni lni-envelope-1"></i></span>
                                <input required type="email" class="form-control" name="email" placeholder="Enter email address">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="lni lni-locked-2"></i></span>
                                <input required type="password" class="form-control" name="password" placeholder="Enter Password">
                            </div>
                            <div class="mb-3">
                                <a class="text-decoration-none" style="color: #4e73df;" href="">Forgot password?</a>
                            </div>

                            <div class="mb-3">
                                <button name="login" class="btn btn-blue">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-7 mt-2">
                <div class="card p-3 bg-light">
                    <div class="card-header">
                        Schedule
                    </div>
                    <div class="card-body">
                        <?php if ($schedule): ?>
                            <?php foreach ($schedule as $row): ?>
                                <li><a href="main-schedule.php?id=<?= $row->SCHEDULE_ID ?>"><?= $row->SC_INSTRUCTOR ?></a></li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li>No scheduled!</li>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <script src="<?= ASSET . 'bootstrap/js/bootstrap.min.js'; ?>"></script>
</body>

</html>