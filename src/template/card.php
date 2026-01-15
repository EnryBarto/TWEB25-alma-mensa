<div class="card h-100">
                            <img src="<?php echo empty($c->getImg()) ? "assets/img/no_img.jpg" : UPLOAD_DIR . $c->getImg(); ?>"
                                class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $c->getName() ?></h5>
                                <p class="card-text"><?php echo $c->getDescription() ?></p>
                                <p class="card-text" title="Valutazione media e numero di recensioni">
                                    <span title="Valutazione media: <?php echo number_format($c->getAvgReviews(), 1); ?>">
                                        <?php for ($i = 1; $i <= $c->getAvgReviews(); $i++): ?>
                                            <span class="bi bi-star-fill"></span>
                                        <?php endfor;
                                        $decimals = $c->getAvgReviews() - floor($c->getAvgReviews());
                                        if ($decimals >= 0.5) {
                                            echo "<span class=\"bi bi-star-half\"></span>";
                                            $i++;
                                        }
                                        for (; $i <= 5; $i++): ?>
                                            <span class="bi bi-star"></span>
                                        <?php endfor; ?>
                                    </span>
                                    <span class="text-body-secondary"><?php echo number_format($c->getAvgReviews(), 1); ?> su <?php echo $c->getNumReviews(); ?> recensioni</span>
                                </p>
                                <a href="canteen_details.php?id=<?php echo $c->getId() ?>"
                                    class="btn btn-primary mt-auto">Dettaglio</a>
                            </div>
                        </div>