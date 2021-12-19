<?php include 'includes/header.php';?>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-body">
                    <img src="<?php echo $blogInfo['image']; ?>" alt="" class="w-100" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-body">
                    <h2 class="card-title">Blog Title : <?php echo $blogInfo['title']; ?></h2>
                    <h2 class="card-title">Description: <?php echo $blogInfo['description']; ?></h2>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
