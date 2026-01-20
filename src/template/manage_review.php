<?php
$canteen = $templateParams["canteen"];
require("components/canteen_header.php");
?>

<div class="row justify-content-center">
    <div class="col-11 col-md-10">
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
</div>

<form class="row justify-content-center" action="manage_review.php" method="POST">
    <input type="hidden" id="canteen_id" name="canteen_id" value="<?php echo $canteen->getId(); ?>" />
    <?php if (isset($templateParams["redirect"])): ?>
    <input type="hidden" id="redirect" name="redirect" value="<?php echo urlencode($templateParams["redirect"]); ?>" />
    <?php endif; ?>
    <div class="col-11 col-md-10">
        <label class="form-label">Valutazione</label>
    </div>
    <div class="col-11 col-md-10 mb-3" id="stars">
        <button title="Voto 1" type="button" class="btn btn-lg p-1" onclick="setVote(1)"></button>
        <button title="Voto 2" type="button" class="btn btn-lg p-1" onclick="setVote(2)"></button>
        <button title="Voto 3" type="button" class="btn btn-lg p-1" onclick="setVote(3)"></button>
        <button title="Voto 4" type="button" class="btn btn-lg p-1" onclick="setVote(4)"></button>
        <button title="Voto 5" type="button" class="btn btn-lg p-1" onclick="setVote(5)"></button>
        <input type="hidden" id="vote" name="vote" value="<?php echo empty($templateParams["reviewVote"]) ? 3 : $templateParams["reviewVote"]; ?>" />
    </div>
    <div class="col-11 col-md-10">
        <label for="title" class="form-label">Titolo</label>
    </div>
    <div class="col-11 col-md-10 mb-3">
        <input class="form-control <?php if (isset($_GET["errorCode"])) echo "is-invalid" ; ?>" type="text" id="title" name="title" placeholder="Dai un titolo alla tua recensione" value="<?php echo $templateParams["reviewTitle"]; ?>" required/>
        <?php if(isset($_GET["errorCode"]) && $_GET["errorCode"] == -1): ?>
            <div class="invalid-feedback">
                <span class="bi bi-exclamation-circle-fill"></span>&nbsp;Compila correttamente tutti i campi
            </div>
        <?php elseif(isset($_GET["errorCode"]) && $_GET["errorCode"] == -2): ?>
            <div class="invalid-feedback">
                <span class="bi bi-exclamation-circle-fill"></span>&nbsp;Impossibile aggiornare la recensione
            </div>
        <?php elseif(isset($_GET["errorCode"])): ?>
            <div class="invalid-feedback">
                <span class="bi bi-exclamation-circle-fill"></span>&nbsp;Errore nell'aggiunta della recensione - Codice: <?php echo $_GET["errorCode"]; ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="col-11 col-md-10">
        <label for="description" class="form-label">Descrizione</label>
    </div>
    <div class="col-11 col-md-10 mb-3">
        <textarea maxlength="1024" class="form-control <?php if (isset($_GET["errorCode"])) echo "is-invalid" ; ?>" id="description" name="description" rows="4" placeholder="Descrivi la tua esperienza in dettaglio..." required><?php echo $templateParams["reviewDescription"]; ?></textarea>
    </div>
    <div class="col-11 col-md-10 d-grid mt-1">
        <input type="submit" class="btn btn-primary" value="Conferma Recensione" />
    </div>
    <input type="hidden" name="action" value="<?php echo $templateParams["action"]; ?>" />
    <?php if($templateParams["action"] == "U"): ?>
        <input type="hidden" name="review_id" value="<?php echo $templateParams["reviewId"] ;?>" />
    <?php endif; ?>
</form>