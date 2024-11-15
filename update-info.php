<?php
include 'private/config/autoload.php';
spl_autoload_register(function ($class) {
    include_once CLASSES . $class . '.php';
});
$update_info = new UpdateInfoClass();
$update_info->index();
$student = $update_info->student();
$update_info->update_student();
$strand = $update_info->strand();

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

                    <div class="card-body">
                        <?php include ALERT; ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-5 row">
                                        <label class="col-sm-2 col-form-label">LRN :</label>
                                        <div class="col-sm-4 align-items-center d-flex">
                                            <input required disabled readonly type="text" class="form-control" name="lrn" value="<?= $student[0]->ST_LRN ?>">
                                        </div>
                                    </div>
                                    <div class="mb-3 mt-3 row">
                                        <label class="col-sm-2 col-form-label">Fullname :</label>
                                        <div class="col-sm-3">
                                            <input required disabled readonly type="text" class="form-control" name="firstname" value="<?= $student[0]->ST_FNAME ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input required disabled readonly type="text" class="form-control" name="lastname" value="<?= $student[0]->ST_LNAME ?>">
                                        </div>
                                        <div class="col-sm-3">
                                            <input required disabled readonly type="text" class="form-control" name="middlename" value="<?= $student[0]->ST_MI ?>">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" disabled readonly class="form-control" name="name_extension" value="<?= $student[0]->ST_EXT_NAME ?>">
                                        </div>
                                    </div>
                                    <div class="mb-4 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Profile :</label>
                                        <div class="col-sm-4">
                                            <input type="hidden" class="form-control" name="current_profile" value="<?= $student[0]->ST_PROFILE ?>">
                                            <input type="file" class="form-control" name="profile">
                                        </div>
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Civil Status :</label>
                                        <div class="col-sm-4">
                                            <select required class="form-control form-select" name="civil_status">
                                                <option value="<?= $student[0]->ST_CIVIL_STATUS ?>" selected hidden><?= $student[0]->ST_CIVIL_STATUS ?></option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Widowed">Widowed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Address :</label>
                                        <div class="col-sm-10">
                                            <div class="form-floating">
                                                <textarea required class="form-control" name="address"><?= $student[0]->ST_ADDRESS ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Gender :</label>
                                        <div class="col-sm-4 align-items-center d-flex">
                                            <input required class="form-check-input" type="radio" name="gender"
                                                value="male" <?php echo $student[0]->ST_GENDER == 'male' ? 'checked' : ''; ?>> &nbsp; Male &nbsp;
                                            <input required class="form-check-input" type="radio" name="gender" <?php echo $student[0]->ST_GENDER == 'female' ? 'checked' : ''; ?>
                                                value="female"> &nbsp; Female
                                        </div>

                                        <label for="inputPassword" class="col-sm-2 col-form-label">Birth Date :</label>
                                        <div class="col-sm-4">
                                            <input required type="date" class="form-control" name="birthdate" value="<?= $student[0]->ST_BIRTHDATE ?>">
                                        </div>
                                    </div>


                                    <div class="mb-4 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Place of Birth :</label>
                                        <div class="col-sm-10">
                                            <div class="form-floating">
                                                <textarea required class="form-control" name="place_of_birth"><?= $student[0]->ST_PLACEBIRTH ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Nationality :</label>
                                        <div class="col-sm-4 align-items-center d-flex">
                                            <input required type="text" class="form-control" name="nationality" value="<?= $student[0]->ST_NATIONALITY ?>">
                                        </div>

                                        <label for="inputPassword" class="col-sm-2 col-form-label">Religion :</label>
                                        <div class="col-sm-4">
                                            <input required type="text" class="form-control" name="religion" value="<?= $student[0]->ST_RELIGION ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">

                                        <label for="inputPassword" class="col-sm-2 col-form-label">Email Address :</label>
                                        <div class="col-sm-4 align-items-center d-flex">
                                            <input required disabled readonly type="email" class="form-control" name="email" value="<?= $student[0]->ST_EMAIL ?>">
                                        </div>

                                        <label for="inputPassword" class="col-sm-2 col-form-label">Contact Number :</label>
                                        <div class="col-sm-4 align-items-center d-flex">
                                            <input required type="number" class="form-control" name="contact_number" value="<?= $student[0]->ST_CONTACT_NO ?>">
                                        </div>
                                    </div>
                                    <div class="mb-5 row">

                                        <label for="inputPassword" class="col-sm-2 col-form-label">Guardian Name :</label>
                                        <div class="col-sm-4 align-items-center d-flex">
                                            <input required type="text" class="form-control" name="guardian" value="<?= $student[0]->ST_GDNAME ?>">
                                        </div>

                                        <label for="inputPassword" class="col-sm-2 col-form-label">Contact Number :</label>
                                        <div class="col-sm-4 align-items-center d-flex">
                                            <input required type="number" class="form-control" name="guardian_contact_number" value="<?= $student[0]->ST_GD_CONTACT_NO ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">

                                        <label for="inputPassword" class="col-sm-2 col-form-label">Year Level :</label>
                                        <div class="col-sm-4 ">
                                            <select required id="student_info_year_level" class="form-control form-select" name="year_level">
                                                <option value="<?= $student[0]->ST_YEAR_LEVEL ?>" selected hidden><?= $student[0]->ST_YEAR_LEVEL ?></option>
                                                <option value="Grade 7">Grade 7</option>
                                                <option value="Grade 8">Grade 8</option>
                                                <option value="Grade 9">Grade 9</option>
                                                <option value="Grade 10">Grade 10</option>
                                                <option value="Grade 11">Grade 11</option>
                                                <option value="Grade 12">Grade 12</option>
                                            </select>
                                        </div>






                                    </div>
                                    <div class="mb-5 row semester">
                                        <?php if ($student[0]->ST_YEAR_LEVEL == 'Grade 11' || $student[0]->ST_YEAR_LEVEL == 'Grade 12'): ?>

                                            <label class="col-sm-2 col-form-label">Track/Strand :</label>
                                            <div class="col-sm-4">
                                                <select required class="form-control form-select" name="strand">
                                                    <option value="<?= $student[0]->ST_TRACK_STRAND ?>" selected hidden><?= $student[0]->ST_TRACK_STRAND ?></option>
                                                    <?php foreach ($strand as $row): ?>
                                                        <option value="<?= $row->STRAND ?>"><?= $row->STRAND ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <label class="col-sm-2 col-form-label">Semester :</label>
                                            <div class="col-sm-4">
                                                <select required class="form-control form-select" name="semester">
                                                    <option value="<?= $student[0]->ST_SEMESTER ?>" selected hidden><?= $student[0]->ST_SEMESTER ?></option>
                                                    <option value="First">First</option>
                                                    <option value="Second">Second</option>
                                                </select>
                                            </div>
                                        <?php endif; ?>
                                    </div>


                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update-info" style="color:#fff;background-color: #4e73df;" class="btn">Enroll Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <script src="<?= ASSET . 'js/jquery.js'; ?>"></script>
    <script src="<?= ASSET . 'bootstrap/js/bootstrap.min.js'; ?>"></script>
    <script>
        $("#student_info_year_level").change(function() {
            var selectedValue = $(this).val();
            // alert(selectedValue);
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: "student_info_year_level=" + selectedValue,

                success: function(res) {
                    setTimeout(function() {
                        $(".semester").html(res);
                    }, 1000);
                },
            });
        });
    </script>
</body>

</html>