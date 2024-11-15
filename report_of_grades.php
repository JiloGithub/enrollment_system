<?php
include 'private/config/autoload.php';
spl_autoload_register(function ($class) {
    include_once CLASSES . $class . '.php';
});
$grade = new GradesClass();
$grade->index();
$student = $grade->student();

$jhs_grades = $grade->fetch_jhs_grades();
$first_semester = $grade->first_semester();
$second_semester = $grade->second_semester();
// echo '<pre>';
// print_r($student);
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
            <div class="col-sm-12">
                <div class="card mb-5 bg-light shadow border-0">
                    <div class="card-header bg-light">
                        <div class="select">
                            <div class="row">
                                <div class="col-sm-2">
                                    <select class="form-control form-select" name="select_year_level" id="select_year_level">
                                        <option selected hidden value="<?= $student[0]->ST_YEAR_LEVEL ?>"><?= $student[0]->ST_YEAR_LEVEL ?></option>
                                        <option value="Grade 7">Grade 7</option>
                                        <option value="Grade 8">Grade 8</option>
                                        <option value="Grade 9">Grade 9</option>
                                        <option value="Grade 10">Grade 10</option>
                                        <option value="Grade 11">Grade 11</option>
                                        <option value="Grade 12">Grade 12</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <?php if ($student[0]->ST_YEAR_LEVEL == 'Grade 11' || $student[0]->ST_YEAR_LEVEL == 'Grade 12'): ?>
                            <div class="mb-1 row">

                                <label for="inputPassword" class="col-sm-1 col-form-label">Name :</label>
                                <div class="col-sm-5 align-items-center d-flex">
                                    <strong><?= $student[0]->ST_FNAME . ', ' . $student[0]->ST_LNAME . ' ' . $student[0]->ST_MI ?></strong>
                                </div>

                                <label for="inputPassword" class="col-sm-1 col-form-label">LRN :</label>
                                <div class="col-sm-5 align-items-center d-flex">
                                    <strong><?= $student[0]->ST_LRN ?></strong>
                                </div>
                            </div>
                            <div class="mb-1 row">

                                <label for="inputPassword" class="col-sm-2 col-form-label">Year Level :</label>
                                <div class="col-sm-4 align-items-center d-flex">
                                    <strong><?= $student[0]->ST_YEAR_LEVEL ?></strong>
                                </div>

                                <label for="inputPassword" class="col-sm-2 col-form-label">Current Year :</label>
                                <div class="col-sm-4 align-items-center d-flex">
                                    <strong><?= $student[0]->ST_CURRENT_YEAR ?></strong>
                                </div>
                            </div>
                            <div class="mb-5 row">

                                <label for="inputPassword" class="col-sm-2 col-form-label">Track/Strand :</label>
                                <div class="col-sm-4 align-items-center d-flex">
                                    <strong><?= $student[0]->ST_TRACK_STRAND ?></strong>
                                </div>


                            </div>

                            <table class="table table-bordered mb-5" style="width:90%;margin:auto;">
                                <thead>
                                    <tr>
                                        <th colspan="5" class="text-center">1st Semester</th>
                                    </tr>
                                    <tr>
                                        <th>Subject</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>Final</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($first_semester): ?>
                                        <?php foreach ($first_semester as $row): ?>
                                            <tr>
                                                <td><?= $row->SUBJECT  ?></td>
                                                <td><?= $row->FIRST_GRADING   ?></td>
                                                <td><?= $row->SECOND_GRADING   ?></td>
                                                <td><?= $row->FINAL   ?></td>
                                                <td><?= $row->REMARKS  ?></td>
                                            </tr>
                                        <?php endforeach; ?>

                                    <?php endif; ?>
                                </tbody>
                                <!-- <tfoot>
                                    <tr>
                                        <th colspan="3">Average Grade</th>
                                        <th id="average" colspan="2"></th>
                                    </tr>
                                </tfoot> -->

                            </table>

                            <table class="table table-bordered mb-5" style="width:90%;margin:auto;">
                                <thead>
                                    <tr>
                                        <th colspan="5" class="text-center">2nd Semester</th>
                                    </tr>
                                    <tr>
                                        <th>Subject</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>Final</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($second_semester): ?>
                                        <?php foreach ($second_semester as $row): ?>
                                            <tr>
                                                <td><?= $row->SUBJECT  ?></td>
                                                <td><?= $row->FIRST_GRADING   ?></td>
                                                <td><?= $row->SECOND_GRADING   ?></td>
                                                <td><?= $row->FINAL   ?></td>
                                                <td><?= $row->REMARKS  ?></td>
                                            </tr>
                                        <?php endforeach; ?>

                                    <?php endif; ?>
                                </tbody>
                                <!-- <tfoot>
                                    <tr>
                                        <th colspan="3">Average Grade</th>
                                        <th id="average" colspan="2"></th>
                                    </tr>
                                </tfoot> -->

                            </table>
                        <?php else: ?>
                            <div class="mb-1 row">

                                <label for="inputPassword" class="col-sm-1 col-form-label">Name :</label>
                                <div class="col-sm-5 align-items-center d-flex">
                                    <strong><?= $student[0]->ST_FNAME . ', ' . $student[0]->ST_LNAME . ' ' . $student[0]->ST_MI ?></strong>
                                </div>

                                <label for="inputPassword" class="col-sm-1 col-form-label">LRN :</label>
                                <div class="col-sm-5 align-items-center d-flex">
                                    <strong><?= $student[0]->ST_LRN ?></strong>
                                </div>
                            </div>
                            <div class="mb-1 row">

                                <label for="inputPassword" class="col-sm-2 col-form-label">Year Level :</label>
                                <div class="col-sm-4 align-items-center d-flex">
                                    <strong><?= $student[0]->ST_YEAR_LEVEL ?></strong>
                                </div>

                                <label for="inputPassword" class="col-sm-2 col-form-label">Current Year :</label>
                                <div class="col-sm-4 align-items-center d-flex">
                                    <strong><?= $student[0]->ST_CURRENT_YEAR ?></strong>
                                </div>
                            </div>


                            <table class="table table-bordered mb-5" style="width:90%;margin:auto;">
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
                                                <td><?= $row->FIRST_GRADING   ?></td>
                                                <td><?= $row->SECOND_GRADING   ?></td>
                                                <td><?= $row->THIRD_GRADING   ?></td>
                                                <td><?= $row->FOURTH_GRADING   ?></td>
                                                <td><?= $row->FINAL   ?></td>
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

    </div>
    <script src="<?= ASSET . 'js/jquery.js'; ?>"></script>
    <script src="<?= ASSET . 'bootstrap/js/bootstrap.min.js'; ?>"></script>
    <script>
        let total = 0;
        let count = 0;
        $(".card-body .table tr").each(function() {
            let gradeCells = $(this).find('td');
            // console.log(gradeCells);
            gradeCells.each(function() {
                let grade = parseInt($(this).text());
                // console.log(grade);
                if (!isNaN(grade)) {
                    total += grade;
                    count++
                }
            });
        });
        let average = count > 0 ? total / count : 0;
        $("tfoot tr  #average").text(average.toFixed(2));
        console.log(average);

        $("#select_year_level").change(function() {
            var selectedValue = $(this).val();
            // alert(selectedValue);
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: "select_year_level=" + selectedValue,
                beforeSend: function() {
                    $(".card-body").html("<h1>Loading...</h1>");
                },
                success: function(res) {
                    setTimeout(function() {
                        $(".card-body").html(res);
                    }, 1000);
                },
            });
        });
    </script>
</body>

</html>