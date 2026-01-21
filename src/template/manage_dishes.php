<?php require("components/header.php"); ?>
<!-- Add dish button -->
<div class="d-flex justify-content-center mb-3">
    <a href="create_dish.php" class="btn btn-primary col-10 col-md-9">Aggiungi Piatto</a>
</div>
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-11 col-md-10 p-md-0">
            <!-- Dishes -->
            <?php if (!empty($templateParams["dishes"])): ?>
                <?php foreach ($templateParams["dishes"] as $dish): ?>
                    <div class="card shadow rounded-2 mb-3">
                        <div class="card-body">
                            <header class="row mb-3">
                                <div class="col-8 justify-content-left">
                                    <h4 class="card-title"><?php echo htmlspecialchars($dish->getName()); ?></h4>
                                </div>
                            </header>
                            <section>
                                <div class="row justify-content-start mb-3">
                                    <div class="col-12">
                                        <h5 class="card-text">Descrizione: </h5>
                                        <p class="card-text text-body-secondary"><?php echo htmlspecialchars($dish->getDescription()); ?></p>
                                    </div>
                                </div>
                                <div class="row justify-content-start">
                                    <div class="col-12">
                                        <h5 class="card-text">Prezzo: </h5>
                                        <p class="card-text text-body-secondary fw-bold">€<?php echo htmlspecialchars(number_format($dish->getPrice(), 2)); ?></p>
                                    </div>
                                </div>
                            </section>
                            <footer class="row justify-content-end mt-3">
                                <div class="col-auto">
                                    <!-- here we open a create_dish page with all the dish details pre-filled for editing -->
                                    <a href="create_dish.php?id=<?php echo urlencode($dish->getId()); ?>" class="btn btn-secondary btn-sm rounded-3 me-1">
                                        <span class="bi bi-pencil me-2"></span>Modifica
                                    </a>
                                    <div class="d-inline">
                                        <!--Pulsante Modal-->
                                        <button type="button" title="Elimina Piatto" class="btn btn-primary btn-sm rounded-3" data-bs-toggle="modal" data-bs-target="#remove-confirm-<?php echo $dish->getId(); ?>">
                                            <span class="bi bi-trash me-2"></span>Elimina
                                        </button>
                                    </div>
                                </div>
                            </footer>
                            <!-- Modal -->
                            <div class="modal fade" id="remove-confirm-<?php echo $dish->getId(); ?>" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="removeConfirmLabel-<?php echo $dish->getId(); ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title fs-5" id="removeConfirmLabel-<?php echo $dish->getId(); ?>">Conferma rimozione</h2>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Sei sicuro di voler eliminare il piatto <strong><?php echo htmlspecialchars($dish->getName()); ?></strong>?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annulla</button>
                                            <form class="d-inline" action="manage_dishes.php" method="POST">
                                                <input type="hidden" name="delete_dish_id" value="<?php echo htmlspecialchars($dish->getId()); ?>" />
                                                <button class="btn btn-primary" type="submit">Elimina Definitivamente</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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