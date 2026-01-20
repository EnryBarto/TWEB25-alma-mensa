<div class="container py-4">
    <header class="row justify-content-center text-center">
        <a class="col-10 text-dark h1" href="canteen_details.php?id=<?php echo $templateParams["canteen"]->getId(); ?>"><?php echo $templateParams["canteen"]->getName(); ?></a>
        <p class="col-10 text-primary fs-4 fw-bold"><?php echo $templateParams["subtitle"] ; ?></p>
    </header>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="POST" action="create_dish.php">
                        <?php if (isset($dish)): ?>
                            <input type="hidden" name="dish_id" value="<?php echo htmlspecialchars($dish->getId()); ?>" />
                        <?php endif; ?>
                        <div class="mb-4">
                            <h6 class="text-uppercase text-secondary small mb-3">Nome Piatto<span class="text-primary">*</span></h6>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Es: Pasta al pomodoro" value="<?php echo isset($dish) ? htmlspecialchars($dish->getName()) : ''; ?>" required />
                        </div>

                        <div class="mb-4">
                            <h6 class="text-uppercase text-secondary small mb-3">Descrizione<span class="text-primary">*</span></h6>
                            <input type="text" class="form-control" id="descrizione" name="descrizione" placeholder="descrivi il piatto e i suoi ingredienti" value="<?php echo isset($dish) ? htmlspecialchars($dish->getDescription()) : ''; ?>" required />
                        </div>

                        <div class="mb-4">
                            <h6 class="text-uppercase text-secondary small mb-3">Prezzo (€)<span class="text-primary">*</span></h6>
                            <input type="number" step="0.01" min="0" class="form-control" id="prezzo" name="prezzo" placeholder="Es: 12.50" value="<?php echo isset($dish) ? htmlspecialchars($dish->getPrice()) : ''; ?>" required />
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="manage_dishes.php" class="btn btn-outline-secondary">Annulla</a>
                            <button type="submit" class="btn btn-primary"><?php echo isset($dish) ? 'Aggiorna' : 'Salva'; ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>