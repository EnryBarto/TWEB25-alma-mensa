<section>
    <header class="mt-3 text-center container">
        <h1>Le nostre mense</h1>
        <p class="text-body-secondary">Trova la mensa che preferisci</p>
    </header>
    <div class="container text-center justify-content-center">
        <div class="row justify-content-center border-bottom border-dark p-1 mb-4">
            <div class="col-10">
                <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link border border-2 rounded-pill active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">Tutti</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link border border-2 rounded-pill" id="pills-bar-tab" data-bs-toggle="pill" data-bs-target="#pills-bar" type="button" role="tab" aria-controls="pills-bar" aria-selected="false">Bar</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link border border-2 rounded-pill" id="pills-canteen-tab" data-bs-toggle="pill" data-bs-target="#pills-canteen" type="button" role="tab" aria-controls="pills-canteen" aria-selected="false">Mensa</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link border border-2 rounded-pill" id="pills-restaurant-tab" data-bs-toggle="pill" data-bs-target="#pills-restaurant" type="button" role="tab" aria-controls="pills-restaurant" aria-selected="false">Ristorante</button>
                </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-10 col-xl-6">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab" tabindex="0">
                        <!-- INIZIO SEZIONE TUTTO -->
                        <div id="map-all" class="map-main"></div>
                        <!-- FINE SEZIONE TUTTO -->
                    </div>
                    <div class="tab-pane fade" id="pills-bar" role="tabpanel" aria-labelledby="pills-bar-tab" tabindex="0">
                        <!-- INIZIO SEZIONE BAR -->
                        <div id="map-bar" class="map-main"></div>
                        <!-- FINE SEZIONE BAR -->
                    </div>
                    <div class="tab-pane fade" id="pills-canteen" role="tabpanel" aria-labelledby="pills-canteen-tab" tabindex="0">
                        <!-- INIZIO SEZIONE MENSA -->
                        <div id="map-canteen" class="map-main"></div>
                        <!-- FINE SEZIONE MENSA -->
                    </div>
                    <div class="tab-pane fade" id="pills-restaurant" role="tabpanel" aria-labelledby="pills-restaurant-tab" tabindex="0">
                        <!-- INIZIO SEZIONE RISTORANTE -->
                        <div id="map-restaurant" class="map-main"></div>
                        <!-- FINE SEZIONE RISTORANTE -->
                    </div>
                </div>
            </div>
            <div class="col-10 col-xl-6">
                <div class="mb-3 mt-3">
                    <h2>Selezionato:</h2>
                    <div id="selected-item"></div>
                </div>
            </div>
        </div>
    </div>
</section>