<aside id="sidebar" class="sidebar-toggle">
    <div class="sidebar-logo">
        <img src="<?= ADMIN_ASSET . 'img/logo.jpeg' ?>" width="50px" height="50px">
    </div>

    <ul class="sidebar-nav p-0">
        <li class="sidebar-item">
            <a href="dashboard.php" class="sidebar-link"><i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <li class="sidebar-header">
            Manage Student
        </li>
        <li class="sidebar-item ">
            <a href="new-enrollment.php" class="sidebar-link "><i class="fas fa-fw fa-calendar"></i>
                <span>New Enrollment</span>
                <?php if ($new_students): ?>
                    <span class="position-absolute top-0 end-0 translate-middle badge rounded-pill bg-danger">
                        <?= $new_students ?>
                    </span>
                <?php endif; ?>

            </a>
        </li>
        <li class="sidebar-item">
            <a href="" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#student" aria-expanded="true" aria-controls="student"><i class="fas fa-fw fa-user-graduate"></i>
                <span>Students</span></a>
            <ul id="student" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="student-list.php" class="sidebar-link"><i class="fas fa-list"></i> Student List</a>
                </li>
                <li class="sidebar-item">
                    <a href="academic-record.php" class="sidebar-link"><i class="fa fa-graduation-cap"></i> Academic Record</a>
                </li>
            </ul>
        </li>


        <li class="sidebar-header">
            Manage Enrollment
        </li>
        <!-- <li class="sidebar-item">
            <a href="academic-term.php" class="sidebar-link"><i class="fas fa-fw fa-chart-bar"></i>
                <span>Academic Term</span></a>
        </li> -->
        <li class="sidebar-item">
            <a href="subject.php" class="sidebar-link"> <i class="fas fa-fw fa-book"></i>
                <span>Subjects</span></a>
        </li>
        <!-- <li class="sidebar-item">
            <a href="program.php" class="sidebar-link"><i class="fas fa-chalkboard-teacher"></i>
                <span>Program</span></a>
        </li> -->
        <li class="sidebar-item">
            <a href="section.php" class="sidebar-link"><i class="fas fa-building"></i>
                <span>Sections</span></a>
        </li>
        <li class="sidebar-item">
            <a href="strand.php" class="sidebar-link"><i class="fas fa-chalkboard"></i>
                <span>Strand</span></a>
        </li>
        <li class="sidebar-item">
            <a href="schedule.php" class="sidebar-link"><i class="fas fa-calendar"></i>
                <span>Schedule</span></a>
        </li>
        <li class="sidebar-item">
            <a href="instructor.php" class="sidebar-link"><i class="fas fa-users"></i>
                <span>Instructor</span></a>
        </li>
        <?php if (Session::get('admin_status') == 'Admin'): ?>
            <li class="sidebar-item mb-5">
                <a href="users.php" class="sidebar-link"><i class="fas fa fa-user-circle"></i>
                    <span>Users</span></a>
            </li>
        <?php endif; ?>

    </ul>
</aside>