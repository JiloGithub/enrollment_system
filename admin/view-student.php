<?php
include '../private/config/autoload.php';

spl_autoload_register(function ($class) {
    include_once ADMIN_CLASSES . $class . '.php';
});

$student_list = new StudentListClass;
$student_list->index();
$new_students = $student_list->new_student();
$student = $student_list->fetch_students();
$student_list->update_info();
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
                    <?php include ADMIN_ALERT; ?>

                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <div class="card shadow border-0 p-3 bg-light">

                                <div class="card-body">

                                    <?php include ADMIN_ALERT; ?>

                                    <div class="mb-5">
                                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Update Student Info</li>
                                            </ol>
                                        </nav>
                                    </div>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-5 row">
                                                    <label class="col-sm-2 col-form-label">LRN :</label>
                                                    <div class="col-sm-4 align-items-center d-flex">
                                                        <input required readonly disabled type="text" class="form-control" name="lrn" value="<?= $student[0]->ST_LRN ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-3 mt-3 row">
                                                    <label class="col-sm-2 col-form-label">Fullname :</label>
                                                    <div class="col-sm-3">
                                                        <input required type="text" class="form-control" name="firstname" value="<?= $student[0]->ST_FNAME ?>">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input required type="text" class="form-control" name="lastname" value="<?= $student[0]->ST_LNAME ?>">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input required type="text" class="form-control" name="middlename" value="<?= $student[0]->ST_MI ?>">
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <input type="text" class="form-control" name="name_extension" value="<?= $student[0]->ST_EXT_NAME ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row">

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
                                                            value="male" <?php echo  $student[0]->ST_GENDER == 'male' ? 'checked' : ''; ?>> &nbsp; Male &nbsp;
                                                        <input required class="form-check-input" type="radio" name="gender"
                                                            value="female" <?php echo  $student[0]->ST_GENDER == 'female' ? 'checked' : ''; ?>> &nbsp; Female
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
                                                        <input required readonly disabled type="email" class="form-control" name="email" value="<?= $student[0]->ST_EMAIL ?>">
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




                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="update-info" style="color:#fff;background-color: #4e73df;" class="btn">Update</button>
                                        </div>
                                    </form>

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