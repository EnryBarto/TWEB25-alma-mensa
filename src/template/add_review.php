        <header class="row justify-content-center mt-md-4">
            <div class="col-12 col-md-4 offset-md-1 order-md-2 p-0">
                <img src="assets/img/Volume.jpg" class="img-fluid mb-3" alt="">
            </div>
            <div class="col-10 col-md-5 order-md-1">
                <h1>Bar Volume</h1>
                <p class="badge bg-secondary">Bar</p>
                <p class="col-10 text-primary p-0 fs-5 fw-bold">Recensisci la mensa</p>
                <p class="col-10 text-secondary p-0">Condividi la tua esperienza con altri studenti</p>
            </div>
        </header>

        <form class="row justify-content-center" action="." method="POST">
            <div class="col-10">
                <label class="form-label">Valutazione</label>
            </div>
            <div class="col-10 mb-3" id="stars">
                <button type="button" class="btn btn-lg p-1" onclick="setVote(1)"><span class="bi bi-star-fill text-warning fs-4"></span></button>
                <button type="button" class="btn btn-lg p-1" onclick="setVote(2)"><span class="bi bi-star fs-4"></span></button>
                <button type="button" class="btn btn-lg p-1" onclick="setVote(3)"><span class="bi bi-star fs-4"></span></button>
                <button type="button" class="btn btn-lg p-1" onclick="setVote(4)"><span class="bi bi-star fs-4"></span></button>
                <button type="button" class="btn btn-lg p-1" onclick="setVote(5)"><span class="bi bi-star fs-4"></span></button>
                <input type="hidden" id="vote" name="voto" value="1" />
            </div>
            <div class="col-10">
                <label for="titolo" class="form-label">Titolo</label>
            </div>
            <div class="col-10 mb-3">
                <input class="form-control" type="text" id="titolo" placeholder="Dai un titolo alla tua recensione" />
            </div>
            <div class="col-10">
                <label for="descrizione" class="form-label">Descrizione</label>
            </div>
            <div class="col-10 mb-3">
                <textarea class="form-control" type="text" id="descrizione" rows="4" placeholder="Descrivi la tua esperienza in dettaglio..."></textarea>
            </div>
            <div class="col-10 d-grid mt-1">
                <input type="submit" class="btn btn-primary" value="Conferma Recensione" />
            </div>
        </form>