<div class="container py-4">
    <header class="row justify-content-center text-center">
        <a class="col-10 text-dark h1"
            href="canteen_details.php?id=<?php echo $templateParams["canteen"]->getId(); ?>"><?php echo $templateParams["canteen"]->getName(); ?></a>
        <p class="col-10 text-primary fs-4 fw-bold"><?php echo $templateParams["subtitle"]; ?></p>
    </header>

    <div class="d-grid mb-3">
        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#addOpening" aria-expanded="false" aria-controls="addOpening"><span class="bi bi-plus"></span>Aggiungi un nuovo orario</button>
    </div>

    <form class="border shadow-sm rounded mb-3 collapse" id="addOpening" action="manage_timetable.php" method="get">
        <div class="row justify-content-center p-3">
            <div class="col-12 col-md-3 mb-2">
                <label class="form-label" for="dayOfWeek">Giorno</label>
                <select class="form-select" name="dayOfWeek" id="dayOfWeek">
                    <option value="mon">Lunedì</option>
                    <option value="tue">Martedì</option>
                    <option value="wed">Mercoledì</option>
                    <option value="thu">Giovedì</option>
                    <option value="fri">Venerdì</option>
                    <option value="sat">Sabato</option>
                    <option value="sun">Domenica</option>
                </select>
            </div>
            <div class="col-12 col-md-3 mb-2">
                <label class="form-label" for="timeOpen">Orario di apertura</label>
                <input type="time" class="form-control" name="timeOpen" id="timeOpen" required>
            </div>
            <div class="col-12 col-md-3 mb-2">
                <label class="form-label" for="timeClose">Orario di chiusura</label>
                <input type="time" class="form-control" name="timeClose" id="timeClose" required>
            </div>
            <div class="col-12 col-md-3 mb-2 text-center d-grid align-items-end">
                <button type="submit" class="btn btn-primary"><span class="bi bi-plus"></span> Aggiungi orario</button>
            </div>
        </div>
    </form>

    <?php $last = "";
    foreach ($templateParams["canteen"]->getOpeningHours() as $timetable): ?>
        <?php if ($last != $timetable->getDayOfWeek()): ?>
            <h3><?php echo $timetable->getDayOfWeek(); ?></h3>
        <?php endif; ?>
        <form class="border shadow-sm rounded mb-3" action="manage_timetable.php" method="get">
            <div class="row justify-content-center p-3">
                <div class="col-12 col-md-4 mb-2">
                    <label class="form-label" for="timeOpen">Orario di apertura</label>
                    <input type="time" class="form-control" name="timeOpen" id="timeOpen"
                        value="<?php echo $timetable->getOpenTime(); ?>" required>
                </div>
                <div class="col-12 col-md-4 mb-2">
                    <label class="form-label" for="timeClose">Orario di chiusura</label>
                    <input type="time" class="form-control" name="timeClose" id="timeClose"
                        value="<?php echo $timetable->getCloseTime(); ?>" required>
                </div>
                <div class="col-10 col-md-4 mb-2 d-grid">
                    <button type="submit" class="btn btn-primary mb-2"><span class="bi bi-floppy-fill"></span> Salva
                        modifiche</button>
                    <button type="submit" class="btn btn-danger"><span class="bi bi-trash-fill"></span> Elimina orario</button>
                </div>
            </div>
        </form>
    <?php endforeach; ?>
</div>