<?php
include '../private/config/autoload.php';

spl_autoload_register(function ($class) {
    include_once ADMIN_CLASSES . $class . '.php';
});

$user = new UserClass;
$user->index();
$user->create_user();
$data = $user->fetch_user();
$user->update_user();
$user->delete_user();
$new_students = $user->new_student();
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

    <!-- Add User Modal -->
    <div class="modal fade" id="add-user-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Username:</label>
                            <input required class="form-control" type="text" name="username">
                        </div>
                        <div class="mb-3">
                            <label>Email:</label>
                            <input required class="form-control" type="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label>Password:</label>
                            <input required class="form-control" type="password" name="password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add-user" class="btn btn-blue">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update User Modal -->
    <div class="modal fade" id="update-user-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Update User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Username:</label>
                            <input required class="form-control" type="hidden" name="user_id" id="user_id">
                            <input required class="form-control" type="text" name="username" id="username">
                        </div>
                        <div class="mb-5">
                            <label>Email:</label>
                            <input required class="form-control" type="email" name="email" id="email">
                        </div>
                        <div class="mb-3">
                            <label>New Password:</label>
                            <input required class="form-control" type="password" name="password" id="password">
                        </div>
                        <div class="mb-3">
                            <label>Confirm Password:</label>
                            <input required class="form-control" type="password" name="c_password" id="c_password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="update-user" class="btn btn-blue">Update</button>
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
                                                <li class="breadcrumb-item active" aria-current="page">User</li>
                                            </ol>
                                        </nav>

                                        <div>
                                            <button class="btn btn-sm btn-blue" data-bs-toggle="modal" data-bs-target="#add-user-modal"><i class="fas fa-plus"></i>Add User</button>
                                        </div>
                                    </div>

                                    <table class="table table-bordered bg-body" id="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>USERNAME</th>
                                                <th>EMAIL</th>
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
                                                        <td><?= $row->USERNAME ?></td>
                                                        <td><?= $row->EMAIL ?></td>
                                                        <td><?= $row->STATUS ?></td>
                                                        <td class="justify-content-center d-flex">

                                                            <button id="edit-btn" value="<?= $row->USER_ID ?>" class="btn btn-sm btn-blue mx-2"><i class="fas fa-edit"></i>Edit</button>
                                                            <a href="users.php?delete_id=<?= $row->USER_ID ?>" onclick="return window.confirm('Are you want to delete?')" class="btn btn-sm btn-red mx-2"><i class="fas fa-trash"></i>Delete</a>

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
                $('#update-user-modal').modal('show');
                $id = $(this).val();
                $tr = $(this).closest('tr');
                var data = $tr.children('td').map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#user_id').val($id);
                $('#username').val(data[1]);
                $('#email').val(data[2]);
                $('#status').val(data[3]);

            });
        });
    </script>
</body>

</html>