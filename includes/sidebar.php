<!-- Blog Sidebar Widgets Column -->
<div class="col-md-4">
    <!-- Blog Search Well -->
    <div class="card mb-3">
        <div class="card-body">
            <h4>Blog Search</h4>
            <form action="search.php" method="GET">
                <div class="input-group">
                    <input name="search" type="text" class="form-control">
                    <button class="btn btn-outline-secondary" name="submit" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Log IN -->
    <div class="card mb-3">
        <div class="card-body">
            <h4>Login</h4>
            <form action="includes/login.php" method="POST">
                <label for="username" class="form-label">Username</label>
                <input name="username" type="text" class="form-control mb-2" placeholder="Username" required>
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control mb-2" placeholder="Password" required>
                <button class="btn btn-success" name="login" type="submit">
                    Log in
                </button>
            </form>
        </div>
    </div>

    <!-- Blog Categories-->
    <div class="card mb-3">
        <div class="card-body">
            <?php
            $query = 'SELECT * FROM category';
            $select_categories_sidebar = mysqli_query($connection, $query);
            ?>

            <h4>Blog Categories</h4>
            <ul class="list-unstyled">
                <?php
                while ($row = mysqli_fetch_assoc($select_categories_sidebar)) {
                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];
                    echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                } ?>
            </ul>

        </div>
    </div>
</div>