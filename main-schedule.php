<?php
include 'private/config/autoload.php';
spl_autoload_register(function ($class) {
    include_once CLASSES . $class . '.php';
});
$home = new LoginClass();
$schedule = $home->teacher_schedule();
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
    <?php include ASSET . 'include/main-nav.php'; ?>

    <div class="container">

        <div class="row mt-5 mb-5">

            <div class="col-sm-12">
                <div class="card p-3 bg-light">
                    <div class="card-header">
                        Schedule
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered bg-body">
                            <thead>
                                <tr>
                                    <th>INSTRUCTOR</th>
                                    <th>DAY</th>
                                    <th>TIME</th>
                                    <th>ROOM</th>
                                    <th>GRADE LEVEL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($schedule): ?>
                                    <?php foreach ($schedule as $row): ?>
                                        <tr>
                                            <td><?= $row->SC_INSTRUCTOR ?></td>
                                            <td><?= $row->SC_DAY ?></td>
                                            <td><?= date('h:ia', strtotime($row->SC_FROM)) . ' - ' . date('h:ia', strtotime($row->SC_TO))  ?></td>
                                            <td><?= $row->SC_ROOM ?></td>
                                            <td><?= $row->SC_YEAR_LEVEL ?></td>
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

    <script src="<?= ASSET . 'bootstrap/js/bootstrap.min.js'; ?>"></script>
</body>

</html>