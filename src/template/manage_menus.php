<?php require("components/header.php"); ?>
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
                                    <h2 class="card-title h5"><?php echo htmlspecialchars($menu->getNome()); ?></h2>
                                </div>
                                <div class="col-4 justify-content-end text-end">
                                    <?php $isActive = $menu->isAttivo(); ?>
                                    <span class="badge <?php echo $isActive ? 'bg-success' : 'bg-secondary'; ?>">
                                        <?php echo $isActive ? 'Attivo' : 'Non visualizzato'; ?>
                                    </span>
                                </div>
                            </header>
                            <section>
                                <div class="row justify-content-start mb-3">
                                    <div class="col-12">
                                        <h2 class="card-text h6">Mensa:</h2>
                                        <p class="card-text text-body-secondary">
                                            <?php echo htmlspecialchars($templateParams["canteen"]->getName()); ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row justify-content-start mb-3">
                                    <div class="col-12">
                                        <h2 class="card-text h6">Piatti:</h2>
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
                                    <a href="create_menu.php?id=<?php echo urlencode($menu->getId()); ?>" class="btn btn-secondary btn-sm rounded-3">
                                        <span class="bi bi-pencil me-2"></span>Modifica
                                    </a>
                                    <div style="display: inline;">
                                        <!--Pulsante Modal-->
                                        <button type="button" title="Elimina Menu" class="btn btn-primary btn-sm rounded-3" data-bs-toggle="modal" data-bs-target="#remove-confirm-<?php echo $menu->getId(); ?>">
                                            <span class="bi bi-trash me-2"></span>Elimina
                                        </button>
                                    </div>
                                </div>
                            </footer>
                            <!-- Modal -->
                            <div class="modal fade" id="remove-confirm-<?php echo $menu->getId(); ?>" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="removeConfirmLabel-<?php echo $menu->getId(); ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="modal-title fs-5" id="removeConfirmLabel-<?php echo $menu->getId(); ?>">Conferma rimozione</h2>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Sei sicuro di voler eliminare il menu <strong><?php echo $menu->getNome(); ?></strong>?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annulla</button>
                                            <form class="d-inline" action="manage_menus.php" method="POST">
                                                <input type="hidden" name="delete_menu_id" value="<?php echo htmlspecialchars($menu->getId()); ?>" />
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
                    Nessun menù disponibile per questa mensa.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>