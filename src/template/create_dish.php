<div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form class="needs-validation" method="POST" action="create_dish.php" enctype="multipart/form-data" novalidate>
                            <div class="mb-4">
                                <h6 class="text-uppercase text-secondary small mb-3">Nome Piatto<span class="text-primary">*</span></h6>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Es: Pasta al pomodoro" required>
                            </div>

                            <div class="mb-4">
                                <h6 class="text-uppercase text-secondary small mb-3">Descrizione<span class="text-primary">*</span></h6>
                                <input type="text" class="form-control" id="descrizione" name="descrizione" placeholder="descrivi il piatto e i suoi ingredienti" required>
                            </div>

                            <div class="mb-4">
                                <h6 class="text-uppercase text-secondary small mb-3">Prezzo (€)<span class="text-primary">*</span></h6>
                                <input type="number" step="0.01" min="0" class="form-control" id="prezzo" name="prezzo" placeholder="Es: 12.50" required>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <a href="manage_dishes.php" class="btn btn-outline-secondary">Annulla</a>
                                <button type="submit" class="btn btn-primary">Salva</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>