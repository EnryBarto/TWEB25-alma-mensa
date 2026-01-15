<div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form class="needs-validation" novalidate>
                            <div class="mb-4">
                                <h6 class="text-uppercase text-secondary small mb-3">Nome <span class="text-primary">*</span></h6>
                                <label for="nome" class="form-label">Nome della mensa</label>
                                <input type="text" class="form-control" id="nome" placeholder="Nome della mensa" required>
                            </div>

                            <div class="mb-4">
                                <h6 class="text-uppercase text-secondary small mb-3">Descrizione <span class="text-primary">*</span></h6>
                                <label for="descrizione" class="form-label">Dettagli</label>
                                <textarea class="form-control" id="descrizione" rows="4" placeholder="Descrizione della mensa" required></textarea>
                            </div>

                            <div class="mb-4">
                                <h6 class="text-uppercase text-secondary small mb-3">Indirizzo <span class="text-primary">*</span></h6>
                                <div class="mb-3">
                                    <label for="via" class="form-label">Via</label>
                                    <input type="text" class="form-control" id="via" placeholder="Via" required>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="civico" class="form-label">Civico</label>
                                        <input type="text" class="form-control" id="civico" placeholder="Numero civico" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cap" class="form-label">CAP</label>
                                        <input type="text" class="form-control" id="cap" placeholder="CAP" required>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <label for="comune" class="form-label">Comune</label>
                                    <input type="text" class="form-control" id="comune" placeholder="Comune" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h6 class="text-uppercase text-secondary small mb-3">Capienza <span class="text-primary">*</span></h6>
                                <label for="posti" class="form-label">Numero posti</label>
                                <input type="number" class="form-control" id="posti" min="0" step="1" placeholder="Es: 120" required>
                            </div>

                            <div class="mb-4">
                                <h6 class="text-uppercase text-secondary small mb-3">Coordinate <span class="text-primary">*</span></h6>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="longitude" class="form-label">Longitudine</label>
                                        <input type="text" class="form-control" id="longitude" placeholder="Es: 11.3426" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="latitude" class="form-label">Latitudine</label>
                                        <input type="text" class="form-control" id="latitude" placeholder="Es: 44.4949" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h6 class="text-uppercase text-secondary small mb-3">Immagine</h6>
                                <label for="immagine" class="form-label">Carica immagine della mensa</label>
                                <input class="form-control" type="file" id="immagine" accept="image/*">
                            </div>

                            <div class="d-flex gap-2 justify-content-end">
                                <button type="reset" class="btn btn-outline-secondary">Annulla</button>
                                <button type="submit" class="btn btn-primary">Salva</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>