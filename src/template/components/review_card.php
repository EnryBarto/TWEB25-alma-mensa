<article class="card col-10 mb-2">
    <div class="card-body">
        <h2 class="card-title fs-5">
        <?php if(isset($templateParams["canteens"]["{$r->getCanteenId()}"])):
            $c = $templateParams["canteens"]["{$r->getCanteenId()}"]?>
            <a title="Vai a <?php echo $c->getName()?>" href="canteen_details.php?id=<?php echo $c->getId(); ?>"><?php echo $c->getName()?>:</a>
        <?php endif; ?>
            <?php echo $r->getTitle(); ?>
        </h2>
        <p class="card-subtitle mb-2 text-body-secondary">
        <?php
            printStars($r->getValue());
            echo $r->getValue();
        ?>
        </p>
        <p class="card-text"><?php echo $r->getDescription(); ?></p>
        <div class="card-text border-top mb-2"></div>
        <?php if (isUserLoggedIn() && $r->getAuthorEmail() == $user->getEmail()): ?>
        <div class="my-2">
            <a class="btn btn-outline-primary btn-sm" title="Modifica recensione" href="manage_review.php?action=U&id=<?php echo $r->getId(); ?>&redirect=<?php echo urlencode($templateParams["redirect"])?>"><span class="bi bi-pen-fill"></span></a>
            <!--Pulsante Modal-->
            <button type="button" title="Elimina recensione" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#remove-confirm-<?php echo $r->getId(); ?>"><span class="bi bi-trash-fill"></span></button>

            <!-- Modal -->
            <div class="modal fade" id="remove-confirm-<?php echo $r->getId(); ?>" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="removeConfirmLabel-<?php echo $r->getId(); ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title fs-5" id="removeConfirmLabel-<?php echo $r->getId(); ?>">Conferma rimozione</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Sei sicuro di voler eliminare la tua recensione di titolo <strong><?php echo $r->getTitle(); ?></strong> scritta il <strong><?php echo $r->getTimestamp() ?></strong>?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annulla</button>
                            <form class="d-inline" action="manage_review.php" method="POST">
                                <input type="hidden" name="action" value="D"/>
                                <input type="hidden" name="redirect" value="<?php echo urlencode($templateParams["redirect"])?>"/>
                                <input type="hidden" name="review_id" value="<?php echo $r->getId() ?>"/>
                                <button class="btn btn-primary" type="submit">Elimina Definitivamente</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <p class="card-text mb-2"><?php echo $r->getAuthor(); ?></p>
        <p class="card-text text-secondary"><?php echo $r->getTimestamp(); ?></p>
    </div>
</article>
