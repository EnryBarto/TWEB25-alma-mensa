<?php
    $canteen = $templateParams["canteen"];
    require("components/canteen_header.php");
?>

<div class="row justify-content-center justify-content-md-start">
    <div class="col-11 col-md-10 col-md-4 offset-md-1">
    <?php if (isset($_GET["success"]) && $_GET["success"] == 1): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="bi bi-check-circle-fill"> Modifica avvenuta con successo!</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if (isset($_GET["errorCode"])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="bi bi-exclamation-circle-fill"> Si è verificato un errore durante l'aggiornamento dei dati. Codice errore: <?php echo $_GET["errorCode"]; ?></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-11 col-md-12 row justify-content-center d-md-block">
        <div class="col-6 col-md-4 offset-md-1 d-grid gap-2 mb-md-2 p-0 pe-1 pe-md-0">
            <a class="btn btn-outline-primary btn-sm" role="button" href="canteen_reviews.php?id=<?php echo $canteen->getId(); ?>">
                <span class="bi bi-star"></span>&nbsp;Recensioni
            </a>
        </div>
        <div class="col-6 col-md-4 offset-md-1 d-grid gap-2 p-0 ps-1 ps-md-0">
            <a class="btn btn-outline-primary btn-sm" role="button" href="menu.php?id=<?php echo urlencode($canteen->getId()); ?>">
                <span class="bi bi-card-text"></span>&nbsp;Menu
            </a>
        </div>
    </div>
</div>

<section class="row justify-content-center justify-content-md-start mt-3">
    <div class="col-11 col-md-9 offset-md-1">
        <h2 class="fs-4">Info:</h2>
        <ul class="list-unstyled">
            <li class="d-flex align-items-center mb-3">
                <span class="bi bi-geo-alt text-primary fs-3 me-3" title="Indirizzo"></span>
                <?php echo $canteen->getAddress()->getFormatted(); ?>
            </li>

            <?php if (!empty($canteen->getTelephone())): ?>
            <li class="d-flex align-items-center mb-3">
                <span class="bi bi-telephone text-primary fs-3 me-3" title="Telefono"></span>
                <?php echo $canteen->getTelephone(); ?>
            </li>
            <?php endif; ?>

            <li class="d-flex align-items-start">
                <span class="bi bi-clock text-primary fs-3 me-3" title="Orari di apertura"></span>
                <ul class="list-unstyled pt-2">
                    <?php
                    $last = "";
                    foreach($canteen->getOpeningHours() as $t):
                        if ($last != $t->getDayOfWeek()):
                            if ($last != "") echo "</ul></li>"; ?>
                        <li class="d-block"><strong>
                            <?php echo $t->getDayOfWeek(); ?>:
                        </strong>
                        <ul>
                        <?php endif; ?>
                        <li class="list-unstyled"><?php echo "{$t->getOpenTime()} - {$t->getCloseTime()}"; ?></li>
                        <?php if ($last != $t->getDayOfWeek()){
                            $last = $t->getDayOfWeek();
                        } ?>
                    <?php endforeach; ?>
                    <?php if(count($canteen->getOpeningHours()) == 0): ?>
                        <li>La mensa non ha orari disponibili</li>
                    <?php else: ?>
                        </ul></li>
                    <?php endif; ?>
                </ul>
            </li>
        </ul>
    </div>
    <?php switch (getUserLevel()):
        case UserLevel::Customer: ?>
        <div class="col-11 col-md-4 offset-md-1 d-grid gap-2">
            <a class="btn btn-primary" role="button" href="reservation.php?action=C&id=<?php echo $canteen->getId(); ?>"><span class="bi bi-journal-check"></span>&nbsp;Prenota</a>
        </div>
    <?php break;
        case UserLevel::CanteenAdmin:
            if($user->getId() === $canteen->getId()):?>
            <div class="col-11 col-md-4 offset-md-1 d-grid gap-2">
                <a href="manage_canteen.php?action=U&id=<?php echo $user->getId() ?>" role="button" class="btn btn-secondary"><span class="bi bi-pencil"></span> Modifica profilo</a>
                <a href="change_password.php" role="button" class="btn btn-primary"><span class="bi bi-key-fill"></span> Modifica password</a>
            </div>
            <?php endif; ?>
        <?php break; ?>
    <?php endswitch; ?>
</section>