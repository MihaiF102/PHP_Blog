<form action="" method="POST">
    <div class="form-group">
        <label class="pb-2 fw-bold" for="edit">Update Category</label>
        <?php
        if (isset($_GET["edit"])) {
            $cat_id = $_GET["edit"];

            $query = "SELECT * FROM category WHERE cat_id = $cat_id";
            $select_categories_id = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_categories_id)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
        ?>
                <input class="form-control" type="text" name="cat_title" id="edit" value="<?php if (isset($cat_title)) {
                                                                                                echo $cat_title;
                                                                                            } ?>">
        <?php
            }
        }
        ?>

        <?php //Update query
        if (isset($_POST["update_category"])) {
            $cat_title_update = $_POST["cat_title"];
            $query = "UPDATE category SET cat_title = '{$cat_title_update}' WHERE cat_id={$cat_id_update}";
            $update_query = mysqli_query($connection, $query);
            if (!$update_query) {
                die("Query failed" . mysqli_error($connection));
            }
        }
        ?>

    </div>
    <div class="form-group py-2">
        <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
    </div>
</form>