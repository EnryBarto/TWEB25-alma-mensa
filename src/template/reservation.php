<?php require("components/canteen_header_lite.php") ?>

<form class="row justify-content-center" action="reservation.php" method="POST">
    <input type="hidden" name="id" id="id" value="<?php echo isset($templateParams["reservation"]) ? $templateParams["reservation"]->getCode() : $templateParams["canteen"]->getId(); ?>" />
    <input type="hidden" name="action" id="action" value="<?php echo $_GET["action"] ?>" />
    <?php if(isset($templateParams["reservation"])): ?>
        <span class="d-none" id="old_time"><?php echo $templateParams["reservation"]->getDateTime()->format("H:i") ?></span>
    <?php endif; ?>

    <div class="col-10">
        <label for="date" class="form-label"><span class="bi bi-calendar text-primary"></span> Seleziona data</label>
    </div>
    <div class="col-10 mb-3">
        <input class="form-control" type="date" id="date" name="date" onchange="getTimetableAndGeneratePills(<?php echo $templateParams["canteen"]->getId(); ?>)" value="<?php if(isset($templateParams["reservation"])) echo $templateParams["reservation"]->getDateTime()->format("Y-m-d") ?>" />
    </div>
    <div class="col-10">
        <p class="form-label mb-0"><span class="bi bi-clock text-primary"></span> Seleziona orario</p>
    </div>
    <div class="col-10 row g-2 mb-3 mt-0 px-2" id="times">
        <p>Seleziona la data per ottenere gli orari disponibili</p>
    </div>
    <div class="col-10">
        <label class="form-label" for="num_people"><span class="bi bi-people text-primary"></span> Numero di Ospiti</label>
    </div>
    <div class="col-10 mb-3">
        <p id="time_not_selected">Seleziona la data e l'ora per controllare la disponibilità dei posti</p>
        <div id="time_selected" class="d-none">
            <p>Posti disponibili: <span id="max_people"></span></p>
            <input type="number" onchange="updateMaxGuests()" class="form-control" id="num_people" name="guests" value="<?php echo isset($templateParams["reservation"]) ? $templateParams["reservation"]->getNumPeople() : 1 ; ?>" min="1" />
        </div>
    </div>
    <div class="col-10 d-grid mt-1">
        <input type="submit" class="btn btn-primary" value="Conferma Prenotazione" id="submitBtn" disabled />
    </div>
</form>