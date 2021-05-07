<!-- Connection file -->
<?php include "includes/db.php" ?>

<?php include "includes/header.php"; ?>
<!-- Navigation -->
<?php include "includes/navigation.php"; ?>
<!-- Page Content -->
<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">

        <?php
        if (isset($_GET["p_id"])) {
            $the_post_id = $_GET["p_id"];

            $view_query = "UPDATE posts SET post_views = post_views + 1 WHERE post_id = {$the_post_id}";
            $send_query = mysqli_query($connection, $view_query);

            $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
            $select_all_posts = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_all_posts)) {
                $post_title = $row["post_title"];
                $post_author = $row["post_author"];
                $post_date = $row["post_date"];
                $post_image = $row["post_image"];
                $post_content = $row["post_content"];
        ?>
                <div class="card mb-3">
                    <img class="img-fluid" src="images/<?php echo $post_image ?>" alt="Responsive image">
                    <div class="card-body bg-light">
                        <h5 class="card-title">
                            <a class="text-decoration-none text-reset" href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                        </h5>
                        <p class="card-text">
                            <small class="text-muted"> by <a href="author_post.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id ?>"><?php echo $post_author ?></a>
                            </small>
                        </p>
                        <p class="card-text"> <small>Posted On: <?php echo $post_date ?></small></p>
                        <p class="card-text"><?php echo $post_content ?></p>
                    </div>
                </div>
        <?php }
        } else {
            header("Location: index.php");
        }
        ?>

        <!-- Blog Comments -->
        <?php
        if (isset($_POST["create_comment"])) {
            $the_post_id = $_GET["p_id"];
            $comment_author = $_POST["comment_author"];
            $comment_email = $_POST["comment_email"];
            $comment_content = $_POST["comment_content"];

            if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {
                $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
                $query .= "VALUES($the_post_id,'{$comment_author}', '{$comment_email}', '{$comment_content}' , 'approved', now())";

                $comment_query = mysqli_query($connection, $query);
                if (!$comment_query) {
                    die("Query Failed" . mysqli_error($connection));
                }

                $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                $query .= "WHERE post_id = $the_post_id ";
                $update_comment_count = mysqli_query($connection, $query);
            } else {
                echo "<script>alert('Field cannot be empty')</script>";
            }
        }

        ?>
        <!-- Comments Form-->
        <div class="card mb-5">
            <div class="card-body">
                <h4 class="card-title">Leave a Comment</h4>
                <form role="form" action="" method="POST">
                    <div class="form-group mb-2">
                        <label for="comment_author" class="form-label">Author</label>
                        <input type="text" class="form-control" name="comment_author" id="comment_author" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="comment_email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="comment_email" id="comment_email" required>
                    </div>
                    <div class="form-group mb-2">
                        <label for="comment_content" class="form-label">Your Comment</label>
                        <textarea class="form-control" name="comment_content" id="comment_content" rows="3" required></textarea>
                    </div>
                    <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <!-- Posted Comments -->
        <?php

        $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
        $query .= "AND comment_status = 'approved' ";
        $query .= "ORDER BY comment_id DESC";
        $select_comment_query = mysqli_query($connection, $query);
        if (!$select_comment_query) {
            die("Query Failed" . mysqli_error($connection));
        }
        while ($row = mysqli_fetch_assoc($select_comment_query)) {
            $comment_date = $row["comment_date"];
            $comment_content = $row["comment_content"];
            $comment_author = $row["comment_author"];
        ?>
            <div class="d-flex flex-row card mb-2">
                <div class="p-2"><img src="https://via.placeholder.com/64x64" alt="user"></div>
                <div>
                    <h5><?php echo $comment_author ?></h5>
                    <small><?php echo $comment_date ?></small>
                    <p class="m-b-5 m-t-10">
                        <?php echo $comment_content ?>
                    </p>
                </div>
            </div>

        <?php } ?>

    </div>
    <!-- Comment -->
    <?php include "includes/sidebar.php" ?>
</div>
<!-- /.row -->
<?php include "includes/footer.php";
?>
<!-- </body>

</html> -->