<?php require("components/header.php"); ?>
<div class="container text-center justify-content-center">
    <div class="row justify-content-center border-bottom border-dark p-1">
        <div class="col-12 p-0">
            <nav aria-label="Filtri categorie">
                <ul class="nav nav-pills justify-content-center mx-1 mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link border border-2 rounded-pill active" id="pills-all-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab"
                            aria-controls="pills-all" aria-selected="true">Tutti</button>
                    </li>
                    <?php if (isset($templateParams["categories"])):
                        foreach ($templateParams["categories"] as $category):
                            ; ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link border border-2 rounded-pill mx-1" id="pills-<?php echo strtolower($category) ?>-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-<?php echo strtolower($category); ?>"
                                    type="button" role="tab" aria-controls="pills-<?php echo strtolower($category); ?>"
                                    aria-selected="false"><?php echo $category; ?></button>
                            </li>
                        <?php endforeach;
                    endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<div class="container mb-5">
    <div class="row justify-content-center mt-3">
        <div class="col-11 col-xl-6">
            <div class="tab-content" id="pills-tabContent">
                <!-- INIZIO SEZIONE TUTTO -->
                <div class="tab-pane fade show active" id="pills-all" role="tabpanel"
                    aria-labelledby="pills-all-tab" tabindex="0">
                    <div id="map-all" class="map-main"></div>
                </div>
                <!-- FINE SEZIONE TUTTO -->
                <!-- INIZIO SEZIONI CATEGORIE -->
                <?php if (isset($templateParams["categories"])):
                    $i = 1;
                    foreach ($templateParams["categories"] as $category): ?>
                        <div class="tab-pane fade" id="pills-<?php echo strtolower($category); ?>" role="tabpanel"
                            aria-labelledby="pills-<?php echo strtolower($category); ?>-tab" tabindex="<?php echo $i++; ?>">
                            <div id="map-<?php echo strtolower($category); ?>" class="map-main"></div>
                        </div>
                    <?php endforeach;
                endif; ?>
            </div>
        </div>
        <div class="col-11 col-xl-6">
            <div class="mb-3 mt-3">
                <h2>Selezionato:</h2>
                <div id="selected-item"></div>
            </div>
        </div>
    </div>
    <!-- FINE SEZIONI CATEGORIE -->
</div>