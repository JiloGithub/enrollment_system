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
                        About
                    </div>
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link active" id="vision-tab" data-bs-toggle="tab" href="#vision" role="tab"
                                    aria-controls="vision" aria-selected="true">VISION</a>
                                <a class="nav-link" id="mission-tab" data-bs-toggle="tab" href="#mission" role="tab" aria-controls="mission"
                                    aria-selected="false">MISSION</a>
                                <a class="nav-link" id="core_values-tab" data-bs-toggle="tab" href="#core_values" role="tab"
                                    aria-controls="core_values" aria-selected="false">CORE VALUES</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="vision" role="tabpanel" aria-labelledby="vision-tab">
                                <center>
                                    <h1> VISION</h1>

                                    <h2>
                                        We dream of Filipinos who passionately <br> love their country and whose values <br> and
                                        competencies enable
                                        them to <br> realize their full potential and <br> contribute meaningfully <br> to building the
                                        nation.<br><br>

                                        As a learner-centered public institution the <br> Department of Education continuously <br> improves
                                        itself to
                                        better <br> serve itsstakeholders.
                                    </h2>



                                </center>
                            </div>
                            <div class="tab-pane fade" id="mission" role="tabpanel" aria-labelledby="mission-tab">
                                <center>
                                    <h1>MISSION</h1>

                                    <h2>
                                        To protect and promote the right of every Filipino to <br> quality, equitable, culture-based, and
                                        complete <br>
                                        basic education where: <br><br>

                                        Students learn in a child-friendly gender-sensitive,<br> safe, and motivating environment.<br><br>

                                        Teachers facilitate learning and constantly<br> nurture every learner.<br><br>

                                        Administrators and staff, as stewards of the <br> institution, ensure an enabling and supportive
                                        <br>
                                        environment
                                        for effective learning to happen.<br><br>

                                        Family, community, and other stakeholders are <br> actively engaged and share responsibility for<br>
                                        developing
                                        life-long learners.
                                    </h2>
                                </center>
                            </div>
                            <div class="tab-pane fade" id="core_values" role="tabpanel" aria-labelledby="core_values-tab">

                                <center>
                                    <h1>Maka-Diyos <br> Maka-Tao <br> Makakalikasan <br> Maka-Bansa
                                    </h1>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="<?= ASSET . 'bootstrap/js/bootstrap.min.js'; ?>"></script>
</body>

</html>