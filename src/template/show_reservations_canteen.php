<header class="mb-4 mt-3">
    <h1 class="text-center">Visualizza Prenotazioni</h1>
</header>
<div class="row justify-content-center">
    <div class="col-10 table-responsive">
        <table class="table table-hover table-sm align-middle">
            <thead>
                <tr>
                    <th id="date-reservation">Data Prenotazione</th>
                    <th id="code-reservation">Codice Prenotazione</th>
                    <th id="email-client">Email Cliente</th>
                    <th id="number-people">Numero Persone</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($templateParams["reservations"] as $reservation):
                    if ($reservation->isActive()): ?>
                <tr>
                    <td headers="date-reservation"><?php echo $reservation->getFormattedDateTime(); ?></td>
                    <td headers="code-reservation"><?php echo $reservation->getCode(); ?></td>
                    <td headers="email-client"><?php echo $reservation->getUserEmail(); ?></td>
                    <td headers="number-people"><?php echo $reservation->getNumPeople(); ?></td>
                </tr>
                <?php endif;
            endforeach; ?>
            </tbody>
        </table>
    </div>
</div>