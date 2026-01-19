<li class="dropdown nav-item">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Gestisci mensa
    </a>

    <ul class="dropdown-menu bg-primary p-2">
        <li><a class="dropdown-item bg-transparent nav-link" href="manage_canteen.php?action=U&id=<?php echo $user->getId();?>">Modifica dati</a></li>
        <li><a class="dropdown-item bg-transparent nav-link" href="manage_menus.php">Gestione menu</a></li>
        <li><a class="dropdown-item bg-transparent nav-link" href="manage_dishes.php">Gestione piatti</a></li>
        <li><a class="dropdown-item bg-transparent nav-link" href="manage_timetable.php">Gestione orari di apertura</a></li>
    </ul>
</li>
<li class="nav-item">
    <a class="nav-link" href="show_reservations_canteen.php">Mostra prenotazioni</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="scan_reservation.php">Rileva presenza</a>
</li>