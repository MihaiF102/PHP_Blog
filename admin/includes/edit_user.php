<?php
if (isset($_GET["u_id"])) {
    $the_user_id = $_GET["u_id"];
}

$query = "SELECT * FROM users WHERE user_id = $the_user_id";
$select_users = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_users)) {
    $user_id = $row['user_id'];
    $user_name = $row['user_name'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
}

if (isset($_POST['update_user'])) {
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];
    // $user_image = $_FILES['user_image']['name'];
    // $user_image_temp= $_FILES['user_image']['name'];

    // move_uploaded_file($user_image_temp, "../images/$user_image");

    // if (empty($post_image)) {
    //     $query = "SELECT * FROM posts WHERE post_id = $the_user_id ";
    //     $select_image = mysqli_query($connection, $query);
    //     while ($row = mysqli_fetch_assoc($select_image)) {
    //         $post_image = $row['user_image'];
    //     }
    // }

    $query = "UPDATE users SET ";
    $query .= "user_name = '{$user_name}', ";
    $query .= "user_password = '{$user_password}', ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_role = '{$user_role}' ";
    // $query .= "user_image = '{$user_image}' ";
    $query .= "WHERE user_id = {$the_user_id} ";

    $update_user = mysqli_query($connection, $query);
    confirm_query($update_user);
    header("Refresh:0; url=users.php");
}
?>


<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" class="form-control" name="user_firstname" id="firstname" value="<?php echo $user_firstname ?>">
    </div>
    <div class="form-group">
        <label for="lastname">Lastname</label>
        <input type="text" class="form-control" name="user_lastname" id="lastname" value="<?php echo $user_lastname ?>">
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="user_name" id="username" value="<?php echo $user_name ?>">
    </div>
    <div class="form-group">
        <label for="role">Role</label>
        <select name="user_role" id="role">
            <?php if ($user_role == 'admin') {
                echo "<option value='admin' selected>Admin</option>";
                echo "<option value='subscriber'>Subscriber</option>";
            } else {
                echo "<option value='admin'>Admin</option>";
                echo "<option value='subscriber' selected>Subscriber</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="image">Post image</label>
        <input type="file" name="image" id="image">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="user_email" id="email" value="<?php echo $user_email ?>">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="user_password" id="password" value="<?php echo $user_password ?>">
    </div>
    <input type="submit" class="btn btn-primary" name="update_user" value="Update User">
</form>