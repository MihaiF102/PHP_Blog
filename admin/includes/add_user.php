<?php include_once "./functions.php";
if (isset($_POST["create_user"])) {
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];

    $query = "INSERT INTO users(user_name, user_password, 
    user_firstname, user_lastname, user_email, user_role)";

    $query .= "VALUES('{$user_name}', '{$user_password}', '{$user_firstname}',
    '{$user_lastname}', '{$user_email}', '{$user_role}')";

    $create_user_query = mysqli_query($connection, $query);
    confirm_query($create_user_query);

    header("Refresh:0.3; url=users.php");
}
?>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group pb-2">
        <label for="firstname pb-2">Firstname</label>
        <input type="text" class="form-control" name="user_firstname" id="firstname">
    </div>
    <div class="form-group pb-2">
        <label for="lastname pb-2">Lastname</label>
        <input type="text" class="form-control" name="user_lastname" id="lastname">
    </div>
    <div class="form-group pb-2">
        <label for="username pb-2">Username</label>
        <input type="text" class="form-control" name="user_name" id="username">
    </div>
    <div class="form-group pb-2">
        <label for="role pb-2">Role</label>
        <select name="user_role" id="role">
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>

    <div class="form-group pb-2">
        <label for="image pb-2">Post image</label>
        <input type="file" name="image" id="image">
    </div>
    <div class="form-group pb-2">
        <label for="email pb-2">Email</label>
        <input type="email" class="form-control" name="user_email" id="email">
    </div>
    <div class="form-group pb-2">
        <label for="password pb-2">Password</label>
        <input type="password" class="form-control" name="user_password" id="password">
    </div>
    <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
</form>