<?php
include '../private/config/autoload.php';

spl_autoload_register(function ($class) {
    include_once ADMIN_CLASSES . $class . '.php';
});;

$term = new TermClass();
$term->index();
$term->create();
$data = $term->read();
$term->update_term();
$term->delete_term();
$new_students = $term->new_student();

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
    <!-- Add Term Modal -->
    <div class="modal fade" id="add-term-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Academic Term</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Term:</label>
                            <input required class="form-control" type="text" name="term">
                        </div>
                        <div class="mb-3">
                            <label>Status:</label>
                            <select required class="form-control form-select" name="status">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add-term" class="btn btn-blue">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Update Term Modal -->
    <div class="modal fade" id="update-term-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Academic Term</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Term:</label>
                            <input required class="form-control" type="hidden" name="term_id" id="term_id">
                            <input required class="form-control" type="text" name="term" id="term">
                        </div>
                        <div class="mb-3">
                            <label>Status:</label>
                            <select required class="form-control form-select" name="status" id="status">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="update-term" class="btn btn-blue">Update</button>
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
                                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Academic Term</li>
                                            </ol>
                                        </nav>

                                        <div>
                                            <button class="btn btn-sm btn-blue" data-bs-toggle="modal" data-bs-target="#add-term-modal"><i class="fas fa-plus"></i>Add Term</button>
                                        </div>
                                    </div>

                                    <table class="table table-bordered bg-body" id="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>TERM</th>
                                                <th>STATUS</th>
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
                                                        <td><?= $row->TERM ?></td>
                                                        <td><?= $row->STATUS ?></td>
                                                        <td class="justify-content-center d-flex">

                                                            <button id="edit-btn" value="<?= $row->TERM_ID ?>" class="btn btn-sm btn-blue mx-2"><i class="fas fa-edit"></i>Edit</button>
                                                            <a href="academic-term.php?delete_id=<?= $row->TERM_ID ?>" onclick="return window.confirm('Are you want to delete?')" class="btn btn-sm btn-red mx-2"><i class="fas fa-trash"></i>Delete</a>

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

            $('#table tbody').on('click', '#edit-btn', function() {
                $('#update-term-modal').modal('show');
                $id = $(this).val();
                $tr = $(this).closest('tr');
                var data = $tr.children('td').map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#term_id').val($id);
                $('#term').val(data[1]);
                $('#status').val(data[2]);

            });
        });
    </script>
</body>

</html>