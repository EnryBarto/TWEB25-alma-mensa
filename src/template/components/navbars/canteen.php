<li class="dropdown nav-item me-xl-2">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><span class="bi bi-sliders me-2"></span>Gestisci mensa</a>

    <ul class="dropdown-menu bg-primary p-2">
        <li><a class="dropdown-item bg-transparent nav-link" href="manage_canteen.php?action=U&id=<?php echo $user->getId();?>"><span class="bi bi-pencil-square me-2"></span>Modifica dati</a></li>
        <li><a class="dropdown-item bg-transparent nav-link" href="manage_menus.php"><span class="bi bi-journal-text me-2"></span>Gestione menu</a></li>
        <li><a class="dropdown-item bg-transparent nav-link" href="manage_dishes.php"><span class="bi bi-fork-knife me-2"></span>Gestione piatti</a></li>
        <li><a class="dropdown-item bg-transparent nav-link" href="manage_timetable.php"><span class="bi bi-clock me-2"></span>Gestione orari di apertura</a></li>
    </ul>
</li>
<li class="nav-item me-xl-2">
    <a class="nav-link" href="show_reservations_canteen.php"><span class="bi bi-calendar-check me-2"></span>Mostra prenotazioni</a>
</li>
<li class="nav-item me-xl-2">
    <a class="nav-link" href="scan_reservation.php"><span class="bi bi-check2-circle me-2"></span>Rileva presenza</a>
</li>