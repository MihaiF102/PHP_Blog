<?php

function confirm_query($res)
{
    global $connection;
    if (!$res) {
        die("Query failed" . mysqli_error($connection));
    }
}

function insert_categories()
{
    global $connection;
    if (isset($_POST["submit"])) {
        $cat_title = $_POST["cat_title"];
        if ($cat_title == "" || empty($cat_title)) {
            echo "This field should not be empty";
        } else {
            $query = "INSERT INTO category(cat_title)";
            $query .= "VALUE('{$cat_title}')";
            $create_category_query = mysqli_query($connection, $query);
            if (!$create_category_query) {
                die("Query Failed" . mysqli_error($connection));
            }
        }
    }
}


function find_all_categories()
{
    global $connection;
    $query = 'SELECT * FROM category';
    $select_categories = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
    }
}

function delete_category()
{
    global $connection;
    if (isset($_GET["delete"])) {
        $cat_id = $_GET["delete"];
        $query = "DELETE FROM category WHERE cat_id = {$cat_id}";
        $delete_query = mysqli_query($connection, $query);
        header("Location: categories.php");
    }
}

function delete_post()
{
    global $connection;
    if (isset($_GET["delete"])) {
        $the_post_id = $_GET["delete"];
        $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
        $delete_query = mysqli_query($connection, $query);
        confirm_query($delete_query);
        header("Location: posts.php");
    }
}

function delete_comment()
{
    global $connection;
    if (isset($_GET["delete"])) {
        $the_comment_id = $_GET["delete"];
        $comment_query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
        $delete_query = mysqli_query($connection, $comment_query);
        confirm_query($delete_query);
        header("Location: comments.php");
    }
}

function change_comment_status()
{
    global $connection;
    if (isset($_GET["unapprove"])) {
        $the_comm_id = $_GET["unapprove"];
        $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comm_id";
        $unapprove_query = mysqli_query($connection, $query);
        confirm_query($unapprove_query);
        header("Location: comments.php");
    }

    if (isset($_GET["approve"])) {
        $the_comm_id = $_GET["approve"];
        $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comm_id";
        $approve_query = mysqli_query($connection, $query);
        confirm_query($approve_query);
        header("Location: comments.php");
    }
}

function delete_user()
{
    global $connection;
    if (isset($_GET["delete"])) {
        $the_user_id = $_GET["delete"];
        $user_query = "DELETE FROM users WHERE user_id = {$the_user_id}";
        $delete_query = mysqli_query($connection, $user_query);
        confirm_query($delete_query);
        header("Location: users.php");
    }
}

function change_user_role()
{
    global $connection;
    if (isset($_GET["change_to_admin"])) {
        $the_user_id = $_GET["change_to_admin"];
        $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id";
        $user_query = mysqli_query($connection, $query);
        confirm_query($user_query);
        header("Location: users.php");
    }

    if (isset($_GET["change_to_subscriber"])) {
        $the_user_id = $_GET["change_to_subscriber"];
        $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $the_user_id";
        $user_query = mysqli_query($connection, $query);
        confirm_query($user_query);
        header("Location: users.php");
    }
}
