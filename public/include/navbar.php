<nav class="navbar admin-navbar navbar-expand border-bottom justify-content-between d-flex">

    <button type="button" class="toggle-btn">
        <i class="fas fa-align-left"></i>
    </button>

    <div class="user">
        <div class="btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa fa-user-circle"></i> <?= Session::get('admin_username'); ?>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="manage-account.php"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Manage Account</a></li>
                <li><a class="dropdown-item" onclick="return window.confirm('Are you want to logout?')" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Log Out</a></li>
            </ul>
        </div>
    </div>

</nav>