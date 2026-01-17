<div class="card border rounded-4 shadow h-100">
    <img src="<?php echo empty($c->getImg()) ? "assets/img/no_img.jpg" : UPLOAD_DIR . $c->getImg(); ?>"
        class="card-img-top rounded-top-4" alt="" />
    <div class="card-body">
        <h2 class="card-title fs-4"><?php echo $c->getName() ?></h2>
        <p class="card-text"><?php echo $c->getDescription() ?></p>
        <p class="card-text" title="Valutazione media e numero di recensioni">
            <span title="Valutazione media: <?php echo number_format($c->getAvgReviews(), 1); ?>">
                <?php printStars($c->getAvgReviews()); ?>
            </span>
            <span class="text-body-secondary"><?php echo number_format($c->getAvgReviews(), 1); ?> su
                <?php echo $c->getNumReviews(); ?> recensioni</span>
        </p>
        <a href="canteen_details.php?id=<?php echo $c->getId() ?>" class="btn btn-primary mt-auto">Dettaglio</a>
    </div>
</div>