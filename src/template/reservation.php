<?php require("components/canteen_header_lite.php") ?>

        <form class="row justify-content-center" action="." method="POST">
            <div class="col-10">
                <label for="date" class="form-label"><span class="bi bi-calendar text-primary"></span> Seleziona data</label>
            </div>
            <div class="col-10 mb-3">
                <input class="form-control" type="date" id="date" name="data" onchange="getOpeningHours(<?php echo $templateParams["canteen"]->getId(); ?>)" />
            </div>
            <div class="col-10">
                <p class="form-label mb-0"><span class="bi bi-clock text-primary"></span> Seleziona orario</p>
            </div>
            <div class="col-10 row g-2 mb-3 mt-0 px-2" id="times">
                <p>Seleziona la data per ottenere gli orari disponibili</p>
            </div>
            <div class="col-10">
                <label class="form-label"><span class="bi bi-people text-primary"></span> Numero di Ospiti</label>
            </div>
            <div class="col-10 mb-3">
                <button type="button" class="btn btn-outline-primary rounded-circle px-3 py-2 font-monospace" onclick="changeValue(-1)">-</button>
                <span class="mx-3 fs-5" id="num_people_text">1</span>
                <button type="button" class="btn btn-outline-primary rounded-circle px-3 py-2 font-monospace" onclick="changeValue(1)">+</button>
                <input type="hidden" id="num_people_input" name="ospiti" value="1"/>
            </div>
            <div class="col-10 d-grid mt-1">
                <input type="submit" class="btn btn-primary" value="Conferma Prenotazione" id="submitBtn" disabled />
            </div>
        </form>