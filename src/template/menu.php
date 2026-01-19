<?php require("components/canteen_header_lite.php") ?>
        <?php if ($templateParams["menu"] === null || count($templateParams["menu"]->getDishes()) === 0): ?>
            <div class="row justify-content-center px-3">
                <div class="col-10 alert alert-info text-center" role="alert">
                    <span class="bi bi-info-circle-fill me-2"></span>
                    Nessun menu disponibile per questa mensa.
                </div>
            </div>
        <?php else: ?>
        <?php foreach($templateParams["menu"]->getDishes() as $dish): ?>
            <div class="row justify-content-center px-3">
                <div class="card col-10 p-0 mb-2">
                    <div class="card-body">
                        <!-- Dishes List -->
                        <h2 class="card-title fs-4 mb-3">
                            <?php echo htmlspecialchars($dish->getName()); ?>
                            <span class="text-primary fw-bold text-end float-end">
                                <?php echo $dish->getPrice() . "€" ?>
                            </span>
                        </h2>
                        <span class="text-muted">
                            - <?php echo htmlspecialchars($dish->getDescription()); ?>
                        </span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php endif; ?>