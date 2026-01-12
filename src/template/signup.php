        <form action="#" method="post" class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-10 col-md-8 col-lg-6 col-xl-4 border rounded shadow p-3">
                    <header class="mb-4 mt-4">
                        <h1>Crea account</h1>
                        <p class="text-body-secondary">Unisciti ad AlmaMensa oggi</p>
                    </header>
                    <div class="mb-3">
                        <label for="name-input" class="form-label">Nome</label>
                        <input type="text" name="name" id="name-input" class="form-control" placeholder="Inserisci nome">
                    </div>
                    <div class="mb-3">
                        <label for="surname-input" class="form-label">Cognome</label>
                        <input type="text" name="surname" id="surname-input" class="form-control" placeholder="Inserisci cognome">
                    </div>
                    <div class="mb-3">
                        <label for="email-input" class="form-label">Email</label>
                        <input type="email" name="email" id="email-input" class="form-control" placeholder="Inserisci email">
                    </div>
                    <div class="mb-3">
                        <label for="password-input" class="form-label">Password</label>
                        <input type="password" name="password" id="password-input" class="form-control" placeholder="Inserisci password" aria-label="Password input" aria-describedby="btn-show">
                    </div>
                    <div class="mb-3">
                        <label for="confirm-password-input" class="form-label">Conferma Password</label>
                        <input type="password" name="confirm-password" id="confirm-password-input" class="form-control" placeholder="Inserisci password" aria-label="Confirm Password input" aria-describedby="btn-show">
                    </div>
                    <div class="d-grid mb-3">
                        <input type="submit" name="submit" class="btn btn-primary" value="Registrati">
                    </div>
                    <div class="mb-3 text-center">
                        <p class="text-body-secondary">Hai già un account? <a href="login.php">Accedi</a></p>
                    </div>
                </div>
            </div>
        </form>