<?php
    $canteen = $templateParams["canteen"];
    require("canteen_header.php");
?>

        <section class="row justify-content-center d-md-block">
            <div class="col-5 col-md-4 offset-md-1 d-grid gap-2 mb-md-2">
                <a class="btn btn-outline-primary btn-sm" role="button" href="reviews.php"><span class="bi bi-star"></span>&nbsp;Recensioni</a>
            </div>
            <div class="col-5 col-md-4 offset-md-1 d-grid gap-2">
                <a class="btn btn-outline-primary btn-sm" role="button" href="menu.php"><span class="bi bi-card-text"></span>&nbsp;Menu</a>
            </div>
        </section>

        <section class="row justify-content-center justify-content-md-start mt-3">
            <div class="col-10 col-md-9 offset-md-1">
                <ul class="list-unstyled">
                    <li class="d-flex align-items-center mb-3">
                        <span class="bi bi-geo-alt text-primary fs-3 me-3"></span>
                        <?php echo $canteen->getAddress()->getFormatted(); ?>
                    </li>

                    <?php if (!empty($canteen->getTelephone())): ?>
                    <li class="d-flex align-items-center mb-3">
                        <span class="bi bi-telephone text-primary fs-3 me-3"></span>
                        <?php echo $canteen->getTelephone(); ?>
                    </li>
                    <?php endif; ?>

                    <li class="d-flex align-items-start">
                        <span class="bi bi-clock text-primary fs-3 me-3"></span>
                        <div>
                            <span class="mb-1"><strong>Lun-Ven:</strong> 7:00 - 22:00</span><br/>
                            <span><strong>Sab-Dom:</strong> 8:00 - 23:00</span>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <section class="row justify-content-center d-md-block">
            <div class="col-10 col-md-4 offset-md-1 d-grid gap-2">
                <a class="btn btn-primary" role="button" href="reservation.php"><span class="bi bi-journal-check"></span>&nbsp;Prenota</a>
            </div>
        </section>
