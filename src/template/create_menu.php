<div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form class="needs-validation" method="POST" action="create_menu.php" novalidate>
                            <div class="mb-4">
                                <h6 class="text-uppercase text-secondary small mb-3">Nome Menu<span class="text-primary">*</span></h6>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Es: Menu freddo" required>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="text-uppercase text-secondary small mb-0">Piatti</h6>
                                    <a href="create_dish.php" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-plus-lg"></i> Aggiungi Piatto
                                    </a>
                                </div>
                                <label class="form-label">Seleziona i piatti da includere nel menu</label>
                                <!-- Dishes to load dynamically here -->
                                <?php if (!empty($templateParams["dishes"])): ?>
                                    <?php foreach ($templateParams["dishes"] as $dish): ?>
                                        <label class="border rounded p-3 mb-3 d-block checkbox-label" style="cursor: pointer;">
                                            <input type="checkbox" class="form-check-input" name="dishes[]" value="<?php echo $dish->getId(); ?>">
                                            <span class="ms-2">
                                                <strong><?php echo htmlspecialchars($dish->getName()); ?></strong>
                                                <br>
                                                <small class="text-body-secondary"><?php echo htmlspecialchars($dish->getDescription()); ?></small>
                                                <br>
                                                <small class="text-primary fw-bold">€<?php echo number_format($dish->getPrice(), 2); ?></small>
                                            </span>
                                        </label>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="alert alert-secondary" role="alert">
                                        Nessun piatto disponibile. <a href="create_dish.php">Aggiungi il primo piatto</a>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <a href="manage_menus.php" class="btn btn-outline-secondary">Annulla</a>
                                <button type="submit" class="btn btn-primary">Salva</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>