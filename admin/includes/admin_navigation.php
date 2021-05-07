<!-- <nav class="navbar navbar-expand-lg bg-dark navbar-dark" role="navigation">
    <div class="container-fluid">
        <a class="navbar-brand" href="ex_nav.php">PHP Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Top Menu Items -->
<!-- <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['username'] ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href="../includes/logout.php">Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
</nav> -->
<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="row flex-nowrap">
    <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
            <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                <li class="nav-item">
                    <a class="text-white align-middle px-0 nav-link" href="../index.php"><i class="fs-5 bi bi-house"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a href="index.php" class="text-white nav-link align-middle px-0">
                        <i class=" fs-5 bi bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline"> Dashboard</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#submenu1" data-bs-toggle="collapse" class="text-white nav-link px-0 dropdown-toggle align-middle">
                        <i class="fs-5 bi bi-card-text"></i> <span class="ms-1 d-none d-sm-inline">Posts</span> </a>
                    <ul class="dropdown-menu dropdown-menu-dark" id="submenu1" data-bs-parent="#menu">
                        <li>
                            <a href="./posts.php" class="dropdown-item"> View All Posts</a>
                        </li>
                        <li>
                            <a href="posts.php?source=add_post" class="dropdown-item"> Add Post</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="./categories.php" class="text-white nav-link px-0 align-middle">
                        <i class="fs-5 bi bi-clipboard"></i> <span class="ms-1 d-none d-sm-inline"> Categories</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#submenu2" data-bs-toggle="collapse" class="text-white dropdown-toggle nav-link px-0 align-middle ">
                        <i class="fs-5 bi bi-people"></i> <span class="ms-1 d-none d-sm-inline"> Users</span></a>
                    <ul class="dropdown-menu dropdown-menu-dark" id="submenu2" data-bs-parent="#menu">
                        <li class="w-100">
                            <a href="./users.php" class="dropdown-item"> All Users</a>
                        </li>
                        <li>
                            <a href="users.php?source=add_user" class="dropdown-item"> Add User</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="./comments.php" class="text-white nav-link align-middle px-0"><i class="fs-5 bi bi-chat-right-text"></i> <span class="ms-1 d-none d-sm-inline"> Comments</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-white align-middle px-0 dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fs-5 bi bi-person"></i> <span class="ms-1 d-none d-sm-inline"><?php echo $_SESSION['username'] ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href="../includes/logout.php">Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>