<form action="mod_customer_data.php" method="post" class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-10 col-md-8 col-lg-6 col-xl-4 border rounded shadow p-3">
            <header class="mb-4 mt-4">
                <h1>Modifica profilo</h1>
                <?php if (isset($msg["errore"])): ?>
                    <div class="is-invalid"></div>
                    <div class="mb-3 invalid-feedback">
                        <span class="bi bi-exclamation-circle-fill"></span> <?php echo $msg["errore"]; ?>
                    </div>
                <?php endif; ?>
            </header>
            <div class="mb-3">
                <label for="name-input" class="form-label">Nome</label>
                <input type="text" name="name" id="name-input" class="form-control" value="<?php echo $user->getName(); ?>" placeholder="Inserisci nome"
                    required />
            </div>
            <div class="mb-3">
                <label for="surname-input" class="form-label">Cognome</label>
                <input type="text" name="surname" id="surname-input" class="form-control" value="<?php echo $user->getSurname(); ?>"
                    placeholder="Inserisci cognome" required />
            </div>
            <div class="d-grid mb-3">
                <input type="submit" name="submit" class="btn btn-primary" value="Modifica dati" />
            </div>
            <?php if (isset($templateParams["success_modify"]) && $templateParams["success_modify"]): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="bi bi-check-circle-fill"> Dati modificati con successo!</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</form>