<?php
include '../private/config/autoload.php';

spl_autoload_register(function ($class) {
    include_once ADMIN_CLASSES . $class . '.php';
});

$subject = new SeniorHighSubjectClass;
$subject->index();
$new_students = $subject->new_student();

$subject->create_subject();
$data = $subject->fetch_subject();
$subject->update_subject();
$subject->delete_subject();
$strand = $subject->fetch_strand();

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

    <!-- Add SUbject Modal -->
    <div class="modal fade" id="add-subject-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Subject</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Subject:</label>
                            <input required class="form-control" type="text" name="subject">
                        </div>

                        <div class="mb-3">
                            <label>Year Level:</label>
                            <select required class="form-control form-select" name="year_level">
                                <option value="" selected hidden disabled>-- Year Level --</option>
                                <option value="Grade 11">Grade 11</option>
                                <option value="Grade 12">Grade 12</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Year Level:</label>
                            <select required class="form-control form-select" name="semester">
                                <option value="" selected hidden disabled>-- Semester --</option>
                                <option value="First">First</option>
                                <option value="Second">Second</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Strand:</label>
                            <select required class="form-control form-select" name="strand">
                                <option value="" selected hidden disabled>-- Strand --</option>
                                <?php foreach ($strand as $strands): ?>
                                    <option value="<?= $strands->STRAND ?>"><?= $strands->STRAND ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add-subject" class="btn btn-blue">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update Subject Modal -->
    <div class="modal fade" id="update-subject-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Update Subject</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Subject:</label>
                            <input required class="form-control" type="hidden" name="subject_id" id="subject_id">
                            <input required class="form-control" type="text" name="subject" id="subject">
                        </div>

                        <div class="mb-3">
                            <label>Year Level:</label>
                            <select required class="form-control form-select" name="year_level" id="year_level">
                                <option value="" selected hidden disabled>-- Year Level --</option>
                                <option value="Grade 11">Grade 11</option>
                                <option value="Grade 12">Grade 12</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Year Level:</label>
                            <select required class="form-control form-select" name="semester" id="semester">
                                <option value="" selected hidden disabled>-- Semester --</option>
                                <option value="First">First</option>
                                <option value="Second">Second</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Strand:</label>
                            <select required class="form-control form-select" name="strand" id="strand">
                                <?php foreach ($strand as $strands): ?>
                                    <option value="<?= $strands->STRAND ?>"><?= $strands->STRAND ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="update-subject" class="btn btn-blue">Update</button>
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

                                    <div class="mb-5 justify-content-between d-flex">
                                        <div>
                                            <select class="form-select" name="dynamic_select" id="dynamic_select">
                                                <option selected hidden>Senior High School</option>
                                                <option value="subject.php">Junior High School</option>
                                            </select>
                                        </div>

                                        <div>
                                            <button class="btn btn-sm btn-blue" data-bs-toggle="modal" data-bs-target="#add-subject-modal"><i class="fas fa-plus"></i>Add Subject</button>
                                        </div>
                                    </div>

                                    <table class="table table-bordered bg-body" id="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>SUBJECT NAME</th>
                                                <th>YEAR LEVEL</th>
                                                <th>SEMESTER</th>
                                                <th>STRAND</th>


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
                                                        <td><?= $row->SUBJECT ?></td>
                                                        <td><?= $row->YEAR_LEVEL ?></td>
                                                        <td><?= $row->SEMESTER ?></td>
                                                        <td><?= $row->STRAND ?></td>
                                                        <td class="justify-content-center d-flex">

                                                            <button id="edit-btn" value="<?= $row->SUBJECT_ID ?>" class="btn btn-sm btn-blue mx-2"><i class="fas fa-edit"></i>Edit</button>
                                                            <a href="shs-subject.php?delete_id=<?= $row->SUBJECT_ID ?>" onclick="return window.confirm('Are you want to delete?')" class="btn btn-sm btn-red mx-2"><i class="fas fa-trash"></i>Delete</a>

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
    <script>
        $(document).ready(function() {

            $('#dynamic_select').on('change', function() {
                var url = $(this).val(); // get selected value
                if (url) { // require a URL
                    window.location = url; // redirect
                }
                return false;
            });

            $('#table tbody').on('click', '#edit-btn', function() {
                $('#update-subject-modal').modal('show');
                $id = $(this).val();
                $tr = $(this).closest('tr');
                var data = $tr.children('td').map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#subject_id').val($id);
                $('#subject').val(data[1]);
                $('#year_level').val(data[2]);
                $('#semester').val(data[3]);
                $('#strand').val(data[4]);

            });
        });
    </script>
</body>

</html>