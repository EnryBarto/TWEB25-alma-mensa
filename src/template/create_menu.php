<div class="container py-4">
    <header class="row justify-content-center text-center">
        <a class="col-10 text-dark h1" href="canteen_details.php?id=<?php echo $templateParams["canteen"]->getId(); ?>"><?php echo $templateParams["canteen"]->getName(); ?></a>
        <p class="col-10 text-primary fs-4 fw-bold"><?php echo $templateParams["subtitle"] ; ?></p>
    </header>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <?php if (isset($templateParams["error"])): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong class="bi bi-exclamation-triangle-fill"></strong> <?php echo htmlspecialchars($templateParams["error"]); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <form class="needs-validation" method="POST" action="create_menu.php" novalidate>
                        <?php if (isset($menu)): ?>
                            <input type="hidden" name="menu_id" value="<?php echo htmlspecialchars($menu->getId()); ?>" />
                        <?php endif; ?>
                        <div class="mb-4">
                            <h6 class="text-uppercase text-secondary small mb-3">Nome Menu<span class="text-primary">*</span></h6>
                            <input type="text" class="form-control" id="nome" name="nome" title="Nome del menu" placeholder="Es: Menu freddo" value="<?php echo isset($menu) ? htmlspecialchars($menu->getNome()) : ''; ?>" required />
                        </div>

                        <div class="mb-4">
                            <fieldset>
                            <legend>Stato Menu</legend>
                                <h6 class="text-uppercase text-secondary small mb-3">Stato Menu<span class="text-primary">*</span></h6>
                                <input type="radio" class="btn-check" name="attivoBtn" title="Attivo" id="attivo" value="1" <?php echo (isset($menu) && $menu->isAttivo()) || !isset($menu) ? 'checked' : ''; ?> autocomplete="off" />
                                <label class="btn btn-outline-success me-2" for="attivo">Attivo</label>
                                <input type="radio" class="btn-check" name="attivoBtn" title="Non Attivo" id="nonAttivo" value="0" <?php echo isset($menu) && !$menu->isAttivo() ? 'checked' : ''; ?> autocomplete="off" />
                                <label class="btn btn-outline-danger" for="nonAttivo">Non Attivo</label>
                            </fieldset>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="text-uppercase text-secondary small mb-0">Piatti</h6>
                                <a href="create_dish.php" class="btn btn-sm btn-outline-primary">
                                    <strong class="bi bi-plus-lg"></strong> Aggiungi Piatto
                                </a>
                            </div>
                            <label class="form-label">Seleziona i piatti da includere nel menu</label>
                            <!-- Dishes load dynamically here -->
                            <?php if (!empty($templateParams["dishes"])): ?>
                                <?php foreach ($templateParams["dishes"] as $dish): ?>
                                    <?php $isChecked = isset($selectedDishIds) && in_array($dish->getId(), $selectedDishIds); ?>
                                    <label class="border rounded p-3 mb-3 d-block checkbox-label" style="cursor: pointer;">
                                        <input type="checkbox" class="form-check-input" name="dishes[]" title="checkbox piatto" value="<?php echo $dish->getId(); ?>" <?php echo $isChecked ? 'checked' : ''; ?> />
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
                            <button type="submit" class="btn btn-primary"><?php echo isset($menu) ? 'Aggiorna' : 'Salva'; ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>