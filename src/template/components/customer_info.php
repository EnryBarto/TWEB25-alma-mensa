<div class="row justify-content-center">
    <div class="col-12 col-md-8">
        <ul class="list-unstyled">
            <li><strong>Nome:</strong> <?php echo $user->getName(); ?></li>
            <li><strong>Cognome:</strong> <?php echo $user->getSurname(); ?></li>
            <li><strong>Email:</strong> <?php echo $user->getEmail(); ?></li>
        </ul>
    </div>
    <div class="col-12 col-md-4 d-grid">
        <a href="mod_customer_data.php" role="button" class="btn btn-outline-primary mb-2"><span class="bi bi-pen-fill"></span> Modifica profilo</a>
        <a href="change_password.php" role="button" class="btn btn-outline-primary mb-2"><span class="bi bi-key-fill"></span> Modifica password</a>
    </div>
</div>