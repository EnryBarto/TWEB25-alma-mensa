<?php
    $canteen = $templateParams["canteen"];
    require("components/canteen_header.php");
?>

        <div class="row justify-content-center d-md-block">
            <div class="col-5 col-md-4 offset-md-1 d-grid gap-2 mb-md-2">
                <a class="btn btn-outline-primary btn-sm" role="button" href="reviews.php?id=<?php echo $canteen->getId(); ?>"><span class="bi bi-star"></span>&nbsp;Recensioni</a>
            </div>
            <div class="col-5 col-md-4 offset-md-1 d-grid gap-2">
                <a class="btn btn-outline-primary btn-sm" role="button" href="menu.php"><span class="bi bi-card-text"></span>&nbsp;Menu</a>
            </div>
        </div>

        <section class="row justify-content-center justify-content-md-start mt-3">
            <div class="col-10 col-md-9 offset-md-1">
                <h2 class="fs-4">Info:</h2>
                <ul class="list-unstyled">
                    <li class="d-flex align-items-center mb-3">
                        <span class="bi bi-geo-alt text-primary fs-3 me-3"></span>
                        <?php echo $canteen->getAddress()->getFormatted(); ?>
                    </li>

                    <?php if (!empty($canteen->getTelephone())): ?>
                    <li class="d-flex align-items-center mb-3">
                        <span class="bi bi-telephone text-primary fs-3 me-3"></span>
                        <?php echo $canteen->getTelephone(); ?>
                    </li>
                    <?php endif; ?>

                    <li class="d-flex align-items-start">
                        <span class="bi bi-clock text-primary fs-3 me-3"></span>
                        <ul class="list-unstyled pt-2">
                            <?php
                            $last = "";
                            foreach($templateParams["timetable"] as $t): ?>
                            <?php if ($last != $t["giorno"]):
                            if ($last != "") echo "</ul></li>"; ?>
                            <li class="d-block"><strong>
                                <?php echo $t["giorno"]; ?>:
                            </strong>
                            <ul>
                            <?php endif; ?>
                            <li class="list-unstyled"><?php echo $t["ora_apertura"]." - ".$t["ora_chiusura"]; ?></li>
                            <?php if ($last != $t["giorno"]){
                                $last = $t["giorno"];
                            } ?>
                            <?php endforeach; ?>
                            <?php if(count($templateParams["timetable"]) == 0): ?>
                                <p>La mensa non ha orari disponibili</p>
                            <?php endif; ?>
                        </ul>
                    </li>
                </ul>
            </div>
            <?php switch (getUserLevel()):
                case UserLevel::Customer: ?>
                <div class="col-10 col-md-4 offset-md-1 d-grid gap-2">
                    <a class="btn btn-primary" role="button" href="reservation.php?id=<?php echo $canteen->getId(); ?>"><span class="bi bi-journal-check"></span>&nbsp;Prenota</a>
                </div>
            <?php break;
                case UserLevel::CanteenAdmin:
                    if($user->getId() === $canteen->getId()):?>
                    <div class="col-10 col-md-4 offset-md-1 d-grid gap-2">
                        <a href="manage_canteen.php?action=U&id=<?php echo $user->getId() ?>" role="button" class="btn btn-primary"><span class="bi bi-pen-fill"></span> Modifica profilo</a>
                        <a href="change_password.php" role="button" class="btn btn-primary"><span class="bi bi-key-fill"></span> Modifica password</a>
                    </div>
                <?php break; ?>
            <?php endif;
            endswitch; ?>
        </section>