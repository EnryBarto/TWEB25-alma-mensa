<header class="row justify-content-center mt-4">
    <h1 class="col-11 col-md-10 text-dark">Le recensioni di <?php echo $user->getName(); ?></h1>
    <p class="col-11 col-md-10 text-primary fs-4 fw-bold">Visualizza le recensioni che hai assegnato</p>
</header>
<div class="row justify-content-center px-3">
    <div class="col-11 col-md-10 p-0">
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