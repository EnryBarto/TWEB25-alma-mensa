    <nav class="navbar navbar-dark navbar-expand-lg bg-primary font-monospace">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-white"></span>
            </button>
            <a class="navbar-brand" href="index.php" title="Homepage">AlmaMensa</a>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="explore.php">Esplora</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="map.php">Mappa</a>
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
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profilo</a>
                    </li>
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