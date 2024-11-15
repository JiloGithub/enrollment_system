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

    <style>
        @media print {
            .main-nav {
                display: none;
            }

            .button {
                display: none;
            }
        }







        /* Add more specific styles as needed */
    </style>

</head>

<body>
    <?php include ASSET . 'include/student-dash-nav.php'; ?>

    <div class="button text-end mt-5">
        <button onclick="window.print()" class="btn btn-success mx-3"><i class="fa fa-print"></i>Print</button>
    </div>
    <div class="container-fluid">
        <div class="header text-center mb-5">
            <img src="<?= ASSET . 'img/logo.jpeg' ?>" width="80px" height="80px">
            <h3>Republic of the Philippines</h3>
            <h4>Department of Education</h4>
            <p>Region III - Central Luzon <br>
                Schools Division Office of Nueva Ecija <br>
                Sto. Rosario National High School <br>
                Sto. Rosario, Sto. Domingo, Nueva Ecija</p>
            <hr>
            <h3>CERTIFICATION</h3>
        </div>
        <div class="content">
            <p>To Whom It May Concern:</p>
            <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; This is to certify that <span>_______________________</span> is currently enrolled in this school as <span>_______________________</span> for the School Year 2024-2025 with LRN: <span>_______________________</span>.</p>
            <p>This certifies further that he/she has not been referred for any case of misbehavior nor violation of school rules.</p>
            <p>This certification is issued this <span>_______________________</span>.</p>
            <p class="text-end">Jenny L. Batalla, PhD<br>School Principal III</p>
        </div>
        <div class="footer ">
            <p>Not Valid Without Official School Seal</p>
            <!-- Add DepEd logo and other footer details here -->
        </div>
    </div>



    <script src="<?= ASSET . 'bootstrap/js/bootstrap.min.js'; ?>"></script>
</body>

</html>