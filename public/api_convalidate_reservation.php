<?php
require_once '../src/bootstrap.php';
header("Content-Type: application/json");
$type = "success";
$text = "";
if (isUserLoggedIn() && getUserLevel() === UserLevel::CanteenAdmin) {
    if (isset($_GET['code'])) {
        $reservationCode = $_GET['code'];
        $reservation = $dbh->getReservationByCode($reservationCode);
        if ($reservation) {
            if ($reservation->getCanteen()->getId() === $user->getId()) {
                if (!$reservation->isConvalidated()) {
                    if (date("Y-m-d") == $reservation->getDateTime()->format("Y-m-d")) {
                        $exitCode = $dbh->convalidateReservation($reservation->getCode());
                            if ($exitCode == 0) {
                                $text = "Prenotazione con codice $reservationCode convalidata con successo! {$reservation->getUserEmail()}: [{$reservation->getFormattedDateTime()}] - {$reservation->getNumPeople()} persone.";
                            } else {
                                $type = "danger";
                                $text = "Errore durante la convalida della prenotazione $reservationCode. Codice di errore: $exitCode.";
                            }
                        } else {
                            $type = "warning";
                            $text = "La prenotazione con codice $reservationCode non può essere convalidata perché la data non corrisponde a quella di oggi.";
                        }
                } else {
                    $type = "warning";
                    $text = "La prenotazione con codice $reservationCode è già stata convalidata in precedenza.";
                }
            } else {
                $type = "danger";
                $text = "Non hai i permessi per convalidare la prenotazione $reservationCode.";
            }
        } else {
            $type = "danger";
            $text = "Nessuna prenotazione trovata con il codice $reservationCode.";
        }
    } else {
        $type = "danger";
        $text = "Codice di prenotazione non fornito.";
    }
} else {
    $type = "danger";
    $text = "Accesso non autorizzato.";
}
$response = ["type" => $type, "text" => $text];
echo json_encode($response);
?>