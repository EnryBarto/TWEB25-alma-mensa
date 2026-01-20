<form action="#" method="post" class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-10 col-md-8 col-lg-6 col-xl-4 border rounded shadow p-3">
            <header class="mb-4 mt-4">
                <h1>Modifica password</h1>
                <?php if (isset($msg["errore"])): ?>
                    <div class="is-invalid"></div>
                    <div class="mb-3 invalid-feedback">
                        <span class="bi bi-exclamation-circle-fill"></span> <?php echo $msg["errore"]; ?>
                    </div>
                <?php endif; ?>
            </header>
            <div class="mb-3">
                <label for="old-password-input" class="form-label">Password attuale</label>
                <input type="password" name="oldPsw" id="old-password-input"
                    class="form-control <?php if (isset($msg["error_old_psw"]))
                        echo "is-invalid"; ?>"
                    placeholder="Inserisci vecchia password" aria-label="Password attuale" required />
                <?php if (isset($msg["error_old_psw"])): ?>
                    <div class="invalid-feedback">
                        <?php echo $msg["error_old_psw"]; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="password-input" class="form-label">Nuova password</label>
                <input type="password" name="psw" id="password-input"
                    class="form-control <?php if (isset($msg["error_mismatch_psw"]))
                        echo "is-invalid"; ?>"
                    placeholder="Inserisci nuova password" aria-label="Nuova password" required />
            </div>
            <div class="mb-3">
                <label for="confirm-password-input" class="form-label">Conferma nuova password</label>
                <input type="password" name="confirmPsw" id="confirm-password-input"
                    class="form-control <?php if (isset($msg["error_mismatch_psw"]))
                        echo "is-invalid"; ?>"
                    placeholder="Inserisci nuova password" aria-label="Conferma nuova password" required />
                <?php if (isset($msg["error_mismatch_psw"])): ?>
                    <div class="invalid-feedback">
                        <?php echo $msg["error_mismatch_psw"]; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="d-grid mb-3">
                <input type="submit" name="submit" class="btn btn-primary" value="Modifica password" />
            </div>
            <?php if (isset($templateParams["success_modify"]) && $templateParams["success_modify"]): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="bi bi-check-circle-fill"> Password modificata con successo!</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</form>