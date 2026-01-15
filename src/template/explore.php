<header class="mt-3 text-center container">
    <h1>Le nostre mense</h1>
    <p class="text-body-secondary">Trova la mensa che preferisci</p>
</header>
<div class="container text-center justify-content-center">
    <div class="row justify-content-center border-bottom border-dark p-1">
        <div class="col-12">
            <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link border border-2 rounded-pill active" id="pills-all-tab"
                        data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab"
                        aria-controls="pills-all" aria-selected="true">Tutti</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link border border-2 rounded-pill" id="pills-bar-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-bar" type="button" role="tab" aria-controls="pills-bar"
                        aria-selected="false">Bar</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link border border-2 rounded-pill" id="pills-canteen-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-canteen" type="button" role="tab" aria-controls="pills-canteen"
                        aria-selected="false">Mensa</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link border border-2 rounded-pill" id="pills-restaurant-tab"
                        data-bs-toggle="pill" data-bs-target="#pills-restaurant" type="button" role="tab"
                        aria-controls="pills-restaurant" aria-selected="false">Ristorante</button>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container mt-3">
    <div class="row justify-content-center mb-3">
        <div class="col-10">
            <form action="#" method="post">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <p><span class="bi bi-sliders2 text-primary"></span> Filtri</p>
                    </div>
                    <div class="col-12 col-md-10">
                        <label class="form-label" for="select-sort-by">Ordina per</label>
                        <select class="form-select" aria-label="Ordina mense per" id="select-sort-by" name="sort">
                            <option value="rank-desc" <?php if ($templateParams["orderBy"] === "rank-desc") echo "selected"; ?>>Recensioni più alte</option>
                            <option value="rank-asc" <?php if ($templateParams["orderBy"] === "rank-asc") echo "selected"; ?>>Recensioni più basse</option>
                            <option value="alphabetical-asc" <?php if ($templateParams["orderBy"] === "alphabetical-asc") echo "selected"; ?>>Ordinamento alfabetico A-Z</option>
                            <option value="alphabetical-desc" <?php if ($templateParams["orderBy"] === "alphabetical-desc") echo "selected"; ?>>Ordinamento alfabetico Z-A</option>
                        </select>
                    </div>
                    <div class="d-grid gap-2 col-12 col-md-2 align-self-end">
                        <input type="submit" value="Applica" class="btn btn-primary mt-3">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container mb-5">
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab"
            tabindex="0">
            <div class="row justify-content-center">
                <?php if (count($templateParams["all"]) == 0): ?>
                    <p class="text-body-secondary">Non ci sono dati in questa sezione</p>
                <?php endif;
                foreach ($templateParams["all"] as $c): ?>
                    <div class="col-10 col-md-5 col-xl-3 mb-3">
                        <?php include 'card.php'; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- FINE SEZIONE TUTTO -->
        <div class="tab-pane fade" id="pills-bar" role="tabpanel" aria-labelledby="pills-bar-tab" tabindex="0">
            <div class="row justify-content-center">
                <!-- INIZIO SEZIONE BAR -->
                <?php if (!isset($templateParams["Bar"]) || count($templateParams["Bar"]) == 0): ?>
                    <p class="text-body-secondary">Non ci sono dati in questa sezione</p>
                <?php else:
                foreach ($templateParams["Bar"] as $c): ?>
                    <div class="col-10 col-md-5 col-xl-3 mb-3">
                        <?php include 'card.php'; ?>
                    </div>
                <?php endforeach;
                endif;?>
            </div>
            <!-- FINE SEZIONE BAR -->
        </div>
        <div class="tab-pane fade" id="pills-canteen" role="tabpanel" aria-labelledby="pills-canteen-tab" tabindex="0">
            <div class="row justify-content-center">
                <!-- INIZIO SEZIONE MENSA -->
                <?php if (!isset($templateParams["Mensa"]) || count($templateParams["Mensa"]) == 0): ?>
                    <p class="text-body-secondary">Non ci sono dati in questa sezione</p>
                <?php else:
                foreach ($templateParams["Mensa"] as $c): ?>
                    <div class="col-10 col-md-5 col-xl-3 mb-3">
                        <?php include 'card.php'; ?>
                    </div>
                <?php endforeach;
                endif;?>
            </div>
            <!-- FINE SEZIONE MENSA -->
        </div>
        <div class="tab-pane fade" id="pills-restaurant" role="tabpanel" aria-labelledby="pills-restaurant-tab"
            tabindex="0">
            <!-- INIZIO SEZIONE RISTORANTE -->
            <div class="row justify-content-center">
                <?php if (!isset($templateParams["Ristorante"]) || count($templateParams["Ristorante"]) == 0): ?>
                    <p class="text-body-secondary">Non ci sono dati in questa sezione</p>
                <?php else:
                foreach ($templateParams["Ristorante"] as $c): ?>
                    <div class="col-10 col-md-5 col-xl-3 mb-3">
                        <?php include 'card.php'; ?>
                    </div>
                <?php endforeach;
                endif;?>
                <!-- FINE SEZIONE RISTORANTE -->
            </div>
        </div>
    </div>
</div>