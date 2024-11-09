<nav class="main-nav navbar navbar-expand-lg navbar-dark" style="color:#fff;background-color: #ec7f25;">
    <div class="container-fluid d-flex align-items-center">
        <a style="font-size: 35px;" class="navbar-brand logo" href="dashboard.php"><img src="<?= ASSET . 'img/logo.jpeg'; ?>" width="80px" height="80px"> Sto. Rosario National High School</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end mx-3" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href=""><i class="fas fa-file"></i> <span>Report of Grades</span></a>
                <a class="nav-link" href=""><i class="fas fa-edit"></i> <span>Update Info</span></a>

            </div>
        </div>
        <div class="btn-group">
            <button type="button" style="background-color: transparent;cursor: pointer;border: 0;box-shadow: none;" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa fa-user-circle"></i> <?= Session::get('student_username'); ?>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" onclick="return window.confirm('Are you want to logout?')" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Log Out</a></li>
            </ul>
        </div>

    </div>
</nav>