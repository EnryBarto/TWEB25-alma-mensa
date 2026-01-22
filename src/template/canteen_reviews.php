<?php require("components/canteen_header_lite.php"); ?>
<div class="row justify-content-center align-items-md-center px-3">
    <div class="col-11 <?php echo getUserLevel() == UserLevel::Customer ? "col-md-7" : "col-md-10"; ?> card mb-3 py-2">
        <div class="row g-0">
            <div title="Valutazione Media: <?php echo $templateParams["canteen"]->getAvgReviews();?> su <?php echo $templateParams["canteen"]->getNumReviews(); ?> recensioni" class="col-5 row g-0 align-items-center justify-content-center text-center">
                <span class="col-12 fs-1 fw-bold"><?php echo $templateParams["canteen"]->getAvgReviews(); ?></span>
                <p class="col-12"><?php printStars($templateParams["canteen"]->getAvgReviews()) ?></p>
            </div>
            <div class="col-7">
                <div class="card-body p-2">
                    <span class="card-text border-start ps-4">Basato su</span>
                    <p class="card-title border-start ps-4 fw-bold fs-5"><?php echo $templateParams["canteen"]->getNumReviews() ?> recensioni</p>
                </div>
            </div>
        </div>
    </div>
    <?php if(getUserLevel() == UserLevel::Customer): ?>
    <div class="col-11 col-md-3 mb-3 p-0">
        <div class="col-12 col-md-10 offset-md-1 d-grid p-0 h-100">
            <a class="btn btn-primary" role="button" href="manage_review.php?action=C&id=<?php echo $templateParams["canteen"]->getId(); ?>&redirect=<?php echo urlencode($templateParams["redirect"])?>"><span class="bi bi-star"></span>&nbsp;Recensisci</a>
        </div>
    </div>
    <?php endif; ?>
</div>
<div class="row justify-content-center px-3">
    <div class="col-10 p-0">
        <?php if (isset($_GET["success"]) && $_GET["success"] == 1): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php switch($_GET["action"]):
            case "C": ?>
            <span class="bi bi-check-circle-fill"> Recensione creata con successo!</span>
            <?php break; ?>
            <?php case "D": ?>
            <span class="bi bi-check-circle-fill"> Recensione eliminata con successo!</span>
            <?php break; ?>
            <?php case "U": ?>
            <span class="bi bi-check-circle-fill"> Recensione aggiornata con successo!</span>
            <?php endswitch; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
        <?php if (isset($_GET["errorCode"])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="bi bi-exclamation-circle-fill"> Si è verificato un errore durante
            <?php switch($_GET["action"]):
            case "C": ?>
            la creazione
            <?php break; ?>
            <?php case "D": ?>
            la cancellazione
            <?php break; ?>
            <?php case "U": ?>
            l'aggiornamento
            <?php endswitch; ?>
            della recensione. Codice errore: <?php echo htmlspecialchars($_GET["errorCode"]); ?>.
            </span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
    </div>
    <?php
    foreach($templateParams["reviews"] as $r) {
        require("components/review_card.php");
    } ?>
</div>