import('./qr-scanner.min.js').then((module) => {
    const QrScanner = module.default;
    const videoElem = document.querySelector('#qr_scan_preview');
    const scanner = new QrScanner(videoElem, result => {
        /* scanner.stop();
        // Wait 1 second before restarting the scanner
        setInterval(() => {
            scanner.start();
        }, 1000); */
        convalidateReservation(result).then(res => {
            if (res) {
                showMessage(res);
            } else {
                showMessage({ type: 'danger', text: 'Errore nella convalida del codice.' });
            }
        });
    });
    scanner._maxScansPerSecond = 1;
    const selectCamera = document.querySelector('#camera-selection');
    // Checks for available cameras and populates the select element
    QrScanner.listCameras().then(cameras => {
        cameras.forEach(camera => {
            const option = document.createElement('option');
            option.value = camera.id;
            option.text = camera.label || `Camera ${selectCamera.length + 1}`;
            selectCamera.appendChild(option);
        });
        // Starts the scanner with the first available camera
        scanner.setCamera(cameras[0].id);
        scanner.start();
    });
    selectCamera.addEventListener('change', () => {
        scanner.setCamera(selectCamera.value);
        scanner.start();
    });
});

const btnConvalidate = document.querySelector('#manual-validate-btn');
btnConvalidate.addEventListener('click', () => {
    const codeInput = document.querySelector('#reservation-code');
    if(codeInput.value != "") {
        convalidateReservation(codeInput.value).then(res => {
            if (res) {
                console.log(res);
                showMessage(res);
            } else {
                showMessage({ type: 'danger', text: 'Errore nella convalida del codice.' });
            }
        });
        codeInput.value = "";
    }
});


async function convalidateReservation(code) {
    const url = `api_convalidate_reservation.php?code=${code}`;
    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error("Response status: " + response);
        }
        const result = await response.json();
        return result;
    } catch (error) {
        console.log(error.message, error.stack);
        return null;
    }
}

function showMessage(msg) {
    const msgDiv = document.querySelector('#msg');
    msgDiv.appendChild(document.createElement('div')).innerHTML = getAlert(msg.type, msg.text);
}

function getAlert(type, msg) {
    let title = "";
    switch(type) {
        case 'success':
            title = "Perfetto!";
            icon = "bi-check-circle";
            break;
        case 'danger':
            title = "Errore!";
            icon = "bi-x-circle";
            break;
        case 'warning':
            title = "Attenzione!";
            icon = "bi-exclamation-triangle";
            break;
    }
    return `<div class="alert alert-${type} alert-dismissible fade show" role="alert">
                <span class="bi ${icon}"></span> <strong>${title}</strong> ${msg}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>`;
}