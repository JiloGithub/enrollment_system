<?php
include '../private/config/autoload.php';

spl_autoload_register(function ($class) {
    include_once ADMIN_CLASSES . $class . '.php';
});

$dash = new DashboardClass;
$dash->index();
$new_students = $dash->new_student();
$enrolled = $dash->total_of_enrolled();
$dropped = $dash->total_of_dropped();
$instructor = $dash->total_of_instructor();
$users = $dash->total_of_users();
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
                    <?php include ADMIN_ALERT; ?>
                    <div class="row mt-5">
                        <div class="col-sm-3">
                            <div class="card mb-3 dash-card1">
                                <div class="card-header">
                                    <strong>ENROLLED STUDENTS</strong>
                                </div>
                                <div class="card-body p-3 justify-content-between d-flex">
                                    <div class="icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="text">
                                        <?php if ($enrolled): ?>
                                            <h3><?= $enrolled ?></h3>
                                        <?php else: ?>
                                            <h3>0</h3>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card mb-3 dash-card2">
                                <div class="card-header">
                                    <strong>DROPPED STUDENTS</strong>
                                </div>
                                <div class="card-body p-3 justify-content-between d-flex">
                                    <div class="icon">
                                        <i class="fas fa-user-times"></i>
                                    </div>
                                    <div class="text">
                                        <?php if ($dropped): ?>
                                            <h3><?= $dropped ?></h3>
                                        <?php else: ?>
                                            <h3>0</h3>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card mb-3 dash-card3">
                                <div class="card-header">
                                    <strong>INSTRUCTORS</strong>
                                </div>
                                <div class="card-body p-3 justify-content-between d-flex">
                                    <div class="icon">
                                        <i class="fas fa-user-secret"></i>
                                    </div>
                                    <div class="text">
                                        <?php if ($instructor): ?>
                                            <h3><?= $instructor ?></h3>
                                        <?php else: ?>
                                            <h3>0</h3>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card mb-3 dash-card4">
                                <div class="card-header">
                                    <strong>USERS</strong>
                                </div>
                                <div class="card-body p-3 justify-content-between d-flex">
                                    <div class="icon">
                                        <i class="fas fa fa-user-circle"></i>
                                    </div>
                                    <div class="text">
                                        <?php if ($users): ?>
                                            <h3><?= $users ?></h3>
                                        <?php else: ?>
                                            <h3>0</h3>
                                        <?php endif; ?>
                                    </div>
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