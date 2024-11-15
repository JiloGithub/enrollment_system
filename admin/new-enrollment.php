<?php
include '../private/config/autoload.php';

spl_autoload_register(function ($class) {
    include_once ADMIN_CLASSES . $class . '.php';
});

$new_enrollment = new NewEnrollmentClass;
$new_enrollment->index();
$new_students = $new_enrollment->new_student();
$data = $new_enrollment->fetch_students();
$new_enrollment->confirm_student();
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
    <link href="<?= ADMIN_ASSET . 'css/datatables.min.css'; ?>" rel="stylesheet">

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


                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <div class="card shadow border-0 p-3 bg-light">

                                <div class="card-body">

                                    <?php include ADMIN_ALERT; ?>

                                    <div class="mb-5 justify-content-between d-flex">
                                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">New Enrollees</li>
                                            </ol>
                                        </nav>
                                    </div>

                                    <table class="table table-bordered bg-body" id="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>STUDENT</th>
                                                <th>YEAR LEVEL</th>
                                                <th>STATUS</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($data): ?>
                                                <?php
                                                $no = 1;
                                                foreach ($data as $row):
                                                ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $row->ST_LNAME . ', ' . $row->ST_FNAME . ' ' . $row->ST_MI . ' ' . $row->ST_EXT_NAME ?></td>
                                                        <td><?= $row->ST_YEAR_LEVEL ?></td>
                                                        <td><?= $row->ST_STATUS ?></td>
                                                        <td class="justify-content-center d-flex">
                                                            <form action="" method="post">
                                                                <input type="hidden" name="student_id" value="<?= $row->STUDENT_ID ?>">
                                                                <input type="hidden" name="student_email" value="<?= $row->ST_EMAIL ?>">
                                                                <input type="hidden" name="student_firstname" value="<?= $row->ST_FNAME ?>">
                                                                <input type="hidden" name="student_lastname" value="<?= $row->ST_LNAME ?>">
                                                                <button class="btn btn-sm btn-green" onclick="return window.confirm('Are you want to approve?')" name="confirm-student"><i class="fas fa-check"></i> Approve</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>

                                            <?php endif; ?>
                                        </tbody>
                                    </table>
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
    <script src="<?= ADMIN_ASSET . 'js/datatables.min.js'; ?>"></script>
    <script src="<?= ADMIN_ASSET . 'js/sidebar-toggle.js'; ?>"></script>
</body>

</html>