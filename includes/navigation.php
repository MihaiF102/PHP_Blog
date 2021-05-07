 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
     <div class="container-fluid">
         <a class="navbar-brand" href="index.php">PHP Blog</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav">
                 <!-- Calling data from database -->
                 <?php
                    $query = 'SELECT * FROM category';
                    $select_all_categories = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_all_categories)) {
                        $cat_title = $row['cat_title'];
                        echo "<li class='nav-item'><a class='nav-link' href='#'>{$cat_title}</a></li>";
                    }
                    ?>
             </ul>
             <ul class="navbar-nav ms-auto">
                 <?php
                    if (isset($_SESSION['user_role'])) {
                        $role = $_SESSION['user_role'];
                        if ($role === 'admin') {
                            echo "<li class='nav-item'><a class='nav-link' href='admin'>Admin</a> </li>";
                            echo "<li class='nav-item'> <a class='nav-link' href='./includes/logout.php'>Logout</a></li>";
                        } else {
                            echo "<li class='nav-item'> <a class='nav-link' href='./includes/logout.php'>Logout</a></li>";
                        }
                    }

                    ?>
                 <?php
                    if (isset($_SESSION['username'])) {
                        if (isset($_GET['p_id'])) {
                            $post_id = $_GET['p_id'];
                            echo "<li class='nav-item'> <a class='nav-link' href='admin/posts.php?source=edit_post&p_id={$post_id}'>Edit Post</a> </li>";
                        }
                    } else {
                        echo "<li class='nav-item'> <a class='nav-link' href='./registration.php'>Register</a></li>";
                    }
                    ?>
             </ul>
         </div>
         <!-- /.navbar-collapse -->
     </div>
     <!-- /.container -->
 </nav>
 <main class="container mt-2">