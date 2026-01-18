<div class="card shadow rounded-2 mb-3 <?php if (!$reservation->isActive())
    echo 'bg-light'; ?>">
    <div class="card-body">
        <header class="row mb-3">
            <div class="col-8 justify-content-left">
                <h3 class="card-title fs-5">Codice: <span class="reservation-code"><?php echo $reservation->getCode(); ?></span></h3>
            </div>
            <div class="col-4 justify-content-end text-end">
                <button type="button" title="modifica"
                    class="btn btn-primary btn-sm rounded-3 <?php if (!$reservation->isActive())
                        echo 'disabled'; ?>"><span
                        class="bi bi-pencil"></span></button>
                <button type="button" title="elimina"
                    class="btn btn-outline-secondary btn-sm rounded-3 <?php if (!$reservation->isActive()) echo 'disabled'; ?>" data-bs-toggle="modal" data-bs-target="#remove-confirm-<?php echo $reservation->getCode(); ?>"><span class="bi bi-trash"></span></button>
            </div>
        </header>

        <div class="row align-items-center mb-4">
            <div class="col-12 col-md-8 mb-3 mb-md-0">
                <strong class="card-text">Data e ora:</strong>
                <p class="card-text text-body-secondary">
                    <?php echo date_format($reservation->getDateTime(), "d M Y - H:i"); ?></p>

                <strong class="card-text">Mensa:</strong>
                <p class="card-text text-body-secondary"><a
                        href="canteen_details.php?id=<?php echo $reservation->getCanteen()->getId(); ?>"
                        class="card-link text-body-secondary"><?php echo $reservation->getCanteen()->getName(); ?></a>
                </p>
                <strong class="card-text">Numero di persone:</strong>
                <p class="card-text text-body-secondary"><?php echo $reservation->getNumPeople(); ?> </p>
            </div>

            <div class="col-12 col-md-4 d-flex justify-content-center">
                <div id="<?php echo $reservation->getCode(); ?>-qrcode" class="qr-code"></div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="remove-confirm-<?php echo $reservation->getCode(); ?>" data-bs-keyboard="false" tabindex="-1" aria-labelledby="removeConfirmLabel-<?php echo $reservation->getCode(); ?>" aria-hidden="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="removeConfirmLabel-<?php echo $reservation->getCode(); ?>">Conferma
                    rimozione</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Sei sicuro di voler eliminare la prenotazione con codice
                    <strong><?php echo $reservation->getCode(); ?></strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annulla</button>
                <form action="reservation.php" method="POST">
                    <input type="hidden" name="action" value="D" />
                    <input type="hidden" name="id" value="<?php echo $reservation->getCode(); ?>" />
                    <input type="submit" class="btn btn-primary" value="Rimuovi" />
                </form>
            </div>
        </div>
    </div>
</div>