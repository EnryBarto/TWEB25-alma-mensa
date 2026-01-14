    <nav class="navbar navbar-dark navbar-expand-lg bg-primary font-monospace">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-white"></span>
            </button>
            <a class="navbar-brand" href="index.php">AlmaMensa</a>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="explore.php">Esplora</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="map.php">Mappa</a>
                    </li>
                    <?php
                    switch ($userData["level"]) {
                        case UserLevel::CanteenAdmin:
                            require("navbars/canteen.php");
                            break;
                        case UserLevel::User:
                            require("navbars/user.php");
                            break;
                    }

                    if ($userData["level"] != UserLevel::NotLogged):
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">Registrati</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>