<?php include_once "functions.php" ?>
<?php
if (isset($_POST['checkBoxArray'])) {
    foreach ($_POST['checkBoxArray'] as $checkBoxValue) {
        $bulk_options = $_POST['bulk_options'];

        switch ($bulk_options) {
            case 'published':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$checkBoxValue}";
                $update_post = mysqli_query($connection, $query);
                break;
            case 'draft':
                $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$checkBoxValue}";
                $update_post = mysqli_query($connection, $query);
                break;
            case 'clone':
                $query = "SELECT * FROM posts WHERE post_id = {$checkBoxValue}";
                $select_post_query = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_post_query)) {
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

                $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tag, post_status) ";
                $query .= " VALUES('{$post_category_id}', '{$post_title}', '{$post_author}', '{$post_date}', '{$post_image}', '{$post_content}', '{$post_tag}', '{$post_status}')";
                $copy_query = mysqli_query($connection, $query);
                confirm_query($copy_query);
                break;

            case 'delete':
                $query = "DELETE FROM posts WHERE post_id = {$checkBoxValue}";
                $delete_post = mysqli_query($connection, $query);
                break;
            default:
                echo 'no value selected';
                break;
        }
    }
}

?>

<form action="" method="POST">
    <table class="table table-bordered table-hover">
        <div id="bulkOptions" class="col-sm-4">
            <select class="form-control" name="bulk_options">
                <option value="select options">Select Options</option>
                <option value="published">Publish</option>
                <option value="draft">Draft</option>
                <option value="clone">Clone</option>
                <option value="delete">Delete</option>
            </select>
        </div>
        <div class="py-2">
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a href="posts.php?source=add_post" class="btn btn-primary">New Post</a>
        </div>

        <thead>
            <tr>
                <th><label for="selectBoxes">Check All</label><input id="selectBoxes" type="checkbox"></th>
                <th>ID</th>
                <th>Category</th>
                <th>Title</th>
                <th>Author</th>
                <th>Date</th>
                <th>Image</th>
                <th>Content</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Post Views</th>
                <th>Status</th>
                <th>View</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = 'SELECT * FROM posts ORDER BY post_id DESC';
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
                $post_views = $row['post_views'];

                echo "<tr>";
                echo "<td><input class='checkBoxes' name='checkBoxArray[]' type='checkbox' value={$post_id}></td>";
                echo "<td>{$post_id}</td>";

                $query = "SELECT * FROM category WHERE cat_id = {$post_category_id}";
                $select_categories_id = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($select_categories_id)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    echo "<td>{$cat_title}</td>";
                }

                echo "<td>{$post_title}</td>";
                echo "<td>{$post_author}</td>";
                echo "<td>{$post_date}</td>";
                echo "<td><img class='img-responsive' src='../images/$post_image'width='300px''></td>";
                echo "<td>{$post_content}</td>";
                echo "<td>{$post_tag}</td>";
                echo "<td>{$post_comment_count}</td>";
                echo "<td>{$post_views}</td>";
                echo "<td>{$post_status}</td>";
                echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
                echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete this post?')\" href='posts.php?delete={$post_id}'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</form>
<?php
delete_post();
?>