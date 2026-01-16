<?php require("canteen_header_lite.php"); ?>
        <div class="row justify-content-center align-items-md-center px-3">
            <div class="col-10 <?php if(isUserLoggedIn()) echo "col-md-7"; ?> card mb-3 py-2">
                <div class="row g-0">
                    <div class="col-5 row g-0 align-items-center justify-content-center text-center">
                        <span class="col-12 fs-1 fw-bold"><?php echo $templateParams["canteen"]->getAvgReviews(); ?></span>
                        <p class="col-12"><?php printStars($templateParams["canteen"]->getAvgReviews()) ?></p>
                    </div>
                    <div class="col-7">
                        <div class="card-body p-2">
                            <span class="card-text border-start ps-4">Basato su</span>
                            <p class="card-title border-start ps-4 fw-bold fs-5"><?php echo $templateParams["canteen"]->getNumReviews() ?> recensioni</p>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(isUserLoggedIn()): ?>
            <section class="col-10 col-md-3 mb-3 p-0">
                <div class="col-12 col-md-10 offset-md-1 d-grid p-0 h-100">
                    <a class="btn btn-primary" role="button" href="add_review.php?id=<?php echo $templateParams["canteen"]->getId(); ?>"><span class="bi bi-star"></span>&nbsp;Recensisci</a>
                </div>
            </section>
            <?php endif; ?>
        </div>
        <div class="row justify-content-center px-3">

            <?php foreach($templateParams["reviews"] as $r): ?>

            <article class="card col-10 mb-2">
                <div class="card-body">
                    <h2 class="card-title fs-5"><?php echo $r->getTitle(); ?></h2>
                    <p class="card-subtitle mb-2 text-body-secondary">
                    <?php
                        printStars($r->getValue());
                        echo $r->getValue();
                    ?>
                    </p>
                    <p class="card-text"><?php echo $r->getDescription(); ?></p>
                    <div class="card-text border-top mb-2"></div>
                    <p class="card-text mb-2"><?php echo $r->getAuthor(); ?></p>
                    <p class="card-text text-secondary"><?php echo $r->getTimestamp(); ?></p>
                </div>
            </article>

            <?php endforeach; ?>
        </div>