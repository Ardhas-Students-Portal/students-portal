<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="student_style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark w-100">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Student Portal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'studentdashboard.php') ? 'active' : '' ?>"
                            href="studentdashboard.php"><i class="bi bi-person-circle pe-2"></i>Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'student_header.php') ? 'active' : '' ?>"
                            href="student_header.php"><i class="fas fa-file-alt pe-2"></i>Marks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($current_page == 'student_logout.php') ? 'active' : '' ?>"
                            href="student_logout.php"><i class="bi bi-box-arrow-right pe-2"></i>Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header-box px-3 pt-3 pb-4 d-flex justify-content-between">
                <h1 class="fs-4"><span class="text-white rounded shadow px-2 me-2">Student Portal</span></h1>
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="bi bi-list"></i></button>
            </div>

            <?php
                $current_page = basename($_SERVER['PHP_SELF']);
            ?>

            <ul class="list-unstyled px-2">
                <li class="<?= ($current_page == 'studentdashboard.php') ? 'active' : '' ?>"><a href="studentdashboard.php" class="text-decoration-none px-3 py-2 d-block"><i class="bi bi-person-circle pe-2"></i>Profile</a></li>
                <li class="<?= ($current_page == 'student_header.php') ? 'active' : '' ?>"><a href="student_header.php" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-file-alt pe-2"></i>Marks</a></li>
                <li class="<?= ($current_page == 'student_logout.php') ? 'active' : '' ?>"><a href="student_logout.php" class="text-decoration-none px-3 py-2 d-block"><i class="bi bi-box-arrow-right pe-2"></i>Log out</a></li>
            </ul>
            <hr class="h-color mx-2">
        </div>
        <div class="content flex-grow-1 m-2">
            <?php include('student_profile.php') ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.sidebar ul li').on('click', function() {
                $('.sidebar ul li.active').removeClass('active');
                $(this).addClass('active');
            });
            $('.open-btn').on('click', function() {
                $('.sidebar').addClass('active');
            });
            $('.close-btn').on('click', function() {
                $('.sidebar').removeClass('active');
            });
        });
    </script>
</body>

</html>
