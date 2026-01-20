<header class="mb-4 mt-3">
    <h1 class="text-center">Visualizza Prenotazioni</h1>
</header>
<div class="row justify-content-center mb-5">
    <h2 class="text-center">Prenotazioni Attive</h2>
    <div class="col-10 table-responsive">
        <table class="table table-hover table-sm align-middle">
            <thead>
                <tr>
                    <th id="date-reservation">Data Prenotazione</th>
                    <th id="email-client">Email Cliente</th>
                    <th id="number-people">Numero Persone</th>
                    <th id="code-reservation">Codice Prenotazione</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($templateParams["activeReservations"] as $reservation): ?>
                <tr>
                    <td headers="date-reservation"><?php echo $reservation->getFormattedDateTime(); ?></td>
                    <td headers="email-client"><?php echo $reservation->getUserEmail(); ?></td>
                    <td headers="number-people"><?php echo $reservation->getNumPeople(); ?></td>
                    <td headers="code-reservation"><?php echo $reservation->getCode(); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="row justify-content-center mb-5">
    <h2 class="text-center">Prenotazioni Passate</h2>
    <div class="col-10 table-responsive">
        <table class="table table-hover table-sm align-middle">
            <thead>
                <tr>
                    <th id="date-reservation-other">Data Prenotazione</th>
                    <th id="email-client-other">Email Cliente</th>
                    <th id="number-people-other">Numero Persone</th>
                    <th id="code-reservation-other">Codice Prenotazione</th>
                    <th id="convalidated-other">Convalidato</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($templateParams["otherReservations"] as $reservation):?>
                <tr>
                    <td headers="date-reservation-other"><?php echo $reservation->getFormattedDateTime(); ?></td>
                    <td headers="email-client-other"><?php echo $reservation->getUserEmail(); ?></td>
                    <td headers="number-people-other"><?php echo $reservation->getNumPeople(); ?></td>
                    <td headers="code-reservation-other"><?php echo $reservation->getCode(); ?></td>
                    <td headers="convalidated-other">
                        <?php if ($reservation->isConvalidated()): ?>
                            <span class="badge bg-success">Sì</span>
                        <?php else: ?>
                            <span class="badge bg-secondary">No</span>
                        <?php endif; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>