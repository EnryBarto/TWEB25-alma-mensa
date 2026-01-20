        <form action="#" method="post" class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-11 col-md-8 col-lg-6 col-xl-4 border rounded shadow p-3">
                    <header class="mb-4 mt-4">
                        <h1>Accedi</h1>
                        <p class="text-body-secondary">Benvenuto in AlmaMensa</p>
                    </header>
                    <div class="mb-3">
                        <label for="email-input" class="form-label">Email</label>
                        <input type="email" name="email" id="email-input" class="form-control <?php if(isset($msg["error"])) echo "is-invalid"; ?>" placeholder="Inserisci email" required />
                    </div>
                    <div class="mb-3">
                        <label for="password-input" class="form-label">Password</label>
                        <input type="password" name="password" id="password-input" class="form-control <?php if(isset($msg["error"])) echo "is-invalid"; ?>" placeholder="Inserisci password" aria-label="Password input" required />
                        <?php if(isset($msg["error"])): ?>
                            <div class="invalid-feedback">
                                <?php echo $msg["error"]; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="d-grid mb-3">
                        <input type="submit" name="submit" class="btn btn-primary" value="Accedi" />
                    </div>
                    <div class="mb-3 text-center">
                        <p class="text-body-secondary">Non hai un account? <a href="signup.php">Registrati</a></p>
                    </div>
                </div>
            </div>
        </form>