<?php include_once "./functions.php";
if (isset($_POST["create_post"])) {
    $post_title = $_POST["title"];
    $post_author = $_POST["author"];
    $post_category_id = $_POST["post_category"];
    $post_status = $_POST["status"];

    $post_image = $_FILES["image"]["name"];
    $post_image_temp = $_FILES["image"]["tmp_name"];

    $post_tags = $_POST["tags"];
    $post_content = $_POST["content"];
    $post_date = date("d-m-y");

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image,
    post_content, post_tag,  post_status)";

    $query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}',
    '{$post_content}', '{$post_tags}', '{$post_status}')";

    $result = mysqli_query($connection, $query);
    confirm_query($result);
    header("Refresh:0.3; url=posts.php");
}
?>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group mb-2">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" id="title" required>
    </div>
    <div class="form-group mb-2">
        <label for="post_category">Post Category</label>
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
    <div class="form-group mb-2">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" name="author" id="author" required>
    </div>
    <div class="form-group mb-2">
        <label for="status">Post Status</label>
        <select name="post_status" id="status">
            <option value='select option'>Select Option</option>
            <option value='draft'>Draft</option>
            <option value='published'>Publish</option>
        </select>
    </div>
    <div class="form-group mb-2">
        <label for="image">Post Image</label>
        <input type="file" name="image" id="image">
    </div>
    <div class="form-group mb-2">
        <label for="tags">Post Tags</label>
        <input type="text" class="form-control" name="tags" id="tags" required>
    </div>
    <div class="form-group mb-2">
        <label for="content">Post Content</label>
        <textarea type="text" class="form-control" name="content" rows="10" id="content" required></textarea>
    </div>
    <input type="submit" class="btn btn-primary" name="create_post" value="Add Post">
</form>