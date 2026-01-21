    <nav class="navbar navbar-dark navbar-expand-xl bg-primary font-monospace">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-white"></span>
            </button>
            <a class="navbar-brand" href="index.php" title="Homepage">AlmaMensa</a>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item me-xl-2">
                        <a class="nav-link" href="explore.php"><span class="bi bi-compass me-2"></span>Esplora</a>
                    </li>
                    <li class="nav-item me-xl-2">
                        <a class="nav-link" href="map.php"><span class="bi bi-map me-2"></span>Mappa</a>
                    </li>
                    <?php
                    switch (getUserLevel()) {
                        case UserLevel::CanteenAdmin:
                            require("navbars/canteen.php");
                            break;
                        case UserLevel::Customer:
                            require("navbars/user.php");
                            break;
                    }

                    if (getUserLevel() != UserLevel::NotLogged):
                    ?>
                    <li class="nav-item me-xl-2">
                        <a class="nav-link" href="profile.php"><span class="bi bi-person-circle me-2"></span>Profilo</a>
                    </li>
                    <li class="nav-item me-xl-2">
                        <a class="nav-link" href="logout.php"><span class="bi bi-box-arrow-right me-2"></span>Logout</a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item me-xl-2">
                        <a class="nav-link" href="login.php"><span class="bi bi-box-arrow-in-right me-2"></span>Login</a>
                    </li>
                    <li class="nav-item me-xl-2">
                        <a class="nav-link" href="signup.php"><span class="bi bi-person-plus me-2"></span>Registrati</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>