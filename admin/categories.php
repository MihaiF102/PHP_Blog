<?php include "includes/admin_header.php" ?>
<div id="wrapper">

    <?php include "includes/admin_navigation.php" ?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Categories Page
                        <small>Subheading</small>
                    </h1>
                    <!-- Add Category Form -->
                    <div class="col-xs-6">
                        <?php
                        insert_categories();
                        ?>
                        <form action="" method="POST">
                            <div class="form-group py-2">
                                <label class="pb-2 fw-bold" for="cat-title">Add Category</label>
                                <input class="form-control" type="text" name="cat_title" id="cat-title">
                            </div>
                            <div class="form-group pb-2">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>
                        <?php
                        if (isset($_GET["edit"])) {
                            $cat_id_update = $_GET["edit"];
                            include "includes/update_categories.php";
                        }

                        ?>
                    </div>
                    <!-- ./ Add category form -->
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Title</th>
                                    <th>Delete Category</th>
                                    <th>Edit Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php find_all_categories(); ?>
                                <?php delete_category(); ?>
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php" ?>