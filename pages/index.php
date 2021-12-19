<?php include 'includes/header.php';?>

<section class="py-5">
    <div class="container">
        <div class="row">
            <?php foreach ($blogs as $blog){ extract($blog) ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?php echo $image; ?>" alt="" style="height: 300px;" class="card-img-top"/>
                        <div class="card-body">
                            <h3><?php echo $title; ?></h3>
                            <h4><?php echo $description; ?></h4>
                            <a href="action.php?status=detail&id=<?php echo $id; ?>" class="btn btn-outline-info" name="">Detail</a>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
