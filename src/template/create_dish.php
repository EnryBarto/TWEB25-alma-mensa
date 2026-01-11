<div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form class="needs-validation" novalidate>
                            <div class="mb-4">
                                <h6 class="text-uppercase text-secondary small mb-3">Nome Piatto<span class="text-primary">*</span></h6>
                                <input type="text" class="form-control" id="nome" placeholder="Es: Pasta al pomodoro" required>
                            </div>

                            <div class="mb-4">
                                <h6 class="text-uppercase text-secondary small mb-3">Descrizione<span class="text-primary">*</span></h6>
                                <input type="text" class="form-control" id="descrizione" placeholder="descrivi il piatto e i suoi ingredienti" required>
                            </div>

                            <div class="mb-4">
                                <h6 class="text-uppercase text-secondary small mb-3">Prezzo (€)<span class="text-primary">*</span></h6>
                                <input type="text" class="form-control" id="prezzo" placeholder="Es: 12.50" required>
                            </div>

                            <div class="mb-4">
                                <h6 class="text-uppercase text-secondary small mb-3">Immagine</h6>
                                <label for="immagine" class="form-label">Carica immagine del piatto</label>
                                <input class="form-control" type="file" id="immagine" accept="image/*">
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <button type="reset" class="btn btn-outline-secondary">Annulla</button>
                                <button type="submit" class="btn btn-primary">Salva</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>