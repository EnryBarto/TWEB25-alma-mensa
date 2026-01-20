<div class="container py-4">
    <header class="row justify-content-center text-center">
        <a class="col-10 text-dark h1" href="canteen_details.php?id=<?php echo $templateParams["canteen"]->getId(); ?>"><?php echo $templateParams["canteen"]->getName(); ?></a>
        <p class="col-10 text-primary fs-4 fw-bold"><?php echo $templateParams["subtitle"] ; ?></p>
    </header>
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <?php if (isset($_GET["errorCode"])): ?>
                    <div class="col-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <span class="bi bi-exclamation-circle-fill"> Si è verificato un errore durante
                            <?php switch($_GET["action"]):
                            case "C": ?>
                            la creazione
                            <?php break; ?>
                            <?php case "D": ?>
                            la cancellazione
                            <?php break; ?>
                            <?php case "U": ?>
                            l'aggiornamento
                            <?php endswitch; ?>
                            dei dati. Codice errore: <?php echo htmlspecialchars($_GET["errorCode"]); ?>.
                            </span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    <?php endif; ?>
                    <form class="needs-validation" action="manage_canteen.php" method="POST" enctype="multipart/form-data" novalidate>
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome <span class="text-primary">*</span></label>
                            <input type="text" class="form-control" id="nome" name="name" placeholder="Nome della mensa" value="<?php echo $templateParams["name"]; ?>" required />
                        </div>

                        <div class="mb-3">
                            <label for="descrizione" class="form-label">Descrizione <span class="text-primary">*</span></label>
                            <textarea maxlength="1024" class="form-control" id="descrizione" name="desc" rows="4" required><?php echo $templateParams["desc"]; ?></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="posti" class="form-label">Capienza massima posti <span class="text-primary">*</span></label>
                            <input type="number" class="form-control" id="posti" min="0" step="1" name="seats" placeholder="Es: 120" value="<?php echo $templateParams["seats"]; ?>" required />
                        </div>

                        <div class="mb-4">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="text" class="form-control" id="telefono" name="telephone" placeholder="+39 333 123 4556" value="<?php echo $templateParams["telephone"]; ?>" />
                        </div>

                        <fieldset class="mb-4">
                            <legend class="text-uppercase text-secondary small fw-bold mb-1">Categoria <span class="text-primary">*</span></legend>
                            <?php foreach ($templateParams["categories"] as $c): ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="cat" value="<?php echo $c["id"]; ?>" id="cat-<?php echo $c["id"]; ?>" <?php if($templateParams["cat"] == $c["nome"]) echo "checked"; ?> required />
                                <label class="form-check-label" for="cat-<?php echo $c["id"]; ?>">
                                    <?php echo $c["nome"]?>
                                </label>
                            </div>
                            <?php endforeach; ?>
                        </fieldset>

                        <fieldset class="mb-4">
                            <legend class="text-uppercase text-secondary small fw-bold mb-1">Indirizzo <span class="text-primary">*</span></legend>
                            <div class="mb-3">
                                <label for="via" class="form-label">Via</label>
                                <input type="text" class="form-control" id="via" name="avenue" placeholder="Via" value="<?php echo $templateParams["avenue"]; ?>" required />
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="civico" class="form-label">Civico</label>
                                    <input type="text" class="form-control" id="civico" name="num" placeholder="Numero civico" value="<?php echo $templateParams["num"]; ?>" required />
                                </div>
                                <div class="col-md-6">
                                    <label for="cap" class="form-label">CAP</label>
                                    <input type="text" class="form-control" id="cap" name="postal_code" placeholder="CAP" value="<?php echo $templateParams["postal_code"]; ?>" required />
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="comune" class="form-label">Comune</label>
                                <input type="text" class="form-control" id="comune" name="municipality" placeholder="Comune" value="<?php echo $templateParams["municipality"]; ?>" required />
                            </div>
                        </fieldset>

                        <fieldset class="mb-4">
                            <legend class="text-uppercase text-secondary small fw-bold mb-1">Coordinate <span class="text-primary">*</span></legend>
                            <div class="row g-3">
                                <div class="col-md-6 mt-0">
                                    <label for="latitude" class="form-label">Latitudine</label>
                                    <input type="text" class="form-control" id="latitude" name="lat" placeholder="Es: 44.4949" value="<?php echo $templateParams["lat"] ?>" required />
                                </div>
                                <div class="col-md-6 mt-md-0">
                                    <label for="longitude" class="form-label">Longitudine</label>
                                    <input type="text" class="form-control" id="longitude" name="lon" placeholder="Es: 11.3426" value="<?php echo $templateParams["lon"]; ?>" required />
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="mb-4">
                            <legend class="text-uppercase text-secondary small fw-bold mb-1">Immagine</legend>
                            <?php if($user->getImg() != null): ?>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="removeImg" name="removeImg" value="true" />
                                    <label class="form-check-label" for="removeImg">Rimuovi immagine</label>
                                </div>
                            </div>
                            <figure class="col-12 col-md-6">
                                <figcaption class="mb-1">Immagine corrente:</figcaption>
                                <img src="<?php echo UPLOAD_DIR . $user->getImg(); ?>" class="img-fluid mb-3 d-block w-100" alt="Immagine di sfondo attuale" />
                            </figure>
                            <label for="image" class="form-label">Sostituisci immagine della mensa</label>
                            <?php else: ?>
                            <p class="pt-2">Al momento non è impostata nessun immagine</p>
                            <label for="image" class="form-label">Carica immagine della mensa</label>
                            <?php endif; ?>
                            <input class="form-control" type="file" id="image" name="image" accept="image/*" />
                        </fieldset>

                        <p>I campi contrassegnati con <span class="text-primary">*</span> sono obbligatori</p>

                        <input type="hidden" name="id" value="<?php echo $user->getId(); ?>" />
                        <input type="hidden" name="action" value="U" />

                        <div class="d-flex gap-2 justify-content-end">
                            <a role="button" class="btn btn-outline-secondary" alt="Chiudi modifica" href="canteen_details.php?id=<?php echo $user->getId(); ?>"><span class="bi bi-arrow-left"></span> Annulla</a>
                            <button type="reset" id="resBtn" class="btn btn-outline-primary"><span class="bi bi-x"></span> Reset</button>
                            <button type="submit" class="btn btn-primary"><span class="bi bi-floppy-fill"></span> Salva</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>