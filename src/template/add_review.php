<?php
$canteen = $templateParams["canteen"];
require("canteen_header.php");
?>

        <form class="row justify-content-center" action="add_review.php" method="POST">
            <input type="hidden" id="canteen_id" name="canteen_id" value="<?php echo $canteen->getId(); ?>" />
            <div class="col-10">
                <label class="form-label">Valutazione</label>
            </div>
            <div class="col-10 mb-3" id="stars">
                <button type="button" class="btn btn-lg p-1" onclick="setVote(1)"></button>
                <button type="button" class="btn btn-lg p-1" onclick="setVote(2)"></button>
                <button type="button" class="btn btn-lg p-1" onclick="setVote(3)"></button>
                <button type="button" class="btn btn-lg p-1" onclick="setVote(4)"></button>
                <button type="button" class="btn btn-lg p-1" onclick="setVote(5)"></button>
                <input type="hidden" id="vote" name="vote" value="<?php echo isset($_GET["vote"]) ? $_GET["vote"] : 3; ?>" />
            </div>
            <div class="col-10">
                <label for="title" class="form-label">Titolo</label>
            </div>
            <div class="col-10 mb-3">
                <input class="form-control <?php if (isset($_GET["errorCode"])) echo "is-invalid" ; ?>" type="text" id="title" name="title" placeholder="Dai un titolo alla tua recensione" <?php if(isset($_GET["title"])) echo "value=\"$_GET[title]\""; ?> required/>
                <?php if(isset($_GET["errorCode"]) && $_GET["errorCode"] == -1): ?>
                    <div class="invalid-feedback">
                        <span class="bi bi-exclamation-circle-fill"></span>&nbsp;Compila correttamente tutti i campi
                    </div>
                <?php else: ?>
                    <div class="invalid-feedback">
                        <span class="bi bi-exclamation-circle-fill"></span>&nbsp;Errore nell'aggiunta della recensione - Codice: <?php echo $_GET["errorCode"]; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-10">
                <label for="description" class="form-label">Descrizione</label>
            </div>
            <div class="col-10 mb-3">
                <textarea class="form-control <?php if (isset($_GET["errorCode"])) echo "is-invalid" ; ?>" type="text" id="description" name="description" rows="4" placeholder="Descrivi la tua esperienza in dettaglio..." required><?php if(isset($_GET["desc"])) echo $_GET["desc"]; ?></textarea>
            </div>
            <div class="col-10 d-grid mt-1">
                <input type="submit" class="btn btn-primary" value="Conferma Recensione" />
            </div>
        </form>