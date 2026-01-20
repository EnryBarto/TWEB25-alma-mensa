        <header class="row justify-content-center">
            <?php if (!empty($canteen->getImg())): ?>
            <div class="col-12 col-md-4 offset-md-1 order-md-2 p-0 mt-md-4">
                <img src="<?php echo UPLOAD_DIR . $canteen->getImg(); ?>" class="img-fluid mb-3 pe-md-2 w-100" alt="">
            </div>
            <div class="col-11 col-md-5 order-md-1 mt-md-4">
            <?php else: ?>
            <div class="col-11 col-md-10 mt-4">
            <?php endif; ?>
                <a class="col-11 col-md-10 p-0 text-dark h1 d-block" href="canteen_details.php?id=<?php echo $templateParams["canteen"]->getId(); ?>"><?php echo $templateParams["canteen"]->getName(); ?></a>
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