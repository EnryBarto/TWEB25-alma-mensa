        <header class="row justify-content-center mt-4">
            <div class="col-10">
                <h1>Bar Volume</h1>
            </div>
        </header>

        <form class="row justify-content-center" action="." method="POST">
            <div class="col-10 mb-3">
                <h2 class="text-primary">Prenota un tavolo</h2>
            </div>
            <div class="col-10">
                <label for="date" class="form-label"><span class="bi bi-calendar text-primary"></span> Seleziona data</label>
            </div>
            <div class="col-10 mb-3">
                <input class="form-control" type="date" id="date" name="data" />
            </div>
            <div class="col-10">
                <p class="form-label mb-0"><span class="bi bi-clock text-primary"></span> Seleziona orario</p>
            </div>
            <div class="col-10 row g-2 mb-3 mt-0 px-2">
                <div class="col-4 col-md-3">
                    <input type="radio" class="btn-check" name="orario" id="time-1100" value="11:00">
                    <label class="btn bg-white w-100 py-2 shadow-sm border-secondary-subtle text-secondary" for="time-1100">11:00</label>
                </div>
                <div class="col-4 col-md-3">
                    <input type="radio" class="btn-check" name="orario" id="time-1130" value="11:30">
                    <label class="btn bg-white w-100 py-2 shadow-sm border-secondary-subtle text-secondary" for="time-1130">11:30</label>
                </div>
                <div class="col-4 col-md-3">
                    <input type="radio" class="btn-check" name="orario" id="time-1200" value="12:00">
                    <label class="btn bg-white w-100 py-2 shadow-sm border-secondary-subtle text-secondary" for="time-1200">12:00</label>
                </div>
                <div class="col-4 col-md-3">
                    <input type="radio" class="btn-check" name="orario" id="time-1230" value="12:30">
                    <label class="btn bg-white w-100 py-2 shadow-sm border-secondary-subtle text-secondary" for="time-1230">12:30</label>
                </div>
                <div class="col-4 col-md-3">
                    <input type="radio" class="btn-check" name="orario" id="time-1300" value="13:00">
                    <label class="btn bg-white w-100 py-2 shadow-sm border-secondary-subtle text-secondary" for="time-1300">13:00</label>
                </div>
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
                <input type="submit" class="btn btn-primary" value="Conferma Prenotazione" />
            </div>
        </form>