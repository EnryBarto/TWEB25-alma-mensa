<?php require("components/canteen_header_lite.php") ?>
        <?php if (count($templateParams["menus"]) == 0): ?>
            <div class="row justify-content-center px-3">
                <div class="col-10 alert alert-info text-center" role="alert">
                    <span class="bi bi-info-circle-fill me-2"></span>
                    Nessun menu disponibile per questa mensa.
                </div>
            </div>
        <?php else: ?>
        <?php foreach($templateParams["menus"] as $menu): ?>
            <div class="row justify-content-center px-3">
                <div class="card col-10 p-0 mb-2">
                    <div class="card-body">
                        <!-- Menu Name -->
                        <h2 class="card-title fs-4 mb-3"><?php echo htmlspecialchars($menu->getNome()); ?></h2>
                        <hr class="mb-3">
                        <!-- Dishes List -->
                        <ul class="list-unstyled mb-0">
                            <?php foreach($menu->getDishes() as $dish): ?>
                                <li class="mb-2">
                                    <strong><?php echo htmlspecialchars($dish->getName()); ?></strong>
                                    <span class="text-primary fw-bold"> - <?php echo number_format($dish->getPrice(), 2, ',', ''); ?> €</span>
                                    <span class="text-muted"> - <?php echo htmlspecialchars($dish->getDescription()); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php endif; ?>