<header class="mt-3 container">
    <h1>Il profilo di <strong><?php echo $user->getName(); ?></strong></h1>
</header>
<section class="mt-4 container">
    <header>
        <h2>Le tue informazioni</h2>
    </header>
    <div class="row justify-content-center">
        <?php if (isset($templateParams["delete_error"])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="bi bi-exclamation-circle-fill"> <?php echo $templateParams["delete_error"]; ?></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="col-12 col-md-8">
            <ul class="list-unstyled">
                <li><strong>Nome:</strong> <?php echo $user->getName(); ?></li>
                <li><strong>Cognome:</strong> <?php echo $user->getSurname(); ?></li>
                <li><strong>Email:</strong> <?php echo $user->getEmail(); ?></li>
            </ul>
        </div>
        <div class="col-12 col-md-4 d-grid">
            <a href="mod_customer_data.php" role="button" class="btn btn-secondary mb-2"><span
                    class="bi bi-pencil"></span> Modifica profilo</a>
            <a href="change_password.php" role="button" class="btn btn-secondary mb-2"><span
                    class="bi bi-key-fill"></span> Modifica password</a>
            <a href="delete_profile.php" role="button" class="btn btn-primary mb-2"
                data-bs-target="#first-delete-confirm" data-bs-toggle="modal"><span class="bi bi-trash"></span> Elimina
                profilo</a>
        </div>
    </div>
    <!-- Double modal for confirm profile deletion -->
    <div class="modal fade" id="first-delete-confirm" aria-hidden="true" aria-labelledby="first-delete-confirm-label" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="first-delete-confirm-label">Elimina profilo</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Sei sicuro di voler eliminare il tuo profilo? Questa azione è irreversibile e comporta la perdita
                        di:
                    </p>
                    <ul>
                        <li>Tutti i dati personali inseriti</li>
                        <li>Tutte le prenotazioni</li>
                        <li>Tutte le recensioni</li>
                    </ul>
                    <p>Vuoi procedere?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annulla</button>
                    <button class="btn btn-primary" data-bs-target="#last-delete-confirm"
                        data-bs-toggle="modal">Continua</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="last-delete-confirm" aria-hidden="true" aria-labelledby="last-delete-confirm-label" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5" id="last-delete-confirm-label">Elimina profilo (ultimo passaggio)</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Sei <strong>sicuro</strong> di voler <strong>eliminare definitivamente</strong> il tuo profilo?
                        Ricordo che questa azione è <strong>irreversibile</strong> e comporta la perdita di:</p>
                    <ul>
                        <li>Tutti i dati personali inseriti</li>
                        <li>Tutte le prenotazioni</li>
                        <li>Tutte le recensioni</li>
                    </ul>
                    <p>Clicca su <strong>Elimina</strong> per eliminare definitivamente il profilo.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annulla</button>
                    <a href="profile.php?action=D&email=<?php echo $user->getEmail(); ?>" role="button"
                        class="btn btn-danger">Rimuovi</a>
                </div>
            </div>
        </div>
    </div>
</section>