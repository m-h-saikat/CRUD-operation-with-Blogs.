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
                        <h4> Update Blog </h4>
                    </div>
                    <div class="card-body">
                        <form action="action.php" method="POST" enctype="multipart/form-data">

                            <div class="form-group row">
                                <label for="" class="col-md-3 col-form-label ">Title </label>
                                <div class="col-md-9">
                                    <input type="text" value="<?php echo $title;?>" name="name" class="form-control row"/>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                                </div>
                            </div>




                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-3">  Description </label>
                                <div class="col-md-9">
                                    <textarea name="description" class="form-control row"><?php echo $description;?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-form-label col-md-3">  Image</label>
                                <div class="col-md-9">
                                    <input type="file" name="image" class="form-control-file"/>
                                    <img src="<?php echo $image;?>" alt="" height="100" width="160"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label col-md-3"> </label>
                                <div class="col-md-9">
                                    <input type="submit" name="updateBtn" class="btn btn-outline-info btn-block"
                                           value="Update blog info"/>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?php include './includes/footer.php'; ?>
