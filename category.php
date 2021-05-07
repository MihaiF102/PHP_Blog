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
        if (isset($_GET["category"])) {
            $post_category_id = $_GET["category"];
        }
        $query = "SELECT * FROM posts WHERE post_category_id = $post_category_id";
        $select_all_posts = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_all_posts)) {
            $post_id = $row["post_id"];
            $post_title = $row["post_title"];
            $post_author = $row["post_author"];
            $post_date = $row["post_date"];
            $post_image = $row["post_image"];
            $post_content = substr($row["post_content"], 0, 100);
        ?>
            <!-- Blog Post -->
            <div class="card mb-3">
                <img class="img-fluid" src="images/<?php echo $post_image ?>" alt="Responsive image">
                <div class="card-body bg-light">
                    <h5 class="card-title">
                        <a class="text-decoration-none text-reset" href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                    </h5>
                    <p class="card-text"><?php echo $post_content ?></p>
                    <p class="card-text">
                        <small class="text-muted"> by <a href="author_post.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id ?>"><?php echo $post_author ?></a>
                        </small>
                    </p>
                    <p class="card-text"> <small>Posted On: <?php echo $post_date ?></small></p>
                    <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More</a>
                </div>
            </div>
        <?php } ?>

    </div>

    <?php include "includes/sidebar.php" ?>
</div>
<!-- /.row -->

<?php include "includes/footer.php"; ?>
<!-- </body
 </html> -->