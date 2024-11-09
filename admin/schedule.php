<?php
include '../private/config/autoload.php';

spl_autoload_register(function ($class) {
    include_once ADMIN_CLASSES . $class . '.php';
});

$schedule = new ScheduleClass;
$schedule->index();
$schedule->create_schedule();
$data = $schedule->fetch_schedule();
$schedule->update_schedule();
$schedule->delete_schedule();
$instructor = $schedule->fetch_instructor();
$new_students = $schedule->new_student();
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

    <!-- Add Schedule Modal -->
    <div class="modal fade" id="add-schedule-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Schedule</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Instructor:</label>
                            <select name="instructor" class="form-select form-control">
                                <option selected hidden disabled>-- Select --</option>
                                <?php foreach ($instructor as $row): ?>
                                    <?php if ($row->STATUS == 'Active'): ?>
                                        <option value="<?= $row->INSTRUCTOR ?>"><?= $row->INSTRUCTOR ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Day:</label>
                            <input required class="form-control" type="text" name="day">
                        </div>
                        <div class="mb-3">
                            <label>From:</label>
                            <input required class="form-control" type="time" name="from">
                        </div>
                        <div class="mb-3">
                            <label>To:</label>
                            <input required class="form-control" type="time" name="to">
                        </div>
                        <div class="mb-3">
                            <label>Room:</label>
                            <input required class="form-control" type="text" name="room">
                        </div>
                        <div class="mb-3">
                            <label>Year Level:</label>
                            <select class="form-control form-select" name="year_level">
                                <option selected disabled hidden>-- Select --</option>
                                <option value="Grade 7">Grade 7</option>
                                <option value="Grade 8">Grade 8</option>
                                <option value="Grade 9">Grade 9</option>
                                <option value="Grade 10">Grade 10</option>
                                <option value="Grade 11">Grade 11</option>
                                <option value="Grade 12">Grade 12</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add-schedule" class="btn btn-blue">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update Schedule Modal -->
    <div class="modal fade" id="update-schedule-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Update Schedule</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Instructor:</label>
                            <input required class="form-control" type="hidden" name="schedule_id" id="schedule_id">
                            <select name="instructor" id="instructor" class="form-select form-control">
                                <option selected hidden disabled>-- Select --</option>
                                <?php foreach ($instructor as $row): ?>
                                    <?php if ($row->STATUS == 'Active'): ?>
                                        <option value="<?= $row->INSTRUCTOR ?>"><?= $row->INSTRUCTOR ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Day:</label>
                            <input required class="form-control" type="text" name="day" id="day">
                        </div>
                        <div class="mb-3">
                            <label>From:</label>
                            <input required class="form-control" type="time" name="from" id="from">
                        </div>
                        <div class="mb-3">
                            <label>To:</label>
                            <input required class="form-control" type="time" name="to" id="to">
                        </div>
                        <div class="mb-3">
                            <label>Room:</label>
                            <input required class="form-control" type="text" name="room" id="room">
                        </div>
                        <div class="mb-3">
                            <label>Year Level:</label>
                            <select class="form-control form-select" name="year_level" id="year_level">
                                <option selected disabled hidden>-- Select --</option>
                                <option value="Grade 7">Grade 7</option>
                                <option value="Grade 8">Grade 8</option>
                                <option value="Grade 9">Grade 9</option>
                                <option value="Grade 10">Grade 10</option>
                                <option value="Grade 11">Grade 11</option>
                                <option value="Grade 12">Grade 12</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="update-schedule" class="btn btn-blue">Update</button>
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
                                                <li class="breadcrumb-item active" aria-current="page">Schedule</li>
                                            </ol>
                                        </nav>

                                        <div>
                                            <button class="btn btn-sm btn-blue" data-bs-toggle="modal" data-bs-target="#add-schedule-modal"><i class="fas fa-plus"></i>Add Schedule</button>
                                        </div>
                                    </div>

                                    <table class="table table-bordered bg-body" id="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>INSTRUCTOR</th>
                                                <th>DAY</th>
                                                <th>FROM</th>
                                                <th>TO</th>
                                                <th>ROOM</th>
                                                <th>YEAR LEVEL</th>
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
                                                        <td><?= $row->SC_INSTRUCTOR ?></td>
                                                        <td><?= $row->SC_DAY ?></td>
                                                        <td><?= $row->SC_FROM ?></td>
                                                        <td><?= $row->SC_TO ?></td>
                                                        <td><?= $row->SC_ROOM ?></td>
                                                        <td><?= $row->SC_YEAR_LEVEL ?></td>
                                                        <td class="justify-content-center d-flex">

                                                            <button id="edit-btn" value="<?= $row->SCHEDULE_ID ?>" class="btn btn-sm btn-blue mx-2"><i class="fas fa-edit"></i>Edit</button>
                                                            <a href="schedule.php?delete_id=<?= $row->SCHEDULE_ID ?>" onclick="return window.confirm('Are you want to delete?')" class="btn btn-sm btn-red mx-2"><i class="fas fa-trash"></i>Delete</a>

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
                $('#update-schedule-modal').modal('show');
                $id = $(this).val();
                $tr = $(this).closest('tr');
                var data = $tr.children('td').map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#schedule_id').val($id);
                $('#instructor').val(data[1]);
                $('#day').val(data[2]);
                $('#from').val(data[3]);
                $('#to').val(data[4]);
                $('#room').val(data[5]);
                $('#year_level').val(data[6]);

            });
        });
    </script>
</body>

</html>