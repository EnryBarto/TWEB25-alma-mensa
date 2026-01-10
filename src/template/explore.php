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
                            <button class="nav-link border border-2 rounded-pill" id="pills-bar-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-bar" type="button" role="tab"
                                aria-controls="pills-bar" aria-selected="false">Bar</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link border border-2 rounded-pill" id="pills-canteen-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-canteen" type="button" role="tab"
                                aria-controls="pills-canteen" aria-selected="false">Mensa</button>
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
                    <p><span class="bi bi-sliders2 text-primary"></span> Filtri</p>
                    <label class="form-label" for="select-sort-by">Ordina per</label>
                    <select class="form-select" aria-label="Ordina mense per" id="select-sort-by">
                        <option value="higher-rank" selected>Recensioni più alte</option>
                        <option value="lower-rank">Recensioni più basse</option>
                        <option value="alphabetical-a-z">Ordinamento alfabetico A-Z</option>
                        <option value="alphabetical-z-a">Ordinamento alfabetico Z-A</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="container mb-5">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab"
                    tabindex="0">
                    <div class="row justify-content-center">
                        <!-- INIZIO SEZIONE TUTTO -->
                        <div class="col-10 col-md-5 col-xl-3 mb-3">
                            <!-- INIZIO CARD 1 -->
                            <div class="card h-100">
                                <img src="img/Volume.jpg" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">Card title 1</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the card’s content.</p>
                                    <p class="card-text">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </p>
                                    <a href="#" class="btn btn-primary mt-auto">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <!-- INIZIO CARD 2 -->
                        <div class="col-10 col-md-5 col-xl-3 mb-3">
                            <div class="card h-100">
                                <img src="img/Volume.jpg" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">Card title 2</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the card’s content.</p>
                                    <p class="card-text">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>
                                        <i class="bi bi-star"></i>
                                    </p>
                                    <a href="#" class="btn btn-primary mt-auto">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                        <!-- INIZIO CARD 3 -->
                        <div class="col-10 col-md-5 col-xl-3 mb-3">
                            <div class="card h-100">
                                <img src="img/Volume.jpg" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">Card title 3</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the card’s content.</p>
                                    <p class="card-text">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                    </p>
                                    <a href="#" class="btn btn-primary mt-auto">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FINE SEZIONE TUTTO -->
                <div class="tab-pane fade" id="pills-bar" role="tabpanel" aria-labelledby="pills-bar-tab" tabindex="0">
                    <div class="row justify-content-center">
                        <!-- INIZIO SEZIONE BAR -->
                        <div class="col-10 col-md-5 col-xl-3 mb-3">
                            <div class="card h-100">
                                <img src="img/Volume.jpg" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">Baaaar</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the card’s content.</p>
                                    <p class="card-text">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                    </p>
                                    <a href="#" class="btn btn-primary mt-auto">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FINE SEZIONE BAR -->
                </div>
                <div class="tab-pane fade" id="pills-canteen" role="tabpanel" aria-labelledby="pills-canteen-tab"
                    tabindex="0">
                    <div class="row justify-content-center">
                        <!-- INIZIO SEZIONE MENSA -->
                        <div class="col-10 col-md-5 col-xl-3">
                            <div class="card h-100">
                                <img src="img/Volume.jpg" class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">Mensaaaa</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the card’s content.</p>
                                    <p class="card-text">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                    </p>
                                    <a href="#" class="btn btn-primary mt-auto">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FINE SEZIONE MENSA -->
                </div>
                <div class="tab-pane fade" id="pills-restaurant" role="tabpanel" aria-labelledby="pills-restaurant-tab"
                    tabindex="0">
                    <!-- INIZIO SEZIONE RISTORANTE -->
                    <div class="row justify-content-center">
                        <p class="text-body-secondary">Non ci sono dati in questa sezione</p>
                        <!-- FINE SEZIONE RISTORANTE -->
                    </div>
                </div>
            </div>
        </div>