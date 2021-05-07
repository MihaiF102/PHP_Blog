<?php include "includes/admin_header.php" ?>
<div id="wrapper">

    <?php include "includes/admin_navigation.php" ?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome To The Admin Page
                        <small><?php echo $_SESSION['username'] ?></small>
                    </h1>
                </div>
            </div>
            <hr>
            <!-- /.row -->

            <div class="row py-2">
                <div class="col-lg-2 col-md-2 py-2">
                    <div class="card border-primary">
                        <div class="card-header bg-primary">
                            <i class="fs-2 bi bi-stickies"> </i>
                            <?php
                            $query = "SELECT * FROM posts";
                            $select_all_posts = mysqli_query($connection, $query);
                            $post_count = mysqli_num_rows(($select_all_posts));
                            ?>
                            <span class="fs-2"><?php echo $post_count ?></span>
                            <span class="fs-2">Posts</span>
                        </div>
                        <div class="card-footer border-primary bg-light">
                            <a href="posts.php">
                                <span>View Details</span>
                                <span> <i class="bi bi-arrow-right-circle-fill"></i></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 py-2">
                    <div class="card border-success">
                        <div class="card-header bg-success">
                            <i class="fs-2 bi bi-stickies"> </i>
                            <?php
                            $query = "SELECT * FROM comments";
                            $select_all_comments = mysqli_query($connection, $query);
                            $comment_count = mysqli_num_rows(($select_all_comments));
                            ?>
                            <span class="fs-2"><?php echo $comment_count ?></span>
                            <span class="fs-2">Comments</span>
                        </div>
                        <div class="card-footer border-success bg-light">
                            <a href="comments.php">
                                <span>View Details</span>
                                <span> <i class="bi bi-arrow-right-circle-fill"></i></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 py-2">
                    <div class="card border-warning">
                        <div class="card-header bg-warning">
                            <i class="fs-2 bi bi-stickies"> </i>
                            <?php
                            $query = "SELECT * FROM users";
                            $select_all_users = mysqli_query($connection, $query);
                            $user_count = mysqli_num_rows(($select_all_users));
                            ?>
                            <span class="fs-2"><?php echo $user_count ?></span>
                            <span class="fs-2">Users</span>
                        </div>
                        <div class="card-footer border-warning bg-light">
                            <a href="users.php">
                                <span>View Details</span>
                                <span> <i class="bi bi-arrow-right-circle-fill"></i></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 py-2">
                    <div class="card border-danger">
                        <div class="card-header bg-danger">
                            <i class="fs-2 bi bi-stickies"> </i>
                            <?php
                            $query = "SELECT * FROM category";
                            $select_all_category = mysqli_query($connection, $query);
                            $category_count = mysqli_num_rows(($select_all_category));
                            ?>
                            <span class="fs-2"><?php echo $category_count ?></span>
                            <span class="fs-2">Categories</span>
                        </div>
                        <div class="card-footer border-danger bg-light">
                            <a href="categories.php">
                                <span>View Details</span>
                                <span> <i class="bi bi-arrow-right-circle-fill"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <?php
            $query = "SELECT * FROM posts WHERE post_status = 'published'";
            $select_all_published_posts = mysqli_query($connection, $query);
            $published_count = mysqli_num_rows($select_all_published_posts);

            $query = "SELECT * FROM posts WHERE post_status = 'draft'";
            $select_all_draft_posts = mysqli_query($connection, $query);
            $draft_count = mysqli_num_rows($select_all_draft_posts);

            $query = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
            $select_all_unapproved_comm = mysqli_query($connection, $query);
            $unapproved_comm_count = mysqli_num_rows($select_all_unapproved_comm);

            $query = "SELECT * FROM users WHERE user_role = 'subscriber'";
            $select_all_subscribers = mysqli_query($connection, $query);
            $subscribers_count = mysqli_num_rows($select_all_subscribers);

            ?>

            <div>
                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['bar']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Data', 'Count'],
                            <?php
                            $element_text = ['Users', 'Subscribers', 'Categories', 'Active Posts', 'Published Posts', 'Draft Posts', 'Comments', 'Unnapproved Comments'];
                            $element_count = [$user_count, $subscribers_count, $category_count, $post_count, $published_count, $draft_count, $comment_count, $unapproved_comm_count];
                            for ($i = 0; $i < sizeof($element_text); $i++) {
                                echo "['{$element_text[$i]}'" . ", " . "{$element_count[$i]}],";
                            }
                            ?>
                        ]);

                        var options = {
                            chart: {
                                title: '',
                                subtitle: '',
                            }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                </script>
                <div id="columnchart_material" style="width: auto; height: 500px;"></div>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php include "includes/admin_footer.php" ?>