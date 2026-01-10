const code_containers = document.getElementsByClassName('reservation-code');
const codes = [];
const QRSIZE = 128;
for (let c of code_containers) {
    const code = c.innerText;
    const qr_container = document.getElementById(code + '-qrcode');
    const qr = new QRCode(qr_container, {
        text: code,
        width: QRSIZE,
        height: QRSIZE,
    });
    console.log(qr);
    codes.push(code);
}


