<?php

include 'private/config/autoload.php';
spl_autoload_register(function ($class) {
    include_once CLASSES . $class . '.php';
});
$form = new RegisterClass();
$term = $form->fetch_term();
$form->create_student();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sto. Rosario National High School</title>
    <link rel="shortcut icon" href="<?= ASSET . 'img/logo.jpeg'; ?>" type="image/x-icon">

    <link href="<?= ASSET . 'fontawesome/css/all.min.css'; ?>" rel="stylesheet">
    <link href="<?= ASSET . 'bootstrap/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <link href="<?= ASSET . 'css/style.css'; ?>" rel="stylesheet">

</head>

<body>
    <?php include ASSET . 'include/main-nav.php'; ?>

    <div class="container">
        <?php include ALERT; ?>
        <div class="row mt-5 mb-5">
            <div class="col">
                <div class="card p-3 bg-light">
                    <div class="card-header justify-content-between d-flex">
                        <div class="left">
                            Enrollment Form
                        </div>
                        <div class="rigth">
                            Current Year : <?php echo  date('Y') ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-5 row">
                                        <label class="col-sm-2 col-form-label">LRN :</label>
                                        <div class="col-sm-4 align-items-center d-flex">
                                            <input required type="text" class="form-control" name="lrn" placeholder="Enter LRN">
                                        </div>
                                    </div>
                                    <div class="mb-3 mt-3 row">
                                        <label class="col-sm-2 col-form-label">Fullname :</label>
                                        <div class="col-sm-3">
                                            <input required type="text" class="form-control" name="firstname" placeholder="Enter Firstname">
                                        </div>
                                        <div class="col-sm-3">
                                            <input required type="text" class="form-control" name="lastname" placeholder="Enter Lastname">
                                        </div>
                                        <div class="col-sm-3">
                                            <input required type="text" class="form-control" name="middlename" placeholder="Enter Middlename">
                                        </div>
                                        <div class="col-sm-1">
                                            <input type="text" class="form-control" name="name_extension" placeholder="Jr/Sr">
                                        </div>
                                    </div>
                                    <div class="mb-4 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Profile :</label>
                                        <div class="col-sm-4">
                                            <input required type="file" class="form-control" name="profile">
                                        </div>
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Civil Status :</label>
                                        <div class="col-sm-4">
                                            <select required class="form-control form-select" name="civil_status">
                                                <option value="" selected disabled hidden>-- Select --</option>
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
                                                <textarea required class="form-control" name="address"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Gender :</label>
                                        <div class="col-sm-4 align-items-center d-flex">
                                            <input required class="form-check-input" type="radio" name="gender"
                                                value="male" checked> &nbsp; Male &nbsp;
                                            <input required class="form-check-input" type="radio" name="gender"
                                                value="female"> &nbsp; Female
                                        </div>

                                        <label for="inputPassword" class="col-sm-2 col-form-label">Birth Date :</label>
                                        <div class="col-sm-4">
                                            <input required type="date" class="form-control" name="birthdate">
                                        </div>
                                    </div>

                                    <!-- <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Age :</label>
                                        <div class="col-sm-4 align-items-center d-flex">
                                            <input required type="number" class="form-control" name="age" placeholder="Enter your age">
                                        </div>

                                        <label for="inputPassword" class="col-sm-2 col-form-label">Civil Status :</label>
                                        <div class="col-sm-4">
                                            <select required class="form-control form-select" name="civil_status">
                                                <option value="" selected disabled hidden>-- Select --</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Widowed">Widowed</option>
                                            </select>
                                        </div>
                                    </div> -->

                                    <div class="mb-4 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Place of Birth :</label>
                                        <div class="col-sm-10">
                                            <div class="form-floating">
                                                <textarea required class="form-control" name="place_of_birth"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Nationality :</label>
                                        <div class="col-sm-4 align-items-center d-flex">
                                            <input required type="text" class="form-control" name="nationality" placeholder="Enter Nationality">
                                        </div>

                                        <label for="inputPassword" class="col-sm-2 col-form-label">Religion :</label>
                                        <div class="col-sm-4">
                                            <input required type="text" class="form-control" name="religion" placeholder="Enter religion">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">

                                        <label for="inputPassword" class="col-sm-2 col-form-label">Email Address :</label>
                                        <div class="col-sm-4 align-items-center d-flex">
                                            <input required type="email" class="form-control" name="email" placeholder="Enter Email address">
                                        </div>

                                        <label for="inputPassword" class="col-sm-2 col-form-label">Contact Number :</label>
                                        <div class="col-sm-4 align-items-center d-flex">
                                            <input required type="number" class="form-control" name="contact_number" placeholder="Mobile number">
                                        </div>
                                    </div>
                                    <div class="mb-5 row">

                                        <label for="inputPassword" class="col-sm-2 col-form-label">Guardian Name :</label>
                                        <div class="col-sm-4 align-items-center d-flex">
                                            <input required type="text" class="form-control" name="guardian" placeholder="Enter parents/guardian name">
                                        </div>

                                        <label for="inputPassword" class="col-sm-2 col-form-label">Contact Number :</label>
                                        <div class="col-sm-4 align-items-center d-flex">
                                            <input required type="number" class="form-control" name="guardian_contact_number" placeholder="Contact number of guardian">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">

                                        <label for="inputPassword" class="col-sm-2 col-form-label">Year Level :</label>
                                        <div class="col-sm-4 align-items-center d-flex">
                                            <select required id="year_level" class="form-control form-select" name="year_level">
                                                <option value="" selected disabled hidden>-- Select --</option>
                                                <option value="Grade 7">Grade 7</option>
                                                <option value="Grade 8">Grade 8</option>
                                                <option value="Grade 9">Grade 9</option>
                                                <option value="Grade 10">Grade 10</option>
                                                <option value="Grade 11">Grade 11</option>
                                                <option value="Grade 12">Grade 12</option>
                                            </select>
                                        </div>


                                        <!-- <label for="inputPassword" class="col-sm-2 col-form-label">School Year :</label>
                                        <div class="col-sm-4 align-items-center d-flex">
                                            <select required class="form-control form-select" name="school_year">
                                                <option value="" selected disabled hidden>-- Select --</option>
                                                <?php foreach ($term as $row) : ?>
                                                    <?php if ($row->STATUS == 'Active') : ?>
                                                        <option><?= $row->TERM; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div> -->
                                    </div>
                                    <div class="mb-5 row strand">

                                    </div>
                                    <!-- <div class="mb-5 row">
                                        <label class="col-sm-2 col-form-label">Username :</label>
                                        <div class="col-sm-4 align-items-center d-flex">
                                            <input required type="text" class="form-control" name="username" placeholder="Enter username">
                                        </div>

                                        <label class="col-sm-2 col-form-label">Password :</label>
                                        <div class="col-sm-4 align-items-center d-flex">
                                            <input required type="password" class="form-control" name="password" placeholder="Enter password">
                                        </div>
                                    </div> -->

                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="register" style="color:#fff;background-color: #4e73df;" class="btn">Enroll Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src="<?= ASSET . 'bootstrap/js/bootstrap.min.js'; ?>"></script>
    <script src="<?= ASSET . 'js/jquery.js'; ?>"></script>
    <script>
        $("#year_level").change(function() {
            var selectedValue = $(this).val();
            // alert(selectedValue);
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: "year_level=" + selectedValue,
                // beforeSend: function() {
                //     $(".strand").html("<p>Loading...</p>");
                // },
                success: function(res) {
                    $(".strand").html(res);
                },
            });
        });
    </script>
</body>

</html>