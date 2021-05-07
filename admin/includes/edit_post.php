<?php
if (isset($_GET["p_id"])) {
    $the_post_id = $_GET["p_id"];
}

$query = "SELECT * FROM posts WHERE post_id = $the_post_id";
$select_posts = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_posts)) {
    $post_id = $row['post_id'];
    $post_category_id = $row['post_category_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tag = $row['post_tag'];
    $post_comment_count = $row['post_comment_count'];
    $post_status = $row['post_status'];
}

if (isset($_POST['update_post'])) {
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_content = $_POST['post_content'];
    $post_tag = $_POST['post_tag'];

    move_uploaded_file($post_image_temp, "../images/$post_image");

    if (empty($post_image)) {
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
        $select_image = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_image)) {
            $post_image = $row['post_image'];
        }
    }

    $query = "UPDATE posts SET ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_author = '{$post_author}', ";
    $query .= "post_date = now(), ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_tag = '{$post_tag}', ";
    $query .= "post_content = '{$post_content}', ";
    $query .= "post_image = '{$post_image}' ";
    $query .= "WHERE post_id = {$the_post_id} ";

    $update_post = mysqli_query($connection, $query);
    confirm_query($update_post);
    echo "<p class='bg-success'> Post Updated. <a href='../post.php?p_id={$post_id}'>View Post</a> <a href='./posts.php'> View All Posts</a></p>";
}
?>


<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" value="<?php echo $post_title ?>" name="post_title" id="title">
    </div>
    <div class="form-group">
        <label for="post-category">Post Category</label>
        <br>
        <select name="post_category" id="post-category">
            <?php
            $query = 'SELECT * FROM category';
            $select_all_categories = mysqli_query($connection, $query);

            confirm_query($select_all_categories);

            while ($row = mysqli_fetch_assoc($select_all_categories)) {
                $cat_title = $row['cat_title'];
                $cat_id = $row['cat_id'];
                echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }

            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" value="<?php echo $post_author ?>" name="post_author" id="author">
    </div>
    <div class="form-group">
        <label for="status">Post Status</label>
        <select name="post_status" id="status">
            <option value="<?php echo $post_status ?>"><?php echo $post_status; ?></option>
            <?php
            if ($post_status == 'published') {
                echo "<option value='draft'>Draft</option>";
            } else {
                echo "<option value='published'>Published</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="image">Post image</label>
        <img src="../images/<?php echo $post_image ?>" width="100" alt="">
        <input type="file" name="image" id="image">
    </div>
    <div class="form-group">
        <label for="tags">Post Tags</label>
        <input type="text" class="form-control" value="<?php echo $post_tag ?>" name="post_tag" id="tags">
    </div>
    <div class="form-group">
        <label for="content">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" id="content"><?php echo $post_content ?></textarea>
    </div>
    <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
</form>