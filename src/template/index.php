<header class="text-center my-4">
    <?php if (isUserLoggedIn()): ?>
        <h1>Benvenuto in AlmaMensa, <?php echo $user->getName() ; ?></h1>
    <?php else: ?>
        <h1>AlmaMensa</h1>
    <?php endif; ?>
    <p class="text-secondary">Da universitari per universitari</p>
</header>
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-11 col-md-8">
            <div id="main-carousel" class="carousel slide">
                <div class="carousel-indicators mb-1">
                    <button type="button" data-bs-target="#main-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#main-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#main-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/img/almamensa.png" class="d-block w-100" alt="logo almamensa" />
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/campus.jpg" class="d-block w-100" alt="campus" />
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/food.png" class="d-block w-100" alt="cibo" />
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#main-carousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#main-carousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-4">
        <div class="col-11 col-md-8 text-center">
            <p class="mt-3">
                Benvenuto su AlmaMensa, la piattaforma dedicata agli studenti universitari per scoprire, recensire e
                prenotare posti nelle mense universitarie. La nostra missione è migliorare l'esperienza culinaria degli
                studenti, offrendo un accesso facile e veloce alle informazioni sulle mense, permettendo di condividere
                opinioni e valutazioni, e semplificando il processo di prenotazione dei pasti. Unisciti a noi per
                rendere ogni pasto un momento piacevole e senza stress!
            </p>
            <a href="explore.php" class="btn btn-primary" role="button">Esplora</a>
        </div>
    </div>
    <section class="border-top">
        <header class="text-center my-4">
            <h2>I più votati</h2>
            <p class="text-secondary">Scopri le mense universitarie più votate dagli studenti</p>
        </header>
        <div class="row justify-content-center">
            <?php if (count($templateParams["topCanteens"]) == 0): ?>
                    <p class="text-body-secondary">Non ci sono dati in questa sezione</p>
                <?php else:
                    foreach ($templateParams["topCanteens"] as $c): ?>
                        <div class="col-11 col-md-5 col-xl-3 mb-3">
                            <?php include 'components/card.php'; ?>
                        </div>
                    <?php endforeach;
                endif; ?>
        </div>
    </section>
    <section class="border-top">
        <header class="text-center my-4">
            <h2>Scopri la mappa</h2>
            <p class="text-secondary">Scopri le mense più vicine a te</p>
        </header>
        <div class="row justify-content-center">
            <div class="col-11 col-md-8 text-center">
                <p>Con la nostra mappa interattiva puoi visualizzare tutte le mense universitarie nella tua zona. Seleziona una categoria per filtrare le mense per tipo, clicca su un marcatore per ottenere informazioni dettagliate e scoprire le recensioni degli studenti. La mappa ti aiuta a trovare rapidamente la mensa più vicina e adatta alle tue esigenze.</p>
                <a href="map.php" class="btn btn-primary" role="button">Visualizza Mappa</a>
            </div>
        </div>
    </section>
</div>