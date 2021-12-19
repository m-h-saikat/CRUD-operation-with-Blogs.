<?php include './includes/header.php'; ?>
<?php if (!isset($_SESSION['id'])){
    header('Location: login.php');
}?>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Manage Blog </h4>
                    </div>
                    <div class="card-body">
                        <h3 class="text-center text-danger"><?php
                            if (isset($_SESSION['message']))
                            {
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                            }

                            ?>
                        </h3>
                        <h3 class="text-center text-success mb-3"><?php echo isset($_SESSION['message'])? $_SESSION['message']: ''; ?></h3>

                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th> Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($blogs as $blog){ extract($blog)?>
                                <tr>
                                    <td><?php echo $title;  ?></td>
                                    <td><?php echo $description; ?></td>
                                    <td><img src="<?php echo $image; ?>" alt="" height="50" width="90"/> </td>
                                    <td>
                                        <a href="action.php?status=edit&id=<?php echo $id; ?>" class="btn btn-outline-success">Edit</a>
                                        <a href="action.php?status=delete&id=<?php echo $id; ?>" class="btn btn-outline-danger">Delete</a>
                                    </td>

                                </tr>

                            <?php } ?>
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?php include './includes/footer.php'; ?>
