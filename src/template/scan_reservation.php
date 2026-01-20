<header class="mb-4 mt-3 text-center">
    <h1>Rileva presenza</h1>
</header>
<div class="row justify-content-center mt-5 mb-5">
    <h2 class="text-center">Convalida manuale</h2>
    <div class="col-11 col-md-8">
        <label for="reservation-code" class="form-label">Codice prenotazione:</label>
        <input type="text" placeholder="Inserisci codice" name="code" id="reservation-code" class="form-control"/>
    </div>
    <div class="col-11 col-md-2 d-grid mt-3 text-center">
        <button type="submit" id="manual-validate-btn" class="btn btn-primary mt-3">Convalida codice</button>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-11 col-md-10">
        <div id="msg"></div>
    </div>
</div>
<div class="row justify-content-center">
    <h2 class="text-center">Convalida automatica - scannerizza codice QR</h2>
    <div class="col-11 col-md-10">
        <video id="qr_scan_preview" class="w-100 h-auto"></video>
    </div>
</div>
<div class="row justify-content-center mt-4">
    <div class="col-11 col-md-10 text-center">
        <label for="camera-selection" class="form-label">Seleziona fotocamera:</label>
        <select name="camera" id="camera-selection" class="form-select">
        </select>
</div>
