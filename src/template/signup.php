<?php require("components/header.php"); ?>
<form action="#" method="post" class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-11 col-md-8 col-lg-6 col-xl-4 border rounded shadow p-3">
            <div class="mb-4 mt-4">
                <?php if (isset($msg["errore"])): ?>
                    <div class="is-invalid"></div>
                    <div class="mb-3 invalid-feedback">
                        <span class="bi bi-exclamation-circle-fill"></span> <?php echo $msg["errore"]; ?>
                    </div>
                <?php endif; ?>
                </div>
            <div class="mb-3">
                <label for="name-input" class="form-label">Nome</label>
                <input type="text" name="name" id="name-input" class="form-control" placeholder="Inserisci nome" required />
            </div>
            <div class="mb-3">
                <label for="surname-input" class="form-label">Cognome</label>
                <input type="text" name="surname" id="surname-input" class="form-control" placeholder="Inserisci cognome" required />
            </div>
            <div class="mb-3">
                <label for="email-input" class="form-label">Email</label>
                <input type="email" name="email" id="email-input" class="form-control <?php if (isset($msg["erroreemail"])) echo "is-invalid"; ?>" placeholder="Inserisci email" required />
                <?php if (isset($msg["erroreemail"])): ?>
                    <div class="invalid-feedback">
                        <?php echo $msg["erroreemail"]; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="password-input" class="form-label">Password</label>
                <input type="password" name="password" id="password-input" class="form-control <?php if (isset($msg["errorpassword"])) echo "is-invalid"; ?>" placeholder="Inserisci password" aria-label="Password input" required />
            </div>
            <div class="mb-3">
                <label for="confirm-password-input" class="form-label">Conferma Password</label>
                <input type="password" name="confirm-password" id="confirm-password-input" class="form-control <?php if (isset($msg["errorpassword"])) echo "is-invalid"; ?>" placeholder="Inserisci password" aria-label="Confirm Password input" required />
                <?php if (isset($msg["errorpassword"])): ?>
                    <div class="invalid-feedback">
                        <?php echo $msg["errorpassword"]; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="d-grid mb-3">
                <input type="submit" name="submit" class="btn btn-primary" value="Registrati" />
            </div>
            <div class="mb-3 text-center">
                <p class="text-body-secondary">Hai già un account? <a href="login.php">Accedi</a></p>
            </div>
        </div>
    </div>
</form>