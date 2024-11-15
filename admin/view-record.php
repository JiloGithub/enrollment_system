<?php
include '../private/config/autoload.php';

spl_autoload_register(function ($class) {
    include_once ADMIN_CLASSES . $class . '.php';
});

$record = new ViewRecordClass;
$record->index();
$new_students = $record->new_student();
$student = $record->fetch_student();

// Junior High School
$jhs_subject = $record->fetch_jhs_subject();
$jhs_grades = $record->jhs_fetch_grades();
$record->add_jhs_grades();

// Senior High School
$shs_subject = $record->fetch_shs_subject();
$shs_grades = $record->shs_fetch_grades();
$record->add_shs_grades();
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
    <!-- Add JHS record Modal -->
    <div class="modal fade" id="add-jhs-record-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST" id="junior_grade_form">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Record</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Subject:</label>
                            <input required class="form-control" value="<?= $_GET['student_id'] ?>" type="hidden" name="student_id">
                            <select class="form-control form-select" id="subject" required name="subject">
                                <option value="" selected hidden disabled>-- Subject --</option>
                                <?php foreach ($jhs_subject as $row): ?>
                                    <option><?= $row->SUBJECT ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>1st Grading:</label>
                            <input required class="form-control" id="1st_grading" type="number" name="1st_grading">
                        </div>
                        <div class="mb-3">
                            <label>2nd Grading:</label>
                            <input required class="form-control" id="2nd_grading" type="number" name="2nd_grading">
                        </div>
                        <div class="mb-3">
                            <label>3rd Grading:</label>
                            <input required class="form-control" id="3rd_grading" type="number" name="3rd_grading">
                        </div>
                        <div class="mb-3">
                            <label>4th Grading:</label>
                            <input required class="form-control" id="4th_grading" type="number" name="4th_grading">
                        </div>
                        <div class="mb-3">
                            <label>Final:</label>
                            <input required readonly class="form-control" id="final_grade" type="number" name="final_grade">
                        </div>
                        <div class="mb-3">
                            <input required class="form-control" id="remarks" type="hidden" name="remarks">
                        </div>
                        <div class="mb-3">
                            <input required class="form-control" id="year_level" value="<?= $_GET['year_level'] ?>" type="hidden" name="year_level">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add-jhs-record" class="btn btn-blue">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add SHS record Modal -->
    <div class="modal fade" id="add-shs-record-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST" id="senior_grade_form">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Record</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Subject:</label>
                            <input required class="form-control" value="<?= $_GET['student_id'] ?>" type="hidden" name="student_id">
                            <select class="form-control form-select" id="subject" required name="subject">
                                <option value="" selected hidden disabled>-- Subject --</option>
                                <?php foreach ($shs_subject as $row): ?>
                                    <option><?= $row->SUBJECT ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>1st Grading:</label>
                            <input required class="form-control" id="shs_1st_grading" type="number" name="1st_grading">
                        </div>
                        <div class="mb-3">
                            <label>2nd Grading:</label>
                            <input required class="form-control" id="shs_2nd_grading" type="number" name="2nd_grading">
                        </div>

                        <div class="mb-3">
                            <label>Final:</label>
                            <input required readonly class="form-control" id="shs_final_grade" type="number" name="final_grade">
                        </div>
                        <div class="mb-3">
                            <input required class="form-control" id="shs_remarks" type="hidden" name="remarks">
                            <input required class="form-control" id="year_level" value="<?= $_GET['year_level'] ?>" type="hidden" name="year_level">
                            <input required class="form-control" id="semester" value="<?= $_GET['semester'] ?>" type="hidden" name="semester">
                            <input required class="form-control" id="strand" value="<?= $_GET['strand'] ?>" type="hidden" name="strand">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add-shs-record" class="btn btn-blue">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


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



                                    <?php if ($_GET['year_level'] == 'Grade 7' || $_GET['year_level'] == 'Grade 8' || $_GET['year_level'] == 'Grade 9' || $_GET['year_level'] == 'Grade 10') : ?>
                                        <div class="mb-5 ">
                                            <nav class="justify-content-between d-flex" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                                <div class="left">
                                                    <ol class="breadcrumb">
                                                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                                        <li class="breadcrumb-item active" aria-current="page">Academic Record</li>
                                                    </ol>
                                                </div>
                                                <div class="right">
                                                    <button class="btn btn-sm btn-blue" id="add-jhs-record-btn" value="<?= $_GET['student_id'] ?>"><i class="fas fa-plus"></i> Record</button>
                                                </div>

                                            </nav>
                                        </div>
                                        <div class="mb-0 row">

                                            <label for="inputPassword" class="col-sm-1 col-form-label">Name :</label>
                                            <div class="col-sm-5 align-items-center d-flex">
                                                <strong><?= $student[0]->ST_FNAME . ', ' . $student[0]->ST_LNAME . ' ' . $student[0]->ST_MI ?></strong>
                                            </div>

                                            <label for="inputPassword" class="col-sm-1 col-form-label">LRN :</label>
                                            <div class="col-sm-5 align-items-center d-flex">
                                                <strong><?= $student[0]->ST_LRN  ?></strong>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">

                                            <label for="inputPassword" class="col-sm-2 col-form-label">Year Level :</label>
                                            <div class="col-sm-5 align-items-center d-flex">
                                                <strong><?= $student[0]->ST_YEAR_LEVEL  ?></strong>
                                            </div>
                                        </div>

                                        <table class="table table-bordered" style="width:90%;margin:auto;">
                                            <thead>
                                                <tr>
                                                    <th>Subject</th>
                                                    <th>1</th>
                                                    <th>2</th>
                                                    <th>3</th>
                                                    <th>4</th>
                                                    <th>Final</th>
                                                    <th>Remarks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if ($jhs_grades): ?>
                                                    <?php foreach ($jhs_grades as $row): ?>
                                                        <tr>
                                                            <td><?= $row->SUBJECT_NAME  ?></td>
                                                            <td><?= isset($row->FIRST_GRADING) ? $row->FIRST_GRADING : '0'  ?></td>
                                                            <td><?= isset($row->SECOND_GRADING) ? $row->SECOND_GRADING : '0'  ?></td>
                                                            <td><?= isset($row->THIRD_GRADING) ? $row->THIRD_GRADING : '0'  ?></td>
                                                            <td><?= isset($row->FOURTH_GRADING) ? $row->FOURTH_GRADING : '0'  ?></td>
                                                            <td><?= isset($row->FINAL) ? $row->FINAL : '0'  ?></td>
                                                            <td><?= $row->REMARKS  ?></td>


                                                        </tr>
                                                    <?php endforeach; ?>

                                                <?php endif; ?>
                                            </tbody>

                                        </table>
                                    <?php else: ?>
                                        <!-- FOR SENIOR HIGH SCHOOL -->
                                        <div class="mb-5 ">
                                            <nav class="justify-content-between d-flex" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                                <div class="left">
                                                    <ol class="breadcrumb">
                                                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                                        <li class="breadcrumb-item active" aria-current="page">Academic Record</li>
                                                    </ol>
                                                </div>
                                                <div class="right">
                                                    <button class="btn btn-sm btn-blue" id="add-shs-record-btn" value="<?= $_GET['student_id'] ?>"><i class="fas fa-plus"></i> Record</button>
                                                </div>

                                            </nav>
                                        </div>
                                        <div class="mb-0 row">

                                            <label for="inputPassword" class="col-sm-1 col-form-label">Name :</label>
                                            <div class="col-sm-5 align-items-center d-flex">
                                                <strong><?= $student[0]->ST_FNAME . ', ' . $student[0]->ST_LNAME . ' ' . $student[0]->ST_MI ?></strong>
                                            </div>

                                            <label for="inputPassword" class="col-sm-1 col-form-label">LRN :</label>
                                            <div class="col-sm-5 align-items-center d-flex">
                                                <strong><?= $student[0]->ST_LRN  ?></strong>
                                            </div>
                                        </div>
                                        <div class="mb-0 row">

                                            <label for="inputPassword" class="col-sm-2 col-form-label">Year Level :</label>
                                            <div class="col-sm-4 align-items-center d-flex">
                                                <strong><?= $student[0]->ST_YEAR_LEVEL  ?></strong>
                                            </div>
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Semester :</label>
                                            <div class="col-sm-4 align-items-center d-flex">
                                                <strong><?= $student[0]->ST_SEMESTER  ?></strong>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">

                                            <label for="inputPassword" class="col-sm-2 col-form-label">Track/Strand :</label>
                                            <div class="col-sm-5 align-items-center d-flex">
                                                <strong><?= $student[0]->ST_TRACK_STRAND ?></strong>
                                            </div>
                                        </div>

                                        <table class="table table-bordered" style="width:90%;margin:auto;">
                                            <thead>
                                                <tr>
                                                    <th>Subject</th>
                                                    <th>1</th>
                                                    <th>2</th>
                                                    <th>Final</th>
                                                    <th>Remarks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if ($shs_grades): ?>
                                                    <?php foreach ($shs_grades as $row): ?>
                                                        <tr>
                                                            <td><?= $row->SUBJECT  ?></td>
                                                            <td><?= $row->FIRST_GRADING  ?></td>
                                                            <td><?= $row->SECOND_GRADING  ?></td>
                                                            <td><?= $row->FINAL  ?></td>
                                                            <td><?= $row->REMARKS  ?></td>


                                                        </tr>
                                                    <?php endforeach; ?>

                                                <?php endif; ?>
                                            </tbody>

                                        </table>
                                    <?php endif; ?>
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
    <script>
        $(document).ready(function() {
            $('#add-jhs-record-btn').click(function() {
                $('#add-jhs-record-modal').modal('show');
            });
            $('#add-shs-record-btn').click(function() {
                $('#add-shs-record-modal').modal('show');
            });

            add_jhs_grade();
            add_shs_grade();

        });

        function add_jhs_grade() {
            var testInputs = document.querySelectorAll('#junior_grade_form input[type="number"]');

            testInputs.forEach(function(input) {
                input.addEventListener('input', function() {
                    var grade1 = parseInt(document.getElementById('1st_grading').value);
                    var grade2 = parseInt(document.getElementById('2nd_grading').value);
                    var grade3 = parseInt(document.getElementById('3rd_grading').value);
                    var grade4 = parseInt(document.getElementById('4th_grading').value);

                    var total = grade1 + grade2 + grade3 + grade4;
                    var average = total / 4;

                    var final = document.getElementById('final_grade').value = average.toFixed(2);
                    if (final >= 75.00 && final <= 100.00) {
                        document.getElementById('remarks').value = 'Passed';
                    } else {
                        document.getElementById('remarks').value = 'Failed';
                    }
                });
            });
        }

        function add_shs_grade() {
            var testInputs = document.querySelectorAll('#senior_grade_form input[type="number"]');

            testInputs.forEach(function(input) {
                input.addEventListener('input', function() {
                    var grade1 = parseInt(document.getElementById('shs_1st_grading').value);
                    var grade2 = parseInt(document.getElementById('shs_2nd_grading').value);

                    var total = grade1 + grade2;
                    var average = total / 2;

                    var final = document.getElementById('shs_final_grade').value = average.toFixed(2);
                    if (final >= 75.00 && final <= 100.00) {
                        document.getElementById('shs_remarks').value = 'Passed';
                    } else {
                        document.getElementById('shs_remarks').value = 'Failed';
                    }
                });
            });
        }
    </script>
</body>

</html>