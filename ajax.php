<?php
include 'private/config/autoload.php';

if (isset($_POST['year_level'])) {


    if ($_POST['year_level'] == 'Grade 11' || $_POST['year_level'] == 'Grade 12') {
        $db = new Database();
        $query = $db->getAll('strands');

?>


        <label class="col-sm-2 col-form-label">Track/Strand :</label>
        <div class="col-sm-4">
            <select required class="form-control form-select" name="strand">
                <option value="" selected disabled hidden>-- Select --</option>

                <?php while ($row = $query->fetch(PDO::FETCH_OBJ)) : ?>
                    <option><?= $row->STRAND; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <label class="col-sm-2 col-form-label">Semester :</label>
        <div class="col-sm-4">
            <select required class="form-control form-select" name="semester">
                <option value="" selected disabled hidden>-- Select --</option>
                <option value="First">First</option>
                <option value="Second">Second</option>
            </select>
        </div>
    <?php
    } else {
        return false;
    }
}




if (isset($_POST['select_year_level'])) {

    $db = new Database();

    $year_level = $_POST['select_year_level'];

    $query =  $db->find('students',  $db->where('STUDENT_ID', Session::get('student_id')));
    $student = $query->fetch(PDO::FETCH_OBJ);

    $query = $db->find('shs_grades', $db->where('STUDENT_ID', Session::get('student_id')), $db->where('YEAR_LEVEL',  $year_level), $db->where('SEMESTER', 'First'));

    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        $first_semester[] = $row;
    }

    $query = $db->find('shs_grades', $db->where('STUDENT_ID', Session::get('student_id')), $db->where('YEAR_LEVEL',  $year_level), $db->where('SEMESTER', 'Second'));

    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        $second_semester[] = $row;
    }

    $query = $db->find('grades', $db->where('STUDENT_ID', Session::get('student_id')), $db->where('YEAR_LEVEL',  $year_level));

    while ($row = $query->fetch(PDO::FETCH_OBJ)) {
        $jhs_grades[] = $row;
    }
    // echo '<pre>';
    // print_r($student);
    ?>
    <?php if ($year_level == 'Grade 11' || $year_level == 'Grade 12'): ?>
        <div class="mb-1 row">

            <label for="inputPassword" class="col-sm-1 col-form-label">Name :</label>
            <div class="col-sm-5 align-items-center d-flex">
                <strong><?= $student->ST_FNAME . ', ' . $student->ST_LNAME . ' ' . $student->ST_MI ?></strong>
            </div>

            <label for="inputPassword" class="col-sm-1 col-form-label">LRN :</label>
            <div class="col-sm-5 align-items-center d-flex">
                <strong><?= $student->ST_LRN ?></strong>
            </div>
        </div>
        <div class="mb-1 row">

            <label for="inputPassword" class="col-sm-2 col-form-label">Year Level :</label>
            <div class="col-sm-4 align-items-center d-flex">
                <strong><?= $year_level ?></strong>
            </div>

            <label for="inputPassword" class="col-sm-2 col-form-label">Current Year :</label>
            <div class="col-sm-4 align-items-center d-flex">
                <strong><?= $student->ST_CURRENT_YEAR ?></strong>
            </div>
        </div>
        <div class="mb-5 row">

            <label for="inputPassword" class="col-sm-2 col-form-label">Track/Strand :</label>
            <div class="col-sm-4 align-items-center d-flex">
                <strong><?= $student->ST_TRACK_STRAND ?></strong>
            </div>
        </div>

        <table class="mb-3 table table-bordered mb-5" style="width:90%;margin:auto;">
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
                <?php if (isset($first_semester)): ?>
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


        </table>

        <table class="mb-3 table table-bordered mb-5" style="width:90%;margin:auto;">
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
                <?php if (isset($second_semester)): ?>
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


        </table>

    <?php else: ?>
        <div class="mb-1 row">

            <label for="inputPassword" class="col-sm-1 col-form-label">Name :</label>
            <div class="col-sm-5 align-items-center d-flex">
                <strong><?= $student->ST_FNAME . ', ' . $student->ST_LNAME . ' ' . $student->ST_MI ?></strong>
            </div>

            <label for="inputPassword" class="col-sm-1 col-form-label">LRN :</label>
            <div class="col-sm-5 align-items-center d-flex">
                <strong><?= $student->ST_LRN ?></strong>
            </div>
        </div>
        <div class="mb-1 row">

            <label for="inputPassword" class="col-sm-2 col-form-label">Year Level :</label>
            <div class="col-sm-4 align-items-center d-flex">
                <strong><?= $year_level ?></strong>
            </div>

            <label for="inputPassword" class="col-sm-2 col-form-label">Current Year :</label>
            <div class="col-sm-4 align-items-center d-flex">
                <strong><?= $student->ST_CURRENT_YEAR ?></strong>
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
                <?php if (isset($jhs_grades)): ?>
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
    <?php
}

if (isset($_POST['student_info_year_level'])) {


    if ($_POST['student_info_year_level'] == 'Grade 11' || $_POST['student_info_year_level'] == 'Grade 12') {
        $db = new Database();
        $query = $db->find('students', $db->where('STUDENT_ID', Session::get('student_id')));
        $student = $query->fetch(PDO::FETCH_OBJ);
        $query = $db->getAll('strands');
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $strand[] = $row;
        }
        // echo '<pre>';
        // print_r($strand);
    ?>
        <label class="col-sm-2 col-form-label">Track/Strand :</label>
        <div class="col-sm-4">
            <select required class="form-control form-select" name="strand">
                <option value="" selected hidden>-- Strand --</option>
                <?php foreach ($strand as $row): ?>
                    <option value="<?= $row->STRAND ?>"><?= $row->STRAND ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <label class="col-sm-2 col-form-label">Semester :</label>
        <div class="col-sm-4">
            <select required class="form-control form-select" name="semester">
                <option value="" selected disabled hidden>-- Semester --</option>
                <option value="First">First</option>
                <option value="Second">Second</option>
            </select>
        </div>
<?php
    } else {
        return false;
    }
}


?>