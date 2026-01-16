        <header class="row justify-content-center mt-md-4">
            <?php if (!empty($canteen->getImg())): ?>
            <div class="col-12 col-md-4 offset-md-1 order-md-2 p-0">
                <img src="<?php echo UPLOAD_DIR . $canteen->getImg(); ?>" class="img-fluid mb-3 pe-md-2 w-100" alt="">
            </div>
            <div class="col-10 col-md-5 order-md-1">
            <?php else: ?>
            <div class="col-10">
            <?php endif; ?>
                <h1><?php echo $canteen->getName() ?></h1>
                <p class="badge bg-secondary"><?php echo $canteen->getCategory() ?></p>
                <p>
                <?php
                    printStars($canteen->getAvgReviews());
                    echo $canteen->getAvgReviews();
                ?>
                    <span class="text-body-secondary">(<?php echo $canteen->getNumReviews(); ?> recensioni)</span>
                </p>
                <p class="text-body-secondary"><?php echo $canteen->getDescription(); ?></p>
            </div>
        </header>