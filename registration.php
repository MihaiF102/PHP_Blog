<?php include "./admin/functions.php"; ?>
<?php include "includes/db.php"; ?>
<?php
if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($firstname) && !empty($lastname) && !empty($username) && !empty($email) && !empty($password)) {
        $firstname = mysqli_real_escape_string($connection, $firstname);
        $lastname = mysqli_real_escape_string($connection, $lastname);
        $username = mysqli_real_escape_string($connection, $username);
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT randSalt FROM users";
        $select_rand_salt = mysqli_query($connection, $query);
        confirm_query($select_rand_salt);
        $row = mysqli_fetch_array($select_rand_salt);
        // $salt = $row['randSalt'];
        $password = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO users (user_name, user_email, user_firstname, user_lastname, user_password, user_role) ";
        $query .= "VALUES('{$username}','{$email}', '{$firstname}', '{$lastname}', '{$password}', 'subscriber')";
        $register_user = mysqli_query($connection, $query);
        confirm_query($register_user);
    }
}
?>
<!-- Header -->
<?php include "includes/header.php"; ?>
<!-- Navigation -->
<?php include "includes/navigation.php"; ?>
<!-- Page Content -->
<div class="row mb-2">
    <div class="col-md-6 offset-3">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <h1>Register</h1>
                </div>
                <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                    <div class="form-group mt-2">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Firstname" required>
                    </div>
                    <div class="form-group mt-2">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Lastname" required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group mt-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" required>
                    </div>
                    <div class="form-group mt-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="key" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="d-grid mt-2">
                        <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- /.col-xs-12 -->
</div> <!-- /.row -->
<?php include "includes/footer.php"; ?>