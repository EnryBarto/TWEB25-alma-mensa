<header class="text-center container mt-3 mb-4">
    <h1>Gestisci prenotazioni</h1>
</header>
<div class="container mb-5">
    <div class="row justify-content-center">
        <h2 class="text-center">Le tue prenotazioni attive</h2>
        <div class="col-11 col-md-10">
            <?php if (isset($_GET["success"]) && $_GET["success"] == 1): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php switch($_GET["action"]):
                    case "C": ?>
                    <span class="bi bi-check-circle-fill"> Prenotazione registrata con successo!</span>
                    <?php break; ?>
                    <?php case "D": ?>
                    <span class="bi bi-check-circle-fill"> Prenotazione eliminata con successo!</span>
                    <?php break; ?>
                    <?php case "U": ?>
                    <span class="bi bi-check-circle-fill"> Prenotazione aggiornata con successo!</span>
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
                    della prenotazione. Codice errore: <?php echo htmlspecialchars($_GET["errorCode"]); ?>.
                    <?php if (isset($_GET["errorCode"]) && $_GET["errorCode"] == -2): ?>
                    La mensa non ha abbastanza posti.
                    <?php elseif (isset($_GET["errorCode"]) && $_GET["errorCode"] == 1062): ?>
                    Hai già una prenotazione per questo orario in questa data in questa mensa.
                    <?php endif; ?>
                    </span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <?php foreach ($templateParams["reservations"] as $reservation){
                if ($reservation->isActive()) {
                    include('components/reservation_card.php');
                }
            } ?>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-11 col-md-10">
            <div class="d-grid gap-2">
                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse"
                    data-bs-target="#past-reservations" aria-expanded="false" aria-controls="past-reservations">
                    Mostra prenotazioni passate
                </button>
                <div class="collapse border rounded p-3 mt-3" id="past-reservations">
                    <h2 class="text-center mb-3">Prenotazioni passate</h2>
                    <?php foreach ($templateParams["reservations"] as $reservation): ?>
                        <?php if (!$reservation->isActive()): ?>
                            <?php include('components/reservation_card.php'); ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>