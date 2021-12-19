
<?php  include 'includes/header.php';?>
<?php if (isset($_SESSION['id'])){
    header('Location: home.php');
}?>

<section class="py-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Login Here</h3>
                    </div>
                    <div class="card-body">
                        <h4 class="text-center text-danger">
                            <?php echo isset($message)? $message : '';?>
                        </h4>
                        <form action="action.php" method="POST">
                            <div class="form-group row">
                                <label class="col-form-label col-md-3">Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3">Email</label>
                                <div class="col-md-9">
                                    <input type="email" name="email" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3">Password</label>
                                <div class="col-md-9">
                                    <input type="password" name="password" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3"></label>
                                <div class="col-md-9">
                                    <input type="submit" name="loginBtn" class="btn btn-outline-info btn-block" value="Login" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?php include 'includes/footer.php';  ?>
