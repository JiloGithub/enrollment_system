<?php include 'private/config/autoload.php'; ?>
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
        <div class="row mt-5 mb-5">
            <div class="col">
                <div class="card p-3 bg-light">
                    <div class="card-header">
                        Enrollment Form
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">

                                <div class="mb-3 mt-3 row">
                                    <label class="col-sm-2 col-form-label">Fullname :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="firstname" placeholder="Enter Firstname">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="lastname" placeholder="Enter Lastname">
                                    </div>
                                    <div class="col-sm-1">
                                        <input type="text" class="form-control" name="middlename" placeholder="M.I.">
                                    </div>
                                    <div class="col-sm-1">
                                        <input type="text" class="form-control" name="name_extension" placeholder="Jr/Sr">
                                    </div>
                                </div>
                                <div class="mb-4 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Profile :</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="firstname">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Address :</label>
                                    <div class="col-sm-10">
                                        <div class="form-floating">
                                            <textarea class="form-control" name="address"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Gender :</label>
                                    <div class="col-sm-4 align-items-center d-flex">
                                        <input class="form-check-input" type="radio" name="gender" id="gender"
                                            value="male" checked> &nbsp; Male &nbsp;
                                        <input class="form-check-input" type="radio" name="gender" id="gender"
                                            value="female"> &nbsp; Female
                                    </div>

                                    <label for="inputPassword" class="col-sm-2 col-form-label">Birth Date :</label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="birthdate">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Age :</label>
                                    <div class="col-sm-4 align-items-center d-flex">
                                        <input type="number" class="form-control" name="age" placeholder="Enter your age">
                                    </div>

                                    <label for="inputPassword" class="col-sm-2 col-form-label">Civil Status :</label>
                                    <div class="col-sm-4">
                                        <select class="form-control form-select" name="civil_status">
                                            <option selected disabled hidden>-- Status --</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widowed">Widowed</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Place of Birth :</label>
                                    <div class="col-sm-10">
                                        <div class="form-floating">
                                            <textarea class="form-control" name="place_of_birth"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Nationality :</label>
                                    <div class="col-sm-4 align-items-center d-flex">
                                        <input type="text" class="form-control" name="nationality" placeholder="Enter Nationality">
                                    </div>

                                    <label for="inputPassword" class="col-sm-2 col-form-label">Religion :</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="religion" placeholder="Enter religion">
                                    </div>
                                </div>

                                <div class="mb-3 row">

                                    <label for="inputPassword" class="col-sm-2 col-form-label">Email Address :</label>
                                    <div class="col-sm-4 align-items-center d-flex">
                                        <input type="email" class="form-control" name="email" placeholder="Enter Email address">
                                    </div>

                                    <label for="inputPassword" class="col-sm-2 col-form-label">Contact Number :</label>
                                    <div class="col-sm-4 align-items-center d-flex">
                                        <input type="number" class="form-control" name="contact_number" placeholder="Mobile number">
                                    </div>
                                </div>
                                <div class="mb-5 row">

                                    <label for="inputPassword" class="col-sm-2 col-form-label">Guardian Name :</label>
                                    <div class="col-sm-4 align-items-center d-flex">
                                        <input type="text" class="form-control" name="guardian" placeholder="Enter parents/guardian name">
                                    </div>

                                    <label for="inputPassword" class="col-sm-2 col-form-label">Contact Number :</label>
                                    <div class="col-sm-4 align-items-center d-flex">
                                        <input type="number" class="form-control" name="guardian_contact_number" placeholder="Contact number of guardian">
                                    </div>
                                </div>

                                <div class="mb-3 row">

                                    <label for="inputPassword" class="col-sm-2 col-form-label">Year Level :</label>
                                    <div class="col-sm-4 align-items-center d-flex">
                                        <select class="form-control form-select" name="year_level">
                                            <option selected disabled hidden>-- Level --</option>
                                            <option value="Grade 7">Grade 7</option>
                                            <option value="Grade 8">Grade 8</option>
                                            <option value="Grade 9">Grade 9</option>
                                        </select>
                                    </div>

                                    <label for="inputPassword" class="col-sm-2 col-form-label">Strand :</label>
                                    <div class="col-sm-4 align-items-center d-flex">
                                        <select class="form-control form-select" name="section">
                                            <option selected disabled hidden>-- Section --</option>
                                            <option value="Marcellinus">Marcellinus</option>
                                            <option value="Einstein">Einstein</option>
                                            <option value="Zara">Zara</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-5 row">

                                    <label for="inputPassword" class="col-sm-2 col-form-label">S.Y. :</label>
                                    <div class="col-sm-4 align-items-center d-flex">
                                        <select class="form-control form-select" name="school_year">
                                            <option selected disabled hidden>-- School Year --</option>
                                            <option>2024-2025</option>
                                        </select>
                                    </div>


                                </div>

                            </div>
                        </div>
                        <div class="mb-3">
                            <button style="color:#fff;background-color: #4e73df;" class="btn">Enroll Now</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src="<?= ASSET . 'bootstrap/js/bootstrap.min.js'; ?>"></script>
</body>

</html>