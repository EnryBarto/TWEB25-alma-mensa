<header class="text-center container mt-3 mb-4">
            <h1>Tutti i Menù</h1>
        </header>
        <!-- Add menu button -->
        <div class="d-flex justify-content-center mb-3">
            <a href="create_menu.php" class="btn btn-primary col-10 col-md-9">Aggiungi Menù</a>
        </div>
        <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-11 col-md-10 p-md-0">
                    <!-- Menus -->
                    <?php if (!empty($templateParams["menus"])): ?>
                        <?php foreach ($templateParams["menus"] as $menu): ?>
                            <div class="card shadow rounded-2 mb-3">
                                <div class="card-body">
                                    <header class="row mb-3">
                                        <div class="col-8 justify-content-left">
                                            <h5 class="card-title"><?php echo htmlspecialchars($menu->getNome()); ?></h5>
                                        </div>
                                        <div class="col-4 justify-content-end text-end">
                                            <?php $isActive = $menu->isAttivo(); ?>
                                            <span class="badge <?php echo $isActive ? 'bg-success' : 'bg-secondary'; ?>">
                                                <?php echo $isActive ? 'Disponibile' : 'Non disponibile'; ?>
                                            </span>
                                        </div>
                                    </header>
                                    <section>
                                        <div class="row justify-content-start mb-3">
                                            <div class="col-12">
                                                <h6 class="card-text">Mensa:</h6>
                                                <p class="card-text text-body-secondary">
                                                    <?php echo htmlspecialchars($templateParams["canteen"]->getName()); ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row justify-content-start mb-3">
                                            <div class="col-12">
                                                <h6 class="card-text">Piatti:</h6>
                                                <?php $dishes = $menu->getDishes(); ?>
                                                <?php if (!empty($dishes)): ?>
                                                    <ul class="text-body-secondary">
                                                        <?php foreach ($dishes as $dish): ?>
                                                            <li><?php echo htmlspecialchars($dish->getName()); ?></li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                <?php else: ?>
                                                    <p class="card-text text-body-secondary">Nessun piatto presente</p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </section>
                                    <footer class="row justify-content-end mt-3">
                                        <div class="col-auto">
                                            <a href="create_menu.php?id=<?php echo urlencode($menu->getId()); ?>" class="btn btn-primary btn-sm rounded-3 me-2">
                                                <span class="bi bi-eye me-2"></span>Modifica
                                            </a>
                                            <form method="POST" action="manage_menus.php" style="display: inline;" onsubmit="return confirm('Sei sicuro di voler eliminare questo menù?');">
                                                <input type="hidden" name="delete_menu_id" value="<?php echo htmlspecialchars($menu->getId()); ?>">
                                                <button type="submit" class="btn btn-danger btn-sm rounded-3">
                                                    <span class="bi bi-trash me-2"></span>Elimina
                                                </button>
                                            </form>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="alert alert-secondary" role="alert">
                            Nessun menù disponibile per questa mensa.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>