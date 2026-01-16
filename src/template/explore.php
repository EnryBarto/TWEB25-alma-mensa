<header class="mt-3 text-center container">
    <h1>Le nostre mense</h1>
    <p class="text-body-secondary">Trova la mensa che preferisci</p>
</header>
<div class="container text-center justify-content-center">
    <div class="row justify-content-center border-bottom border-dark p-1">
        <div class="col-12">
            <ul class="nav nav-pills justify-content-center mx-1" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link border border-2 rounded-pill active" id="pills-all-tab"
                        data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab"
                        aria-controls="pills-all" aria-selected="true">Tutti</button>
                </li>
                <?php if (isset($templateParams["categories"])):
                    foreach ($templateParams["categories"] as $category):;?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link border border-2 rounded-pill mx-1" id="pills-<?php echo strtolower($category); ?>-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-<?php echo strtolower($category); ?>" type="button" role="tab"
                                aria-controls="pills-<?php echo strtolower($category); ?>"
                                aria-selected="false"><?php echo $category; ?></button>
                        </li>
                    <?php endforeach;
                endif; ?>
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
                            <option value="rank-desc" <?php if ($templateParams["orderBy"] === "rank-desc")
                                echo "selected"; ?>>Recensioni più alte</option>
                            <option value="rank-asc" <?php if ($templateParams["orderBy"] === "rank-asc")
                                echo "selected"; ?>>Recensioni più basse</option>
                            <option value="alphabetical-asc" <?php if ($templateParams["orderBy"] === "alphabetical-asc")
                                echo "selected"; ?>>Ordinamento alfabetico A-Z</option>
                            <option value="alphabetical-desc" <?php if ($templateParams["orderBy"] === "alphabetical-desc")
                                echo "selected"; ?>>Ordinamento
                                alfabetico Z-A</option>
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
        <!-- INIZIO SEZIONI CATEGORIE -->
        <?php if (isset($templateParams["categories"])):
            foreach ($templateParams["categories"] as $category): ?>
                <div class="tab-pane fade" id="pills-<?php echo strtolower($category); ?>" role="tabpanel"
                    aria-labelledby="pills-<?php echo strtolower($category); ?>-tab" tabindex="0">
                    <div class="row justify-content-center">
                        <?php if (!isset($templateParams[$category]) || count($templateParams[$category]) == 0): ?>
                            <p class="text-body-secondary">Non ci sono dati in questa sezione</p>
                        <?php else:
                            foreach ($templateParams[$category] as $c): ?>
                                <div class="col-10 col-md-5 col-xl-3 mb-3">
                                    <?php include 'card.php'; ?>
                                </div>
                            <?php endforeach;
                        endif; ?>
                    </div>
                </div>
                <?php endforeach;
        endif; ?>
        <!-- FINE SEZIONI CATEGORIE -->
    </div>
</div>