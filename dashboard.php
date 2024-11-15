<?php
include 'private/config/autoload.php';
spl_autoload_register(function ($class) {
    include_once CLASSES . $class . '.php';
});
$dashboard = new DashboardClass();
$dashboard->index();
$student = $dashboard->student();
$jhs_subject = $dashboard->jhs_subjects();
$shs_subjects_first_semester = $dashboard->shs_subjects_first_semester();
$shs_subjects_second_semester = $dashboard->shs_subjects_second_semester();
// print_r($_SESSION);
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
    <?php include ASSET . 'include/student-dash-nav.php'; ?>

    <div class="container">

        <div class="row mt-5">
            <div class="col-sm-6">
                <div class="card bg-light shadow border-0">
                    <div class="card-body ">
                        <div class="justify-content-center d-flex">
                            <img src="<?= ASSET . 'uploads/' . Session::get('student_profile'); ?>" class="mt-3 rounded-circle " width="150px" height="150px">

                        </div>
                        <div class="justify-content-center d-flex">
                            <h3>Profile</h3>
                        </div>
                        <table class="table mt-3">
                            <!-- <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>YEAR LEVEL</th>
                                </tr>
                            </thead> -->
                            <tbody>
                                <?php foreach ($student as $row): ?>
                                    <tr>
                                        <th>NAME :</th>
                                        <td><?= $row->ST_FNAME . ', ' . $row->ST_LNAME . ' ' . $row->ST_MI ?></td>

                                    </tr>
                                    <tr>
                                        <th>YEAR LEVEL :</th>
                                        <td><?= $row->ST_YEAR_LEVEL ?></td>
                                    </tr>
                                    <?php if ($row->ST_YEAR_LEVEL == 'Grade 11' || $row->ST_YEAR_LEVEL == 'Grade 12'): ?>
                                        <tr>
                                            <th>STRAND :</th>
                                            <td><?= $row->ST_TRACK_STRAND ?></td>
                                        </tr>
                                    <?php endif; ?>

                                    <tr>
                                        <th>STATUS :</th>
                                        <td><?= $row->ST_STATUS ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card bg-light shadow border-0">
                    <div class="card-body ">
                        <div class="justify-content-center d-flex">
                            <h3>Enrolled Subjects</h3>
                        </div>
                        <?php if ($row->ST_YEAR_LEVEL == 'Grade 11' || $row->ST_YEAR_LEVEL == 'Grade 12'): ?>
                            <table class="table mt-3 table-bordered">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>SUBJECT</th>
                                        <th>SEMESTER</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php $no = 1;
                                    if ($row->ST_STATUS == 'Enrolled' && $row->ST_SEMESTER == 'First' && $shs_subjects_first_semester): ?>
                                        <?php foreach ($shs_subjects_first_semester as $row): ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->SUBJECT ?></td>
                                                <td><?= $row->SEMESTER ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php elseif ($row->ST_STATUS == 'Enrolled' && $row->ST_SEMESTER == 'Second' && $shs_subjects_second_semester): ?>
                                        <?php foreach ($shs_subjects_second_semester as $row): ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->SUBJECT ?></td>
                                                <td><?= $row->SEMESTER ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="3">No Subject!</td>
                                        </tr>
                                    <?php endif; ?>


                                </tbody>
                            </table>
                        <?php else: ?>
                            <table class="table mt-3 table-bordered">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>SUBJECT</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php $no = 1;
                                    if ($row->ST_STATUS == 'Enrolled' && $jhs_subject): ?>
                                        <?php foreach ($jhs_subject as $row): ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->SUBJECT ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="3">No Subject!</td>
                                        </tr>
                                    <?php endif; ?>


                                </tbody>
                            </table>
                        <?php endif; ?>


                    </div>
                </div>

            </div>
        </div>

    </div>

    <script src="<?= ASSET . 'bootstrap/js/bootstrap.min.js'; ?>"></script>
</body>

</html>