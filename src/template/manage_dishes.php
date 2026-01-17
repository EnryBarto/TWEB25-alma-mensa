<header class="text-center container mt-3 mb-4">
            <h1>Tutti i Piatti</h1>
        </header>
        <!-- Add dish button -->
        <div class="d-flex justify-content-center mb-3">
            <a href="create_dish.php" class="btn btn-primary col-9">Aggiungi Piatto</a>
        </div>
        <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-10">
                    <!-- Dishes -->
                    <?php if (!empty($templateParams["dishes"])): ?>
                        <?php foreach ($templateParams["dishes"] as $dish): ?>
                            <div class="card shadow rounded-2 mb-3">
                                <div class="card-body">
                                    <header class="row mb-3">
                                        <div class="col-8 justify-content-left">
                                            <h5 class="card-title"><?php echo htmlspecialchars($dish->getName()); ?></h5>
                                        </div>
                                    </header>
                                    <section>
                                        <div class="row justify-content-start mb-3">
                                            <div class="col-12">
                                                <h6 class="card-text">Descrizione: </h6>
                                                <p class="card-text text-body-secondary"><?php echo htmlspecialchars($dish->getDescription()); ?></p>
                                            </div>
                                        </div>
                                        <div class="row justify-content-start">
                                            <div class="col-12">
                                                <h6 class="card-text">Prezzo: </h6>
                                                <p class="card-text text-body-secondary fw-bold">€<?php echo htmlspecialchars(number_format($dish->getPrice(), 2)); ?></p>
                                            </div>
                                        </div>
                                    </section>
                                    <footer class="row justify-content-end mt-3">
                                        <div class="col-auto">
                                            <!-- here we open a create_dish page with all the dish details pre-filled for editing -->
                                            <a href="create_dish.php?id=<?php echo urlencode($dish->getId()); ?>" class="btn btn-primary btn-sm rounded-3 me-2">
                                                <span class="bi bi-pencil me-2"></span>Modifica
                                            </a>
                                            <form method="POST" action="manage_dishes.php" style="display: inline;" onsubmit="return confirm('Sei sicuro di voler eliminare questo piatto?');">
                                                <input type="hidden" name="delete_dish_id" value="<?php echo htmlspecialchars($dish->getId()); ?>">
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
                            Nessun piatto disponibile per questa mensa.
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>