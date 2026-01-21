<div class="container py-4">
    <header class="row justify-content-center text-center">
        <a class="col-10 text-dark h1"
            href="canteen_details.php?id=<?php echo $templateParams["canteen"]->getId(); ?>"><?php echo $templateParams["canteen"]->getName(); ?></a>
        <p class="col-10 text-primary fs-4 fw-bold"><?php echo $templateParams["subtitle"]; ?></p>
    </header>
    <?php if (isset($_GET["success"]) && isset($_GET["msg"])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_GET["msg"]; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if (isset($_GET["generic_error"]) && isset($_GET["from"])):
        switch ($_GET["from"]) {
            case "c":
                $act = "nella creazione";
                break;
            case "u":
                $act = "nella modifica";
                break;
            case "d":
                $act = "nell'eliminazione";
                break;
            default:
                $act = "nell'operazione";
        } ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Si è verificato un errore <?php echo $act; ?> dell'orario. Codice errore: <?php echo $_GET["generic_error"]; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="d-grid mb-3">
        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#addOpening" aria-expanded="false" aria-controls="addOpening"><span class="bi bi-plus"></span>Aggiungi un nuovo orario</button>
    </div>

    <form class="border shadow-sm rounded mb-3 collapse" id="addOpening" action="manage_timetable.php" method="post">
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
                <input type="time" class="form-control <?php if (isset($_GET["hour_error_creation"])) echo "is-invalid"; ?>" name="timeOpen" id="timeOpen" required />
            </div>
            <div class="col-12 col-md-3 mb-2">
                <label class="form-label" for="timeClose">Orario di chiusura</label>
                <input type="time" class="form-control <?php if (isset($_GET["hour_error_creation"])) echo "is-invalid"; ?>" name="timeClose" id="timeClose" required />
                <?php if (isset($_GET["hour_error_creation"])): ?>
                    <p class="invalid-feedback">L'orario di chiusura deve essere successivo a quello di apertura.</p>
                <?php endif; ?>
            </div>
            <div class="col-12 col-md-3 mb-2 text-center d-grid align-items-end">
                <button type="submit" class="btn btn-primary"><span class="bi bi-plus"></span> Conferma orario</button>
            </div>
        </div>
        <input type="hidden" name="action" value="c"/>
    </form>

    <?php $last = "";
    foreach ($templateParams["canteen"]->getOpeningHours() as $timetable): ?>
        <?php if ($last != $timetable->getDayOfWeek()):
            $last = $timetable->getDayOfWeek(); ?>
            <h3><?php echo $timetable->getDayOfWeek(); ?></h3>
        <?php endif; ?>
        <form class="border shadow-sm rounded mb-3" action="manage_timetable.php" method="post">
            <div class="row justify-content-center p-3">
                <div class="col-12 col-md-4 col-xl-5 mb-2">
                    <label class="form-label" for="timeOpen<?php echo $timetable->getRawDayOfWeek().$timetable->getOpenTime(); ?>">Orario di apertura</label>
                    <input type="time" class="form-control<?php if (isset($_GET["hour_error_update"]) && $_GET["oldTimeOpen"] == $timetable->getOpenTime() && $_GET["dayOfWeek"] == $timetable->getRawDayOfWeek()) echo " is-invalid"; ?>" name="timeOpen" id="timeOpen<?php echo $timetable->getRawDayOfWeek().$timetable->getOpenTime(); ?>"
                        value="<?php echo $timetable->getOpenTime(); ?>" required />
                </div>
                <div class="col-12 col-md-4 col-xl-5 mb-2">
                    <label class="form-label" for="timeClose<?php echo $timetable->getRawDayOfWeek().$timetable->getOpenTime(); ?>">Orario di chiusura</label>
                    <input type="time" class="form-control<?php if (isset($_GET["hour_error_update"]) && $_GET["oldTimeOpen"] == $timetable->getOpenTime() && $_GET["dayOfWeek"] == $timetable->getRawDayOfWeek()) echo " is-invalid"; ?>" name="timeClose" id="timeClose<?php echo $timetable->getRawDayOfWeek().$timetable->getOpenTime(); ?>"
                        value="<?php echo $timetable->getCloseTime(); ?>" required />
                    <?php if (isset($_GET["hour_error_update"]) && $_GET["oldTimeOpen"] == $timetable->getOpenTime() && $_GET["dayOfWeek"] == $timetable->getRawDayOfWeek()): ?>
                        <p class="invalid-feedback">L'orario di chiusura deve essere successivo a quello di apertura.</p>
                    <?php endif; ?>
                </div>
                <div class="col-12 col-md-3 col-xl-2 mb-2 d-grid">
                    <button type="submit" name="action" value="u" class="btn btn-primary mb-2"><span class="bi bi-floppy-fill"></span> Salva
                        modifiche</button>
                    <button type="submit" name="action" value="d" class="btn btn-primary"><span class="bi bi-trash-fill"></span> Elimina orario</button>
                </div>
            </div>
            <input type="hidden" name="oldTimeOpen" value="<?php echo $timetable->getOpenTime(); ?>"/>
            <input type="hidden" name="dayOfWeek" value="<?php echo $timetable->getRawDayOfWeek(); ?>"/>
        </form>
    <?php endforeach; ?>
</div>