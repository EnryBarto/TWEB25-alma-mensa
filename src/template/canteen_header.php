        <header class="row justify-content-center mt-md-4">
            <?php if (!empty($canteen->getImg())): ?>
            <div class="col-12 col-md-4 offset-md-1 order-md-2 p-0">
                <img src="<?php echo UPLOAD_DIR . $canteen->getImg(); ?>" class="img-fluid mb-3" alt="">
            </div>
            <div class="col-10 col-md-5 order-md-1">
            <?php else: ?>
            <div class="col-10">
            <?php endif; ?>
                <h1><?php echo $canteen->getName() ?></h1>
                <p class="badge bg-secondary"><?php echo $canteen->getCategory() ?></p>
                <p>
                    <?php for ($i = 1; $i <= $canteen->getAvgReviews(); $i++): ?>
                        <span class="bi bi-star-fill"></span>
                    <?php endfor;
                    $decimals = $canteen->getAvgReviews() - floor($canteen->getAvgReviews());
                    if ($decimals >= 0.5) {
                        echo "<span class=\"bi bi-star-half\"></span>\n";
                        $i++;
                    }
                    for ( ; $i <= 5; $i++): ?>
                        <span class="bi bi-star"></span>
                    <?php endfor;
                    echo $canteen->getAvgReviews(); ?>
                    <span class="text-body-secondary">(<?php echo $canteen->getNumReviews(); ?> recensioni)</span>
                </p>
                <p class="text-body-secondary"><?php echo $canteen->getDescription(); ?></p>
            </div>
        </header>