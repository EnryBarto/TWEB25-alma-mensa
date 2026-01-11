<div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form class="needs-validation" novalidate>
                            <div class="mb-4">
                                <h6 class="text-uppercase text-secondary small mb-3">Nome Menu<span class="text-primary">*</span></h6>
                                <input type="text" class="form-control" id="nome" placeholder="Es: Menu freddo" required>
                            </div>

                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h6 class="text-uppercase text-secondary small mb-0">Piatti</h6>
                                    <a href="create_dish.html" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-plus-lg"></i> Aggiungi Piatto
                                    </a>
                                </div>
                                <label for="descrizione" class="form-label">Seleziona i piatti da includere nel menu</label>
                                <label class="border rounded p-3 mb-3 d-block checkbox-label" style="cursor: pointer;">
                                    <input type="checkbox" class="form-check-input" id="pasta_pomodoro">
                                    <span class="ms-2">Pasta al pomodoro</span>
                                </label>
                                <label class="border rounded p-3 mb-3 d-block checkbox-label" style="cursor: pointer;">
                                    <input type="checkbox" class="form-check-input" id="risotto_funghi">
                                    <span class="ms-2">Risotto ai funghi</span>
                                </label>
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